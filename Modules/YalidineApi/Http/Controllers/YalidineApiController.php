<?php

namespace Modules\YalidineApi\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class YalidineApiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('yalidineapi::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('yalidineapi::create');
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
        return view('yalidineapi::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('yalidineapi::edit');
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

    function search(Request $request)
    {
        if (isset($request->q))
            $term = trim($request->q);
        else
            $mairies = DB::table('yalidine_mairies')
                ->join('yalidine_wilayas', 'yalidine_wilayas.id',
                    '=',
                    'yalidine_mairies.id_wilaya')
                ->select('yalidine_mairies.id as id',
                    'yalidine_mairies.name as mairie',
                    'yalidine_wilayas.id as w_id',
                    'yalidine_wilayas.name as w_name')
                ->get();

        if (empty($term)) {
            $mairies = DB::table('yalidine_mairies')
                ->join('yalidine_wilayas', 'yalidine_wilayas.id',
                    '=',
                    'yalidine_mairies.id_wilaya')
                ->select('yalidine_mairies.id as id',
                    'yalidine_mairies.name as mairie',
                    'yalidine_wilayas.id as w_id',
                    'yalidine_wilayas.name as w_name')
                ->get();
        }else{

            $mairies = DB::table('yalidine_mairies')
            ->join('yalidine_wilayas', 'yalidine_wilayas.id',
                '=',
                'yalidine_mairies.id_wilaya')
            ->select('yalidine_mairies.id as id',
                'yalidine_mairies.name as mairie',
                'yalidine_wilayas.id as w_id',
                'yalidine_wilayas.name as w_name')
            ->where('yalidine_wilayas.name', 'like', "%$term%")
            ->orWhere('yalidine_wilayas.id', '=', "$term")
            ->orWhere('yalidine_mairies.name', 'like', "%$term%")
            ->get();

        }
       
        $formatted_tags = [];

        foreach ($mairies as $m) {
            $formatted_tags[] = [
                'id' => $m->id,
                'text' => $m->w_id . ' - ' . $m->w_name . ' - ' . $m->mairie
            ];
        }
        return response()->json($formatted_tags);
    }
}
