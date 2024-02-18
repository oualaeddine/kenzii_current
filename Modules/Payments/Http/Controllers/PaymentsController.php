<?php

namespace Modules\Payments\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Modules\Payments\Entities\Payment;
use Yajra\DataTables\Facades\DataTables;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {

            $data = Payment::with('user')->orderBy('created_at','desc');

            return DataTables::of($data)
                ->addColumn('empty', function () {
                    return '';
                })
                ->addColumn('Created_at', function ($payment) {
                    $t = $payment->created_at;
                    return  $t = Carbon::parse($t)->tz('Africa/Algiers')->format('m-d H:i');
                })
                ->addColumn('Actions', 'payments::includes.actions')
                ->rawColumns([
                    'Created_at',
                    'Actions'
                ])
                ->make(true);
        }

        $pg_nb = $request->pg_nb??0;

        
        return view('payments::index',compact('pg_nb'));
        
    }


    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('payments::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'employee' => 'required|string|max:255',
            'amount' => 'required|numeric',
            /* 'add_by' => 'required|max:10', */
            'pay_date' => 'required|date',
            'date_due' => 'required|date',
        ]);


        if ($validator->fails()) {

            $response = array($validator->messages());
            $response = $response[0]->first();

            Session::flash('error', $response);

            return redirect()->back();

        }

        
        $payment = new Payment();
        $payment->employee = $request->employee;
        $payment->amount = $request->amount;
        $payment->add_by = Auth::user()->id;
        $payment->pay_date = $request->pay_date;
        $payment->date_due = $request->date_due;
        $payment->save();


    Session::flash('success', 'Payment added successfully !');

    return redirect()->back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('payments::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $payment = Payment::findOrFail($id);

        return Response::json([
            'success' => true,
            'data' => $payment->toArray()
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
            'employee' => 'required|string|max:255',
            'amount' => 'required|numeric',
            /* 'add_by' => 'required|max:10', */
            'pay_date' => 'required|date',
            'date_due' => 'required|date',
        ]);


        if ($validator->fails()) {

            $response = array($validator->messages());
            $response = $response[0]->first();

            Session::flash('error', $response);

            return redirect()->back();

        }

        
        $payment = Payment::findOrFail($id);
        $payment->employee = $request->employee;
        $payment->amount = $request->amount;
      /*   $payment->add_by = Auth::user()->id; */
        $payment->pay_date = $request->pay_date;
        $payment->date_due = $request->date_due;
        $payment->save();


        Session::flash('success', 'Payment updated successfully !');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
       
        $payment = Payment::findOrFail($id);

        $payment->delete();

        Session::flash('success', 'Payment deleted successfully !');

        return redirect()->back();


    }
}
