@extends('layouts/contentLayoutMaster')

@section('title', 'Store Details')

{{-- @section('breadcrumbs')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Stores</li>
            <li class="breadcrumb-item">Store details</li>
        </ol>
    </nav>

@endsection --}}

@section('content')


   <div class="row">

    <div class="col-md-6">

        <div class="card">
        
            <div class="card-header">
                <h4 class="card-title">Products List 🚀</h4>
                <div class="">
                    <button class="btn add-new btn-primary" type="button" data-toggle="modal"
                            data-target="#modals-slide-in-store-product"><span>Add New Product</span></button>
                </div>
            </div>
            <div class="card-body">
    
                <!-- Basic table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <table class="datatables-basic table" id="store_products">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th class="text-center">Ref</th>
                                        <th class="text-center">Product Name</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Created_at</th>
                                        <th class="text-center">Action</th>
                                        <th class="text-center">Categories</th>
                                        <th class="text-center">Price Text</th>
                                        <th class="text-center">Price Old</th>
                                        <th class="text-center">Discount</th>
                                        <th class="text-center">Landing page</th>
                                        <th class="text-center">New</th>
                                        <th class="text-center">Visible</th>
                                        <th class="text-center">Featured</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                  {{--   @foreach ($products as $product)
                                        <tr>
                                            <td></td>
                                            <td class="text-center">{{$product->product->num}}</td>
                                            <td class="text-center">{{$product->product->name}}</td>
                                            <td class="text-center">{{$product->price}}</td>
                                            <td class="text-center">{{\Carbon\Carbon::parse($product->created_at)->format('Y-m-d')}}</td>
                                            <td class="text-center">
                                                @include('stores::includes.actions_products')
                                            </td>
                                            <td class="text-center">
                                                @foreach ($product->store_product_category as $item)
                                                       {{$item->category->name}} |
                                                @endforeach
                                               
                                            </td>
                                            <td class="text-center">{{$product->price_txt?? 0}}</td>
                                            <td class="text-center">{{$product->price_old?? 0}}</td>
                                            <td class="text-center">{{$product->discount?? 0}}</td>
                                            <td class="text-center">@if($product->url != null) <span class="badge badge-success">true</span>  @else <span class="badge badge-danger">false</span> @endif</td>
                                            <td class="text-center">@if($product->new== 1) <span class="badge badge-success">true</span>  @else <span class="badge badge-danger">false</span> @endif</td>
                                            <td class="text-center">@if($product->visible== 1)<span class="badge badge-success">true</span> @else <span class="badge badge-danger">false</span> @endif</td>
                                            <td class="text-center">@if($product->featured== 1)<span class="badge badge-success">true</span> @else <span class="badge badge-danger">false</span> @endif</td>

                            
                                        </tr>
                                    @endforeach --}}
                                    </tbody>
                                </table>
                                {{-- {{$products->links()}} --}}
                            </div>
                        </div>
                    </div>
                    <!-- Modal to add new record -->
                    @include('stores::modals.add_product')
                    @include('stores::modals.archive_product')
                </section>
            </div>
        </div>


    </div>

    <div class="col-md-6">

        <div class="card">
        
            <div class="card-header">
                <h4 class="card-title">Categories List 🚀</h4>
                <div class="">
                    <button class="btn add-new btn-primary" type="button" data-toggle="modal"
                            data-target="#modals-slide-in-store-category"><span>Add New Category</span></button>
                </div>
            </div>
            <div class="card-body">
    
                <!-- Basic table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <table class="datatables-basic table" id="store_categories">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th class="text-center">Category Name</th>
                                        <th class="text-center">Created_at</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td></td>
                                            <td class="text-center">{{$category->name}}</td>
                                            <td class="text-center">{{\Carbon\Carbon::parse($category->created_at)->format('Y-m-d')}}</td>
                                            <td class="text-center">
                                                @include('stores::includes.actions_categories')
                                            </td>
                            
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                {{$categories->links()}}
                            </div>
                        </div>
                    </div>
                    <!-- Modal to add new record -->
                    @include('stores::modals.add_category')
                    @include('stores::modals.edit_product')
                    @include('stores::modals.archive_category')
                </section>
            </div>
        </div>


    </div>



   </div>

    <!-- users list start -->
    <!-- users list ends -->
@endsection

@push('js')


<script type="text/javascript">


