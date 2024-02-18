@extends('layouts/contentLayoutMaster')

@section('title', 'Users')
@section('breadcrumbs')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Users</li>

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
            <h4 class="card-title">User List 🚀</h4>
            <div class="">
                <button class="btn add-new btn-primary" type="button" data-toggle="modal"
                        data-target="#modals-slide-in-user"><span>Add New User</span></button>
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
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Full Name</th>
                                    <th class="text-center">User Name</th>
                                    <th class="text-center">Role</th>
                                    <th class="text-center">Is Active</th>
                                    <th class="text-center">Created_at</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="text-center">{{$user->id}}</td>
                                        <td class="text-center">{{$user->email}}</td>
                                        <td class="text-center">{{$user->name}}</td>
                                        <td class="text-center">{{$user->username}}</td>
                                        <td class="text-center">
                                            @if($user->hasRole( 'admin' ))
                                                <span class="badge badge-light-primary">{{"Admin"}}</span>
                                            @endif()
                                            @if($user->hasRole('supervisor'))
                                                <span class="badge badge-light-danger">{{"Supervisor"}}</span>
                                            @endif()
                                            @if($user->hasRole('operator'))
                                                <span class="badge badge-light-warning">{{"Operator"}}</span>
                                            @endif()
                                            @if($user->hasRole('packaging'))
                                                <span class="badge badge-light-info">{{"Packaging"}}</span>
                                            @endif()
                                        </td>
                                        <td class="flex justify-content-center">
                                            <div class="custom-control custom-control-primary custom-switch text-center">
                                                <input type="checkbox" @if($user->is_active) checked="" @endif disabled
                                                       class="custom-control-input">
                                                <label class="custom-control-label" for="customSwitch3"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            @if ($user->created_at != null)
                                                 <span class="badge badge-info">{{$user->created_at->format('Y-m-d ')}}</span> 
                                            @else
                                                 <span class="badge badge-info">Null</span>
                                            @endif
                                        
                                         </td>
                                        <td class="text-center">
                                            @include('users::includes.actions')
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$users->links()}}
                        </div>
                    </div>
                </div>
                <!-- Modal to add new record -->
                @include('users::modals.add_user_modal')
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
