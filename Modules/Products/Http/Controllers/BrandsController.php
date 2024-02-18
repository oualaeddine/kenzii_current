<?php

namespace Modules\Products\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Modules\Products\Entities\Brand;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $brands = Brand::get();

        return view('products::brands.index',compact('brands'));
    }


    public function index_all(Request $request){


                if (isset($request->q))
                $term = trim($request->q);
            else
                $brands = DB::table('brands')
                    ->select('brands.id as id',
                        'brands.name as name')
                    ->get();

            if (empty($term)) {

                    $brands = DB::table('brands')
                    ->select('brands.id as id',
                        'brands.name as name')
                    ->get();
            }else{

      

                    $brands = DB::table('brands')
                    ->select('brands.id as id',
                        'brands.name as name')
                    ->where('brands.name', 'like', "%$term%")
                    ->get();

            }
        
            $formatted_tags = [];

            foreach ($brands as $p) {
                $formatted_tags[] = [
                    'id' => $p->id,
                    'text' => $p->name
                ];
            }
            return response()->json($formatted_tags);


    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('products::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:brands,name',
        ]);

    
        if ($validator->fails()) {
            $response = array($validator->messages());
            $response = $response[0]->first();

            Session::flash('error', $response);

            return redirect()->back();
        }

        
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->save();
 
        Session::flash('success', 'Brand added successfully.');

        return redirect()->route('brands.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('products::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        
        $brand = Brand::findorfail($id);
        
        return Response::json([
            'success' => true,
            'data' => $brand
        ], 200);
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
            'name' => 'required|string|max:255|unique:brands,name,'.$id,
        ]);

    
        if ($validator->fails()) {
            $response = array($validator->messages());
            $response = $response[0]->first();

            Session::flash('error', $response);

            return redirect()->back();
        }

        
        $brand = Brand::findorfail($id);
        $brand->name = $request->name;
        $brand->save();
 
        Session::flash('success', 'Brand updated successfully.');

        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {

        $brand = Brand::findorfail($id);

        if($brand->products()->count() != 0){

            Session::flash('error', 'please you can not delete this brand !');

            return redirect()->back();
            
        }

        $brand->delete();

        Session::flash('success', 'Brand deleted successfully.');

        return redirect()->route('brands.index');


        
    }



}
