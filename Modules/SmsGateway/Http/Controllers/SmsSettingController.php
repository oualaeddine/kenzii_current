<?php

namespace Modules\SmsGateway\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Modules\SmsGateway\Entities\Sms_setting;
use Yajra\DataTables\Facades\DataTables;

class SmsSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {


        if ($request->ajax()) {
            $sms_setting = Sms_setting::orderBy('created_at','desc');

            return DataTables::of($sms_setting)
                          ->addColumn('action','smsgateway::SmsSetting.actions.btn')
                          ->addColumn('#', function ($sms_setting) {

                            return '';
                            
                            })->addColumn('created_at', function ($sms_setting) {
                            
                                    return $sms_setting->created_at;
                            
                           
                          
                            })->addColumn('text', function ($sms_setting) {
                            
                            return '<span dir="rtl">'. $sms_setting->text.'</span>';
                    
                   
                  
                            })->addColumn('Status', function ($sms_setting) {
                                    return '<span class="badge badge-primary">'.$sms_setting->status.'</span>';
                            })->addColumn('is_active', function ($sms_setting) {

                                        if($sms_setting->is_active == true){

                                            return '<div class="custom-control custom-control-primary custom-switch text-center">
                                            <input type="checkbox" checked=""
                                                   class="custom-control-input">
                                            <label class="custom-control-label" for="customSwitch3"></label>
                                        </div>';

                                        }else{

                                            return '<div class="custom-control custom-control-primary custom-switch text-center">
                                            <input type="checkbox" disabled
                                                   class="custom-control-input">
                                            <label class="custom-control-label" for="customSwitch3"></label>
                                        </div>';

                                        }
                           
                             

                            })

                        ->rawColumns([
                            '#',
                            'Status',
                            'is_active',
                            'created_at',
                            'action',
                            'text'
                        ])
                    ->make(true);
        }

        return view('smsgateway::SmsSetting.index');
    }
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('smsgateway::create');
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
        return view('smsgateway::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('smsgateway::edit');
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
            'text' => 'required',
            'status' => 'required',
            'is_active' => 'nullable',
        ]);

        if ($validator->fails()) {
            $response = array($validator->messages());
            $response = $response[0]->first();

            
            Session::flash('error', $response);
            return redirect()->back();
        }

        $sms_setting = Sms_setting::findOrFail($id);
        $sms_setting->text = $request->text;
        $sms_setting->status = $request->status;
        $sms_setting->is_active = $request->is_active?? false;
        $sms_setting->save();

        Session::flash('success', 'your sms supdated successfully !');

        return redirect()->back();
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
