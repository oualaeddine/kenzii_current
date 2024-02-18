@extends('layouts/contentLayoutMaster')

@section('title', 'Brands')

@section('breadcrumbs')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Brands</li>

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
            <h4 class="card-title">Brands page 🚀</h4>
            <div class="dt-buttons btn-group flex-wrap">
                <button class="btn add-new btn-primary mt-50" tabindex="0" aria-controls="DataTables_Table_0"
                        type="button" data-toggle="modal" data-target="#new-brand" ><span>Add Brand</span>
                </button>
            </div>


        </div>
        <div class="card-body">
            <!-- Basic table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <table class="datatables-basic table" id="brands_table">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Brand</th>
                                    <th>Actions</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($brands as $brand)
                                    <tr>

                                        <th>{{$brand->id}}</th>
                                        <th>{{$brand->name}}</th>


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
                                                       data-target="#archive-brand" onclick="Delete_brand({{$brand->id}})">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2" stroke-linecap="round"
                                                             stroke-linejoin="round"
                                                             class="feather feather-archive font-small-4 mr-50">
                                                            <polyline points="21 8 21 21 3 21 3 8"></polyline>
                                                            <rect x="1" y="3" width="22" height="5"></rect>
                                                            <line x1="10" y1="12" x2="14" y2="12"></line>
                                                        </svg>
                                                        Delete
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
                                               data-target="#edit-brand" onclick="BrandAchatEdit({{$brand->id}})">
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


                                           
                                            
                                        </th>


                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- @include('products::products.modals.edit') --}}
                @include('products::brands.modals.edit')
                @include('products::brands.modals.create')
                @include('products::brands.modals.archive')

            </section>
        </div>
    </div>
    <!--/ Kick start -->




    @push('js')
        <script>

            $(document).ready(function () {
                $('#brands_table').DataTable();
            });
        </script>

<script>

        function Delete_brand(id){

            var id = id;

            var url_delete = '{{ route("brands.delete",":id") }}';

            url_delete = url_delete.replace(':id', id);

            $('#brand_delete_form').attr('action',url_delete); 

        }

        function BrandAchatEdit(id){

                    var id = id;

                    var url_update_bon = '{{ route("brands.update",":id") }}';

                    url_update_bon = url_update_bon .replace(':id', id);

                    $('#brand_edit_form').attr('action',url_update_bon);

                    var url_update = '{{ route("brands.edit",":id") }}';

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

                            var data = data.data;
                            $('#name-edit').val(data.name);

                        }
                    });

            

                

        }

</script>


    @endpush
@endsection
