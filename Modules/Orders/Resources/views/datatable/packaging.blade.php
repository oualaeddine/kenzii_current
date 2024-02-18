<script>

    $(document).ready(function () {

        //    $('body').addClass('menu-collapsed')




        $('#orders_table').DataTable({
            dom: 'Blfrtip',
            responsive: true,
            "bPaginate": false,
            "bSorting": false,
            columnDefs: [
                {responsivePriority: 1, targets: 2},
                {responsivePriority: 2, targets: -1},
                { targets: 'no-sort', orderable: false }  
            ]
        });


    });

</script>