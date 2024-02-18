<?php

namespace Modules\Stores\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Modules\OldStoreFront\Entities\StoreProduct;
use Modules\Stores\Entities\Store;

class StoreProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('stores::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('stores::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|string',
   /*          'visible' => 'required',
            'featured' => 'required',
            'new' => 'required', */
            'price' => 'required|numeric|min:1',
            'price_old' => 'nullable|numeric|min:0',
            'price_text' => 'required|string',
            'discount' => 'nullable|numeric|min:0',
        ]);


        if ($validator->fails()) {
            $response = array($validator->messages());
            $response = $response[0]->first();

            Session::flash('error', $response);

            return redirect()->back();
        }

        $store = Store::find($id);
        
        $store->products()->attach($request->product_id,['price' => $request->price,
        'price_old' => $request->price_old?? 0,'price_txt' => $request->price_text,'discount' => $request->discount?? 0,
        'visible' => $request->visible?? 0,'new' => $request->new?? 1,'featured' => $request->featured?? 1 , 'url' => $request->url?? null]);



       return redirect()->back()->with('success', 'Store product added Successfully');
        
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('stores::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $product = DB::table('store_products')
        ->where('store_products.id',$id)
        ->select('products.name as name','store_products.*')
        ->leftJoin('products', 'store_products.product_id', 'products.id')
        ->first();

        

        return response()->json([
            'data' => $product,
        ]);
    
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'product_id' => 'required|string',
   /*          'visible' => 'required',
            'featured' => 'required',
            'new' => 'required', */
            'price' => 'required|numeric|min:1',
            'price_old' => 'nullable|numeric|min:0',
            'price_text' => 'required|string',
            'discount' => 'required|numeric|min:0',
        ]);


        if ($validator->fails()) {
            $response = array($validator->messages());
            $response = $response[0]->first();

            Session::flash('error', $response);

            return redirect()->back();
        }

        $pg_nb = $request->pg_nb;

        /* $store = Store::find($id); */
        
        DB::table('store_products')->where('id',$id)->update(['price' => $request->price,
        'price_old' => $request->price_old?? 0,'price_txt' => $request->price_text,'discount' => $request->discount?? 0,
        'visible' => $request->visible?? 0,'new' => $request->new?? 0,'featured' => $request->featured?? 0 , 'url' => $request->url?? null]);

        $store_product = StoreProduct::find($id);

        $store_product->store_product_category()->attach($request->category_store_id);


       return redirect()->route('stores.show',[$store_product->store_id ,'pg_nb' => $pg_nb])->with(['success'=>'Store Product Updated Successfully' , 'pg_nb' => $pg_nb ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {

        DB::table('store_products')->delete($id);
        

        return redirect()->back()->with('success', 'Store Product Deleted Successfully');
    }
}
