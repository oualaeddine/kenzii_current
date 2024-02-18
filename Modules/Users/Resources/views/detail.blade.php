@extends('layouts/contentLayoutMaster')

@section('title', 'User View')

@section('breadcrumbs')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>
    </nav>

@endsection

@section('vendor-style')
    <link rel="stylesheet" href="{{asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css'))}}">
    <link rel="stylesheet" href="{{asset(mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css'))}}">
    <link rel="stylesheet" href="{{asset(mix('vendors/css/tables/datatable/buttons.bootstrap4.min.css'))}}">
@endsection
@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-invoice-list.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-user.css')) }}">
@endsection

@section('content')
    <section class="app-user-view">
        <!-- User Card & Plan Starts -->
        <div class="row">
            <!-- User Card starts-->
            <div class="col-xl-9 col-lg-8 col-md-7">
                <div class="card user-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6 col-lg-12 d-flex flex-column justify-content-between border-container-lg">
                                <div class="user-avatar-section">
                                    <div class="d-flex justify-content-start">
                                        <img
                                                class="img-fluid rounded"
                                                src="{{asset('images/avatars/7.png')}}"
                                                height="104"
                                                width="104"
                                                alt="User avatar"
                                        />
                                        <div class="d-flex flex-column ml-1">
                                            <div class="user-info mb-1">
                                                <h4 class="mb-0">Eleanor Aguilar</h4>
                                                <span class="card-text">eleanor.aguilar@gmail.com</span>
                                            </div>
                                            <div class="d-flex flex-wrap">
                                                <a href="javascript:void(0);" data-toggle="modal"
                                                   data-target="#modals-user-edit-slide-in{{$user->id}}"
                                                   class="btn btn-primary">Edit</a>
                                                <button data-toggle="modal" data-target="#archive-user{{$user->id}}"
                                                        class="btn btn-outline-danger ml-1">Delete
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center user-total-numbers">
                                    <div class="d-flex align-items-center mr-2">
                                        <div class="color-box bg-light-primary">
                                            <i data-feather="dollar-sign" class="text-primary"></i>
                                        </div>
                                        <div class="ml-1">
                                            <h5 class="mb-0">23.3k</h5>
                                            <small>Monthly Sales</small>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="color-box bg-light-success">
                                            <i data-feather="trending-up" class="text-success"></i>
                                        </div>
                                        <div class="ml-1">
                                            <h5 class="mb-0">$99.87K</h5>
                                            <small>Annual Profit</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 mt-2 mt-xl-0">
                                <div class="user-info-wrapper">
                                    <div class="d-flex flex-wrap">
                                        <div class="user-info-title">
                                            <i data-feather="user" class="mr-1"></i>
                                            <span class="card-text user-info-title font-weight-bold mb-0">Username</span>
                                        </div>
                                        <p class="card-text mb-0">{{$user->username}}</p>
                                    </div>
                                    <div class="d-flex flex-wrap my-50">
                                        <div class="user-info-title">
                                            <i data-feather="check" class="mr-1"></i>
                                            <span class="card-text user-info-title font-weight-bold mb-0">Name</span>
                                        </div>
                                        <p class="card-text mb-0">{{$user->name}}</p>
                                    </div>
                                    <div class="d-flex flex-wrap my-50">
                                        <div class="user-info-title">
                                            <i data-feather="star" class="mr-1"></i>
                                            <span class="card-text user-info-title font-weight-bold mb-0">Role</span>
                                        </div>
                                        <p class="card-text mb-0">@foreach($user_roles as $role)<span class="badge badge-primary">{{$role}}</span> @endforeach</p>
                                    </div>
                                    <div class="d-flex flex-wrap my-50">
                                        <div class="user-info-title">
                                            <i data-feather="flag" class="mr-1"></i>
                                            <span class="card-text user-info-title font-weight-bold mb-0">Status</span>
                                        </div>
                                        <p class="card-text mb-0">
                                            @if($user->is_active)
                                                <span class="badge badge-primary">  {{"Active"}} </span>
                                            @else
                                                <span class="badge badge-danger">  {{"InActive"}} </span>
                                            @endif


                                        </p>
                                    </div>
                                    <div class="d-flex flex-wrap">
                                        <div class="user-info-title">
                                            <i data-feather="clock" class="mr-1"></i>
                                            <span class="card-text user-info-title font-weight-bold mb-0">Created At</span>
                                        </div>
                                        <p class="card-text mb-0">{{$user->created_at->format('Y-m-d h:i:s')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /User Card Ends-->

            <!-- Plan Card starts-->
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="card plan-card border-primary">
                    <div class="card-header d-flex justify-content-between align-items-center pt-75 pb-1">
                        <h5 class="mb-0">Current Plan</h5>
                        <span class="badge badge-light-secondary" data-toggle="tooltip" data-placement="top"
                              title="Expiry Date"
                        >July 22, <span class="nextYear"></span>
          </span>
                    </div>
                    <div class="card-body">
                        <div class="badge badge-light-primary">Basic</div>
                        <ul class="list-unstyled my-1">
                            <li>
                                <span class="align-middle">5 Users</span>
                            </li>
                            <li class="my-25">
                                <span class="align-middle">10 GB storage</span>
                            </li>
                            <li>
                                <span class="align-middle">Basic Support</span>
                            </li>
                        </ul>
                        <button class="btn btn-primary text-center btn-block">Upgrade Plan</button>
                    </div>
                </div>
            </div>
            <!-- /Plan CardEnds -->
        </div>
        <!-- User Card & Plan Ends -->

        <!-- User Timeline & Permissions Starts -->
        <div class="row">
            <!-- information starts -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-2">User Timeline</h4>
                    </div>
                    <div class="card-body">
                        <ul class="timeline">
                            <li class="timeline-item">
                                <span class="timeline-point timeline-point-indicator"></span>
                                <div class="timeline-event">
                                    <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                        <h6>12 Invoices have been paid</h6>
                                        <span class="timeline-event-time">12 min ago</span>
                                    </div>
                                    <p>Invoices have been paid to the company.</p>
                                    <div class="media align-items-center">
                                        <img
                                                class="mr-1"
                                                src="{{asset('images/icons/file-icons/pdf.png')}}"
                                                alt="invoice"
                                                height="23"
                                        />
                                        <div class="media-body">invoice.pdf</div>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <span class="timeline-point timeline-point-warning timeline-point-indicator"></span>
                                <div class="timeline-event">
                                    <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                        <h6>Client Meeting</h6>
                                        <span class="timeline-event-time">45 min ago</span>
                                    </div>
                                    <p>Project meeting with john @10:15am.</p>
                                    <div class="media align-items-center">
                                        <div class="avatar">
                                            <img src="{{asset('images/avatars/12-small.png')}}" alt="avatar" height="38"
                                                 width="38"/>
                                        </div>
                                        <div class="media-body ml-50">
                                            <h6 class="mb-0">John Doe (Client)</h6>
                                            <span>CEO of Infibeam</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <span class="timeline-point timeline-point-info timeline-point-indicator"></span>
                                <div class="timeline-event">
                                    <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                        <h6>Create a new project for client</h6>
                                        <span class="timeline-event-time">2 days ago</span>
                                    </div>
                                    <p class="mb-0">Add files to new design folder</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- information Ends -->

            <!-- User Permissions Starts -->
            <div class="col-md-6">
                <!-- User Permissions -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Permissions</h4>
                    </div>
                    <form id="update_permissions" method="POST"
                          action="{{route('users.update_permissions',['user'=>$user->id])}}">
                        @csrf
                        @method('PUT')
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                                <thead class="thead-light">
                                <tr>
                                    <th>Permission</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($permissions as $permission)
                                    <tr>
{{--                                        <td>{{$role->name}}</td>--}}
                                    </tr>

                                        <tr>
                                            <td>{{$permission->name}}</td>
                                        <td>
{{--                                            {{$permission->name}}--}}
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox"
                                                           @if(in_array($permission->name,$user_all_permissions))

                                                           value="{{$permission->id}}" class="custom-control-input"

                                                           id="admin-read-{{$permission->id}}"

                                                           checked
                                                           @if(in_array($permission->name,$rpa))
                                                           disabled
                                                           @endif

                                                           @else
                                                           name="permissions[]"
                                                           value="{{$permission->id}}" class="custom-control-input"

                                                           id="admin-read-{{$permission->id}}"

                                                            @endif
                                                    />
                                                    <label class="custom-control-label"
                                                           for="admin-read-{{$permission->id}}"></label>
                                                </div>
                                        </td>
                                        </tr>

                                @endforeach

                                </tbody>
                            </table>
                            <div class="col-12 d-flex flex-sm-row flex-column my-2 justify-content-end">
                                <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Update</button>
                            </div>
                        </div>

                    </form>
                </div>
                <!-- /User Permissions -->
            </div>
            <!-- User Permissions Ends -->
        </div>
        <!-- User Timeline & Permissions Ends -->

        <!-- User Invoice Starts-->
        <div class="row invoice-list-wrapper">
            <div class="col-12">
                <div class="card">
                    <div class="card-datatable table-responsive">
                        <table class="invoice-list-table table">
                            <thead>
                            <tr>
                                <th></th>
                                <th>#</th>
                                <th><i data-feather="trending-up"></i></th>
                                <th>Client</th>
                                <th>Total</th>
                                <th class="text-truncate">Issued Date</th>
                                <th>Balance</th>
                                <th>Invoice Status</th>
                                <th class="cell-fit">Actions</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /User Invoice Ends-->
        @include('users::modals.edit')
        @include('users::modals.archive')
    </section>
@endsection

@section('vendor-script')
    <script src="{{asset(mix('vendors/js/extensions/moment.min.js'))}}"></script>
    <script src="{{asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js'))}}"></script>
    <script src="{{asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js'))}}"></script>
    <script src="{{asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js'))}}"></script>
    <script src="{{asset(mix('vendors/js/tables/datatable/responsive.bootstrap4.js'))}}"></script>
    <script src="{{asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js'))}}"></script>
    <script src="{{asset(mix('vendors/js/tables/datatable/buttons.bootstrap4.min.js'))}}"></script>
@endsection
@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/pages/app-user-view.js')) }}"></script>
@endsection
