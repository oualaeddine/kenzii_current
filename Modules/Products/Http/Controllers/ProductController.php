<?php

namespace Modules\Products\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;
use Modules\Products\Entities\Product;
use Modules\Products\Http\Requests\CreateProductRequest;
use Modules\Products\Http\Requests\UpdateProductRequest;
use Modules\Products\Repositories\ProductRepository;

class ProductController extends Controller
{
    /** @var  ProductRepository */
    private $productRepository;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepository = $productRepo;
    }

    /**
     * Display a listing of the Product.
     *
     *
     */
    public function index(Request $request)
    {
        $breadcrumbs = [
            ['link' => "products", 'name' => "Products"], ['name' => "List"]
        ];
        $products = $this->productRepository->all();

        $pg_nb = $request->pg_nb??0;

        return view('products::products.index')
            ->with([
                'products' => $products,
                'breadcrumbs' => $breadcrumbs,
                'pg_nb' => $pg_nb
            ]);
    }

    /**
     * Show the form for creating a new Product.
     *

     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param CreateProductRequest $request
     *

     */
    public function store(CreateProductRequest $request)
    {
        $input = $request->all();  
        
        $product = $this->productRepository->create($input);

        Flash::success('Product saved successfully.');

        return redirect()->back();
    }

    /**
     * Display the specified Product.
     *
     * @param int $id
     *

     */
    public function show($id)
    {
        $products_photos = Product::find($id)->productPhotos()->get();

        $product =  Product::find($id);

        $product_id = $id;

        return view('products::products.products_photos.index', compact('product_id','product'))->with('products_photos', $products_photos);
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param int $id
     *

     */
    public function edit($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect()->back();
        }

        return redirect()->back();
    }

    /**
     * Update the specified Product in storage.
     *
     * @param int $id
     * @param UpdateProductRequest $request
     *

     */
    public function update($id,Request $request)
    {


        $validator = Validator::make($request->all(), [

            'name' => 'required|string|max:191',
            'short_description' => 'required|string|max:191',
            'long_description' => 'required|string',
            'brand_id' => 'nullable|string',
            'manufacturer' => 'nullable|string',
            'sizes' => 'nullable|string',
            'origin' => 'nullable|string',
            'num' => 'nullable|string|unique:products,num,' . $id,
            'video_url' => 'nullable|max:65000',
            'created_at' => 'nullable',
            'updated_at' => 'nullable',
            'deleted_at' => 'nullable',
            'slug' => 'required|string|max:65000',

        ]);

        
        if ($validator->fails()) {
            $response = array($validator->messages());
            $response = $response[0]->first();

            Session::flash('error', $response);

            return redirect()->back();
        }


        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect()->back();
        }

        $product = $this->productRepository->update($request->all(), $id);

        $pg_nb = $request->pg_nb;

        Flash::success('Product updated successfully.');
        Session::flash('success', 'Product updated successfully.');

        return redirect()->route('products.index',['pg_nb' => $pg_nb]);
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *

     */
    public function destroy($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect()->back();
        }

        $this->productRepository->delete($id);

        Flash::success('Product deleted successfully.');

        return redirect()->back();
    }
}
