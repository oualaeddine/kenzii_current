<?php

namespace Modules\DentaireStore\Http\Controllers;

use App\Helpers\VisitorLogHelper;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Categories\Entities\Category;
use Modules\Categories\Entities\StoreCategory;
use Modules\Products\Entities\Product;
use Modules\OldStoreFront\Entities\StoreProduct;
use Modules\Orders\Entities\Order;
use Modules\Stores\Entities\Store;
use Modules\Stores\Entities\Store_setting;


class DentaireStoreController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {


       /*  return Order::orderBy('created_at','desc')->with('orderProducts.product')->limit(10)->first()->orderProducts->first()->product->productPhotos()->first()->link; */

        $products = Product::get();

        foreach($products as $p){
            $p->slug = \Str::slug($p->name,'-');
            $p->save();
        }

        $page_title = 'Dentaire Store';

        $settings = Store_setting::where('store_id', 1)->get();

        //slider data  & trend
        $slider = collect($settings)->filter(function ($item) {
            return false !== stripos($item, 'slider');
        })->groupBy('group');

        $trend = collect($settings)->filter(function ($item) {
            return false !== stripos($item, 'trend');
        })->groupBy('group')->first();



        $featured = StoreProduct::where('visible', 1)
            ->where('featured', 1)
            ->where('store_id', 1)
            ->whereHas('product.brand')
            ->with('product.main_photo')
            ->inRandomOrder()
            ->limit(6)
            ->get();

        $new_products = StoreProduct::where('visible', 1)
            ->where('store_id', 1)
            ->whereHas('product.brand')
            ->with('product.main_photo')
            ->inRandomOrder()
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();


        $new_added = StoreProduct::where('visible', 1)
            ->where('store_id', 1)
            ->whereHas('product.brand')
            ->with('product.main_photo')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        $feautred_added = StoreProduct::where('visible', 1)
            ->where('featured', 1)
            ->where('store_id', 1)
            ->whereHas('product.brand')
            ->with('product.main_photo')
            ->orderBy('created_at','desc')
            ->limit(3)
            ->get();

        $best_added = StoreProduct::where('visible', 1)
            ->where('store_id', 1)
            ->whereHas('product.brand')
            ->with('product.main_photo')
            ->orderBy('price','asc')
            ->limit(3)
            ->get();



        $categories = StoreCategory::whereHas('category')
            ->with('category')
            ->withCount('store_product')
            ->inRandomOrder()
            ->limit(4)
            ->get();


        $purchased = app(ContentController::class)->purchased();
     
        /* $settings->where('group','like','slider'); */

        return view('dentairestore::index', compact('page_title','purchased','slider', 'settings', 'featured', 'trend', 'new_products', 'categories','new_added','feautred_added','best_added'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
  /*   public function categories()
    {
        $page_title = 'Dentaire | categories';

        $settings = Store_setting::get();

        return view('dentairestore::categories', compact('page_title', 'settings'));
    } */


   /*  public function products()
    {
        $page_title = 'Dentaire | products';

        $settings = Store_setting::get();


        return view('dentairestore::products', compact('page_title', 'settings'));
    } */


    public function products(Request $request, $slug)
    {

        $purchased = app(ContentController::class)->purchased();

        //get store 
        $host = request()->getHost();

        $store = str_replace('.com', '', $host);

        $store = Store::where('name',/* $store */ 'barbarostools')->first();
        ///
        
        /* $product_ref = $ref; */

        /// product
        $product = Product::where('slug',$slug)->with('productPhotos')->with('brand')->with('main_photo')->first();

        if ($product == null) {
            return abort(404);
        }

        $store_product = StoreProduct::where('product_id', $product->id)->where('store_id', $store->id)->first();
        ///

        $visitor_id = VisitorLogHelper::StoreVisitor($request, $store_product);
        Session::put('visitor_id', $visitor_id);

        $products = StoreProduct::where('visible', 1)->where('store_id', $store->id)->whereHas('product.brand')->with('product.main_photo')->inRandomOrder()->limit(8)->get();

        $products_next = StoreProduct::where('visible', 1)->where('store_id', $store->id)->whereHas('product.brand')->with('product.main_photo')->inRandomOrder()->limit(2)->get();


        $page_title = 'Dentaire | products';

        $settings = Store_setting::get();


        return view('dentairestore::products', compact('page_title','purchased','products_next','store_product', 'product', 'products','settings'))->with('fb_pixel', $store->fb_pixel);
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
        return view('dentairestore::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('dentairestore::edit');
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
