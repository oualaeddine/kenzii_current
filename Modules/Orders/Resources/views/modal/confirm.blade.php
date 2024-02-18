{{--  <!-- Modal to add new record -->
 <div class="modal fade" id="confirm-order{{$o->id}}">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <form class="add-new-record modal-content pt-0" action="{{route('order.update',$o->id)}}" method="POST">
          @csrf
          @method('PUT')
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
        <div class="modal-header mb-1">
          <h5 class="modal-title" id="exampleModalLabel">Edit order</h5>
        </div>
        <div class="modal-body flex-grow-1">

        
       

          <button type="submit" class="btn btn-success data-submit mr-1">Save changes</button>
          <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
 --}}
 <div
 class="modal text-left"
 id="confirm-order"
 tabindex="-1"
 role="dialog"
 aria-labelledby="confirm-order"
 aria-hidden="true"
>
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
 <div class="modal-content">
     <div class="modal-header">
         <h4 class="modal-title" id="confirm-order">Confirm order</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
     </div>

     <form class="modal-content pt-0" method="POST" id="form-change-confirm">
         @csrf
       
         <div class="modal-body">

            <input type="hidden" name="status" id="status-confirm">

             <div class="row">

                 <div class="form-group col-md-6">
                     <label class="form-label" for="name-confirm">Name</label>
                     <input

                             type="text"
                             required
                             class="form-control dt-full-name"
                             id="name-confirm"
                             name="name"
                             placeholder="name"
                             aria-label="name"
                     />
                 </div>
                 <div class="form-group col-md-3">
                     <label class="form-label" for="phone-confirm">Phone</label>
                     <input

                             type="text"
                             id="phone-confirm"
                             class="form-control dt-post"
                             required
                             name="phone"
                             placeholder="phone"
                             aria-label="phone"
                     />
                 </div>


                 <div class="form-group col-md-3">

                     <label class="form-label" for="store_id-confirm">Store</label>

                    
                         <select name="store_id" disabled="true" id="store_id-confirm" class="form-control">
                             <option disabled="true" value="" selected>Choose store</option>
                         </select>
                    


                 </div>


             </div>


             <div class="row">

                 <div class="form-group col-md-3">
                     <label class="form-label" for="wilaya-confirm">Wilaya</label>
                    

                         <input
                               

                                 type="text"
                                 id="wilaya-confirm"
                                 class="form-control dt-post"
                                 name="wilaya"
                                 required
                                 placeholder="wilaya"
                                 aria-label="wilaya"
                         />


                 </div>

                 <div class="form-group col-md-3">
                     <label class="form-label" for="mairie_id-confirm">Mairie</label>

                     
                         <select name="mairie_id" id="mairie_id-confirm" required class="form-control mairie-select">
                         </select>

                   
                 </div>

                 <div class="form-group col-md-6">
                     <label class="form-label" for="address-confirm">Address</label>
                     {{--  <input
                        value="{{$o->address}}"
                        type="text"
                        id="basic-icon-default-post"
                        class="form-control dt-post"
                        name="address"
                        required
                        placeholder="address"
                        aria-label="address"
                      /> --}}
                     <textarea name="address" class="form-control dt-post" required placeholder="address" id="address-confirm"
                               cols="20" rows="2"></textarea>

                 </div>


             </div>


             <div class="form-group">
                 <button class="btn btn-success btn-sm mb-2"
                         onclick="add_product()" type="button"> add product
                 </button>

                 <table class="datatables-basic table" id="orders_table_edit-confirm">
                     <thead>
                     <tr>
                         <th>#</th>
                         {{--   <th>actions</th> --}}
                         <th>product name</th>
                         <th>quantity</th>
                         <th>price unit</th>
                         <th>total</th>
                     </tr>
                     </thead>
                     <tbody>

                     </tbody>


                 </table>
                 {{--  <input type="hidden" name="product_count" id="product_count">
                  <label class="form-label" for="div-products">Products</label>
                  <div class="demo-inline-spacing row" id="div-products">

                  </div>
                  <button class="btn btn-success btn-sm mt-2"
                                        onclick="add_product()" type="button"> add </button>
                                        <button class="btn btn-warning btn-sm mt-2"
                                        onclick="delete_product()" type="button"> delete </button> --}}

             </div>


             <hr>
             <div class="row">


                 <div class="form-group col-md-6">
                     <label class="form-label" for="comment-confirm">Comment</label>
                     {{--   <input
                         value="{{$o->comment}}"
                         type="text"
                         id="basic-icon-default-post"
                         class="form-control dt-post"
                         name="comment"
                         required
                         placeholder="comment"
                         aria-label="comment"
                       /> --}}

                     <textarea name="comment" class="form-control dt-post" required placeholder="comment" id="comment-confirm"
                               cols="30" rows="6"> </textarea>
                 </div>


                 <div class="form-group col-md-6">
                     <div class="col-12">
                         <div class="form-group row">
                             <div class="col-sm-3 col-form-label">
                                 <label for="sub-total-confirm">Subtotal</label>
                             </div>
                             <div class="col-sm-9">
                                 <input type="number" id="sub-total-confirm" class="form-control" name="subtotal"
                                        placeholder="Subtotal" value="0.00">
                             </div>
                         </div>
                     </div>
                     <div class="col-12">
                         <div class="form-group row">
                             <div class="col-sm-3 col-form-label">
                                 <label for="Discount-confirm">Discount</label>
                             </div>
                             <div class="col-sm-9">
                                 <input type="number" id="discount-confirm" min="0" step="0.01" class="form-control"
                                        name="discount" placeholder="discount" value="0.00">
                             </div>
                         </div>
                     </div>
                     <div class="col-12">
                         <div class="form-group row">
                             <div class="col-sm-3 col-form-label">
                                 <label for="delivery_price-confirm">Shiping</label>
                             </div>
                             <div class="col-sm-9">
                                 <input type="number" id="delivery_price-confirm" min="0" step="0.01"
                                        class="form-control" name="delivery_price" value="0.00"
                                        placeholder="Delivery price">
                             </div>
                         </div>
                     </div>
                     <div class="col-12">
                         <div class="form-group row">
                             <div class="col-sm-3 col-form-label">
                                 <label for="total-confirm">Total</label>
                             </div>
                             <div class="col-sm-9">
                                 <input type="number" id="total-confirm" value="0.00" class="form-control" name="total"
                                        placeholder="Total">
                             </div>
                         </div>
                     </div>


                 </div>


                 {{-- <div class="form-group col-md-3">
                     <label class="form-label" for="discount">Discount</label>
                     <input
                        
                             type="number"
                             step="0.1"
                             min="0"
                             id="discount"
                             class="form-control dt-post"
                             name="discount"
                             required
                             placeholder="discount"
                             aria-label="discount"
                     />
                 </div>

                 <div class="form-group col-md-3">
                     <label class="form-label" for="delivery_price">Delivery price</label>
                     <input
                          
                             type="number"
                             step="0.1"
                             min="0"
                             required
                             id="delivery_price"
                             class="form-control dt-post"
                             name="delivery_price"
                             placeholder="delivery price"
                             aria-label="delivery_price"
                     />
                 </div> --}}

             </div>


         </div>
         <div class="modal-footer">
             <button type="submit" class="btn btn-success data-submit mr-1" id="submit_edit">
                 Confirm
             </button>
             <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
         </div>
     </form>
 </div>
