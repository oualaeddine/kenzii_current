<div
        class="modal text-left"
        id="add_product_edit"
        tabindex="-1"
        role="dialog"
        aria-labelledby="add_product_edit"
        aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="add_product_edit">Add product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form class="modal-content pt-0" action="{{route('order.store.product',$order->id)}}" method="POST">
                @csrf
              
                <div class="modal-body">

                    <div class="form-group col-md-12">
                        <label class="form-label" for="product">Product</label>
       
                        <select name="product" id="product" required class="form-control">
                        </select>
                       
                    </div>

                    <div class="form-group col-md-12">
                        <label class="form-label" for="quantity">Quantity</label>
       
                        <input type="number" name="quantity" id="quantity"  placeholder="put quantity" min="1" value="1" required class="form-control">
                       
                    </div>

                    <div class="form-group col-md-12">
                        <label class="form-label" for="price">Price</label>
       
                        <input type="number" name="price" id="price"  placeholder="put price " min="0"  required class="form-control">
                       
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success data-submit mr-1" >
                        Add
                    </button>
                    <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>