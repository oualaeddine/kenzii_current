@extends('layouts/contentLayoutMaster')


@section('title',' Visitors')





@section('content')


<div class="row">

    <div class="col-md-8">

        <!-- Kick start -->
        <div class="card " >
            <div class="card-body">
                <!-- Basic table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <table class="datatables-basic table nowrap" id="visitors_table">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>#</th>
                                        <th>Host</th>
                                        <th>Source</th>
                                        <th>Store</th>
                                        <th>Product</th>
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
        
    
    <div class="col-md-4">

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-all" aria-selected="true">All</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-visited-tab" data-toggle="pill" href="#pills-visited" role="tab" aria-controls="pills-visited" aria-selected="false">Visited</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-shipped-tab" data-toggle="pill" href="#pills-shipped" role="tab" aria-controls="pills-shipped" aria-selected="false">Shipped</a>
            </li>

            <li class="nav-item " role="presentation">
                <a class="nav-link " id="pills-n-confirmed-tab" data-toggle="pill" href="#pills-n-confirmed" role="tab" aria-controls="pills-n-confirmed" aria-selected="false">Canceled</a>
            </li>

           
          </ul>

          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">@include('orders::visitors.tabs.all')</div>
            <div class="tab-pane fade" id="pills-visited" role="tabpanel" aria-labelledby="pills-visited-tab">@include('orders::visitors.tabs.visited')</div>
            <div class="tab-pane fade" id="pills-shipped" role="tabpanel" aria-labelledby="pills-shipped-tab">@include('orders::visitors.tabs.shipped')</div>
            <div class="tab-pane fade" id="pills-n-confirmed" role="tabpanel" aria-labelledby="pills-n-confirmed-tab">@include('orders::visitors.tabs.not_confirmed')</div>
          </div>



           

    </div>
        
    

</div>


    @push('js')


    <script>

   $('#visitors_table').DataTable({
        responsive: true,
        "lengthMenu": [[10,25, 50, -1], [10,25, 50, "All"]],
           dom: 'Blfrtip',
           processing: true,
           serverSide: true,
           ajax:{
               url : '/admin/visitors',
           },
           columns: [
              
               {data: '#', className: '#'},
               {data: 'id', className: 'id'},
               {data: 'host', className: 'host'},
               {data: 'tsrc', className: 'tsrc'},
               {data: 'store_name', className: 'store_name'},
               {data: 'product_name', className: 'product_name'},
               {data: 'order_id', className: 'order_id'},
               {data: 'created_at', className: 'created_at'}, 
              
               ],
            columnDefs: [
                {responsivePriority: 1, targets: 0},
                {responsivePriority: 2, targets: -1}
            ]

    });

    </script>

     <script>

         $('#stat_visitor_table').DataTable({
        responsive: true,
        "lengthMenu": [[10,25, 50, -1], [10,25, 50, "All"]],
           dom: 'Blfrtip',
           processing: true,
           serverSide: true,
           ajax:{
               url : '/admin/visitors/stats/all',
           },
           columns: [
 
               {data: 'tsrc', className: 'tsrc'},
               {data: 'total', className: 'total'},
               ],
            columnDefs: [
                {responsivePriority: 1, targets: 0},
                {responsivePriority: 2, targets: -1}
            ]

        });

    </script>


     <script>

         $('#stat_visitor_table_shipped').DataTable({
        responsive: true,
        "lengthMenu": [[10,25, 50, -1], [10,25, 50, "All"]],
           dom: 'Blfrtip',
           processing: true,
           serverSide: true,
           ajax:{
               url : '/admin/visitors/stats/shipped',
           },
           columns: [
 
               {data: 'tsrc', className: 'tsrc'},
               {data: 'total', className: 'total'},
               ],
            columnDefs: [
                {responsivePriority: 1, targets: 0},
                {responsivePriority: 2, targets: -1}
            ]

        });

    </script>


    <script>

         $('#stat_visitor_table_not_ordered').DataTable({
        responsive: true,
        "lengthMenu": [[10,25, 50, -1], [10,25, 50, "All"]],
           dom: 'Blfrtip',
           processing: true,
           serverSide: true,
           ajax:{
               url : '/admin/visitors/stats/not_ordered',
           },
           columns: [
 
               {data: 'tsrc', className: 'tsrc'},
               {data: 'total', className: 'total'},
               ],
            columnDefs: [
                {responsivePriority: 1, targets: 0},
                {responsivePriority: 2, targets: -1}
            ]

        });

    </script>




    <script>

         $('#stat_visitor_table_not_confirmed').DataTable({
        responsive: true,
        "lengthMenu": [[10,25, 50, -1], [10,25, 50, "All"]],
           dom: 'Blfrtip',
           processing: true,
           serverSide: true,
           ajax:{
               url : '/admin/visitors/stats/not_confirmed',
           },
           columns: [
 
               {data: 'tsrc', className: 'tsrc'},
               {data: 'total', className: 'total'},
               ],
            columnDefs: [
                {responsivePriority: 1, targets: 0},
                {responsivePriority: 2, targets: -1}
            ]

        });

    </script>


 

    @endpush

@endsection
