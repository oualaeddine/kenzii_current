@extends('layouts/contentLayoutMaster')

@section('title', 'Charges')


@section('content')
{{-- 
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
    @endif --}}


    <!-- Kick start -->
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Charges page 🚀</h4>
            <div class="dt-buttons btn-group flex-wrap">
                <button class="btn add-new btn-primary mt-50" tabindex="0" aria-controls="DataTables_Table_0"
                        type="button" data-toggle="modal" data-target="#modals-slide-in"><span>Add Charge</span>
                </button>
            </div>


        </div>
        <div class="card-body">
            <!-- Basic table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <table class="datatables-basic table" id="charges_table">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>id</th>
                                    <th>Date</th>
                                    <th>Ajoutée par</th>
                                    <th>Description</th>
                                    <th>Type</th>
                                    <th>Montant</th>
                                    <th>Produit</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($charges as $charge)
                                    <tr>

                                        <th></th>
                                        <th>{{$charge->id}}</th>
                                        <th>{{$charge->date}}</th>
                                        <th>{{$charge->user->name}}</th>
                                        <th>{{$charge->description}}</th>
                                        <th>{{$charge->type}}</th>
                                        <th>{{$charge->montant}}</th>
                                        <th>{{$charge->produit}}</th>

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
         
                                                    <a href="javascript:;" class="dropdown-item" data-toggle="modal"
                                                       data-target="#archive-charge" onclick="DeleteCharge({{$charge->id}})">
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
                                               data-target="#edit_charge" onclick="EditCharge({{$charge->id}})">
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
                <!-- Modal to add new record -->
                <div class="modal modal-slide-in fade" id="modals-slide-in">
                    <div class="modal-dialog sidebar-sm">
                        <form class="add-new-record modal-content pt-0" action="{{route('charges.store')}}"
                              method="POST">
                            @csrf
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                            <div class="modal-header mb-1">
                                <h5 class="modal-title" id="exampleModalLabel">New Charge</h5>
                            </div>
                            <div class="modal-body flex-grow-1">
                           
                                <div class="row">
                                    <div class="col-12 col-md-12 form-group">
                                      <label for="pd-default">Date</label>
                                      <input type="text" id="pd-default" name="date" class="form-control flatpickr-basic" required placeholder="YYYY-MM-DD" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="basic-icon-default-desc">
                                        description</label>
                                    <textarea class="form-control dt-post" name="description" id="basic-icon-default-desc" required cols="30" rows="5"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="type">
                                        Type</label>
                                        <select name="type" id="type" required class="form-control">
                                            <option value="" disabled="disabled" selected>Choose type</option>
                                            <option value="facebook_ad" >Publicité Facebook</option>
                                            <option value="instagram_ad" >Publicité instagram</option>
                                            <option value="snapchat_ad" >Publicité snapchat</option>
                                            <option value="transport" >Transport</option>
                                            <option value="support" >Support</option>
                                            <option value="emballage" >Emballage</option>
                                            <option value="autre" >Autre...</option>
                                        </select>
                                  
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-12 form-group">
                                      <label for="montant">Montant</label>
                                      <input type="number" min="0" id="montant" name="montant" class="form-control" required placeholder="Montant" />
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-12 col-md-12 form-group">
                                      <label for="produit">Produit</label>
                                      <input type="text" id="produit" name="produit" class="form-control" placeholder="Produit" />
                                    </div>
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

    @include('charges::edit')
    @include('charges::archive')

    @push('js')
        <script>

            $(document).ready(function () {
                $('#charges_table').DataTable();
            });

            function DeleteCharge(id) {

                //charge_edit_form

                var id = id;


                var url_delete_form_charge = '{{ route("charges.delete",":id") }}';

                url_delete_form_charge = url_delete_form_charge.replace(':id', id);

                $('#charge_delete_form').attr('action', url_delete_form_charge);


            }


            
            function EditCharge(id) {

                        //charge_edit_form

                var id = id;

                var url_update_charge = '{{ route("charges.edit",":id") }}';

                url_update_charge = url_update_charge.replace(':id', id);

                var url_update_form_charge = '{{ route("charges.update",":id") }}';

                url_update_form_charge = url_update_form_charge.replace(':id', id);

                $('#charge_edit_form').attr('action', url_update_form_charge);


                $.ajax({
                    url: url_update_charge,
                    type: 'GET', dataType: 'json',
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },

                    error: function (error) {
                        toastr.error("Something went wrong , try again please !");
                    },
                    success: function (data) {


                        var data = data.data;
                        var date = $('#date-edit').val(data.date);
                        var description = $('#desc-edit').val(data.description);
                        /*  var store_id = $('#store_id').val(); */
                        var type = $('#type-edit').val(data.type);
                        /*  var id_mairie = $('#mairie_id').val(); */
                        var montant = $('#montant-edit').val(data.montant);
                        var produit = $('#produit-edit').val(data.produit);

                    }
                });


            }

        </script>
    @endpush
@endsection
