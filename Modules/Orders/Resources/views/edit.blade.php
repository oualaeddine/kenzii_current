@extends('layouts/contentLayoutMaster')

@section('title', 'Edit order')

@section('breadcrumbs')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('orders') }}">Orders</a></li>
            <li class="breadcrumb-item active">Edit order</li>
        </ol>
    </nav>

@endsection

@section('content')
    @if (Session::has('error'))

        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Error</h4>
            <div class="alert-body">
                {{ Session::get('error') }}
            </div>
        </div>
    @endif

    @if (Session::has('success'))

        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Success</h4>
            <div class="alert-body">
                {{ Session::get('success') }}
            </div>
        </div>
    @endif


    <div class="row">

        <div class="col-md-7">
            <!-- Kick start -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Order Details🚀</h4>

                </div>
                <div class="card-body">

                    <form class="add-new-record pt-0" id="form_order" action="{{ route('order.update', $order->id) }}"
                        method="POST">
                        @csrf


                        <div class="row">

                            <div class="form-group col-md-6">
                                <label class="form-label" for="basic-icon-default-name">Name</label>
                                <input type="text" required class="form-control dt-full-name" id="basic-icon-default-name"
                                    name="name" placeholder="name" aria-label="name" value="{{ $order->name }}" />
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="basic-icon-default-post">Phone</label>
                                <input type="text" id="basic-icon-default-post" class="form-control dt-post" required
                                    name="phone" placeholder="phone" aria-label="phone" value="{{ $order->phone }}" />
                            </div>



                        </div>


                        <div class="row">

                            <div class="form-group col-md-3">
                                <label class="form-label" for="wilaya">Wilaya</label>
                                <input type="text" id="wilaya" class="form-control dt-post" name="wilaya" required
                                    placeholder="wilaya" aria-label="wilaya" value="{{ $order->wilaya }}" />
                            </div>

                            <div class="form-group col-md-3">
                                <label class="form-label" for="mairie_id">Mairie</label>

                                <select name="id_mairie" id="mairie_id" {{-- required --}} class="form-control ">
                                    <option value="{{ $order->id_mairie ?? '' }}">{{ $order->mairie->name ?? 'Select mairie' }}
                                    </option>
                                </select>
                            </div>

                            <div class="form-group col-md-6 ">
                                <label class="form-label" for="address">Address</label>
                                {{-- <input
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
                                    cols="20" rows="2">{{ $order->address }}</textarea>

                            </div>

                        </div>

                        <div class="row">


                            <div class="form-group col-md-6">
                                <label class="form-label" for="comment">Comment</label>
                                {{-- <input
                            value="{{$o->comment}}"
                            type="text"
                            id="basic-icon-default-post"
                            class="form-control dt-post"
                            name="comment"
                            required
                            placeholder="comment"
                            aria-label="comment"
                          /> --}}

                                <textarea name="comment" class="form-control dt-post" required placeholder="comment"
                                    id="comment" cols="30" rows="6">{{ $order->comments }} </textarea>
                            </div>


                            <div class="form-group col-md-6">

                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-sm-3 col-form-label">
                                            <label for="Discount">Discount</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="number" id="discount" min="0" step="0.01" class="form-control"
                                                name="discount" value="{{ $order->discount }}" required
                                                placeholder="discount" value="0.00">
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
                                                class="form-control" name="delivery_price"
                                                value="{{ $order->delivery_price }}" required value="0.00"
                                                placeholder="Delivery price">
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


                        {{-- <div class="form-group">
                     <label class="form-label" for="basic-icon-default-long-desc">long description</label>
                     <textarea  class="form-control dt-post" name="long_description" id="basic-icon-default-long-desc" cols="30" rows="10"></textarea>

                   </div> --}}

                        <button type="submit" id="btn_submit"
                            class="btn btn-primary data-submit mr-1 float-right">Save</button>


                    </form>


                </div>
            </div>
            <!--/ Kick start -->
        </div>
        <div class="col-md-5">


            <!-- Kick start -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Order Products🚀</h4>

                    <button class="btn btn-success float-right" data-toggle="modal" data-target="#add_product_edit">
                        <i class="fas fa-plus"></i> Add product
                    </button>

                </div>
                <div class="card-body">

                    <!-- Basic table -->
                    <section id="basic-datatable">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">

                                    <table class="datatables-basic table" id="order_products_table">
                                        <thead>
                                            <tr>
                                                <th class="text-center no-sort"></th>
                                                <th class="text-center">id</th>
                                                <th class="text-center">Product Name</th>
                                                <th class="text-center">Quantity</th>
                                                <th class="text-center">Price</th>
                                                <th class="text-center">Created_at</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->orderProducts as $order_product)
                                                <tr>
                                                    <td class="text-center"></td>
                                                    <td class="text-center">{{ $order_product->id }}</td>
                                                    <td class="text-center">{{ $order_product->product->name  }} ({{ $order_product->product->num  }})</td>
                                                    <td class="text-center">{{ $order_product->quantity }}</td>
                                                    <td class="text-center">{{ $order_product->price }}</td>

                                                    <td class="text-center">
                                                        {{ $order_product->created_at->format('Y-m-d ') }}</td>
                                                    <td class="text-center">
                                                        @include('orders::includes.edit.actions')
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                        <!-- Modal to add new record -->

                    </section>
                </div>

                @include('orders::modal.order_product.create')

                @include('orders::modal.order_product.edit')
                @include('orders::modal.order_product.archive')
            </div>
            <!--/ Kick start -->

        </div>
    </div>









    @push('js')
    

        <script>

                function archive_order_product(id) {

                            var url_archive_order_product = '{{ route("order.destroy.product",":id") }}';

                            url_archive_order_product = url_archive_order_product.replace(':id', id);

                            $('#archive_order-product_form').attr('action', url_archive_order_product);
                 }


                  function edit_order_product(id) {


                            var url_update_order_product = '{{ route("order.update.product",":id") }}';

                            url_update_order_product = url_update_order_product.replace(':id', id);
                        

                            $('#edit-order_product_form').attr('action', url_update_order_product);


                            var url_edit_order_product = '{{ route("order.edit.product",":id") }}';

                            url_edit_order_product = url_edit_order_product.replace(':id', id);
                          


                            $.ajax({
                                        url: url_edit_order_product,
                                        type: 'GET', dataType: 'json',
                                        headers: {
                                            'X-CSRF-Token': '{{ csrf_token() }}',
                                        },

                                        error: function (error) {
                                            toastr.error("Something went wrong , try again please !");
                                        },
                                        success: function (data) {

                                            $('#submit_edit').attr('onclick', 'update_order(' + id + ')');

                                            var data = data.data;

                                       
                                            $('#product-edit').append('<option value="' + data.product.id + '" selected>' +'('+data.product.num+')'+ data.product.name + '</option>');
                                            $('#quantity-edit').val(data.quantity);
                                            $('#price-edit').val(data.price);
                                        }
                            });



                 }




                 

                 $('#order_products_table').DataTable({
                    dom: 'Blfrtip',
                    responsive: true,
                    "bPaginate": false,
                    "bSorting": false,
                    buttons: [
                        {extend: 'print', className: 'btn btn-primary shadow-sm rounded mr-1 ',text: '<i class="fa fa-print"></i>' },
                        {extend: 'csv', className: 'btn btn-info shadow-sm rounded mr-1 ', text: '<i class="fa fa-file"></i> CSV' },
                        {extend: 'excel', className: 'btn btn-success shadow-sm rounded mr-1', text: '<i class="fa fa-file"></i> Excel'},
                        {extend: 'pdf', className: 'btn btn-danger shadow-sm rounded mr-1 ', text: '<i class="fa fa-file"></i> PDf'},
                       
                    ],
                    columnDefs: [
                        {responsivePriority: 1, targets: 2},
                        {responsivePriority: 2, targets: -1},
                        { targets: 'no-sort', orderable: false } 
                    ],
                  
                    
                });


                // mairie 

            $('#mairie_id').select2({
                /*  placeholder: "Start typing ...", */
                theme: 'bootstrap4',
                ajax: {
                    url: '{{ route('api.mairies') }}',
                    dataType: 'json',
                    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                    processResults: function(data) {
                        return {
                            results: data
                        };
                    },

                }
            });

                  var items_special = [];
                  var items_special_edit = [];
                  var store_id_var = '{{$order->store_id;}}'

                  // define url
                  var url_get_add_data = '{{ route("api.products", ":id") }}';
                   url_get_add_data = url_get_add_data.replace(':id', store_id_var);

                /*----------------------------------*///

           /*      let ajaxSelectProduct = {
                    url: url_get_add_data,
                    processResults: procResProducts
                };
 */

              /*   let ajaxSelectProductEdit = {
                    url: url_get_add_data,
                    processResults: procResProductsEdit
                }; */


                // select product
               /*  $('#product').select2({
                    theme: 'bootstrap4',
                    dropdownParent: $('#add_product_edit'),
                    ajax: ajaxSelectProduct
                }); */


                $('#product').select2({
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

                
                $('#product-edit').select2({
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



               /*  $('#product-edit').select2({
                    theme: 'bootstrap4',
                    ajax: ajaxSelectProductEdit
                }); */

                /* change price */
            /*     $(document).ready(function () {
                    $('#product').on('change', function (e) {
                      
                            function checkPrice(id) {

                                 return id.id == $('#product').val();
                            }
                           
                            $('#price').val(items_special.find(checkPrice).price);
                    });
                    
                }); */


                    /* change price */
             /*    $(document).ready(function () {
                    $('#product-edit').on('change', function (e) {
                      
                            function checkPrice_edit(id) {

                                 return id.id == $('#product-edit').val();
                            }
                           
                            $('#price-edit').val(items_special_edit.find(checkPrice_edit).price);
                    });
                    
                }); */

/* 
                function procResProducts(data) {
                    // Transforms the top-level key of the response object from 'items' to 'results'
                    let items = [];
                

                    for (let x = 0; x < data.data.length; x++) {
                        let product = data.data[x];
                        items.push({
                            id: product.id,
                            text: '('+product.num+')'+product.name,
                            data: product.num
                        });

                        items_special.push({
                            id: product.id,
                            price: product.price
                        });
                    }
                    return {results: items};
                } */


                /* function procResProductsEdit(data) {
                    // Transforms the top-level key of the response object from 'items' to 'results'
                    let items = [];
                

                    for (let x = 0; x < data.data.length; x++) {
                        let product = data.data[x];
                        items.push({
                            id: product.id,
                            text: '('+ product.num+')'+product.name,
                        });

                        items_special_edit.push({
                            id: product.id,
                            price: product.price
                        });
                    }
                    return {results: items};
                } */

        </script>

    @endpush


@endsection
