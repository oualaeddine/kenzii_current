@extends('layouts/contentLayoutMaster')

@section('title', 'Create order')

@section('breadcrumbs')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('orders')}}">Orders</a></li>
            <li class="breadcrumb-item active">Add new order</li>
        </ol>
    </nav>

@endsection

@section('content')
    @if(Session::has('error'))

        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Error</h4>
            <div class="alert-body">
                {{ Session::get('error') }}
            </div>
        </div>
    @endif

    @if(Session::has('success'))

        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Success</h4>
            <div class="alert-body">
                {{ Session::get('success') }}
            </div>
        </div>
    @endif


    <!-- Kick start -->
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Create order page 🚀</h4>

        </div>
        <div class="card-body">

            <form class="add-new-record pt-0" id="form_order" action="{{route('order.store')}}" method="POST">
                @csrf


                <div class="row">

                    <div class="form-group col-md-6">
                        <label class="form-label" for="basic-icon-default-name">Name</label>
                        <input
                                type="text"
                                required
                                class="form-control dt-full-name"
                                id="basic-icon-default-name"
                                name="name"
                                placeholder="name"
                                aria-label="name"
                        />
                    </div>
                    <div class="form-group col-md-3">
                        <label class="form-label" for="basic-icon-default-post">Phone</label>
                        <input
                                type="text"
                                id="basic-icon-default-post"
                                class="form-control dt-post"
                                required
                                name="phone"
                                placeholder="phone"
                                aria-label="phone"
                        />
                    </div>

                    <div class="form-group col-md-3">

                        <label class="form-label" for="store_id">Store</label>

                        <select name="store_id" id="store_id" required class="form-control ">
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

                        <select name="id_mairie" id="mairie_id" required class="form-control ">
                        </select>
                    </div>

                    <div class="form-group col-md-6 ">
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
                    <input type="hidden" name="product_count" id="product_count">
                    <label class="form-label" for="div-products">Products</label>
                    <div class="demo-inline-spacing row" id="div-products">

                    </div>
                    <button class="btn btn-success btn-sm mt-2"
                            onclick="add_product()" type="button"> add
                    </button>
                    <button class="btn btn-warning btn-sm mt-2"
                            onclick="delete_product()" type="button"> delete
                    </button>

                </div>

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
                                    <input type="number" readonly id="sub-total" class="form-control" name="subtotal"
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
                                    <input type="number" id="delivery_price" min="0" step="0.01" class="form-control"
                                           name="delivery_price" value="0.00" placeholder="Delivery price">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-sm-3 col-form-label">
                                    <label for="total">Total</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="number" readonly id="total" value="0.00" class="form-control"
                                           name="total" placeholder="Total">
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


                {{--
                 <div class="form-group">
                     <label class="form-label" for="basic-icon-default-long-desc">long description</label>
                     <textarea  class="form-control dt-post" name="long_description" id="basic-icon-default-long-desc" cols="30" rows="10"></textarea>

                   </div> --}}

                <button type="submit" id="btn_submit" class="btn btn-primary data-submit mr-1">Add</button>


            </form>


        </div>
    </div>
    <!--/ Kick start -->




    @push('js')




        <script>

            var store_id_var = null;
            var items_special = [];
            var items_wilaya = [];
            // get store _id

            $(document).ready(function () {

                $('#store_id').on('change', function (e) {
                    $('#div-products').empty();
                    i = 0;
                    store_id_var = $('#store_id').val();
                });

            });


            let i = 0;

            function add_product() {

                if(i > 0 && $('#product_' + i).val() == null){
                        return alert('you must choose product to add other');
                }

                i++;
                input = jQuery('<div class="col-md-5"> <select name="product[' + i + '][product_id]" id="product_' + i + '" required class="form-control col-md-6">  <option  disabled="true" value="" selected>Choose product</option>  </select>  </div> ');

                input_qty = jQuery('<input type="number" name="product[' + i + '][qty]" id="qty_' + i + '" onchange="total_sub(' + i + ')" placeholder="put quantity " min="1" value="1"   required class="form-control col-md-3">  ');

                input_price = jQuery('<input type="number" name="product[' + i + '][price]" id="price_' + i + '" placeholder="put price " min="0" value="0"   required class="form-control col-md-3 ">  ');


                jQuery('#div-products').append(input);
                jQuery('#div-products').append(input_qty);
                jQuery('#div-products').append(input_price);


                // define url
                var url_get_add_data = '{{ route("api.products", ":id") }}';
                url_get_add_data = url_get_add_data.replace(':id', store_id_var);

                /*----------------------------------*///

            /*     let ajaxSelectProduct = {
                    url: url_get_add_data,
                    processResults: procResProducts
                }; */


                // select product
             /*    $('#product_' + i).select2({
                    theme: 'bootstrap4',
                    ajax: ajaxSelectProduct
                }); */
                
                $('#product_' + i).select2({
                /*  placeholder: "Start typing ...", */
                theme: 'bootstrap4',
                ajax: {
                    url: url_get_add_data,
                    dataType: 'json',
                    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                    processResults: function(data) {
                        return {
                            results: data
                        };
                    },

                }
                });



                /* change price */
              /*   $(document).ready(function () {
                    $('#product_' + i).on('change', function (e) {
                        $('#price_' + i).val(items_special[i - 1].price);
                    });
                }); */


               /*  function procResProducts(data) {
                    // Transforms the top-level key of the response object from 'items' to 'results'
                    let items = [];

                    for (let x = 0; x < data.data.length; x++) {
                        let product = data.data[x];
                        items.push({
                            id: product.id,
                            text: product.name,
                            data: product.price
                        });

                        items_special.push({
                            price: product.price
                        });
                    }
                    return {results: items};
                } */

                $('#product_count').val(i);
            }

            function delete_product() {

                $('#product_' + i).select2('destroy');
                $('#product_' + i).remove();
                jQuery('#price_' + i + '').remove();
                jQuery('#qty_' + i + '').remove();

                if (i > 0) {
                    i--;
                }
                $('#product_count').val(i);

            }


            let ajaxSelectStore = {
                url: '{{route('api.stores')}}',
                processResults: procResStores
            };


            $('#store_id').select2({
                theme: 'bootstrap4',
                ajax: ajaxSelectStore
            });


            function procResStores(data) {
                // Transforms the top-level key of the response object from 'items' to 'results'
                let items = [];
                for (let i = 0; i < data.data.length; i++) {
                    let store = data.data[i];
                    items.push({
                        id: store.id,
                        text: store.name
                    });
                }
                return {results: items};
            }


            let ajaxSelectMairie = {
                url: '{{route('api.mairies')}}',
                processResults: procResMairie
            };


            $('#mairie_id').select2({
                placeholder: "Start typing ...",
                style: 'bootstrap4',
                ajax: {
                    url: '{{route('api.mairies')}}',
                    dataType: 'json',
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    },
                }
            });

            /* change wilaya */
            $(document).ready(function () {
                $('#mairie_id').on('change', function (e) {

                    var id = $('#mairie_id').val().toString();


                    $('#wilaya').val('');
                    $('#wilaya').attr('readonly', true);
                });
            });

            function procResMairie(data) {
                // Transforms the top-level key of the response object from 'items' to 'results'
                let items = [];
                for (let y = 0; y < data.data.length; y++) {
                    let mairie = data.data[y];

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

        <script>

            /* function checkForm(form) // Submit button clicked
              {
                //
                // check form input values
                //

                form.myButton.disabled = true;
                form.myButton.value = "Please wait...";
                return true;
              } */

            $(document).ready(function () {
                // Listen to submit event on the <form> itself!
                $('#form_order').submit(function (e) {
                    $('#btn_submit').text('Please wait...');
                    $('#btn_submit').attr("disabled", true);

                });
            });


        </script>



    @endpush
@endsection