</div>
</div>


@push('js')


<script>

    var items_wilaya = [];


    let ajaxSelectStoreEditconfirm = {
        url: '{{route('api.stores')}}',
        processResults: procResStores
    };

    $('#store_id-confirm').select2({
        theme: 'bootstrap4',
        ajax: ajaxSelectStoreEditconfirm
    });

    /* change wilaya */
    $(document).ready(function () {
        $('#mairie_id-confirm').on('change', function (e) {

        var id = $('#mairie_id-confirm').text().split('-');

      $('#wilaya-confirm').val(id[1]);
      $('#wilaya-confirm').attr('readonly', true); 

        });
    });

    $('#mairie_id-confirm').select2({
        placeholder: "Start typing ...",
        theme: 'bootstrap4',
        ajax: {
            url: '{{route('api.mairies')}}',
            dataType: 'json',
            // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            processResults: function (data) {
                return {
                    results: data
                };
            },

        }
    });

    function procResStores(data) {
        // Transforms the top-level key of the response object from 'items' to 'results'
        let items = [];
        for (let z = 0; z < data.data.length; z++) {
            let store = data.data[z];
            items.push({
                id: store.id,
                text: store.name
            });
        }
        return {results: items};
    }

    let ajaxSelectMairieconfirm = {
        url: '{{route('api.mairies')}}',
        processResults: procResMairie
    };


    function procResMairie(data) {
        // Transforms the top-level key of the response object from 'items' to 'results'
        let items = [];
        for (let x = 0; x < data.data.length; x++) {
            let mairie = data.data[x];
            items.push({
                id: mairie.id,
                text: mairie.yalidine_wilaya.name + '-' + mairie.name
            });

            items_wilaya.push({
                id: mairie.id,
                text: mairie.yalidine_wilaya.name
            });
        }
        return {results: items};
    }

    /*  prevent double submit */
</script>




@endpush