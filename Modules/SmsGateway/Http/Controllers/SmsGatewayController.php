<?php

namespace Modules\SmsGateway\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\SmsGateway\Entities\MySms;
use Yajra\DataTables\Facades\DataTables;

class SmsGatewayController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {

        
        if ($request->ajax()) {
            $sms = MySms::orderBy('created_at','desc');

            return DataTables::of($sms)
                    ->addColumn('#', function ($sms) {
                          return '';
                        
                        })->addColumn('created_at', function ($sms) {
                           
                                return $sms->created_at;
                            
                           
                          
                          })->addColumn('Status', function ($sms) {
                           
                              switch($sms->status){

                                  case('pending'):
                                    return '<span class="badge badge-warning">'.$sms->status.'</span>';

                                    break;

                                    case('sent'):
                                        return '<span class="badge badge-success">'.$sms->status.'</span>';
                                        break;

                                        case('failed'):
                                            return '<span class="badge badge-danger">'.$sms->status.'</span>';
                                            break;
                              }
                        
                       
                      
                           })
                        ->rawColumns([
                            '#',
                            'Status'
                        ])
                    ->make(true);
        }

        return view('smsgateway::index');
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
