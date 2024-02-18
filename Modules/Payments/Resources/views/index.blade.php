@extends('layouts/contentLayoutMaster')

@section('title', 'Payments')

{{-- @section('breadcrumbs')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Stores</li>
            <li class="breadcrumb-item">Store details</li>
        </ol>
    </nav>

@endsection --}}

@section('content')


   <div class="row">

    <div class="col-md-12">

        <div class="card">
        
            <div class="card-header">
                <h4 class="card-title">Payments List 🚀</h4>
                <div class="">
                    <button class="btn add-new btn-primary" type="button" data-toggle="modal"
                            data-target="#modal-add-payment"><span>Add New Payment</span></button>
                </div>
            </div>
            <div class="card-body">
    
                <!-- Basic table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <table class="datatables-basic table" id="payments">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th class="text-center">Operator</th>
                                        <th class="text-center">Employee</th>
                                        <th class="text-center">Amount</th>
                                        <th class="text-center">Pay Date</th>
                                        <th class="text-center">Date Due</th>
                                        <th class="text-center">Created_at</th>
                                        <th class="text-center">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                  {{--   @foreach ($products as $product)
                                        <tr>
                                            <td></td>
                                            <td class="text-center">{{$product->product->num}}</td>
                                            <td class="text-center">{{$product->product->name}}</td>
                                            <td class="text-center">{{$product->price}}</td>
                                            <td class="text-center">{{\Carbon\Carbon::parse($product->created_at)->format('Y-m-d')}}</td>
                                            <td class="text-center">
                                                @include('stores::includes.actions_products')
                                            </td>
                                            <td class="text-center">
                                                @foreach ($product->store_product_category as $item)
                                                       {{$item->category->name}} |
                                                @endforeach
                                               
                                            </td>
                                            <td class="text-center">{{$product->price_txt?? 0}}</td>
                                            <td class="text-center">{{$product->price_old?? 0}}</td>
                                            <td class="text-center">{{$product->discount?? 0}}</td>
                                            <td class="text-center">@if($product->url != null) <span class="badge badge-success">true</span>  @else <span class="badge badge-danger">false</span> @endif</td>
                                            <td class="text-center">@if($product->new== 1) <span class="badge badge-success">true</span>  @else <span class="badge badge-danger">false</span> @endif</td>
                                            <td class="text-center">@if($product->visible== 1)<span class="badge badge-success">true</span> @else <span class="badge badge-danger">false</span> @endif</td>
                                            <td class="text-center">@if($product->featured== 1)<span class="badge badge-success">true</span> @else <span class="badge badge-danger">false</span> @endif</td>

                            
                                        </tr>
                                    @endforeach --}}
                                    </tbody>
                                </table>
                                {{-- {{$products->links()}} --}}
                            </div>
                        </div>
                    </div>
                    <!-- Modal to add new record -->
                    @include('payments::modals.create')
                    @include('payments::modals.edit')
                    @include('payments::modals.delete')
                </section>
            </div>
        </div>


    </div>





   </div>

    <!-- users list start -->
    <!-- users list ends -->
@endsection

@push('js')


<script type="text/javascript">


$(document).ready(function () {
                var pg_nb = '{{$pg_nb}}';

                  if (!$.fn.dataTable.isDataTable('#payments')) {
                    $('#payments').DataTable({
                        "lengthMenu": [[10,25, 50, -1], [10,25, 50, "All"]],
                            dom: 'Blfrtip',
                            stateSave : true,
                            processing: true,
                            serverSide: true,
                            responsive: true,
                            columnDefs: [
                                    {responsivePriority: 1, targets: 0},
                                    {responsivePriority: 2, targets: 6}
                            ],
                            ajax:{
                                url : window.location.href,
                            },
                            columns: [
                                {data: 'empty', name: 'empty'}, 
                                {data: 'user.name', name: 'user.name'}, 
                                {data: 'employee', name: 'employee'}, 
                                {data: 'amount', name: 'amount'},
                                {data: 'pay_date', name: 'pay_date'},
                                {data: 'date_due', name: 'date_due'},
                                {data: 'Created_at', name: 'created_at'},
                                {data: 'Actions', name: 'Actions'},
  
                            ],
                    });
                }

          
            setInterval(() => {
                var table = $('#payments').dataTable();
                table.fnPageChange(parseInt(pg_nb),true);
            }, 5000);
                
            /*     $('#tableInfo').html(
                    'Currently showing page '+(info.page+1)+' of '+info.pages+' pages.'
                ); */

            });


</script>



    <script>


        function DeletePayment(id){

            var id = id;

            var url_delete_payments = '{{ route("payments.delete",":id") }}';

            url_delete_payments = url_delete_payments .replace(':id', id);

            
            $('#form-delete-payments').attr('action', url_delete_payments);
          
        }



        function EditPayment(id){

                /* var table = $('#payments').DataTable();

                var info = table.page.info();
                $('#pg_nb').val(info.page); */
                //**********************************//

                var id = id;

                var url_update_payments = '{{ route("payments.update",":id") }}';

                url_update_payments  = url_update_payments .replace(':id', id);

                $('#form-edit-payments').attr('action', url_update_payments);

                var url_update = '{{ route("payments.edit",":id") }}';

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

                                  $('#employee-edit').val(data.employee);
                                  $('#amount-edit').val(data.amount);
                                  $('#pay_date-edit').val(data.pay_date);
                                  $('#date_due-edit').val(data.date_due);

                    }
                });

        }



    </script>



@endpush
