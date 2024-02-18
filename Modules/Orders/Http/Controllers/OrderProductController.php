<?php

namespace Modules\Orders\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;
use Modules\Orders\Entities\Order;
use Modules\Orders\Entities\OrderProduct;
use Modules\Orders\Http\Requests\CreateOrderProductRequest;
use Modules\Orders\Http\Requests\UpdateOrderProductRequest;
use Modules\Orders\Repositories\OrderProductRepository;

class OrderProductController extends Controller
{
    /** @var  OrderProductRepository */
    private $orderProductRepository;

    public function __construct(OrderProductRepository $orderProductRepo)
    {
        $this->orderProductRepository = $orderProductRepo;
    }

    /**
     * Display a listing of the OrderProduct.
     *
     */
    public function index($request)
    {
        $orderProducts = $this->orderProductRepository->all();

        return view('order_products.index')
            ->with('orderProducts', $orderProducts);
    }

    /**
     * Show the form for creating a new OrderProduct.
     *
     */
    public function create()
    {
        return view('order_products.create');
    }

    /**
     * Store a newly created OrderProduct in storage.
     *
     * @param CreateOrderProductRequest $request
     *
     */
    public function store(Request $request,$id)
    {
            $validator = Validator::make($request->all(), [
                'price' => 'required|numeric|min:0',
                'quantity' => 'required|numeric|min:0',
                'product' => 'required',
            ]);
    
            if ($validator->fails()) {
                $response = array($validator->messages());
                $response = $response[0]->first();
                Session::flash('error', $response);
                return redirect()->back();
            }
    
            $order_product = new OrderProduct();
            $order_product->order_id = $id;
            $order_product->product_id = $request->product;
            $order_product->quantity = $request->quantity;
            $order_product->price = $request->price;
            $order_product->save();
    
            Session::flash('success', 'your new order product stored successfully !');
    
            return redirect()->back();
    
        
    }

    /**
     * Display the specified OrderProduct.
     *
     * @param int $id
     *
     */
    public function show($id)
    {
        $orderProduct = $this->orderProductRepository->find($id);

        if (empty($orderProduct)) {
           Session::flash('error','Order Product not found');

            return redirect(route('orderProducts.index'));
        }

        return view('order_products.show')->with('orderProduct', $orderProduct);
    }

    /**
     * Show the form for editing the specified OrderProduct.
     *
     * @param int $id
     *
     */
    public function edit($id)
    {
        $orderProduct = OrderProduct::whereId($id)->with('product')->first();

        if (empty($orderProduct)) {

            Session::flash('error','Order Product not found');
            return redirect(route('orderProducts.index'));

        }

       
        return Response::json([
            'success' => true,
            'data' => $orderProduct->toArray(),
            'message' => 'Order product retrieved successfully'
        ], 200);

    }

    /**
     * Update the specified OrderProduct in storage.
     *
     * @param int $id
     * @param UpdateOrderProductRequest $request
     *
     */
    public function update($id, Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:0',
            'product' => 'required',
        ]);

        if ($validator->fails()) {
            $response = array($validator->messages());
            $response = $response[0]->first();

            
            Session::flash('error', $response);
            return redirect()->back();
        }

        $order_product = OrderProduct::findOrFail($id);
        $order_product->product_id = $request->product;
        $order_product->quantity = $request->quantity;
        $order_product->price = $request->price;
        $order_product->save();

        Session::flash('success', 'your new order product updated successfully !');

        return redirect()->back();
    }

    /**
     * Remove the specified OrderProduct from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        $orderProduct = $this->orderProductRepository->find($id);

        if (empty($orderProduct)) {
            Session::flash('error','Order Product not found');

            return redirect()->back();
        }

        $order_p_test = Order::where('id',$orderProduct->order_id)->withCount('orderProducts')->first();

    

        if ($order_p_test->order_products_count == 1) {
            Session::flash('error','Order has only one product you can not deleted !');

            return redirect()->back();
        }

        $this->orderProductRepository->delete($id);

        Session::flash('success','Order Product deleted successfully.');
        

        return redirect()->back();
    }
}