$(document).ready(function () {
                var pg_nb = '{{$pg_nb}}';

                  if (!$.fn.dataTable.isDataTable('#store_products')) {
                    $('#store_products').DataTable({
                        "lengthMenu": [[10,25, 50, -1], [10,25, 50, "All"]],
                            dom: 'Blfrtip',
                            stateSave : true,
                            processing: true,
                            serverSide: true,
                            responsive: true,
                            columnDefs: [
                                    {responsivePriority: 1, targets: 0},
                                    {responsivePriority: 2, targets: 5}
                            ],
                            ajax:{
                                url : window.location.href,
                            },
                            columns: [
                                {data: 'empty', name: 'empty'}, 
                                {data: 'product_spec.num', name: 'product_spec.num'}, 
                                {data: 'product_spec.name', name: 'product_spec.name'},
                                {data: 'price', name: 'price'},
                                {data: 'Created_at', name: 'created_at'},
                                {data: 'Actions', name: 'Actions'},
                                {data: 'Categories', name: 'Categories'},
                                {data: 'Price_txt', name: 'price_txt'},
                                {data: 'Price_old', name: 'price_old'},
                                {data: 'Discount', name: 'Discount'},
                                {data: 'Url', name: 'url'},
                                {data: 'New', name: 'new'},
                                {data: 'Visible', name: 'visible'},
                                {data: 'Featured', name: 'featured'},
  
                            ],
                    });
                }

          
            setInterval(() => {
                var table = $('#products_table').dataTable();
                table.fnPageChange(parseInt(pg_nb),true);
            }, 5000);
                
            /*     $('#tableInfo').html(
                    'Currently showing page '+(info.page+1)+' of '+info.pages+' pages.'
                ); */

            });


</script>



    <script>


            function DeleteProductStore(id){

                  var id = id;

                var url_delete_store = '{{ route("stores.product.delete",":id") }}';

                url_delete_store  = url_delete_store .replace(':id', id);

                
                $('#form-delete-store-product').attr('action', url_delete_store);
              
            }


            function DeleteCategoryStore(id){

                  var id = id;

                var url_delete_store_category = '{{ route("stores.category.delete",":id") }}';

                url_delete_store_category  = url_delete_store_category .replace(':id', id);

                
                $('#form-delete-store-category').attr('action', url_delete_store_category);
              
            }


        function EditProductStore(id){

                var table = $('#store_products').DataTable();

                var info = table.page.info();
                $('#pg_nb').val(info.page);
                //**********************************//

                var id = id;

                var url_store_catgories = '{{ route("api.categories.store",":id") }}';

                url_store_catgories  = url_store_catgories.replace(':id', id);


              /*----------------------------------*///
                let ajaxSelectStoreCatEdit = {
                    url: url_store_catgories ,
                    processResults: procResStoreCatsEdit
                };

                $('#category_store_id').select2({
                    placeholder: 'choose categories',
                    theme: 'bootstrap4',
                    ajax: ajaxSelectStoreCatEdit
                });

                function procResStoreCatsEdit(data) {
                    // Transforms the top-level key of the response object from 'items' to 'results'
                    let items = [];

                    for (let x = 0; x < data.data.length; x++) {
                        let category = data.data[x];
                        items.push({
                            id: category.id,
                            text: category.name,

                        });
                    }
                    return {results: items};
                }

                /************************////

                var id = id;

                var url_update_store = '{{ route("stores.product.update",":id") }}';

                url_update_store  = url_update_store .replace(':id', id);

                
                $('#form-edit-store-product').attr('action', url_update_store);

                var url_update = '{{ route("stores.product.edit",":id") }}';

                url_update = url_update.replace(':id', id);

                $.ajax({
                    url: url_update,
                    type: 'GET', dataType: 'json',
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },

                    error: function (error) {
                        toastr.error("Something went wrong , try again please !");
                    },
                    success: function (data) {

                        console.log(data.data);
                    
                        var data = data.data;
                        var discount = $('#discount-edit').val(data.discount);
                        var price_old = $('#price_old-edit').val(data.price_old);
                        var price_txt = $('#price_text-edit').text(data.price_txt);
                        var price = $('#price-edit').val(data.price);
                        var url = $('#url').val(data.url);

                        if(data.new == 1){
                          $('#new-edit').prop('checked', true);
                        }

                        if(data.visible == 1){
                          $('#visible-edit').prop('checked', true);
                        }

                        if(data.featured == 1){
                          $('#featured-edit').prop('checked', true);
                        }


                        if (data.product_id != null) {

                            var product_id = data.product_id;
                            var product_name = data.name;

                            $('#product_id-edit').append('<option value="' + product_id + '" selected>' + product_name + '</option>');

                        }

                    }
                });

        }



            $(document).ready(function () {
            $('#store_categories').DataTable({
                "bPaginate": false,
                "paging": false,
                "info": false,
                    responsive: true,
                 /*    columnDefs: [
                        {responsivePriority: 1, targets: 0},
                        {responsivePriority: 2, targets: -1}
                    ] */

                });
            });

        @if(session()->has('success'))
        // Swal.fire({
        //     title: 'Good job!',
        //     text: 'You clicked the button!',
        //     type: 'success',
        //     confirmButtonClass: 'btn btn-primary',
        //     buttonsStyling: !1
        // });
        @endif

    </script>



@endpush
