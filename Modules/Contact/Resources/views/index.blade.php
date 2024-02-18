@extends('layouts/contentLayoutMaster')

@section('title', 'Contacts')

@section('breadcrumbs')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Contact</li>

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
            <h4 class="card-title">Contacts 🚀</h4>
    
        </div>
        <div class="card-body">
            <!-- Basic table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <table class="datatables-basic table" id="contact_table">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Contact</th>
                                    <th>Phone Number</th>
                                    <th>Comment</th>
                                    <th>Is Done</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <th>{{$contact->id}}</th>
                                        <th>{{$contact->name}}</th>
                                        <th>{{$contact->phone}}</th>                                    
                                        <th>{{$contact->comment}}</th> 
                                        <th>
                                            @if ($contact->is_done == 0)

                                            <h3>

                                                <span class="badge badge-danger">No </span>

                                                <a href="javascript:;" class="item-edit" data-toggle="modal"
                                                data-target="#change-status-contact" onclick="StatusEdit({{$contact->id}})">
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

                                            </h3>

                                            @else
                                            <h3>
                                                <span class="badge badge-success">Yes</span>
                                                <a href="javascript:;" class="item-edit" data-toggle="modal"
                                                data-target="#change-status-contact" onclick="StatusEdit({{$contact->id}})">
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

                                            </h3>

                                            @endif
                                        </th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div class="text-right">
                                <div style="float: right">
                                    {{$contacts->links()}}
                                </div>
                                
                            
                            </div>

                        </div>
                    </div>
                </div>


            </section>
        </div>
    </div>
    <!--/ Kick start -->


    <div class="modal fade modal-info text-left" id="change-status-contact" tabindex="-1"
        aria-labelledby="myModalLabel120" aria-hidden="true" style="display: none;">
       <div class="modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="myModalLabel120">Edit Contact</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">×</span>
                   </button>
               </div>
   
               <form action="" method="post" id="form-change-is-done">
                   @csrf
   
                   <div class="modal-body">

                    
                    <div class="form-group demo-inline-spacing">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" name="is_done" id="is_done" value="1" />
                          <label class="form-check-label" for="is_done">is done</label>
                        </div>

                      </div>
                      

                    <div class="form-group">
                        <label class="form-label" for="comment">Comment</label>
                         <textarea name="comment" id="comment" class="form-control" cols="30" rows="5"></textarea>
                    </div>



                   </div>

                   <div class="modal-footer">
                       <button type="submit" class="btn btn-success waves-effect waves-float waves-light">Accept</button>
                   </div>
               </form>
           </div>
       </div>
   </div>




    @push('js')
        <script>

            function StatusEdit(id){

                var url_change_edit_form = '{{ route("contact.update",":id") }}';

                url_change_edit_form  =  url_change_edit_form .replace(':id', id);

                $('#form-change-is-done').attr('action',url_change_edit_form );


                 var url_change_edit= '{{ route("contact.edit",":id") }}';

                 url_change_edit =  url_change_edit.replace(':id', id);

                 
                $.ajax({
                    url: url_change_edit,
                    type: 'GET', dataType: 'json',
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },

                    error: function (error) {
                        toastr.error("Something went wrong , try again please !");
                    },
                    success: function (data) {

                        var data = data.data;
                        if(data.is_done == 1){
                            $('#is_done').prop('checked', true);
                        }

                        $('#comment').text(data.comment);

                    }
                });



            }

            $(document).ready(function () {
                $('#contact_table').DataTable({
                    dom: 'Blfrtip',
                    responsive: true,
                    "bPaginate": false,
                    "bSorting": false,
                });

            });
        </script>

    @endpush
@endsection
