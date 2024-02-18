@extends('layouts/contentLayoutMaster')

@section('title', 'Products')

@section('breadcrumbs')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Caisse</li>

        </ol>
    </nav>

@endsection

@section('content')


    <!-- Kick start -->
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Caisse page 🚀</h4>
            <div class="dt-buttons btn-group flex-wrap">
                <button class="btn add-new btn-primary mt-50" tabindex="0" aria-controls="DataTables_Table_0"
                        type="button" data-toggle="modal" data-target="#modals-slide-in-caisse" onclick="AddNewBonAchat()"><span>Add Caisse</span>
                </button>
            </div>


        </div>
        <div class="card-body">
            <!-- Basic table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <table class="datatables-basic table" id="caisses_table">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>User Name</th>
                                    <th>Person Name</th>
                                    <th>Description</th>
                                    <th>montant</th>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($caisses as $caisse)
                                    <tr>

                                        <th>{{$caisse->id}}</th>
                                        <th>{{$caisse->user->name}}</th>
                                        @if ($caisse->person != null)
                                        <th>{{$caisse->person->name}}</th>
                                        @else
                                        <th><span class="badge badge-info">none</span> </th>
                                        @endif
                                        
                                        <th>{{$caisse->description}}</th>
                                        <th>{{$caisse->montant}}</th>
                                        <th>{{$caisse->date}}</th>
                                        <th>{{$caisse->type}}</th>

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


                                                    <a href="javascript:;" class="dropdown-item" data-toggle="modal" onclick="CaisseDelete({{$caisse->id}})"
                                                       data-target="#archive-caisse">
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
                                               data-target="#modals-slide-in-caisse" onclick="CaisseEdit({{$caisse->id}})">
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

                @include('caisse::modals.archive')
                @include('caisse::modals.create-edit')


           
            </section>
        </div>
    </div>
    <!--/ Kick start -->




    @push('js')

    
        <script>

               function AddNewBonAchat(){

                var url_store_caisse = '{{ route("caisse.store") }}';

                $('#caisse-form').attr('action',url_store_caisse);

                }

                function CaisseDelete(id){

                var id = id;

                var url_delete_caisse = '{{ route("caisse.delete",":id") }}';

                url_delete_caisse = url_delete_caisse .replace(':id', id);


                $('#form-archive-caisse').attr('action',url_delete_caisse);

                }


                function CaisseEdit(id){

                var id = id;

                var url_update_caisse = '{{ route("caisse.update",":id") }}';

                url_update_caisse = url_update_caisse .replace(':id', id);

                $('#caisse-form').attr('action',url_update_caisse);
                $('#caisse-form').append('@method("PUT")');


                $('#TitleModalCaisse').text("Edit Caisse");
                $('#btn_submit_caisse').text("Save Changes");


                var url_update = '{{ route("caisse.edit",":id") }}';

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

                        console.log(data.data);
                    
                        var data = data.data;
                        $('#montant').val(data.montant);
                        $('#description').text(data.description);
                        $('#date-caisse').val(data.date);


                        if (data.type != null) {

                            var type = data.type;
                           /*  var type = data.type; */

                            $('#type').append('<option value="' + type + '" selected>' + type + '</option>');

                        }

                           if (data.person_id != null) {

                            var person_id = data.person_id;
                            var person_name = data.person.name;

                            $('#person_id').append('<option value="' + person_id + '" selected>' + person_name + '</option>');

                        }

                    }
                });
            }

            $(document).ready(function () {
                $('#caisses_table').DataTable();
            });
        </script>
    @endpush
@endsection
