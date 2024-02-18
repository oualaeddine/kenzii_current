<?php

namespace Modules\Categories\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Categories\Entities\Category;
use Modules\Categories\Entities\StoreCategory;
use Modules\OldStoreFront\Entities\StoreProduct;
use Modules\StoreProductCategories\Entities\StoreProductCategory;

class APICategoryController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    public function index()
    {
        $categories = Category::get();
        /* $products = Store::'products.id'find($id)->products()->get(); */

        return $this->sendResponse($categories->toArray(), 'Categories retrieved successfully');
    }

    public function categories($id)
    {
        $categories_id = StoreCategory::where('store_id',$id)->get()->pluck('category_id');

        $categories = Category::whereNotIn('id',$categories_id)->get();
        /* $products = Store::'products.id'find($id)->products()->get(); */

        return $this->sendResponse($categories->toArray(), 'Categories retrieved successfully');
    }

    

    public function show(Request $request, $id)
    {
        $category = Category::find($id);
        /* $products = Store::'products.id'find($id)->products()->get(); */


        return $this->sendResponse($category->toArray(), 'Category retrieved successfully');
    }


    public function store_categories(Request $request, $id)
    {
        $store_id = StoreProduct::find($id)->store_id;


        $store_p = StoreProductCategory::where('store_product_id',$id)->get()->pluck('store_category_id');
        

        $categories = DB::table('store_categories')
        ->whereNotIn('store_categories.id',$store_p)
        ->select('categories.name as name','store_categories.*')
        ->where('store_id',$store_id)
        ->leftJoin('categories', 'store_categories.category_id', 'categories.id')
        ->get();
        /* $category = Category::find($id); */
        /* $products = Store::'products.id'find($id)->products()->get(); */

        return $this->sendResponse($categories->toArray(), 'Categories retrieved successfully');
    }




    
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('categories::create');
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
 
    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('categories::edit');
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
