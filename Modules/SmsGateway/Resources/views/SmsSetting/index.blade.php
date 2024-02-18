@extends('layouts/contentLayoutMaster')


@section('title','Sms Settings')

@section('content')

<div class="row">

    <div class="col-md-12">

        <!-- Kick start -->
        <div class="card " >
            <div class="card-body">
                <!-- Basic table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12" >
                            <div class="card">
                                <table class="datatables-basic table nowrap" id="sms_settings_table">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>#</th>
                                        <th class="text-right">Sms</th>
                                        <th>Status</th>
                                        <th>Is Active</th>
                                        <th>Created at</th>
                                        <th>Actions</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                  
                                    </tbody>
                                </table>
                            
                                
                            </div>
                        </div>
                    </div>
                  
                </section>
    
            </div>
        </div>
        <!--/ Kick start -->

    </div>

        
    

</div>


    @push('js')


    <script>

   $('#sms_settings_table').DataTable({
        responsive: true,
        "lengthMenu": [[10,25, 50, -1], [10,25, 50, "All"]],
           dom: 'Blfrtip',
           
           processing: true,
           serverSide: true,
           ajax:{
               url : '/admin/sms_settings',
           },
           columns: [
              
               {data: '#', className: '#'},
               {data: 'id', className: 'id'},
               {data: 'text', className: 'text'},
               {data: 'Status', className: 'Status'},
               {data: 'is_active', className: 'is_active'},
               {data: 'created_at', className: 'created_at'}, 
               {data: 'action', className: 'action'}, 
              
               ],
            columnDefs: [
                {responsivePriority: 1, targets: 0},
                {responsivePriority: 2, targets: -1}
            ]

    });

    </script>

    @endpush

@endsection
