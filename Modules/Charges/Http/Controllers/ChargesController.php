<?php

namespace Modules\Charges\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Modules\Charges\Entities\Charge;

class ChargesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        $charges = Charge::with('user')->orderby('created_at','desc')->get();
        
        $breadcrumbs = [
            ['link' => "charges", 'name' => "Charges"]
        ];

        return view('charges::index')->with([

            'breadcrumbs' => $breadcrumbs,
            'charges' => $charges

        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('charges::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
       
       
        $array_types = array('facebook_ad','instagram_ad','snapchat_ad','transport','support','emballage','autre');

        $validator = Validator::make($request->all(), [

            'date' => 'required|date',
            'description' => 'required|string|max:65000',
            'type' => 'required|string|max:255|'.Rule::in($array_types),
            'produit' => 'nullable|string|max:255',
            'montant' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            $response = array($validator->messages());
            $response = $response[0]->first();
            Session::flash('error', $response);
            return redirect()->back();
        }

        $charge = new Charge();
        $charge->date = $request->date;
        $charge->description = $request->description;
        $charge->type = $request->type;
        $charge->produit = $request->produit;
        $charge->montant = $request->montant;
        $charge->add_by = Auth::user()->id;
        $charge->save();


        Session::flash('success', 'Charge saved successfully !');

            return redirect()->back();
       
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('charges::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        
        $charges = Charge::where('id', $id)->first();

        return Response::json([
            'success' => true,
            'data' => $charges->toArray(),
            'message' => 'Products retrieved successfully'
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
         
        $array_types = array('facebook_ad','instagram_ad','snapchat_ad','transport','support','emballage','autre');

        $validator = Validator::make($request->all(), [

            'date' => 'required|date',
            'description' => 'required|string|max:65000',
            'type' => 'required|string|max:255|'.Rule::in($array_types),
            'produit' => 'nullable|string|max:255',
            'montant' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            $response = array($validator->messages());
            $response = $response[0]->first();
            Session::flash('error', $response);
            return redirect()->back();
        }

        $charge = Charge::find($id);
        $charge->date = $request->date;
        $charge->description = $request->description;
        $charge->type = $request->type;
        $charge->produit = $request->produit;
        $charge->montant = $request->montant;
        $charge->save();


        Session::flash('success', 'Charge updated successfully !');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $charge = Charge::find($id);

        $charge->delete();

        
        Session::flash('success', 'Charge deleted successfully !');

        return redirect()->back();
    }
}
