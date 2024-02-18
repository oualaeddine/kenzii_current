@extends('layouts/contentLayoutMaster')


@section('title','Sms History')

@section('content')

<div class="row">

    <div class="col-md-12">

        <!-- Kick start -->
        <div class="card " >
            <div class="card-body">
                <!-- Basic table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <table class="datatables-basic table nowrap" id="sms_table">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>#</th>
                                        <th>Phone</th>
                                        <th>Sms</th>
                                        <th>Status</th>
                                        <th>Order</th>
                                        <th>Created at</th>
    
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

   $('#sms_table').DataTable({
        responsive: true,
        "lengthMenu": [[10,25, 50, -1], [10,25, 50, "All"]],
           dom: 'Blfrtip',
           processing: true,
           serverSide: true,
           ajax:{
               url : '/admin/smsgateway',
           },
           columns: [
              
               {data: '#', className: '#'},
               {data: 'id', className: 'id'},
               {data: 'phone', className: 'phone'},
               {data: 'sms', className: 'sms'},
               {data: 'Status', className: 'Status'},
               {data: 'order_id', className: 'order_id'},
               {data: 'created_at', className: 'created_at'}, 
              
               ],
            columnDefs: [
                {responsivePriority: 1, targets: 4},
                {responsivePriority: 2, targets: 5}
            ]

    });

    </script>

    @endpush

@endsection
