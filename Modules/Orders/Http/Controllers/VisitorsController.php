<?php

namespace Modules\Orders\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class VisitorsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {

 
        if ($request->ajax()) {
            $visitors = Visitor::with('order')->with('store_product.store')->with('product')->orderBy('created_at','desc');

            return DataTables::of($visitors)
                    ->addColumn('#', function ($visitor) {
                          return '';
                        
                        })
                        ->addColumn('order_id', function ($visitor) {
                            if($visitor->order != null){
                                return '#'.$visitor->order->id;
                            }else{
                                return 'null';
                            }
                           
                          
                          })->addColumn('product_name', function ($visitor) {
                            if($visitor->product != null){
                                return $visitor->product->name;
                            }else{
                                return 'null';
                            }
                           
                          
                          })->addColumn('store_name', function ($visitor) {
                            if($visitor->store_product != null){
                                return $visitor->store_product->store->name;
                            }else{
                                return 'null';
                            }
                           
                          
                          })->addColumn('created_at', function ($visitor) {
                           
                                return $visitor->created_at;
                            
                           
                          
                          })
                        ->rawColumns([
                            '#',
                            'order_id',
                            'product_name',
                            'store_name'
                        ])
                    ->make(true);
        }

       
        return view('orders::visitors.index');
    }



    public function stats_all(Request $request)
    {


        if ($request->ajax()) {
            $stats =  Visitor::select('tsrc', DB::raw('count(*) as total'))
            ->groupBy('tsrc');

            return DataTables::of($stats)
                    ->make(true);
        }
       

                  
    }

    public function stats_not_ordered(Request $request)
    {

        if ($request->ajax()) {
            $stats =  Visitor::select('tsrc', DB::raw('count(*) as total'))
                        ->doesnthave('order')
                        ->groupBy('tsrc');

            return DataTables::of($stats)
                    ->make(true);
        }

                  
    }

    public function stats_shipped(Request $request)
    {
        if ($request->ajax()) {
            $stats =  Visitor::select('tsrc', DB::raw('count(*) as total'))
                               ->whereHas('order',function($q){
                                   $q->where('last_status','Livré');
                               })
                               ->groupBy('tsrc');

            return DataTables::of($stats)
                    ->make(true);
        }

                  
    }

    public function stats_not_confirmed(Request $request)
    {

        if ($request->ajax()) {
            $stats =  Visitor::select('tsrc', DB::raw('count(*) as total'))
                                ->whereHas('order',function($q){
                                    $q->where('last_status','canceled');
                                      
                                })
                                ->groupBy('tsrc');

            return DataTables::of($stats)
                    ->make(true);
        }

                  
    }
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('orders::create');
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
        return view('orders::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('orders::edit');
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
