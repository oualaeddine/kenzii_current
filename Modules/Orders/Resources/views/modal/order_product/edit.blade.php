<div
        class="modal text-left"
        id="edit-order_product"
        tabindex="-1"
        role="dialog"
        aria-labelledby="edit-order_product"
        aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="edit-order_product">Edit product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form class="modal-content pt-0" method="POST" id="edit-order_product_form">
                @csrf
                @method('PUT')
              
                <div class="modal-body">

                    <div class="form-group col-md-12">
                        <label class="form-label" for="product-edit">Product</label>
       
                        <select name="product" id="product-edit" required class="form-control">
                        </select>
                       
                    </div>

                    <div class="form-group col-md-12">
                        <label class="form-label" for="quantity-edit">Quantity</label>
       
                        <input type="number" name="quantity" id="quantity-edit"  placeholder="put quantity" min="1" value="1" required class="form-control">
                       
                    </div>

                    <div class="form-group col-md-12">
                        <label class="form-label" for="price-edit">Price</label>
       
                        <input type="number" name="price" id="price-edit"  placeholder="put price " min="0"  required class="form-control">
                       
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success data-submit mr-1" >
                       Save Changes
                    </button>
                    <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>