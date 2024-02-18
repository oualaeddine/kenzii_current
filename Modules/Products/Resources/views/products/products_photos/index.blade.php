@extends('layouts/contentLayoutMaster')

@section('title', 'Products')

{{-- @push('css') --}}


<style>


.parent>.row{
    display: flex;
    align-items: center;
    height: 100%;
}
.col img{
    height:100px;
    width: 100%;
    cursor: pointer;
    transition: transform 1s;
    object-fit: cover;
}
.col label{
    overflow: hidden;
    position: relative;
}
.imgbgchk:checked + label>.tick_container{
    opacity: 1;
}
/*         aNIMATION */
.imgbgchk:checked + label>img{
    transform: scale(1.25);
    opacity: 0.3;
}
.tick_container {
    transition: .5s ease;
    opacity: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    cursor: pointer;
    text-align: center;
}
.tick {
    background-color: #4CAF50;
    color: white;
    font-size: 16px;
    padding: 6px 12px;
    height: 40px;
    width: 40px;
    border-radius: 100%;
}

.item {
    position:relative;
    padding-top:20px;
    display:inline-block;
}
.notify-badge{
    position: absolute;
    right:-20px;
    top:10px;
    background:green;
    text-align: center;
    border-radius: 30px 30px 30px 30px;
    color:white;
    padding:5px 10px;
    font-size:10px;
    width: 50px;
}

</style>
    
{{-- @endpush --}}

@section('breadcrumbs')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('products.index')}}">Products</a></li>
            <li class="breadcrumb-item active">Products Photos ({{$product->name}})</li>

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
    <div class="card col-md-8">
        <div class="card-header">
            <h4 class="card-title">Products Photos page  ( {{$product->name}} ) 🚀</h4>
            <div class="dt-buttons btn-group flex-wrap">

                <div class="dt-buttons btn-group flex-wrap">
                    <button class="btn btn-primary mt-50 mr-2 shadow-sm" tabindex="0"
                            aria-controls="DataTables_Table_0"
                            type="button" data-toggle="modal" data-target="#modal-add-photos">
                        <span>Add Product Photo</span></button>

                        <button class="btn btn-success mt-50 shadow-sm" 
                        type="button" data-toggle="modal" data-target="#modal-select-main">
                    <span>Select Main</span></button>
                </div>

            </div>


        </div>
        <div class="card-body">
            <!-- Basic table -->

            <!-- Multi row Slides Per View swiper -->
            <section id="component-swiper-multi-row">
                <div class="card">
                    <div class="card-body">

                        <div class="swiper-multi-row swiper-container">
                            <div class="swiper-wrapper">
                                @foreach ($products_photos as $p_p)
                                    {{--  <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-photo-product{{$p_p->id}}">X</button> --}}

                                    <div class="swiper-slide">

                                        <button class="btn btn-danger btn-sm shadow-sm"
                                                onclick="deletemodal({{$p_p->id}})">X
                                        </button>

                                        <div class="item">
                                          
                                            @if ($product->main_pic_id == $p_p->id)
                                               <span class="notify-badge">Main</span>
                                            @endif
                                            

                                              <img class="img-fluid shadow-sm" src="{{Config::get('app.url').$p_p->link}}"
                                              alt="banner"/>
                                        
                                        </div>

                                     
                                    </div>



                                @endforeach
                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>


            {{-- @include('products::products.modals.DeletePhoto') --}}



            <!-- Modal to add new record -->
                <div class="modal modal-slide-in fade" id="modal-add-photos">
                    <div class="modal-dialog sidebar-sm">
                        <form class="add-new-record modal-content pt-0" enctype="multipart/form-data"
                              action="{{route('productImages.store')}}" method="POST">
                            @csrf
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                            <div class="modal-header mb-1">
                                <h5 class="modal-title" id="exampleModalLabel">New Photos</h5>
                            </div>
                            <div class="modal-body flex-grow-1">

                                <input type="hidden" value="{{$product_id}}" name="product_id">

                                <div class="form-group">
                                    <label class="form-label" for="basic-icon-default-post">Product photos</label>
                                    <input
                                            multiple="multiple"
                                            type="file"
                                            id="basic-icon-default-post"
                                            class="form-control"
                                            name="images[]"
                                            placeholder="your image"
                                            aria-label="your image"
                                    />
                                </div>


                                <button type="submit" class="btn btn-primary data-submit mr-1">Submit</button>
                                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="modal fade modal-danger text-left" id="delete-photo-product">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel120">Delete product photo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>

                            <form action="{{-- {{route('productImages.delete',$p_p->id)}} --}}"
                                  id="delete-form-photo-product" method="post">
                                @csrf
                                @method('delete')

                                <div class="modal-body">
                                    Are you sure to delete this product photo?
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger waves-effect waves-float waves-light">
                                        Accept
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </section>

            @include('products::products.products_photos.select_main')

        </div>
    </div>



    @push('js')

        <script>

            let deleteModal = $('#delete-photo-product')

            function deletemodal(id) {

                $('#delete-photo-product').modal('show');

                var url_delete = '{{ route("productImages.delete", ":id") }}';

                url_delete = url_delete.replace(':id', id);

                deleteModal.find('#delete-form-photo-product').attr('action', url_delete);

            }


        </script>

    @endpush

@endsection
