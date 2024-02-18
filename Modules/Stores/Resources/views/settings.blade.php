@extends('layouts/contentLayoutMaster')

@section('title', 'Store Settings')

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
                <h4 class="card-title">Texts 🚀</h4>
                <div class="">
                    <button class="btn add-new btn-primary" type="button" data-toggle="modal"
                            data-target="#modal-add-setting-text"><span>Add New Text</span></button>
                </div>
            </div>
            <div class="card-body">

                    <!-- Basic table -->
                    <section id="basic-datatable">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <table class="datatables-basic table" id="settings_text">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Value</th>
                                            <th class="text-center">Priorty</th>
                                            <th class="text-center">Group</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                     
                                        </tbody>
                                    </table>
                                    {{-- {{$products->links()}} --}}
                                </div>
                            </div>
                        </div>
                        <!-- Modal to add new record -->
                        @include('stores::modals.settings.add_text')
                        @include('stores::modals.settings.edit_text')
                        @include('stores::modals.settings.delete_text')
                    </section>
    
                
            </div>
        </div>


    </div>

    <div class="col-md-6">

        <div class="card">
        
            <div class="card-header">
                <h4 class="card-title">Images 🚀</h4>
                <div class="">
                    <button class="btn add-new btn-primary" type="button" data-toggle="modal"
                            data-target="#modal-add-setting-image"><span>Add New Image</span></button>
                </div>
            </div>
            <div class="card-body">

                <table class="datatables-basic table" id="settings_image">
                    <thead>
                    <tr>
                        <th></th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Value</th>
                        <th class="text-center">Priorty</th>
                        <th class="text-center">Group</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_images as $i)
                              <tr>
                                  <td></td>
                                  <td>{{$i->name}}</td>
                                  <td> <a href="{{asset($i->value)}}" target="_blank"><img src="{{asset($i->value)}}" alt="" height="150px" width="150px"></a> </td>
                                  <td>{{$i->priorty}}</td>
                                  <td>{{$i->group}}</td>
                                  <td>@include('stores::includes.actions_settings_image')</td>
                              </tr>
                        @endforeach
                    </tbody>
                </table>
    
                @include('stores::modals.settings.add_image')
                @include('stores::modals.settings.edit_image')
                @include('stores::modals.settings.delete_image')
               
            </div>
        </div>


    </div>



   </div>

    <!-- users list start -->
    <!-- users list ends -->

    @push('js')

    
        <script type="text/javascript">


            if (!$.fn.dataTable.isDataTable('#settings_text')) {
                $('#settings_text').DataTable({
                "lengthMenu": [[10,25, 50, -1], [10,25, 50, "All"]],
                    dom: 'Blfrtip',
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
                        {data: 'name', name: 'name'}, 
                        {data: 'value', name: 'value'},
                        {data: 'priorty', name: 'priorty'}, 
                        {data: 'group', name: 'group'},
                        {data: 'Actions', name: 'Actions'},
                        ],
                });
            }

        </script>
        

        <script type="text/javascript">


            if (!$.fn.dataTable.isDataTable('#settings_image')) {
                $('#settings_image').DataTable({
                "lengthMenu": [[10,25, 50, -1], [10,25, 50, "All"]],
                    dom: 'Blfrtip',
                    responsive: true,
                    columnDefs: [
                            {responsivePriority: 1, targets: 0},
                            {responsivePriority: 2, targets: 5}
                    ],
                });
            }

        </script>
    @endpush
@endsection


