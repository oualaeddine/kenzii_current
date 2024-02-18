<?php

namespace Modules\Products\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Laracasts\Flash\Flash;
use Modules\Products\Entities\BonAchat;
use Modules\Products\Http\Requests\CreateBonAchatRequest;
use Modules\Products\Http\Requests\UpdateBonAchatRequest;
use Modules\Products\Repositories\BonAchatRepository;

class BonAchatController extends Controller
{
    /** @var  BonAchatRepository */
    private $bonAchatRepository;

    public function __construct(BonAchatRepository $bonAchatRepo)
    {
        $this->bonAchatRepository = $bonAchatRepo;
    }

    /**
     * Display a listing of the BonAchat.
     *
     * @param Request $request
     *

     */
    public function index(Request $request)
    {
        $bonAchats = $this->bonAchatRepository->all();

        return view('products::bon_achats.index')
            ->with('bons_achat', $bonAchats);
    }

    /**
     * Show the form for creating a new BonAchat.
     *

     */
    public function create()
    {
        return view('bon_achats.create');
    }

    /**
     * Store a newly created BonAchat in storage.
     *
     * @param CreateBonAchatRequest $request
     *

     */
    public function store(CreateBonAchatRequest $request)
    {
        $input = $request->all();

        $bonAchat = $this->bonAchatRepository->create($input);
        
        Session::flash('success','Bon Achat saved successfully.');

        return redirect(route('bon_achats.index'));
    }

    /**
     * Display the specified BonAchat.
     *
     * @param int $id
     *

     */
    public function show($id)
    {
        $bonAchat = $this->bonAchatRepository->find($id);

        if (empty($bonAchat)) {
            Flash::error('Bon Achat not found');

            return redirect(route('bon_achats.index'));
        }

        return view('bon_achats.show')->with('bonAchat', $bonAchat);
    }

    /**
     * Show the form for editing the specified BonAchat.
     *
     * @param int $id
     *

     */
    public function edit($id)
    {
        $bon_achat = BonAchat::where('id',$id)->with('product')->first();
        

        return response()->json([
            'data' => $bon_achat,
        ]);
    
    }

    /**
     * Update the specified BonAchat in storage.
     *
     * @param int $id
     * @param UpdateBonAchatRequest $request
     *

     */
    public function update($id, UpdateBonAchatRequest $request)
    {
        $bonAchat = $this->bonAchatRepository->find($id);

        if (empty($bonAchat)) {
            Flash::error('Bon Achat not found');

            return redirect(route('bon_achats.index'));
        }

        $bonAchat = $this->bonAchatRepository->update($request->all(), $id);

        Session::flash('success','Bon Achat updated successfully.');

        return redirect(route('bon_achats.index'));
    }

    /**
     * Remove the specified BonAchat from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *

     */
    public function destroy($id)
    {
        $bonAchat = $this->bonAchatRepository->find($id);

        if (empty($bonAchat)) {
            Flash::error('Bon Achat not found');

            return redirect(route('bon_achats.index'));
        }

        $this->bonAchatRepository->delete($id);

        Session::flash('success','Bon Achat deleted successfully.');
      
        return redirect(route('bon_achats.index'));
    }
}
