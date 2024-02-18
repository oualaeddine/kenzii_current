<?php

namespace Modules\Stores\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\OldStoreFront\Entities\StoreProduct;
use Modules\Stores\Entities\Store;
use Modules\Stores\Http\Requests\SaveStoreRequest;
use Modules\Stores\Http\Requests\UpdateStoreRequest;
use Yajra\DataTables\Facades\DataTables;

class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('stores::index', [
            'stores' => Store::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('stores::create');
    }

    public function store(SaveStoreRequest $request)
    {
        Store::create($request->validated());

        return redirect()->route('stores.index')->with('success', 'Store Added Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id, Request $request)
    {
        $store_id = $id;

     /*    $products = DB::table('store_products')
        ->select('products.name as name','store_products.*')
        ->where('store_id',$id)
        ->leftJoin('products', 'store_products.product_id', 'products.id')
        ->paginate(5); */

        $pg_nb = $request->pg_nb??0;

       /*  return $pg_nb; */

        if ($request->ajax()) {

            $data = StoreProduct::where('store_id',$id)->whereHas('product_spec')->with('product_spec')->with('store_product_category.category')->orderBy('created_at','desc');

            return DataTables::of($data)
                ->addColumn('empty', function ($store_p) {
                    return '';
                })
                ->addColumn('Created_at', function ($store_p) {
                    $t = $store_p->created_at;
                    return  $t = Carbon::parse($t)->tz('Africa/Algiers')->format('m-d H:i');
                })
                ->addColumn('Price_txt', function ($store_p) {

                    if($store_p->price_txt != null){
                        return $store_p->price_txt;
                     }else{
                        return '<span class="badge badge-danger">None</span>';
                     }
                })
                ->addColumn('Categories', function ($store_p) {
                     $r = null ;
                    foreach ($store_p->store_product_category as $item){
                        $r = $r . $item->category->name. '|';
                    }
                    return $r;

                })
                ->addColumn('Price_old', function ($store_p) {
                    return $store_p->price_old?? 0;
                })
                ->addColumn('Discount', function ($store_p) {
                    return $store_p->discount?? 0;
                })
                ->addColumn('Url', function ($store_p) {
                    if($store_p->url != null){
                       return '<span class="badge badge-success">true</span>';
                    }else{
                       return '<span class="badge badge-danger">false</span>';
                    }
                })
                ->addColumn('New', function ($store_p) {
                    if($store_p->new== 1){
                       return '<span class="badge badge-success">true</span>';
                    }else{
                       return '<span class="badge badge-danger">false</span>';
                    }
                })
                ->addColumn('Visible', function ($store_p) {
                    if($store_p->visible == 1){
                       return '<span class="badge badge-success">true</span>';
                    }else{
                       return '<span class="badge badge-danger">false</span>';
                    }
                })
                ->addColumn('Featured', function ($store_p) {
                    if($store_p->featured== 1){
                       return '<span class="badge badge-success">true</span>';
                    }else{
                       return '<span class="badge badge-danger">false</span>';
                    }
                })
                ->addColumn('Actions', 'stores::includes.actions_products')
                ->rawColumns([
                    'Created_at',
                    'Featured',
                    'New',
                    'Url',
                    'Visible',
                    'Discount',
                    'Price_old',
                    'Price_txt',
                    'Categories',
                    'empty',
                    'Actions'
                ])
                ->make(true);
        }

        $categories = DB::table('store_categories')
        ->select('categories.name as name','store_categories.*')
        ->where('store_id',$id)
        ->leftJoin('categories', 'store_categories.category_id', 'categories.id')
        ->paginate(5);

        return view('stores::details',compact('store_id','categories','pg_nb'));

    }


  
    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('stores::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateStoreRequest $request, Store $store)
    {
        $store->update($request->validated());
        return redirect()->route('stores.index')->with('success', 'Store Updated Successfully');

    }


    public function destroy(Store $store)
    {
        $store->delete();
        return redirect()->route('stores.index')->with('success', 'Store Delete Successfully');

    }
}
