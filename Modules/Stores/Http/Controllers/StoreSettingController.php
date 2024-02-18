<?php

namespace Modules\Stores\Http\Controllers;

use App\Traits\UploadImageTrait;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Modules\Stores\Entities\Store_setting;
use Yajra\DataTables\Facades\DataTables;

class StoreSettingController extends Controller
{

    use UploadImageTrait;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('stores::index');
    }

    public function settings($id, Request $request){
         
        $store_id = $id ;

        if ($request->ajax()) {

            $data = Store_setting::where('store_id',$id)->where('type','text')->orderBy('created_at','desc');

            return DataTables::of($data)
                ->addColumn('empty', function () {
                    return '';
                })
               
                ->addColumn('Actions', 'stores::includes.actions_settings_text')
                ->rawColumns([
                    'empty',
                    'Actions'
                ])
                ->make(true);
        }

        $data_images = Store_setting::where('store_id',$id)->where('type','image')->orderBy('created_at','desc')->paginate(10);

        

         
        return view('stores::settings',compact('store_id','data_images'));
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
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'store_id' => 'required',
            'name' => 'required|string|max:255|unique:store_settings,name,NULL,id,group,'.$request->group,
            'value' => 'required|string|max:65000',
        ]);

        if ($validator->fails()) {
            $response = array($validator->messages());
            $response = $response[0]->first();
            Session::flash('error', $response);
            return redirect()->back();
        }


        $setting = new Store_setting();
        $setting->name = $request->name;
        $setting->value = $request->value;
        $setting->store_id = $request->store_id;
        $setting->type = 'text';
        $setting->group = $request->group;
        $setting->priorty = $request->priorty;
        $setting->save();


       return redirect()->back()->with('success', 'Store setting added successfully');

    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {

        $setting = Store_setting::findorfail($id);

        return response()->json([
            'data' => $setting,
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
            'name' => 'required|string|max:255|unique:store_settings,name,'.$id.',id,group,'.$request->group,
            'value' => 'required|string|max:65000',
        ]);

        if ($validator->fails()) {
            $response = array($validator->messages());
            $response = $response[0]->first();
            Session::flash('error', $response);
            return redirect()->back();
        }


        $setting = Store_setting::findorfail($id);
        $setting->name = $request->name;
        $setting->value = $request->value;
        $setting->group = $request->group;
        $setting->priorty = $request->priorty;
        $setting->save();


       return redirect()->back()->with('success', 'Store setting updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $setting = Store_setting::findorfail($id);
        
        $setting->delete();

        return redirect()->back()->with('success', 'Store setting deleted successfully');
    }
    

    /*
    *
    * Images Setting
    *
    *
    *
    *
    */

    public function store_image(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'store_id' => 'required',
            'name' => 'required|string|max:255|unique:store_settings,name,NULL,id,group,'.$request->group,
            'value' => 'required|file|max:2048|mimes:jpeg,png,jpg',
        ]);

        if ($validator->fails()) {
            $response = array($validator->messages());
            $response = $response[0]->first();
            Session::flash('error', $response);
            return redirect()->back();
        }

        
        $image_path = $this->storeAndOptimizeImage($request, 'value', 'setting_images');

        $path = 'storage/setting_images/' . $image_path;


        $setting = new Store_setting();
        $setting->name = $request->name;
        $setting->value =  $path;
        $setting->store_id = $request->store_id;
        $setting->group = $request->group;
        $setting->priorty = $request->priorty;
        $setting->type = 'image';
        $setting->save();


       return redirect()->back()->with('success', 'Store setting added successfully');

    }
    
    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit_image($id)
    {

        $setting = Store_setting::findorfail($id);

        return response()->json([
            'data' => $setting,
        ]);

    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update_image(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:store_settings,name,'.$id.',id,group,'.$request->group,
           /*  'value' => 'required|file|max:2048|mimes:jpeg,png,jpg', */
        ]);
        

        if ($validator->fails()) {
            $response = array($validator->messages());
            $response = $response[0]->first();
            Session::flash('error', $response);
            return redirect()->back();
        }

        $setting = Store_setting::findorfail($id);

        if($request->value != null){

            $validator = Validator::make($request->all(), [
                'value' => 'required|file|max:2048|mimes:jpeg,png,jpg',
            ]);
            
    
            if ($validator->fails()) {
                $response = array($validator->messages());
                $response = $response[0]->first();
                Session::flash('error', $response);
                return redirect()->back();
            }

            $image_path = $this->storeAndOptimizeImage($request, 'value', 'setting_images');

            $path = 'storage/setting_images/' . $image_path;
            $setting->value = $path;

        }

        $setting->name = $request->name;
        $setting->group = $request->group;
        $setting->priorty = $request->priorty;
        $setting->save();


       return redirect()->back()->with('success', 'Store setting updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy_image($id)
    {
        $setting = Store_setting::findorfail($id);
        
        $setting->delete();

        return redirect()->back()->with('success', 'Store setting deleted successfully');
    }
}
