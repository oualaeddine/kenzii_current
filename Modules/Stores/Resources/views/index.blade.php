@extends('layouts/contentLayoutMaster')

@section('title', 'Stores')
{{-- 
@section('breadcrumbs')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Stores</li>
        </ol>
    </nav>

@endsection
 --}}
@section('content')
        @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" >{{$error}}</div>
        @endforeach
        @endif


    <div class="card">
     
        <div class="card-header">
            <h4 class="card-title">Stores List 🚀</h4>
            <div class="">
                <button class="btn add-new btn-primary" type="button" data-toggle="modal"
                        data-target="#modals-slide-in-store"><span>Add New Store</span></button>
            </div>
        </div>
        <div class="card-body">

            <!-- Basic table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <table class="datatables-basic table" id="users_table">
                                <thead>
                                <tr>
                                    <th class="text-center">id</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Domain</th>
                                    <th class="text-center">Created_at</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($stores as $store)
                                    <tr>
                                        <td class="text-center">{{$store->id}}</td>
                                        <td class="text-center">{{$store->name}}</td>
                                        <td class="text-center">{{$store->domain}}</td>
                                        <td class="text-center">{{$store->created_at->format('Y-m-d')}}</td>
                                        <td class="text-center">
                                            @include('stores::includes.actions')
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$stores->links()}}
                        </div>
                    </div>
                </div>
                <!-- Modal to add new record -->
                @include('stores::modals.add_store_modal')
            </section>
        </div>
    </div>
    <!-- users list start -->
    <!-- users list ends -->
@endsection

@push('js')
    <script>

        $(document).ready(function () {
            $('#users_table').DataTable({
                "bPaginate": false,
                "paging": false,
                "info": false
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
