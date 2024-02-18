@extends('layouts/contentLayoutMaster')


@section('title', $status.' orders')

@section('breadcrumb_btn')
    <div class="dt-buttons btn-group flex-wrap float-right">
        <a href="{{route('order.create')}}" class="btn add-new btn-primary mt-50">
            <span>Add Order</span></a>
    </div>
@endsection


@section("my_head")
    {{--   <table class="table table-bordered table-sm">
           <thead>
           <tr>
               <th>New</th>
               <th>Na1</th>
               <th>Na2</th>
               <th>Att_C</th>
               <th>Cnf1</th>
               <th>Att_S</th>
               <th>Cnf2</th>
               <th>En_P</th>
               <th>Ready</th>
               <th>Reçu</th>
               <th>Sortie</th>
               <th>Alerte</th>
               <th>T_echouée</th>
           </tr>
           </thead>
           <tbody>
           <tr>
               <td class="new">New</td>
               <td class="na1">Na1</td>
               <td class="na2">Na2</td>
               <td class="pending_c">Att_C</td>
               <td class="confirmed1">Cnf1</td>
               <td class="pending_s">Att_S</td>
               <td class="confirmed2">Cnf2</td>
               <td class="en_p">En_P</td>
               <td class="rs">Ready</td>
               <td class="r_wilaya">Reçu</td>
               <td class="sortie">Sortie</td>
               <td class="alerte">Alerte</td>
               <td class="t_echoue">T_echouée</td>
           </tr>
           </tbody>
       </table>--}}



        <a class="m-50  btn btn-outline-primary " data-toggle="pill" href=""
           aria-expanded="true">New <span class="new badge-pill"></span></a>

        <a class="  m-50   btn btn-outline-warning" data-toggle="pill" href=""
           aria-expanded="false">Na1 <span class="na1 badge-pill"></span></a>


        <a class="  m-50   btn btn-outline-warning" data-toggle="pill" href=""
           aria-expanded="false">Na2 <span class="na2 badge-pill"></span></a>

{{--

        <a class="  m-50   btn btn-outline-info" data-toggle="pill" href=""
           aria-expanded="true">Att_client <span class="att_c badge-pill"></span></a>

--}}

    {{--    <a class="  m-50   btn btn-outline-success" data-toggle="pill" href=""
           aria-expanded="false">Confirmed1 <span class="confirmed1 badge badge-pill badge-light-success"></span></a>


        <a class="  m-50   btn btn-outline-secondary" data-toggle="pill" href=""
           aria-expanded="false">Att_ship</a>
--}}

        <a class="  m-50   btn btn-outline-success" data-toggle="pill" href=""
           aria-expanded="true">Confirmed2</a>


      {{--  <a class="  m-50   btn btn-outline-primary" data-toggle="pill" href=""
           aria-expanded="false">En_prep</a>


        <a class="  m-50   btn btn-outline-dark" data-toggle="pill" href=""
           aria-expanded="false">Ready</a>--}}


        <a class="  m-50   btn btn-outline-info" data-toggle="pill" href=""
           aria-expanded="false">Sortie</a>


        <a class="  m-50   btn btn-outline-info" data-toggle="pill" href=""
           aria-expanded="false">Reçu</a>


        <a class="  m-50   btn btn-outline-warning" data-toggle="pill" href=""
           aria-expanded="false">Alerte</a>


        <a class="  m-50   btn btn-outline-danger" data-toggle="pill" href=""
           aria-expanded="false">T_échoué</a>
        <a class="  m-50   btn btn-outline-secondary" data-toggle="pill" href=""
           aria-expanded="false">Expédié</a>

     {{--   <a class="  m-50   btn btn-outline-secondary" data-toggle="pill" href=""
           aria-expanded="false">Vers wilaya</a>
        <a class="  m-50   btn btn-outline-secondary" data-toggle="pill" href=""
           aria-expanded="false">Transfert</a>
        <a class="  m-50   btn btn-outline-secondary" data-toggle="pill" href=""
           aria-expanded="false">Centre</a>

        <a class="  m-50   btn btn-outline-success" data-toggle="pill" href=""
           aria-expanded="false">Livré</a>

        <a class="m-50   btn btn-outline-danger" data-toggle="pill" href=""
           aria-expanded="false">Canceled</a>

        <a class="  m-50   btn btn-outline-danger" data-toggle="pill" href=""
           aria-expanded="false">Retour</a>
--}}

