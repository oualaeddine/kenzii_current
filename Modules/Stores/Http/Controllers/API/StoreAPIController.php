<?php

namespace Modules\Stores\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Stores\Entities\Store;
use Modules\Stores\Http\Requests\API\CreateStoreAPIRequest;
use Modules\Stores\Http\Requests\API\UpdateStoreAPIRequest;
use Modules\Stores\Repositories\StoreRepository;
use App\Http\Controllers\AppBaseController;

/**
 * Class StoreController
 * @package App\Http\Controllers\API
 */
class StoreAPIController extends AppBaseController
{
    /** @var  StoreRepository */
    private $StoreRepository;

    public function __construct(StoreRepository $storeRepo)
    {
        $this->storeRepository = $storeRepo;
    }

    /**
     * Display a listing of the store.
     * GET|HEAD /stores
     *

     */
    public function index(Request $request)
    {
        $stores = $this->storeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($stores->toArray(), 'stores retrieved successfully')->setStatusCode(200);
    }

    /**
     * Store a newly created store in storage.
     * POST /stores
     *
     * @param CreatestoreAPIRequest $request
     *
     */
    public function store(CreateStoreAPIRequest $request)
    {
        $input = $request->all();

        $store = $this->storeRepository->create($input);

        return $this->sendResponse($store->toArray(), 'store saved successfully');
    }

    /**
     * Display the specified store.
     * GET|HEAD /stores/{id}
     *
     * @param int $id
     *
     */
    public function show($id)
    {
        /** @var store $store */
        $store = $this->storeRepository->find($id);

        if (empty($store)) {
            return $this->sendError('store not found');
        }

        return $this->sendResponse($store->toArray(), 'store retrieved successfully');
    }

    /**
     * Update the specified store in storage.
     * PUT/PATCH /stores/{id}
     *
     * @param int $id
     * @param UpdatestoreAPIRequest $request
     *
     */
    public function update($id, UpdateStoreAPIRequest $request)
    {
        $input = $request->all();

        /** @var store $store */
        $store = $this->storeRepository->find($id);

        if (empty($store)) {
            return $this->sendError('store not found');
        }

        $store = $this->storeRepository->update($input, $id);

        return $this->sendResponse($store->toArray(), 'store updated successfully');
    }

    /**
     * Remove the specified store from storage.
     * DELETE /stores/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        /** @var store $store */
        $store = $this->storeRepository->find($id);

        if (empty($store)) {
            return $this->sendError('store not found');
        }

        $store->delete();

        return $this->sendSuccess('store deleted successfully');
    }
}
