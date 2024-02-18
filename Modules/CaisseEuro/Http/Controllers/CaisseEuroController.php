<?php

namespace Modules\CaisseEuro\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Modules\Caisse\Entities\Caisse;
use Modules\CaisseEuro\Entities\CaisseEuro;

class CaisseEuroController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $caisses = CaisseEuro::with('user')->with('person')->get();
        return view('caisseeuro::index',compact('caisses'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('caisse::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),CaisseEuro::$rules);

        if ($validator->fails()) {
            $response = array($validator->messages());
            $response = $response[0]->first();
            Session::flash('error', $response);
            return redirect()->back();
        }

        $user = Auth::user();


        $caisse = new CaisseEuro();
        $caisse->user_id = $user->id;
        $caisse->date = $request->date;
        $caisse->description = $request->description;
        $caisse->montant = $request->montant;
        $caisse->type = $request->type;
        $caisse->change_euro = $request->change;
        $caisse->person_id = $request->person_id;
        $caisse->save();


        Session::flash('success', 'your caisse saved successfully !');
        return redirect()->back();

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('caisse::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $caisse = CaisseEuro::where('id',$id)->with('person')->first();
        
        return response()->json([
            'data' => $caisse,
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
        $validator = Validator::make($request->all(),CaisseEuro::$rules);

        if ($validator->fails()) {
            $response = array($validator->messages());
            $response = $response[0]->first();
            Session::flash('error', $response);
            return redirect()->back();
        }

        $user = Auth::user();


        $caisse = CaisseEuro::find($id);
       
        $caisse->date = $request->date;
        $caisse->description = $request->description;
        $caisse->montant = $request->montant;
        $caisse->type = $request->type;
        $caisse->person_id = $request->person_id;
        $caisse->save();


        Session::flash('success', 'your caisse updated successfully !');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $caisse = CaisseEuro::find($id);
        
        if($caisse == null){
            Session::flash('error', 'record not found !');
            return redirect()->back();
        }

        $caisse->delete();

        Session::flash('success', 'your caisse archived successfully !');
        return redirect()->back();

        
    }
}
