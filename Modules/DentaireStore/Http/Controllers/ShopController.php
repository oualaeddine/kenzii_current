<?php

namespace Modules\DentaireStore\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Categories\Entities\Category;
use Modules\OldStoreFront\Entities\StoreProduct;
use Modules\Products\Entities\Brand;
use Modules\Stores\Entities\Store;
use Modules\Stores\Entities\Store_setting;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {

        $purchased = app(ContentController::class)->purchased();

        $brands = Brand::get();

        $current_brand = [];
       /*  $brands = $request->brand[0];

        $brands = explode(',',$request->brand[0]); */


        $price_lower = 1000;
        $price_upper = 150000;


        if($request->price_lower != null){
            $price_lower = $request->price_lower;
        }

        if($request->price_upper != null){
            $price_upper =  $request->price_upper;
        }


        /* return $price_upper; */
        /* search */
     
     
        //get store 
        $host = request()->getHost();

        $store = str_replace('.com', '', $host);
       
        $store = Store::where('name',/* $store */ 'barbarostools')->first();
        ///filter with

        $by = 'created_at';
        $order = 'asc'; 
        $sort_by = $request->tp;

        if($request->tp != null){

            switch($request->tp){
                case ('price_up'):

                    $by = 'price';
                    $order = 'asc';

                    break;

                    case ('price_down'):

                        $by = 'price';
                        $order = 'desc';

                        break;

                        case ('order_desc'):

                            $by = 'created_at';
                            $order = 'desc';
                    
                            break;
            }

        }

        ////

        $nbr_pages = 12;

        if($request->nbr_pages != null){
            $nbr_pages = $request->nbr_pages;
        }

        //Categories 
        $categories = Category::get();

        $category_selected = urldecode($request->category) ?? null;

        $search = $request->search?? null;

        /////***-------------------- */

        if($category_selected != null){


            if($search != null){

                if($request->brand == null || $request->brand == [null]){

                    $products = $this->serach($price_lower,$price_upper,$request,$store,$category_selected,$nbr_pages,$by,$order);

                }else{

                   

                    $brand = $request->brand;

                    $current_brand = $brand;


                    $products = $this->filter_brand_w_s($price_lower,$price_upper,$request,$store,$category_selected,$nbr_pages,$by,$order);

                }

            }else{

                if($request->brand == null || $request->brand == [null]){

                    $products = $this->category_only($price_lower,$price_upper,$store,$category_selected,$nbr_pages,$by,$order);

                }else{

                    

                    $brand = $request->brand;

                    $current_brand = $brand;

                    $products = $this->filter_brand($price_lower,$price_upper,$request,$store,$category_selected,$nbr_pages,$by,$order);
                }
            

    
            }
        
        }else{

            if($search != null){

                if($request->brand == null || $request->brand == [null]){


                    $products = StoreProduct::where('visible', 1)
                    ->whereBetween('price', [$price_lower, $price_upper])
                    ->where('store_id', $store->id)
                    ->whereHas('product',function($q) use($search){
                        $q->where('name','like','%'.$search.'%')->orWhere('num','like','%'.$search.'%')->whereHas('brand');
                    })
                    ->with('product.main_photo')
                    ->orderBy($by,$order)
                    ->paginate($nbr_pages)
                    ->appends(request()->query());



                }else{

                    $brand = $request->brand;

                    $current_brand = $brand;

                    $products = StoreProduct::where('visible', 1)
                    ->whereBetween('price', [$price_lower, $price_upper])
                    ->where('store_id', $store->id)
                    ->whereHas('product',function($q) use($search,$brand){
                        $q->where('name','like','%'.$search.'%')->orWhere('num','like','%'.$search.'%')
                        ->whereHas('brand',function($qr) use($brand){

                            $qr->whereIn('id',$brand);
            
                        });
                    })
                    ->with('product.main_photo')
                    ->orderBy($by,$order)
                    ->paginate($nbr_pages)
                    ->appends(request()->query());



                }

               

            }else{


                if($request->brand == null || $request->brand == [null]){

                   
                    $products = StoreProduct::where('visible', 1)
                    ->whereBetween('price', [$price_lower, $price_upper])
                    ->where('store_id', $store->id)
                    ->whereHas('product.brand')
                    ->with('product.main_photo')
                    ->orderBy($by,$order)
                    ->paginate($nbr_pages)
                    ->appends(request()->query());

                  

                }else{

                   

                    $brand = $request->brand;

                    $current_brand = $brand;

                    $products = StoreProduct::where('visible', 1)
                    ->whereBetween('price', [$price_lower, $price_upper])
                    ->where('store_id', $store->id)
                    ->whereHas('product',function($qr) use($brand){
                        $qr->whereHas('brand',function($qr) use($brand){

                            $qr->whereIn('id',$brand);
            
                        });
                    })
                    ->with('product.main_photo')
                    ->orderBy($by,$order)
                    ->paginate($nbr_pages)
                    ->appends(request()->query());

                }
               

            }
           
        }

       /*  if($request->search != null){
            $products =  $products->where('product.name','like','%'.$request->search.'%');
        } */

        $page_title = 'Dentaire | categories';

        $settings = Store_setting::get();
       
        return view('dentairestore::categories', compact('page_title','purchased','settings','products','current_brand','categories','brands','category_selected','nbr_pages','sort_by','price_lower','price_upper','search'))->with('fb_pixel', $store->fb_pixel);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */

    public function category_only($price_lower,$price_upper,$store,$category_selected,$nbr_pages,$by,$order)
    {
         return $products = StoreProduct::where('visible', 1)
         ->whereBetween('price', [$price_lower, $price_upper])
         ->where('store_id', $store->id)
         ->whereHas('product')->with('product.main_photo')
         ->whereHas('store_product_category.category', function ($q) use ($category_selected) {
             $q->where('name', $category_selected);
         })->orderBy($by,$order)->paginate($nbr_pages)->appends(request()->query());
  
    }



    public function serach($price_lower,$price_upper,$request,$store,$category_selected,$nbr_pages,$by,$order)
    {

         return $products = StoreProduct::where('visible', 1)
        ->whereBetween('price', [$price_lower, $price_upper])
        ->where('store_id', $store->id)
        ->whereHas('product',function($q) use($request){
            $q->where('name','like','%'.$request->search.'%')->orWhere('num','like','%'.$request->search.'%')->whereHas('brand');
        })
        ->with('product.main_photo')
        ->whereHas('store_product_category.category', function ($q) use ($category_selected) {
            $q->where('name', $category_selected);
        })->orderBy($by,$order)->paginate($nbr_pages)->appends(request()->query());

  
    }

    public function filter_brand_w_s($price_lower,$price_upper,$request,$store,$category_selected,$nbr_pages,$by,$order)
    {
        $brand = $request->brand;

        return $products = StoreProduct::where('visible', 1)
        ->whereBetween('price', [$price_lower, $price_upper])
        ->where('store_id', $store->id)
        ->whereHas('product',function($q) use($request,$brand){
            $q->where('name','like','%'.$request->search.'%')->orWhere('num','like','%'.$request->search.'%')

            ->whereHas('brand',function($qr) use($brand){

                $qr->whereIn('id',$brand);

            });

        })
        ->with('product.main_photo')
        ->whereHas('store_product_category.category', function ($q) use ($category_selected) {
            $q->where('name', $category_selected);
        })->orderBy($by,$order)->paginate($nbr_pages)->appends(request()->query());
  
    }

    public function filter_brand($price_lower,$price_upper,$request,$store,$category_selected,$nbr_pages,$by,$order)
    {
        $brand = $request->brand;

        return $products = StoreProduct::where('visible', 1)
        ->whereBetween('price', [$price_lower, $price_upper])
        ->where('store_id', $store->id)
        ->whereHas('product',function($q) use($brand){

            $q->whereHas('brand',function($qr) use ($brand){
                $qr->whereIn('id',$brand);
            });

        })

        ->with('product.main_photo')
        ->whereHas('store_product_category.category', function ($q) use ($category_selected) {
            $q->where('name', $category_selected);
        })->orderBy($by,$order)->paginate($nbr_pages)->appends(request()->query());
  
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('barbarostools::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('barbarostools::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
