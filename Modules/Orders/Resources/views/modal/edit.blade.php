{{--  <!-- Modal to add new record -->
 <div class="modal fade" id="edit-order{{$o->id}}">
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
        id="edit-order"
        tabindex="-1"
        role="dialog"
        aria-labelledby="edit-order"
        aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="edit-order">Edit order</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form class="add-new-record modal-content pt-0"
                  {{-- action="{{route('order.update',$o->id)}}" --}} method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">


                    <div class="row">

                        <div class="form-group col-md-6">
                            <label class="form-label" for="name">Name</label>
                            <input

                                    type="text"
                                    required
                                    class="form-control dt-full-name"
                                    id="name"
                                    name="name"
                                    placeholder="name"
                                    aria-label="name"
                            />
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label" for="phone">Phone</label>
                            <input

                                    type="text"
                                    id="phone"
                                    class="form-control dt-post"
                                    required
                                    name="phone"
                                    placeholder="phone"
                                    aria-label="phone"
                            />
                        </div>


                        <div class="form-group col-md-3">

                            <label class="form-label" for="store_id">Store</label>

                        
                                <select name="store_id" id="store_id" class="form-control ">
                                    <option disabled="true" value="" selected>Choose store</option>
                                </select>
                        


                        </div>


                    </div>


                    <div class="row">

                        <div class="form-group col-md-3">
                            <label class="form-label" for="wilaya">Wilaya</label>
                         
                                <input

                                        type="text"
                                        id="wilaya"
                                        class="form-control dt-post"
                                        name="wilaya"
                                        required
                                        placeholder="wilaya"
                                        aria-label="wilaya"
                                />

                          

                        </div>

                        <div class="form-group col-md-3">
                            <label class="form-label" for="mairie_id">Mairie</label>

                          
                                <select name="mairie_id" id="mairie_id" required class="form-control mairie-select">
                                </select>

                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-label" for="address">Address</label>
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
                            <textarea name="address" class="form-control dt-post" placeholder="address" id="address"
                                      cols="20" rows="2"></textarea>

                        </div>


                    </div>


                    <div class="form-group">
                        <table class="datatables-basic table" id="orders_table_edit">
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
                            <label class="form-label" for="comment">Comment</label>
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

                            <textarea name="comment" class="form-control dt-post" required placeholder="comment" id="comment"
                                      cols="30" rows="6"> </textarea>
                        </div>


                        <div class="form-group col-md-6">
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-sm-3 col-form-label">
                                        <label for="sub-total">Subtotal</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="number" id="sub-total" class="form-control" name="subtotal"
                                               placeholder="Subtotal" value="0.00">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-sm-3 col-form-label">
                                        <label for="Discount">Discount</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="number" id="discount" min="0" step="0.01" class="form-control"
                                               name="discount" placeholder="discount" value="0.00">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-sm-3 col-form-label">
                                        <label for="delivery_price">Shiping</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="number" id="delivery_price" min="0" step="0.01"
                                               class="form-control" name="delivery_price" value="0.00"
                                               placeholder="Delivery price">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-sm-3 col-form-label">
                                        <label for="total">Total</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="number" id="total" value="0.00" class="form-control" name="total"
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
               {{--  <div class="modal-footer">
                    <button type="button" class="btn btn-success data-submit mr-1" id="submit_edit">
                        Save changes
                    </button>
                    <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                </div> --}}
            </form>
        </div>
    </div>
</div>


@push('js')




    <script>


        function update_order(id) {


            var name = $('#name').val();
            var phone = $('#phone').val();
            var store_id = $('#store_id').val();
            var wilaya = $('#wilaya').val();
            var id_mairie = $('#mairie_id').val();
            var discount = $('#discount').val();
            var delivery_price = $('#delivery_price').val();
            var address = $('#address').val();
            var comment = $('#comment').val();
            var order_p = $('#order_p').val();
            var order_product_id = $('#order_product_id').val();

            var id = id;

            var url_update = '{{ route("order.update", ":id") }}';

            url_update = url_update.replace(':id', id);

            $.ajax({
                url: url_update,
                type: 'POST', dataType: 'json',
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },

                data: {

                    name: name,
                    phone: phone,
                    store_id: store_id,
                    wilaya: wilaya,
                    id_mairie: id_mairie,
                    discount: discount,
                    delivery_price: delivery_price,
                    address: address,
                    comment: comment,
                    order_product_id:order_product_id,
                    order_p:order_p

                },

                error: function (error) {
                    toastr.error("Something went wrong , try again please !");
                },
                success: function (data) {

                    if (data.success == true) {

                        toastr.success(data.message);

                        $href = window.location.href;

                        $.when($.get($href, function (response) { //append data
                            /*   $html = $(response).find('#edit-order'+id).html();  */
                            $html_order_table = $(response).find('#full-order-card').html();
                            /* $div.append($html); */
                            /*  $('#edit-order'+id).html($html); */
                            $("#edit-order").modal('hide');
                            $('#full-order-card').html($html_order_table);
                        })).done(function () {

                            if (!$.fn.DataTable.isDataTable('#orders_table')) {
                                $('#orders_table').DataTable({
                                    responsive: true,
                                    columnDefs: [
                                        {responsivePriority: 1, targets: 0},
                                        {responsivePriority: 2, targets: -1}
                                    ]

                                });
                            }


                        });


                        /*  edit-order */
                    } else if (data.success == false) {
                        toastr.error(data.message);
                    }

                }
            });


        }


    </script>




    <script>


        $(document).ready(function () {

            // Listen to submit event on the <form> itself!
            $('#form_order').submit(function (e) {
                $('#btn_submit').text('Please wait...');
                $('#btn_submit').attr("disabled", true);

            });
        });


    </script>



@endpush