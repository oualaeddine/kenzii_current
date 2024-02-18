@extends('layouts/contentLayoutMaster')

@section('title', 'Categories')

@section('breadcrumbs')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Categories</li>

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
            <h4 class="card-title">Categories page 🚀</h4>
            <div class="dt-buttons btn-group flex-wrap">
                <button class="btn add-new btn-primary mt-50" tabindex="0" aria-controls="DataTables_Table_0"
                        type="button" data-toggle="modal" data-target="#modals-slide-in"><span>Add category</span>
                </button>
            </div>


        </div>
        <div class="card-body">
            <!-- Basic table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <table class="datatables-basic table" id="categories_table">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Icon</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <th></th>
                                        <th>{{$category->id}}</th>
                                        <th>{{$category->name}}</th>
                                        <th>{{$category->desc}}</th>
                                        <th>
                                              @if ($category->image != null)
                                              <img class="img-fluid shadow-sm" src="{{asset($category->image)}}" style="max-width: 100px" alt="category"/>

                                              @else
                                                  <span class="badge badge-info">None</span>
                                              @endif
                                            
                                        </th>
                                        <th>    
                                            @if ($category->icon != null)

                                            <img class="img-fluid shadow-sm" src="{{asset($category->icon)}}" style="max-width: 100px" alt="category"/>

                                            @else
                                                <span class="badge badge-info">None</span>
                                            @endif
                                        
                                        </th>

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
                                                {{--     <a href="{{route('categories.show',$category->id)}}" class="dropdown-item">
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
                                                       data-target="#archive-category{{$category->id}}">
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
                                               data-target="#modals-slide-in-category-edit" onclick="categoryEdit({{$category->id}})">
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


                                           
                                            @include('categories::categories.modals.archive')
                                        </th>


                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div class="text-right">
                                <div style="float: right">
                                    {{$categories->links()}}
                                </div>
                                
                            
                            </div>
                        </div>
                    </div>
                </div>

                @include('categories::categories.modals.edit')


                <!-- Modal to add new record -->
                <div class="modal fade" id="modals-slide-in">
                    <div class="modal-dialog modal-lg sidebar-sm">
                        <form class="add-new-record modal-content pt-0" action="{{route('categories.store')}}"
                              method="POST" id="category-form" enctype="multipart/form-data">
                            @csrf
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                            <div class="modal-header mb-1">
                                <h5 class="modal-title" id="exampleModalLabel">New Category</h5>
                            </div>
                            <div class="modal-body flex-grow-1">
                                <div class="form-group">
                                    <label class="form-label" for="basic-icon-default-name">Name</label>
                                    <input
                                            type="text"
                                            class="form-control dt-full-name"
                                            id="basic-icon-default-name"
                                            name="name"
                                            placeholder="Category name"
                                            aria-label="Category name"
                                    />
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="basic-icon-default-post">description</label>
                                    <input
                                            type="text"
                                            id="basic-icon-default-post"
                                            class="form-control dt-post"
                                            name="desc"
                                            placeholder="description"
                                            aria-label="description"
                                    />
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="image">Category image</label>
                                    <input
                                            type="file"
                                            id="image"
                                            class="form-control dt-post"
                                            name="image"
                                            placeholder="Category image"
                                            aria-label="Category image"
                                    />
                                </div>


                                <div class="form-group">
                                    <label class="form-label" for="icon">Category icon</label>
                                    <input
                                            type="file"
                                            id="icon"
                                            class="form-control icon"
                                            name="icon"
                                            placeholder="Category icon"
                                            aria-label="Category icon"
                                    />
                                </div>

                           


                               

          
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

            $(document).ready(function () {

                //    $('body').addClass('menu-collapsed')


                $('#categories_table').DataTable({
                    dom: 'Blfrtip',
                    responsive: true,
                    "bPaginate": false,
                    "bSorting": false,
                    columnDefs: [
                        {responsivePriority: 1, targets: 1},
                        {responsivePriority: 2, targets: -1},
                        { targets: 'no-sort', orderable: false }  
                    ]
                });


            });

        </script>

    @endpush
@endsection
