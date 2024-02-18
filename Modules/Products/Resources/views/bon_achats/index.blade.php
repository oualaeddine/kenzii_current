@extends('layouts/contentLayoutMaster')

@section('title', 'Bon Achats')

@section('breadcrumbs')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Bon D'achat</li>

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
            <h4 class="card-title">Bons d'achat page 🚀</h4>
            <div class="dt-buttons btn-group flex-wrap">
                <button class="btn add-new btn-primary mt-50" tabindex="0" aria-controls="DataTables_Table_0"
                        type="button" data-toggle="modal" data-target="#modals-slide-in-bon" onclick="AddNewBonAchat()"><span>Add Bon D'achat</span>
                </button>
            </div>


        </div>
        <div class="card-body">
            <!-- Basic table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <table class="datatables-basic table" id="bons_table">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Unit price</th>
                                    <th>Seller</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($bons_achat as $bon)
                                    <tr>

                                        <th>{{$bon->id}}</th>
                                        <th>{{$bon->product->name}}</th>
                                        <th>{{$bon->quantity}}</th>
                                        <th>{{$bon->unit_price}}</th>
                                        <th>{{$bon->seller}}</th>

                                        <th>
                                            <div class="d-inline-flex">
                                                <a class="pr-1 dropdown-toggle hide-arrow text-primary"
                                                   data-toggle="dropdown" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none"
                                                         stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                         stroke-linejoin="round"
                                                         class="feather feather-more-vertical font-small-4">
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="12" cy="5" r="1"></circle>
                                                        <circle cx="12" cy="19" r="1"></circle>
                                                    </svg>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right" style="">
                                                  {{--   <a href="{{route('products.show',$p->id)}}" class="dropdown-item">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2" stroke-linecap="round"
                                                             stroke-linejoin="round"
                                                             class="feather feather-file-text font-small-4 mr-50">
                                                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                                            <polyline points="14 2 14 8 20 8"></polyline>
                                                            <line x1="16" y1="13" x2="8" y2="13"></line>
                                                            <line x1="16" y1="17" x2="8" y2="17"></line>
                                                            <polyline points="10 9 9 9 8 9"></polyline>
                                                        </svg>
                                                        Details</a> --}}

                                                    <a href="javascript:;" class="dropdown-item" data-toggle="modal"
                                                       data-target="#archive-bon_achats{{$bon->id}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2" stroke-linecap="round"
                                                             stroke-linejoin="round"
                                                             class="feather feather-archive font-small-4 mr-50">
                                                            <polyline points="21 8 21 21 3 21 3 8"></polyline>
                                                            <rect x="1" y="3" width="22" height="5"></rect>
                                                            <line x1="10" y1="12" x2="14" y2="12"></line>
                                                        </svg>
                                                        Archive
                                                    </a>


                                                    {{--    <a href="javascript:;" class="dropdown-item delete-record">
                                                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 font-small-4 mr-50">
                                                               <polyline points="3 6 5 6 21 6"></polyline>
                                                               <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                   </path>
                                                                   <line x1="10" y1="11" x2="10" y2="17">
                                                                       </line>
                                                                       <line x1="14" y1="11" x2="14" y2="17"></line>
                                                                   </svg>Delete</a> --}}
                                                </div>
                                            </div>
                                            <a href="javascript:;" class="item-edit" data-toggle="modal"
                                               data-target="#modals-slide-in-bon" onclick="BonAchatEdit({{$bon->id}})">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-edit font-small-4">
                                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                    </path>
                                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                    </path>
                                                </svg>
                                            </a>


                                           
                                            @include('products::bon_achats.modals.archive')
                                        </th>


                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- @include('products::products.modals.edit') --}}
                @include('products::bon_achats.modals.create-edit')

            </section>
        </div>
    </div>
    <!--/ Kick start -->




    @push('js')
        <script>

            $(document).ready(function () {
                $('#bons_table').DataTable();
            });
        </script>

<script>

    function AddNewBonAchat(){

                var url_store_bon = '{{ route("bon_achats.store") }}';

                $('#bon-achats-form').attr('action',url_store_bon);

    }

     function BonAchatEdit(id){

                var id = id;

                var url_update_bon = '{{ route("bon_achats.update",":id") }}';

                url_update_bon = url_update_bon .replace(':id', id);

                $('#bon-achats-form').attr('action',url_update_bon);
                $('#bon-achats-form').append('@method("PUT")');


                $('#TitleModalBonAchat').text("Edit Bon D'achat");
                $('#btn_submit_bon').text("Save Changes");


                var url_update = '{{ route("bon_achats.edit",":id") }}';

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
                        $('#quantity').val(data.quantity);
                        $('#unit_price').val(data.unit_price);
                        $('#seller').val(data.seller);


                        if (data.product_id != null) {

                            var product_id = data.product_id;
                            var product_name = data.product.name;

                            $('#product_id').append('<option value="' + product_id + '" selected>' + product_name + '</option>');

                        }

                    }
                });

        

               

    }



    


    /*----------------------------------*///

   /*  let ajaxSelectProduct = {
        url: '{{ route("api.products.all") }}',
        processResults: procResProducts
    };

 */
    
    $('#product_id').select2({
                /*  placeholder: "Start typing ...", */
                theme: 'bootstrap4',
                ajax: {
                    url: '{{ route("api.products.all") }}',
                    dataType: 'json',
                    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                    processResults: function(data) {
                        return {
                            results: data
                        };
                    },

                }
                });

/* 
    $('#product_id' ).select2({
        theme: 'bootstrap4',
        ajax: ajaxSelectProduct
    });

    function procResProducts(data) {
        // Transforms the top-level key of the response object from 'items' to 'results'
        let items = [];

        for (let x = 0; x < data.data.length; x++) {
            let product = data.data[x];
            items.push({
                id: product.id,
                text: product.name,
                data: product.price
            });
        }
        return {results: items};
    } */


</script>
    @endpush
@endsection
