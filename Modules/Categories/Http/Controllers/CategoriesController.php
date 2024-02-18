<?php

namespace Modules\Categories\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Categories\Entities\Category;
use Modules\Categories\Http\Requests\CreateCategory;
use Modules\Categories\Http\Requests\UpdateCategory;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{ 
    
    use UploadImageTrait;
    
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $categories = Category::orderBy('created_at','desc')->paginate(10);

        return view('categories::categories.index',compact('categories'));
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

        $validator = Validator::make($request->all(), [
            'name'  => 'required|string|max:255|unique:categories,name',
            'desc'  => 'nullable|string|max:65000',
            'image' => 'nullable|file|max:2048|mimes:png,jpg',
            'icon'  => 'nullable|file|max:2048|mimes:png,jpg',
        ]);

        if ($validator->fails()) {
            $response = array($validator->messages());
            $response = $response[0]->first();

            
            Session::flash('error', $response);
            return redirect()->back();
        }


        $image_path = null;
        $icon_path = null ;
        
        $category = new Category();

        if($request->image != null){
            $image_path = $this->storeAndOptimizeImageArray($request, $request->image, 'categories_images');
            $category->image = '/storage/categories_images/'.$image_path ;
        }
       
        if($request->icon != null){
            $icon_path = $this->storeAndOptimizeImageArray($request, $request->icon, 'categories_icons');
            $category->icon =  '/storage/categories_icons/'.$icon_path;
        }
       
        
        $category->name = $request->name;
        $category->desc = $request->desc;
    
        $category->save();


        Session::flash('success','Category saved successfully.');


        return redirect()->back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('categories::show');
    }

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
        
        $validator = Validator::make($request->all(), [
            'name'  => 'required|string|max:255|unique:categories,name,'.+$id,
            'desc'  => 'nullable|string|max:65000',
            'image' => 'nullable|file|max:2048|mimes:png,jpg',
            'icon'  => 'nullable|file|max:2048|mimes:png,jpg',
        ]);

        if ($validator->fails()) {
            $response = array($validator->messages());
            $response = $response[0]->first();

            
            Session::flash('error', $response);
            return redirect()->back();
        } 

        $category = Category::find($id);


        if($request->image != null){
            $image_path = $this->storeAndOptimizeImageArray($request, $request->image, 'categories_images');
            $category->image = '/storage/categories_images/'.$image_path ;
        }
       
        if($request->icon != null){
            $icon_path = $this->storeAndOptimizeImageArray($request, $request->icon, 'categories_icons');
            $category->icon =  '/storage/categories_icons/'.$icon_path;
        }

        $category->name = $request->name;
        $category->desc = $request->desc;
        $category->save();


        Session::flash('success','Category updated successfully.');


        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        
        $category = Category::find($id);

        $category->delete();

        Session::flash('success','Category archived successfully.');

        return redirect()->back();

    }
}
