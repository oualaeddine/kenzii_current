
<script>

    $(document).ready(function () {

        //    $('body').addClass('menu-collapsed')
        var status = '{{$status}}';


      if(status == 'confirmed2'){

        $('#orders_table').DataTable({
            dom: 'Blfrtip',
            responsive: true,
            "bPaginate": false,
            "bSorting": false,

            buttons: [
                {className : 'btn btn-success mr-1 shadow',attr : {id : 'assign_bulk'} ,text : 'Assign',action: function ( e, dt, node, config ) {
                }},
                {className : 'btn btn-warning mr-1 shadow',attr : {id : 'archive_bulk'} ,text : 'Archive',action: function ( e, dt, node, config ) {
                }},
                {className : 'btn btn-dark mr-1 shadow',attr : {id : 'en_p_bulk'} ,text : 'En préparation',action: function ( e, dt, node, config ) {
                }},
                {className : 'btn btn-danger mr-1 shadow',attr : {id : 'cancel_bulk'} ,text : 'Cancel',action: function ( e, dt, node, config ) {
                }},
                {extend: 'print', className: 'btn btn-primary shadow-sm rounded mr-1 ',text: '<i class="fa fa-print"></i>' },
                {extend: 'csv', className: 'btn btn-info shadow-sm rounded mr-1 ', text: '<i class="fa fa-file"></i> CSV' },
                {extend: 'excel', className: 'btn btn-success shadow-sm rounded mr-1', text: '<i class="fa fa-file"></i> Excel'},
                {extend: 'pdf', className: 'btn btn-danger shadow-sm rounded mr-1 ', text: '<i class="fa fa-file"></i> PDf'},
            
            ],
            columnDefs: [
                {responsivePriority: 1, targets: 2},
                {responsivePriority: 2, targets: -1},
                { targets: 'no-sort', orderable: false }  
            ]
        });

        

      }else{


        $('#orders_table').DataTable({
            dom: 'Blfrtip',
            responsive: true,
            "bPaginate": false,
            "bSorting": false,

            buttons: [
                {className : 'btn btn-success mr-1 shadow',attr : {id : 'assign_bulk'} ,text : 'Assign',action: function ( e, dt, node, config ) {
                }},
                {className : 'btn btn-warning mr-1 shadow',attr : {id : 'archive_bulk'} ,text : 'Archive',action: function ( e, dt, node, config ) {
                }},
                {className : 'btn btn-danger mr-1 shadow',attr : {id : 'cancel_bulk'} ,text : 'Cancel',action: function ( e, dt, node, config ) {
                }},
                {extend: 'print', className: 'btn btn-primary shadow-sm rounded mr-1 ',text: '<i class="fa fa-print"></i>' },
                {extend: 'csv', className: 'btn btn-info shadow-sm rounded mr-1 ', text: '<i class="fa fa-file"></i> CSV' },
                {extend: 'excel', className: 'btn btn-success shadow-sm rounded mr-1', text: '<i class="fa fa-file"></i> Excel'},
                {extend: 'pdf', className: 'btn btn-danger shadow-sm rounded mr-1 ', text: '<i class="fa fa-file"></i> PDf'},
            
            ],
            columnDefs: [
                {responsivePriority: 1, targets: 2},
                {responsivePriority: 2, targets: -1},
                { targets: 'no-sort', orderable: false }  
            ]
        });


      }

       


    });

</script>