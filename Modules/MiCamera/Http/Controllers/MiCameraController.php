<?php

namespace Modules\MiCamera\Http\Controllers;

use App\Helpers\VisitorLogHelper;
use Modules\OldStoreFront\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Modules\OldStoreFront\Entities\StoreProduct;

class MiCameraController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $store_id = $request->store;

        $store_product = StoreProduct::findorFail(18);

        $visitor_id = VisitorLogHelper::StoreVisitor($request, $store_product);
       
        Session::put('visitor_id',$visitor_id);

        return view('micamera::index')->with('fb_pixel', $this->fbPixel($store_id));;
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {
        $store_id = $request->store;

        return view('micamera::create')->with('fb_pixel', $this->fbPixel($store_id));;
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
    public function show(Request $request, $id)
    {
        $store_id = $request->store;

        return view('micamera::show')->with('fb_pixel', $this->fbPixel($store_id));;
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Request $request, $id)
    {
        $store_id = $request->store;

        return view('micamera::edit')->with('fb_pixel', $this->fbPixel($store_id));;
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
