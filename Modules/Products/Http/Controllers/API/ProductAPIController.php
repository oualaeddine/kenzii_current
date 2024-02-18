<?php

namespace Modules\Products\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Products\Entities\Product;
use Modules\Products\Http\Requests\API\CreateProductAPIRequest;
use Modules\Products\Http\Requests\API\UpdateProductAPIRequest;
use Modules\Products\Repositories\ProductRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\YalidineMairie;
use Illuminate\Support\Facades\DB;
use Modules\Stores\Entities\Store;

/**
 * Class ProductController
 * @package App\Http\Controllers\API
 */
class ProductAPIController extends AppBaseController
{
    /** @var  ProductRepository */
    private $productRepository;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepository = $productRepo;
    }

    /**
     * Display a listing of the Product.
     * GET|HEAD /products
     *

     */

    public function index_product(Request $request, $id)
    {
        $products = Product::where('id',$id)->with('brand')->first();
        /* $products = Store::'products.id'find($id)->products()->get(); */

        return $this->sendResponse($products->toArray(), 'Product retrieved successfully');
    }


    public function index(Request $request, $id)
    {
       /*  $products = DB::table('store_products')
            ->where('store_products.store_id', $id)
            ->leftJoin('products', 'store_products.product_id', 'products.id')
            ->get(); */

            if (isset($request->q))
            $term = trim($request->q);
        else
            $products = DB::table('store_products')
                ->where('store_products.store_id', $id)
                ->leftJoin('products', 'store_products.product_id', 'products.id')
                ->select('products.id as id',
                    'products.name as name',
                    'products.id as id',
                    'store_products.price as price',
                    'products.num as num')
                ->get();

        if (empty($term)) {
            $products = DB::table('store_products')
                ->where('store_products.store_id', $id)
                ->leftJoin('products', 'store_products.product_id', 'products.id')
                ->select('products.id as id',
                    'products.name as name',
                    'products.id as id',
                    'store_products.price as price',
                    'products.num as num')
                ->get();
        }else{

            $products = DB::table('store_products')
                ->where('store_products.store_id', $id)
                ->leftJoin('products', 'store_products.product_id', 'products.id')
                ->select('products.id as id',
                    'products.name as name',
                    'store_products.price as price',
                    'products.id as id',
                    'products.num as num')
                ->where('products.name', 'like', "%$term%")
                ->orWhere('products.num', 'like', "%$term%")
                ->get();

        }
       
        $formatted_tags = [];

        foreach ($products as $p) {
            $formatted_tags[] = [
                'id' => $p->id,
                'text' => $p->id . ' - ' . $p->name . ' - ' . '('.$p->num.')'. ' ('.$p->price.' DA )'
            ];
        }
        return response()->json($formatted_tags);
        /* $products = Store::'products.id'find($id)->products()->get(); */

    /*     return $this->sendResponse($products->toArray(), 'Products retrieved successfully'); */
    }

    public function index_all(Request $request)
    {

        if (isset($request->q))
            $term = trim($request->q);
        else
            $products = DB::table('products')
                ->select('products.id as id',
                    'products.name as name',
                    'products.id as id',
                    'products.num as num')
                ->get();

        if (empty($term)) {
            $products = DB::table('products')
                ->select('products.id as id',
                    'products.name as name',
                    'products.id as id',
                    'products.num as num')
                ->get();
        }else{

            $products = DB::table('products')
            ->select('products.id as id',
                'products.name as name',
                'products.id as id',
                'products.num as num')
            ->where('products.name', 'like', "%$term%")
            ->orWhere('products.num', 'like', "%$term%")
            ->get();

        }
       
        $formatted_tags = [];

        foreach ($products as $p) {
            $formatted_tags[] = [
                'id' => $p->id,
                'text' => $p->id . ' - ' . $p->name . ' - ' . '('.$p->num.')'
            ];
        }
        return response()->json($formatted_tags);
        
       /*  $products = Product::get();
        $products = Store::'products.id'find($id)->products()->get();

        return $this->sendResponse($products->toArray(), 'Products retrieved successfully'); */
    }

    public function index_mairie(Request $request)
    {
        $mairies = YalidineMairie::with('yalidineWilaya')->get();

        return $this->sendResponse($mairies->toArray(), 'Products retrieved successfully');
    }


    /**
     * Store a newly created Product in storage.
     * POST /products
     *
     * @param CreateProductAPIRequest $request
     *
     */
    public function store(CreateProductAPIRequest $request)
    {
        $input = $request->all();

        $product = $this->productRepository->create($input);

        return $this->sendResponse($product->toArray(), 'Product saved successfully');
    }

    /**
     * Display the specified Product.
     * GET|HEAD /products/{id}
     *
     * @param int $id
     *
     */
    public function show($id)
    {
        /** @var Product $product */
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            return $this->sendError('Product not found');
        }

        return $this->sendResponse($product->toArray(), 'Product retrieved successfully');
    }

    /**
     * Update the specified Product in storage.
     * PUT/PATCH /products/{id}
     *
     * @param int $id
     * @param UpdateProductAPIRequest $request
     *
     */
    public function update($id, UpdateProductAPIRequest $request)
    {
        $input = $request->all();

        /** @var Product $product */
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            return $this->sendError('Product not found');
        }

        $product = $this->productRepository->update($input, $id);

        return $this->sendResponse($product->toArray(), 'Product updated successfully');
    }

    /**
     * Remove the specified Product from storage.
     * DELETE /products/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        /** @var Product $product */
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            return $this->sendError('Product not found');
        }

        $product->delete();

        return $this->sendSuccess('Product deleted successfully');
    }
}
