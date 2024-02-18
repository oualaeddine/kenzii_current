@extends('layouts/contentLayoutMaster')

@section('title', 'Products')

@section('breadcrumbs')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Products</li>

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

    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            <strong>{{ $error }}</strong>
        </div>
    @endforeach
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
            <h4 class="card-title">Products page 🚀</h4>
            <div class="dt-buttons btn-group flex-wrap">
                <button class="btn add-new btn-primary mt-50" tabindex="0" aria-controls="DataTables_Table_0"
                        type="button" data-toggle="modal" data-target="#modals-slide-in"><span>Add Product</span>
                </button>
            </div>


        </div>
        <div class="card-body">
            <!-- Basic table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <table class="datatables-basic table table-responsive" id="products_table">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Brand</th>
                                    <th>Num</th>
                                    <th>Manufacturer</th>
                                    <th>Sizes</th>
                                    <th>Slug</th>
                                    <th>Short Description</th>
                                    <th>Long Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($products as $p)
                                    <tr>
                                        <th></th>
                                        <th>{{$p->id}}</th>
                                        <th>{{$p->name}}</th>
                                        <th>
                                            @if ($p->brand != null)
                                               {{$p->brand->name}}
                                            @else
                                                <span class="badge badge-info">None</span>
                                            @endif
                                            
                                        
                                        </th>
                                        <th>{{$p->num}}</th>
                                        <th>{{$p->manufacturer}}</th>
                                        <th>{{$p->sizes}}</th>
                                        <th>{{$p->slug}}</th>
                                        <th>{{$p->short_description}}</th>
                                        <th>{{$p->long_description}}</th>

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
                                                    <a href="{{route('products.show',$p->id)}}" class="dropdown-item">
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
                                                        Details</a>

                                                    <a href="javascript:;" class="dropdown-item" data-toggle="modal"
                                                       data-target="#archive-product{{$p->id}}">
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
                                               data-target="#modals-slide-in-product-edit" onclick="productEdit({{$p->id}})">
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


                                           
                                            @include('products::products.modals.archive')
                                        </th>


                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                @include('products::products.modals.edit')


                <!-- Modal to add new record -->
                <div class="modal fade" id="modals-slide-in">
                    <div class="modal-dialog modal-lg sidebar-sm">
                        <form class="add-new-record modal-content pt-0" action="{{route('products.store')}}"
                              method="POST" id="product-form">
                            @csrf
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                            <div class="modal-header mb-1">
                                <h5 class="modal-title" id="exampleModalLabel">New Product</h5>
                            </div>
                            <div class="modal-body flex-grow-1">
                                <div class="form-group">
                                    <label class="form-label" for="basic-icon-default-name">Name</label>
                                    <input
                                            type="text"
                                            class="form-control dt-full-name"
                                            id="basic-icon-default-name"
                                            name="name"
                                            placeholder="Product name"
                                            aria-label="Product name"
                                    />
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="slug">Slug</label>
                                    <input
                                            type="text"
                                            class="form-control dt-full-slug"
                                            id="slug"
                                            name="slug"
                                            placeholder="Product slug"
                                            aria-label="Product slug"
                                    />
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="basic-icon-default-Brand">Brand</label>
                                    <select name="brand_id" id="brand" class="form-control">
                                        <option disabled="true" value="" selected>Choose Brand</option>
                                    </select>
                                </div>

   
                                <div class="form-group">
                                    <label class="form-label" for="basic-icon-default-manufacturer">Manufacturer</label>
                                    <input
                                            type="text"
                                            class="form-control dt-full-manufacturer"
                                            id="basic-icon-default-manufacturer"
                                            name="manufacturer"
                                            placeholder="Product manufacturer"
                                            aria-label="Product manufacturer"
                                    />
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="basic-icon-default-sizes">Sizes</label>
                                    <input
                                            type="text"
                                            class="form-control dt-full-sizes"
                                            id="basic-icon-default-sizes"
                                            name="sizes"
                                            placeholder="Product sizes"
                                            aria-label="Product sizes"
                                    />
                                </div>

                          

                                <div class="form-group">
                                    <label class="form-label" for="basic-icon-default-num">Product Num</label>
                                    <input
                                            type="text"
                                            class="form-control dt-full-num"
                                            id="basic-icon-default-num"
                                            name="num"
                                            placeholder="Product num"
                                            aria-label="Product num"
                                    />
                                </div>


                                <div class="form-group">
                                    <label class="form-label" for="video_url">Video url</label>
                                    <input
                                            type="text"
                                            class="form-control dt-full-num"
                                            id="video_url"
                                            name="video_url"
                                            placeholder="Video url"
                                            aria-label="video_url"
                                    />
                                </div>



                          

                                <div class="form-group">
                                    <label class="form-label" for="basic-icon-default-post">short description</label>
                                    <input
                                            type="text"
                                            id="basic-icon-default-post"
                                            class="form-control dt-post"
                                            name="short_description"
                                            placeholder="Short description"
                                            aria-label="Short description"
                                    />
                                </div>


                               

                                

                                <div class="form-group">
                                    <label class="form-label" for="basic-icon-default-long-desc">long
                                        description</label>

                                        <div class="row">
                                            <div class="col-sm-12">
                                              <div id="full-wrapper">
                                                <div id="full-container">
                                                  <div class="quill-textarea" id="basic-icon-default-long-desc" name="long_description">
                                                   
                                                    
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                    {{-- <textarea class="form-control dt-post" name="long_description"
                                              id="basic-icon-default-long-desc" cols="30" rows="10"></textarea> --}}

                                </div>

                                <textarea style="display: none" id="long_description" name="long_description"></textarea>

                                <button type="submit" class="btn btn-primary data-submit mr-1">Submit</button>
                                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!--/ Kick start -->




    @push('js')



        <script>


            $('#brand').select2({
                            /*  placeholder: "Start typing ...", */
                theme: 'bootstrap4',
                ajax: {
                     url: '{{ route("brands.get") }}',
                     dataType: 'json',
                     // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                     processResults: function(data) {
                         return {
                             results: data
                        };
                    },

                }
            });

            $('#basic-icon-default-name').on('input',function(){
                var Text = $(this).val();
                Text = Text.toLowerCase();
                Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
                $("#slug").val(Text);  
            })


            
        </script>



        <script>

            $(document).ready(function () {
                var pg_nb = '{{$pg_nb}}';

                $('#products_table').DataTable({
                    dom: 'Blfrtip',
                    responsive: true,
                    columnDefs: [
                        {responsivePriority: 1, targets: 0},
                        {responsivePriority: 2, targets: -1},
                        { targets: 'no-sort', orderable: false }  
                    ]
                });
                var table = $('#products_table').dataTable();
                table.fnPageChange(parseInt(pg_nb),true);
                
            /*     $('#tableInfo').html(
                    'Currently showing page '+(info.page+1)+' of '+info.pages+' pages.'
                ); */

            });

            $(document).ready(function(){

                var quill = new Quill('.quill-textarea', {
            placeholder: 'Enter Detail',
            theme: 'snow',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'indent': '-1'}, { 'indent': '+1' }]
                ]
            }
         });

         quill.on('text-change', function(delta, oldDelta, source) {
         
            $('#long_description').val(quill.container.firstChild.innerHTML);
        });


  
            });
        </script>

    @endpush
@endsection