@endsection



@section('content')

    <!-- Kick start -->
    <div class="card" id="full-order-card">
        <div class="card-body">
            <!-- Basic table -->
            <section id="basic-datatable">
                <div class="row">

                    <div class="col-12">


                        <div class="card table-responsive">

                            <table class="datatables-basic table nowrap" id="orders_table">
                                <thead>
                                <tr>
                                
                                    <th class="no-sort"></th>
                                    <th  class="no-sort"><input type="checkbox" class="check_all" onclick="check_all()" /></th>
                                    <th class="no-sort" >#</th>
                                    @if ($is_all == true)
                                        <th>Status</th>
                                    @endif
                                    <th >name</th>
                                    @if (\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))
                                        <th>assigned</th>   @endif
                                    <th>phone</th>
                                    <th>total</th>
                                    <th>products</th>
                                    <th>store</th>
                                    <th>Yaldine tracking</th>
                                    <th>commune</th>
                                    <th>wilaya</th>
                                    <th>comments</th>
                                    <th>discount</th>
                                    <th>delivery price</th>
                                    <th>address</th>
                                    @if (\Illuminate\Support\Facades\Auth::user()->hasRole('admin') || \Illuminate\Support\Facades\Auth::user()->hasRole('supervisor'))
                                    <th>Visitor</th>   @endif
                                   
                                    <th>Updated at</th>
                                    @if ($can_set_status)
                                        <th class="no-sort">actions</th>
                                    @endif

                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($orders as $o)

                                    @if ($o->last_status == 'pending_s' || $o->last_status == 'pending_c' )

                                        @if ($o->alert_date != null && $o->alert_date < Carbon\Carbon::now())
                                            <tr class="bg-secondary bg-lighten-5">
                                        @else
                                            <tr>
                                        @endif

                                    @else
                                        <tr>
                                            @endif

                                           
                                            <td></td>
                                            <td><input type="checkbox" name="item[]" class="item_checkbox" value="{{$o->id}}"></td>
                                            <td>{{$o->id}}</td>
                                            @if ($is_all == true)
                                                <td>{{$o->last_status}}</td>
                                            @endif
                                            <td>{{$o->name}}</td>
                                            @if (\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))
                                                <td>{{$o->assignedUser()}}</td>
                                            @endif

                                            <td>
                                                <h4>
                                                    <a class="badge badge-pill badge-glow badge-light-primary"
                                                       href="tel:{{$o->phone}}">{{$o->phone}}</a>
                                                </h4>
                                            </td>
                                            <td>
                                                <h4>
                                                    <span class="badge badge-pill badge-glow badge-light-primary">{{$o->total}}.00 Da</span>
                                                </h4>
                                            <td>{{$o->product_names}}    </td>
                                            @if ($o->store == null)
                                                <td>
                                                    <span class="badge badge-pill badge-glow badge-light-dark">none</span>
                                                </td>
                                            @else
                                                <td>{{$o->store->name}}</td>
                                            @endif
                                            <td>{{$o->yal_tracking ?? 'none'}}</td>
                                            @if ($o->mairie == null)
                                                <td>
                                                    <span class="badge badge-pill badge-glow badge-light-danger">none</span>
                                                </td>
                                            @else
                                                <td>{{$o->mairie->name}}</td>
                                            @endif
                                            <td>{{$o->wilaya}}</td>

                                            <td>
                                                <button class="btn btn-primary" data-toggle="modal"
                                                        data-target="#Show-comment" onclick="ShowNote('{{$o->id}}')">Show
                                                </button>
                                                <p id="hidden-comment{{$o->id}}" style="display: none">{{$o->comments}}</p>
                                                {{-- <span class="badge badge-pill badge-glow badge-light-warning text-wrap">{{$o->comments}} </span> --}}
                                            </td>
                                            <td>{{$o->discount}}.00 Da</td>
                                            <td>{{$o->delivery_price}}.00 Da</td>
                                            <td>{{$o->address?? 'None'}}</td>
                                            @if (\Illuminate\Support\Facades\Auth::user()->hasRole('admin') || \Illuminate\Support\Facades\Auth::user()->hasRole('supervisor'))
                                            <td>{{$o->visitor->host?? 'None' }} | {{$o->visitor->tsrc?? 'None'}}</td>   @endif
                                           
                                            <td>{{$o->updated_at}}</td>
                                            @if ($can_set_status)
                                            <td>
                                                <div class="d-inline-flex">
                                                    <a class="pr-1 dropdown-toggle hide-arrow text-primary"
                                                       data-toggle="dropdown" aria-expanded="false">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                             height="24"
                                                             viewBox="0 0 24 24" fill="none"
                                                             stroke="currentColor" stroke-width="2"
                                                             stroke-linecap="round"
                                                             stroke-linejoin="round"
                                                             class="feather feather-more-vertical font-small-4">
                                                            <circle cx="12" cy="12" r="1"></circle>
                                                            <circle cx="12" cy="5" r="1"></circle>
                                                            <circle cx="12" cy="19" r="1"></circle>
                                                        </svg>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-left" style="">

                                                        @if ($o->last_status == 'new' && \Illuminate\Support\Facades\Auth::user()->hasRole('admin') )

                                                            <a href="javascript:;" class="dropdown-item"
                                                               data-toggle="modal"
                                                               data-target="#assign-order{{$o->id}}">
                                                                <i class="far fa-handshake"></i> Assign
                                                            </a>
                                                        @endif

                                                        <a href="javascript:;" class="dropdown-item"     data-toggle="modal"
                                                        data-target="#edit-order"
                                                        onclick="EditGetData({{$o->id}})">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                                 class="feather feather-file-text font-small-4 mr-50">
                                                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                                                <polyline points="14 2 14 8 20 8"></polyline>
                                                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                                                <polyline points="10 9 9 9 8 9"></polyline>
                                                            </svg>
                                                            Details</a>

                                                        <a href="{{route('order.edit',$o->id)}}" class="dropdown-item"
                                                        {{--    data-toggle="modal"
                                                           data-target="#edit-order" --}}
                                                           {{-- onclick="EditGetData({{$o->id}})" --}}>
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 width="24"
                                                                 height="24"
                                                                 viewBox="0 0 24 24" fill="none"
                                                                 stroke="currentColor"
                                                                 stroke-width="2" stroke-linecap="round"
                                                                 stroke-linejoin="round"
                                                                 class="feather feather-edit font-small-4">
                                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                </path>
                                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                </path>
                                                            </svg>
                                                            Edit
                                                        </a>

                                                        @if (Auth::user()->hasrole('admin') )

                                                        <a href="javascript:;" class="dropdown-item" data-toggle="modal"
                                                        data-target="#edit-status-all"
                                                        onclick="EditStatusAll({{$o->id}})">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                    width="24"
                                                                    height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor"
                                                                    stroke-width="2" stroke-linecap="round"
                                                                    stroke-linejoin="round"
                                                                    class="feather feather-edit font-small-4">
                                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                </path>
                                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                </path>
                                                            </svg>
                                                            Update Status</a>
                                                            
                                                        @endif
                                                     

                                                        @if (\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))

                                                            <a href="javascript:;" class="dropdown-item"
                                                               data-toggle="modal"
                                                               data-target="#archive-order"
                                                               onclick="archive_order({{$o->id}}) ">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     width="24"
                                                                     height="24"
                                                                     viewBox="0 0 24 24" fill="none"
                                                                     stroke="currentColor"
                                                                     stroke-width="2" stroke-linecap="round"
                                                                     stroke-linejoin="round"
                                                                     class="feather feather-archive font-small-4 mr-50">
                                                                    <polyline
                                                                            points="21 8 21 21 3 21 3 8"></polyline>
                                                                    <rect x="1" y="3" width="22"
                                                                          height="5"></rect>
                                                                    <line x1="10" y1="12" x2="14"
                                                                          y2="12"></line>
                                                                </svg>
                                                                Archive
                                                            </a>
                                                        @endif
                                                        {{-- <a href="javascript:;" class="dropdown-item delete-record">
                                                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                  viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                  stroke-width="2" stroke-linecap="round"
                                                                  stroke-linejoin="round"
                                                                  class="feather feather-trash-2 font-small-4 mr-50">
                                                                 <polyline points="3 6 5 6 21 6"></polyline>
                                                                 <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                 </path>
                                                                 <line x1="10" y1="11" x2="10" y2="17">
                                                                 </line>
                                                                 <line x1="14" y1="11" x2="14" y2="17"></line>
                                                             </svg>
                                                             Delete</a>--}}
                                                    </div>
                                                </div>

                                                @if ($o->show == true)

                                                    @if ($o->last_status=='en_p' ||$o->last_status=='En préparation'  )
                                                        <a href="https://yalidine.com/app/bordereau.php?tracking={{$o->yal_tracking}}"
                                                           class="btn btn-outline-success">
                                                            <i data-feather="printer"></i> Print
                                                        </a>
                                                    @else
                                                        <a href="javascript:;"
                                                           class="btn btn-primary btn-sm"
                                                           data-toggle="modal"
                                                           data-target="#status_modal"
                                                           onclick="ChangeStatusForm({{$o->id}},'{{$o->last_status}}')">
                                                            <i class="fas fa-truck"></i> Status
                                                        </a>
                                                    @endif
                                                @else
                                                    /
                                                @endif
                                                @include('orders::modal.assign')

                                            </td>
                                            @endif
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                            <div class="text-right">
                                <div style="float: right">
                                    {{$orders->links()}}
                                </div>
                                
                            
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- Modal to add new record -->
                {{--  <div class="modal modal-slide-in fade" id="new-order-insert">
                     <div class="modal-dialog sidebar-sm">
                         <form class="add-new-record modal-content pt-0" action="{{route('order.store')}}" method="POST">
                             @csrf
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                             <div class="modal-header mb-1">
                                 <h5 class="modal-title" id="exampleModalLabel">New Order</h5>
                             </div>
                             <div class="modal-body flex-grow-1">
                                 <div class="form-group">
                                     <label class="form-label" for="basic-icon-default-name">Name</label>
                                     <input
                                             type="text"
                                             class="form-control dt-full-name"
                                             id="basic-icon-default-name"
                                             name="name"
                                             placeholder="name"
                                             aria-label="name"
                                     />
                                 </div>
                                 <div class="form-group">
                                     <label class="form-label" for="basic-icon-default-post">Phone</label>
                                     <input
                                             type="number"
                                             id="basic-icon-default-post"
                                             class="form-control dt-post"
                                             name="phone"
                                             placeholder="phone"
                                             aria-label="phone"
                                     />
                                 </div>

                                 <div class="form-group">
                                     <label class="form-label" for="basic-icon-default-post">Address</label>
                                     <input
                                             type="text"
                                             id="basic-icon-default-post"
                                             class="form-control dt-post"
                                             name="address"
                                             placeholder="address"
                                             aria-label="address"
                                     />
                                 </div>

                                 <div class="form-group">
                                     <label class="form-label" for="basic-icon-default-post">Wilaya</label>
                                     <input
                                             type="text"
                                             id="basic-icon-default-post"
                                             class="form-control dt-post"
                                             name="wilaya"
                                             placeholder="wilaya"
                                             aria-label="wilaya"
                                     />
                                 </div>

                                 <div class="form-group ">
                                     <input type="hidden" name="product_count" id="product_count">
                                     <label class="form-label" for="div-products">Products</label>
                                     <div class="demo-inline-spacing" id="div-products">


                                     </div>
                                     <button class="btn btn-success btn-sm mt-2"
                                             onclick="add_product()" type="button"> add
                                     </button>
                                     <button class="btn btn-warning btn-sm mt-2"
                                             onclick="delete_product()" type="button"> delete
                                     </button>

                                 </div>



                                  <div class="form-group">
                                      <label class="form-label" for="basic-icon-default-long-desc">long description</label>
                                      <textarea  class="form-control dt-post" name="long_description" id="basic-icon-default-long-desc" cols="30" rows="10"></textarea>

                                    </div>

                                 <button type="submit" class="btn btn-primary data-submit mr-1">Submit</button>
                                 <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel
                                 </button>
                             </div>
                         </form>
                     </div>
                 </div> --}}
            </section>
            {{--   <div class="card-footer">

                   <div class="dt-buttons btn-group flex-wrap">
                       <a href="{{route('order.create')}}" class="btn add-new btn-primary mt-50">
                           <span>Add Order</span></a>
                   </div>
               </div>--}}
        </div>
    </div>
    <!--/ Kick start -->
    @include('orders::modal.edit')
    @if ($is_all == true)
        @include('orders::modal.change_status_all')
    @else
        @include('orders::modal.change_status_modal')
    @endif

    @include('orders::modal.edit-all-status')
    @include('orders::modal.confirm')
    @include('orders::modal.show_note')
    @include('orders::modal.archive')
   
    

    {{-- Bulk --}}
    @if (Auth::user()->hasRole('admin'))
            @include('orders::modal.bulk.assign')
            @include('orders::modal.bulk.archive') 
    @endif
 

    @include('orders::modal.bulk.en_p')
    
    @include('orders::modal.bulk.cancel')

   

    @push('js')



        <script>

            function archive_order(id) {

                var url_archive_order = '{{ route("order.delete",":id") }}';

                url_archive_order = url_archive_order.replace(':id', id);

                $('#archive_order_form').attr('action', url_archive_order);
            }

            function ShowNote(id) {
                $('#comment-show').text($('#hidden-comment'+id).text())

            }

            function EditStatusAll(id){

                var url_u_order = '{{ route("order.status_all.update",":id") }}';

                    url_u_order = url_u_order.replace(':id', id);

                    $('#form-status-all-edit').attr('action', url_u_order);

            }

        </script>

        <script>

            function ChangeStatusForm(id, status) {

                var is_all = {!! json_encode($is_all) !!};

                var cancel = $('#cancel_id');
                var confirmed1 = $('#confirmed1');
                var confirmed2 = $('#confirmed2');
                var pendingc = $('#pending_c');
                var pendings = $('#pending_s');
                var na1 = $('#na1');
                var na2 = $('#na2');
                var AttConfNa1 = $('#AttConfNa1');
                var AttConfNa2 = $('#AttConfNa2');
                var Conf1Na1 = $('#Conf1Na1');
                var Conf1Na2 = $('#Conf1Na2');
                var AttShippNa1 = $('#AttShippNa1');
                var AttShippNa2 = $('#AttShippNa2');
                var enp = $('#en_p');
                var rs = $('#rs');


                cancel.hide();
                confirmed1.hide();
                confirmed2.hide();
                pendingc.hide();
                pendings.hide();
                na1.hide();
                na2.hide();
                AttConfNa1.hide();
                AttConfNa2.hide();
                Conf1Na1.hide();
                Conf1Na2.hide();
                AttShippNa1.hide();
                AttShippNa2.hide();
                enp.hide();
                rs.hide();


                // show buttons in all
                if (is_all == true) {

                    if (status != "en_p") {
                        cancel.show();
                    }
                    if (status == "new" || status == 'pending_c' || status == 'na1' || status == 'na2' || status == 'AttConfNa1' || status == 'AttConfNa2') {
                        confirmed1.show();
                    }
                    if (status == "confirmed1" || status == 'Conf1Na1' || status == 'Conf1Na2') {
                        confirmed2.show();
                    }
                    if (status == "new" || status == 'na1' || status == 'na2') {
                        pendingc.show();
                    }
                    if (status == "confirmed2" ) {
                        pendings.show();
                    }
                    if (status == "new" ) {
                        na1.show();
                    }
                    if (status == 'na1') {
                        na2.show();
                    }
                    if (status == 'pending_c') {
                        AttConfNa1.show();
                    }
                    if (status == 'AttConfNa1') {
                        AttConfNa2.show();
                    }
                    if (status == 'confirmed1') {
                        Conf1Na1.show();
                    }
                    if (status == 'Conf1Na1') {
                        Conf1Na2.show();
                    }
                    if (status == 'pending_s') {
                        AttShippNa1.show();
                    }
                    if (status == 'AttShippNa1') {
                        AttShippNa2.show();
                    }
                    if (status == "confirmed2" || status == 'pending_s' || status == 'AttShippNa1'  || status == 'AttShippNa2') {
                        enp.show();
                    }
                    if (status == "en_p") {
                        rs.show();
                    }

                }


                var id = id;

                var url_has_opend = '{{ route("order.open_details_edit",":id") }}';

                url_has_opend = url_has_opend.replace(':id', id);

                $.ajax({
                    url: url_has_opend,
                    type: 'POST', dataType: 'json',
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },
                    data: {
                        operation: 'Change Status',
                    },

                    error: function (error) {

                    },
                    success: function (data) {
                    }
                });


                var method = 'EditGetDataConfirm(:id,this.id)';
                method = method.replace(':id', id);

                $('#confirmed_1').attr('onclick', method);
                $('#confirmed_2').attr('onclick', method);

                var id = id;

                var url_change = '{{ route("order.change_status",":id") }}';

                url_change = url_change.replace(':id', id);

                $('#form-change-status').attr('action', url_change);
                $('#form-change-status-na').attr('action', url_change);
                $('#form-change-status-pending').attr('action', url_change);


            }


            function EditGetData(id) {


                var id = id;

                var url_has_opend = '{{ route("order.open_details_edit",":id") }}';

                url_has_opend = url_has_opend.replace(':id', id);

                $.ajax({
                    url: url_has_opend,
                    type: 'POST', dataType: 'json',
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },
                    data: {
                        operation: 'Edit',
                    },

                    error: function (error) {

                    },
                    success: function (data) {
                    }
                });

                var id = id;

                var url_update = '{{ route("api.get_order_products",":id") }}/?api_key=4IZQ35oGAmeLUtuxMNa72mlzJebc38SaEUhDq1EaqZa';

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

                        $('#submit_edit').attr('onclick', 'update_order(' + id + ')');

                        var data = data.data;

                        var name = $('#name').val(data.name);
                        var phone = $('#phone').val(data.phone);
                        /*  var store_id = $('#store_id').val(); */
                        var wilaya = $('#wilaya').val(data.wilaya);
                        /*  var id_mairie = $('#mairie_id').val(); */
                        var discount = $('#discount').val(data.discount);
                        var delivery_price = $('#delivery_price').val(data.delivery_price);
                        var address = $('#address').text(data.address);
                        var comment = $('#comment').text(data.comments);
                        var subt_total = $('#sub-total').val(data.sub_total);
                        var total = $('#total').val(data.total);


                        $('#store_id').empty();
                        $('#mairie_id').empty();

                        $('#store_id').append(' <option disabled="true" value="" selected>Choose store</option>');
                        $('#mairie_id').append(' <option disabled="true" value="" selected>Choose mairie</option>');


                        if (data.store_id != null) {

                            var store_id = data.store_id;
                            var store_name = data.store.name;

                            $('#store_id').append('<option value="' + store_id + '" selected>' + store_name + '</option>');

                        }

                        if (data.id_mairie) {

                            var id_mairie = data.id_mairie;
                            var mairie_name = data.mairie.name;
                            var yalidine_wilaya_name = data.mairie.yalidine_wilaya.name;


                            $('#mairie_id').append('<option value="' + id_mairie + '" selected>' + mairie_name + '-' + yalidine_wilaya_name + '</option>');

                            $('#wilaya').val(yalidine_wilaya_name);
                            $('#wilaya').attr('readonly', true);


                        }


                        var table = $("#orders_table_edit tbody");


                        table.empty();

                        $.each(data.order_products, function (idx, elem) {
                            table.append(" <tr><td>" + elem.id + "</td><td>" +'('+elem.product.num+')'+ elem.product.name + "</td><td>"+elem.quantity+"</td> <td>" + elem.price + "</td>  <td>" + elem.price * elem.quantity + "</td></tr>");
                        });
                    }
                });


            }


        </script>


            @php

            
                $is_admin = Auth::user()->hasRole('admin');
                $is_packaging = Auth::user()->hasRole('packaging');
                
            @endphp


         @if ($is_admin)
               @include('orders::datatable.admin');
         @elseif ($is_packaging)
               @include('orders::datatable.packaging');
         @else 
                 @include('orders::datatable.operator');
         @endif


        <script>
            var items_wilaya = [];
            let i = 0;

          /*   function add_product() {
                i++;
                input = jQuery('<input name="product_' + i + '" id="product_' + i + '" placeholder="product ' + i + '"  required class="form-control col-3">  ');
                input_qty = jQuery('<input type="number" name="product_qty' + i + '" id="product_' + i + '" placeholder="product ' + i + '"  required class="form-control col-3">  ');
                input_price = jQuery('<input name="product_price' + i + '" id="product_' + i + '" placeholder="product ' + i + '"  required class="form-control col-3 ">  ');
                let divProducts = $('#div-products')
                divProducts.append(input);
                divProducts.append(input_qty);
                divProducts.append(input_price);

                $('#product_count').val(i);
            }
 */
            function delete_product() {
                jQuery('#product_' + i + '').remove();
                if (i > 0)
                    i--;

                $('#product_count').val(i);
            }


            let ajaxSelectStoreEdit = {
                url: '{{route('api.stores')}}',
                processResults: procResStores
            };

            $('#store_id').select2({
                theme: 'bootstrap4',
                ajax: ajaxSelectStoreEdit
            });

            /* change wilaya */
            $(document).ready(function () {
                $('#mairie_id').on('change', function (e) {

                    var id = $('#mairie_id').text().split('-');

                    $('#wilaya').val(id[1]);
                    $('#wilaya').attr('readonly', true);

                });
            });

            $('#mairie_id').select2({
                placeholder: "Start typing ...",
                theme: 'bootstrap4',
                ajax: {
                    url: '{{route('api.mairies')}}',
                    dataType: 'json',
                    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    },

                }
            });

            function procResStores(data) {
                // Transforms the top-level key of the response object from 'items' to 'results'
                let items = [];
                for (let z = 0; z < data.data.length; z++) {
                    let store = data.data[z];
                    items.push({
                        id: store.id,
                        text: store.name
                    });
                }
                return {results: items};
            }

            let ajaxSelectMairie = {
                url: '{{route('api.mairies')}}',
                processResults: procResMairie
            };


            function procResMairie(data) {
                // Transforms the top-level key of the response object from 'items' to 'results'
                let items = [];
                for (let x = 0; x < data.data.length; x++) {
                    let mairie = data.data[x];
                    items.push({
                        id: mairie.id,
                        text: mairie.yalidine_wilaya.name + '-' + mairie.name
                    });

                    items_wilaya.push({
                        id: mairie.id,
                        text: mairie.yalidine_wilaya.name
                    });
                }
                return {results: items};
            }

            /*  prevent double submit */
        </script>



        {{--  bulk action  --}}

        <script>
              function check_all(){
                    $('input[class="item_checkbox"]:checkbox').each(function(){
                        if( $('input[class="check_all"]:checkbox:checked').length == 0){
                            $(this).prop('checked',false);
                        }else{
                            $(this).prop('checked',true);
                        }
                    })
                } 

                var array= [];

                $(document).ready(function () {

                   
                    $('#assign_bulk').on('click',function(){

                       
                    

                            var item_checked= $('.item_checkbox').filter(":checked").length;

                                if(item_checked > 0 )
                                {
                                    $('.record_count').text(item_checked);
                                    $('.empty_record').hide();
                                    $('.not_empty_record').show();
                                   /*  $('.orders_list').val($('.item_checkbox').filter(":checked").val()); */

                                    $('.item_checkbox').filter(":checked").each(function(){
                                              array.push($(this).val());
                                    });

                                    $('.orders_list').val(array);
                                }else{
                                    $('.record_count').text('');
                                    $('.empty_record').show();
                                    $('.not_empty_record').hide();
                                }
                                $('#mutlipleAssign').modal('show');

                            });

                    });


                     $(document).ready(function () {

                   
                       $('#en_p_bulk').on('click',function(){

                   

                            var item_checked= $('.item_checkbox').filter(":checked").length;

                                if(item_checked > 0 )
                                {
                                    $('.record_count').text(item_checked);
                                    $('.empty_record').hide();
                                    $('.not_empty_record').show();

                                    $('.item_checkbox').filter(":checked").each(function(){
                                              array.push($(this).val());
                                    });

                                    $('.orders_list').val(array);
                                }else{
                                    $('.record_count').text('');
                                    $('.empty_record').show();
                                    $('.not_empty_record').hide();
                                }
                                $('#mutlipleen_p').modal('show');

                            });

                    });

                    

                     $(document).ready(function () {

                   
                       $('#cancel_bulk').on('click',function(){

                   

                            var item_checked= $('.item_checkbox').filter(":checked").length;

                                if(item_checked > 0 )
                                {
                                    $('.record_count').text(item_checked);
                                    $('.empty_record').hide();
                                    $('.not_empty_record').show();

                                    $('.item_checkbox').filter(":checked").each(function(){
                                              array.push($(this).val());
                                    });

                                    $('.orders_list').val(array);
                               
                                }else{
                                    $('.record_count').text('');
                                    $('.empty_record').show();
                                    $('.not_empty_record').hide();
                                }
                                $('#mutlipleCancel').modal('show');

                            });

                    });



                     $(document).ready(function () {

                   
                       $('#archive_bulk').on('click',function(){

                  

                            var item_checked= $('.item_checkbox').filter(":checked").length;

                                if(item_checked > 0 )
                                {
                                    $('.record_count').text(item_checked);
                                    $('.empty_record').hide();
                                    $('.not_empty_record').show();

                                    $('.item_checkbox').filter(":checked").each(function(){
                                              array.push($(this).val());
                                    });

                                    $('.orders_list').val(array);
                                }else{
                                    $('.record_count').text('');
                                    $('.empty_record').show();
                                    $('.not_empty_record').hide();
                                }
                                $('#mutlipleArchive').modal('show');

                            });

                    });
                
                        
     
              
        </script>



    @endpush
@endsection
