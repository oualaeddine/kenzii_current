@extends('layouts/contentLayoutMaster')

@section('title', 'Permissions')
@section('breadcrumbs')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">List</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="card">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
            @endforeach
        @endif
        <div class="card-header">
            <h4 class="card-title">Permission List 🚀</h4>
            <div class="">
                <button class="btn add-new btn-primary" type="button" data-toggle="modal"
                        data-target="#modals-slide-in-role-permissions"><span>Add new Permission </span></button>
            </div>
        </div>
        <div class="card-body">

            <!-- Basic table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <table class="datatables-basic table" id="roles_permissions_table">
                                <thead>
                                <tr>
                                    <th class="text-center">id</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Created_at</th>
                                    <th class="text-center">Action</th>


                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td class="text-center">{{$permission->id}}</td>

                                        <td class="text-center">
                                                <span class="badge badge-light-primary m-1 ">{{$permission->name}}</span>
                                        </td>
                                        <td class="text-center">{{$permission->created_at->format('Y-m-d ')}}</td>
                                        <td class="text-center">
                                            @include('rolesandpermissions::includes.permission.actions')
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$permissions->links()}}
                        </div>
                    </div>
                </div>
                <!-- Modal to add new record -->
                @include('rolesandpermissions::modals.permission.add_permission_modal')
            </section>


        </div>
    </div>
    <!-- users list start -->
    <!-- users list ends -->
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $('#roles_permissions_table').DataTable({
                "bPaginate": false,
                "paging": false,
                "info": false
            });
        });
    </script>
@endpush
