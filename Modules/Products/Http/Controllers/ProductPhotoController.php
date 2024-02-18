<?php

namespace Modules\Products\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Laracasts\Flash\Flash;
use Modules\Products\Http\Requests\CreateProductPhotoRequest;
use Modules\Products\Http\Requests\UpdateProductPhotoRequest;
use Modules\Products\Repositories\ProductPhotoRepository;
use Illuminate\Support\Facades\Validator;
use Modules\Products\Entities\ProductPhoto;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\File;
use Modules\Products\Entities\Product;

class ProductPhotoController extends Controller
{

    use UploadImageTrait;

    /** @var  ProductPhotoRepository */
    private $productPhotoRepository;

    public function __construct(ProductPhotoRepository $productPhotoRepo)
    {
        $this->productPhotoRepository = $productPhotoRepo;
    }

    /**
     * Display a listing of the ProductPhoto.
     *
     *

     */
    public function index($request)
    {
        $productPhotos = $this->productPhotoRepository->all();

        return view('product_photos.index')
            ->with('productPhotos', $productPhotos);
    }

    /**
     * Show the form for creating a new ProductPhoto.
     *

     */
    public function create($id)
    {
        $product_id = $id;

        /* return view('products::products.products_photos.create',compact('product_id')); */
    }

    /**
     * Store a newly created ProductPhoto in storage.
     *
     * @param CreateProductPhotoRequest $request
     *

     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'images' => 'required|array',
            'images.*' => 'required|max:2048|mimes:jpeg,png,jpg',
        ]);


        

        if ($validator->fails()) {
            $response = array($validator->messages());
            $response = $response[0]->first();

            Session::flash('error',  $response);
            return redirect()->back();
        }

     
        foreach ($request->images as $image) {


            $image_path = $this->storeAndOptimizeImageArray($request, $image, 'product_images');

            $path = 'storage/product_images/' . $image_path;


            $ProductPhoto = new ProductPhoto();
            $ProductPhoto->product_id = $request->product_id;
            $ProductPhoto->link = $path;
            $ProductPhoto->save();

        }


        Session::flash('success', 'Your Product Photo added succesfully ');


        return redirect()->back();

        /*  $input = $request->all();

         $productPhoto = $this->productPhotoRepository->create($input);

         Flash::success('Product Photo saved successfully.');

         return redirect(route('productPhotos.index')); */
    }

    /**
     * Display the specified ProductPhoto.
     *
     * @param int $id
     *

     */
    public function show($id)
    {
        $productPhoto = $this->productPhotoRepository->find($id);

        if (empty($productPhoto)) {
            Flash::error('Product Photo not found');

            return redirect(route('productPhotos.index'));
        }

        return view('product_photos.show')->with('productPhoto', $productPhoto);
    }

    /**
     * Show the form for editing the specified ProductPhoto.
     *
     * @param int $id
     *

     */
    public function edit($id)
    {
        $productPhoto = $this->productPhotoRepository->find($id);

        if (empty($productPhoto)) {
            Flash::error('Product Photo not found');

            return redirect(route('productPhotos.index'));
        }

        return view('product_photos.edit')->with('productPhoto', $productPhoto);
    }

    /**
     * Update the specified ProductPhoto in storage.
     *
     * @param int $id
     * @param UpdateProductPhotoRequest $request
     *

     */
    public function update($id, UpdateProductPhotoRequest $request)
    {
        $productPhoto = $this->productPhotoRepository->find($id);

        if (empty($productPhoto)) {
            Flash::error('Product Photo not found');

            return redirect(route('productPhotos.index'));
        }

        $productPhoto = $this->productPhotoRepository->update($request->all(), $id);

        Flash::success('Product Photo updated successfully.');

        return redirect(route('productPhotos.index'));
    }

    /**
     * Remove the specified ProductPhoto from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *

     */
    public function destroy($id)
    {
        $productPhoto = $this->productPhotoRepository->find($id);

        if (empty($productPhoto)) {
            Flash::error('Product Photo not found');

            return redirect(route('productPhotos.index'));
        }
        $product = Product::where('main_pic_id',$id)->first();

        if($product != null){

            $product->main_pic_id = null;
            $product->save();

        }

        File::delete(public_path($productPhoto->link));

        $this->productPhotoRepository->delete($id);

        Flash::success('Product Photo deleted successfully.');

        return redirect()->back();
    }


    public function select(Request $request,$id)
    {

        $validator = Validator::make($request->all(), [

            'image' => 'required',
        ]);


        if ($validator->fails()) {
            $response = array($validator->messages());
            $response = $response[0]->first();

            Session::flash('error',  $response);
            return redirect()->back();
        }



        $product = Product::findOrfail($id);

        $product->main_pic_id = $request->image;
        $product->save();


        Session::flash('success', 'Your Photo set as main succesfully ');

        return redirect()->back();

    }

}
