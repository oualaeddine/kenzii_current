<?php

namespace Modules\Statistics\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Caisse\Entities\Caisse;
use Modules\CaisseEuro\Entities\CaisseEuro;
use Modules\Charges\Entities\Charge;
use Modules\Orders\Entities\Order;
use Modules\Payments\Entities\Payment;

class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

            /* $total_achats = DB::select('select sum(quantity * unit_price) as grand_total from bons_achats'); */
    
            $total_achats = DB::table('bons_achats')->where('deleted_at',null)->selectRaw('sum(quantity * unit_price) as grand_total')->get();

            $total_injection_euro_da = DB::table('caisse_euros')->where('deleted_at',null)->where('type', 'injection')->selectRaw('sum(montant * change_euro) as grand_total')->get();
    
            $total_achats = json_decode(json_encode($total_achats), true);
            $total_injection_euro_da = json_decode(json_encode($total_injection_euro_da), true);


            $total_table_charge = Charge::sum('montant') + Payment::sum('amount');

            $total_payments = Payment::sum('amount');
    
            $total_charge = $total_table_charge + $total_achats[0]['grand_total'] + $total_injection_euro_da[0]['grand_total'];
    
            $total_injection = Caisse::where('type', 'injection')->sum('montant');
            $total_retrait = Caisse::where('type', 'retrait')->sum('montant');
            $total_paiement_yal = Caisse::where('type', 'paiement_yal')->sum('montant');
    
            $total_injection_euro = CaisseEuro::where('type', 'injection')->sum('montant');
            $total_retrait_euro = CaisseEuro::where('type', 'retrait')->sum('montant');
            $total_charge_euro = CaisseEuro::where('type', 'charges')->sum('montant');
    
            $count_delivered = Order::where('last_status', 'Livré')->count();
            $count_rtr = Order::where('last_status', 'Retourné au vendeur')->count();
    
            $total['caisse'] = $total_paiement_yal + $total_injection - $total_retrait - $total_charge;
            $total['caisse_euro'] = $total_injection_euro - $total_retrait_euro - $total_charge_euro;
            $total['retrait_yalidine'] = intval($total_paiement_yal);
            $total['injectios'] = intval($total_injection);
            $total['retraits'] = intval($total_retrait);
            $total['charges'] = intval($total_charge);
            $total['payments'] = intval($total_payments);
            $total['count_liv'] = $count_delivered;
            $total['count_rtr'] = $count_rtr;
            $total['total_colis'] = $count_delivered + $count_rtr;
            $total['achats'] = $total_achats[0]['grand_total'];
            $total['dépenses'] = $total_table_charge;
            $total['achat_euro'] = $total_injection_euro_da[0]['grand_total'];

            if ($count_delivered == 0 && $count_rtr == 0) {
                $total['pct_liv'] = 0;
                $total['pct_rtr'] = 0;
            } else {
                $total['pct_liv'] =  number_format( ($count_delivered / ($count_delivered + $count_rtr) ) * 100 , 2);
                $total['pct_rtr'] =  number_format( ($count_rtr / ($count_delivered + $count_rtr)) * 100 , 2);
            }
    

            $orders_delivered = Order::where('last_status', 'Livré')->get();
            $total_yal = 0;
    
            foreach ($orders_delivered as $a) {
    
                foreach ($a->orderProducts as $op) {
                    $total_yal = $total_yal + $op->price * $op->quantity;
                }
    
                $total_yal = $total_yal + $a->delivery_price - $a->discount;
            }
    
            $total['chiffre_yalidine'] = $total_yal;
          
    


        return view('statistics::index',compact('total'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('statistics::create');
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
        return view('statistics::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('statistics::edit');
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
