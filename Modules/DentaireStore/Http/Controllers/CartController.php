<?php

namespace Modules\DentaireStore\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Response;
use Modules\OldStoreFront\Entities\StoreProduct;
use Modules\Stores\Entities\Store_setting;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        $cart =  Cart::content();

        $page_title = 'Dentaire | Panier';

        $settings = Store_setting::get();

        return view('dentairestore::cart',compact('page_title','settings','cart'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {
       /*  Cart::destroy(); */

        $sotre_p = StoreProduct::where('id',$request->product)->with('product')->first();

        Cart::add($request->product, $sotre_p->product->name, $request->quantity, $sotre_p->price , ['image' => $sotre_p->product->productPhotos()->first()->link , 'slug' => $sotre_p->product->slug ]);

        return Response::json([
            'success' => true,
            'data'    => Cart::content(),
            'count' => Cart::count(),
            'total' => Cart::subtotal(),
        ]);
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
        return view('dentairestore::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('dentairestore::edit');
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
    public function destroy(Request $request)
    {
        if($request->item == null ){
            
            return Response::json([
                'success' => false,
                'message' => "Une erreur s'est produite , réessayez s'il vous plaît!"
            ]);

        }else{

            $item = Cart::content()->where('id',$request->item)->first();

            $row_id = $item->rowId?? null;

            if($row_id == null){
            
                return Response::json([
                    'success' => false,
                    'message' => "article introuvable , réessayez s'il vous plaît !"
                ]);

            }else{

                Cart::remove($row_id);

                return Response::json([
                    'success' => true,
                    'message' => "Produit supprimé avec succès!",
                    'count' => Cart::count(),
                    'total' => Cart::total(),
                ]);


            }

        }
    }
}
