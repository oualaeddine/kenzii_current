
<div class="modal modal-slide-in fade" id="status_modal">
    <div class="modal-dialog sidebar-sm">
        <div class="modal-content pt-0">


            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change status</h5>
            </div>
            <div class="modal-body flex-grow-1 mt-2">

                <div class="form-group">

                    <label class="form-label" for="cancel_id">Cancel Section</label>

                   {{-- @if ($status == "new" || $status == "confirmed1" || $status == 'pending_c' || $status == 'na1' || $status == 'na2' ) --}}
                        <div class="" id="cancel_id" style="display: none" >
                        <button class="btn btn-danger" data-toggle="modal" data-target="#edit-status"
                                onclick="ChangeStatus('canceled')">Canceled
                        </button>
                        </div>
                 {{--   @else
                   <div class="" id="cancel_id">
                    <button class="btn btn-danger disabled">Canceled
                    </button>
                    </div> --}}
                       
                  {{--  @endif --}}
                   

                </div>

                <div class="form-group">

                    <label class="form-label" for="confirm_id">Confirm section</label>

                    <div class="row" id="confirm_id">

                   {{--  @if ($status == "new" || $status == 'pending_c' || $status == 'na1' || $status == 'na2' ) --}}
                      <div class="form-group col-md-6" style="display: none" id="confirmed1">
                        <button class="btn btn-outline-success" data-toggle="modal" data-target="#confirm-order"
                                data-status="confirmed1" id="confirmed_1">Confirmed 1
                        </button>
                      </div>
                 {{--    @else
                    <div class="form-group col-md-6">
                        <button class="btn btn-outline-success disabled">Confirmed 1
                        </button>
                    </div> --}}
                       
                   {{-- @endif --}}

                          

                   {{-- @if ($status == "confirmed1") --}}
                  
                   <div class="form-group col-md-6" style="display: none" id="confirmed2">
                       
                    <button class="btn btn-success" data-toggle="modal" data-target="#edit-status"
                    onclick="ChangeStatus('confirmed2')">Confirmed 2
                    </button>
            
                     </div>

                 {{--   @else
                    
                        <div class="form-group col-md-6">
                            <button class="btn btn-success disabled" >Confirmed 2
                            </button>
                        </div> --}}
                    
                  {{--  @endif --}}

                        

                    </div>

                </div>

                <div class="form-group">

                    <label class="form-label" for="attente_id">Attente section</label>

                    <div class="row" id="attente_id">

                        {{-- @if ($status == "new" || $status == 'na1' || $status == 'na2' ) --}}
                        <div class="form-group col-md-6" style="display: none" id="pending_c">
                            <button class="btn btn-outline-info" data-toggle="modal" data-target="#edit-status-pending"
                                    onclick="ChangeStatus('pending_c')">Attente Confirmation
                            </button>
                        </div>
                       {{--  @else
                   <div class="form-group col-md-6">
                    <button class="btn btn-outline-info disabled">Attente Confirmation
                    </button>
                   </div> --}}
                       
                   {{-- @endif --}}


                  {{--  @if ($status == "confirmed2"  || $status == "confirmed1" ) --}}

                   <div class="form-group col-md-6" id="pending_s" style="display: none">
                    <button class="btn btn-info " data-toggle="modal" data-target="#edit-status-pending"
                            onclick="ChangeStatus('pending_s')">Attente Shipping
                    </button>
                    </div>

                   {{--  @else

                    <div class="form-group col-md-6">
                        <button class="btn btn-info disabled">Attente Shipping
                        </button>
                    </div> --}}
                
                  
                   {{--  @endif --}}
                       
                       

                    </div>

                </div>


                <div class="form-group">

                    <label class="form-label" for="NoAnswer_id">No Answer section</label>

                    <div class="row" id="NoAnswer_id">

                       {{--  @if ($status == "new") --}}

                        <div class="form-group col-md-6" style="display: none" id="na1">
                            <button class="btn btn-outline-warning" data-toggle="modal" data-target="#edit-status-na"
                                    onclick="ChangeStatus('na1')">No Answer 1
                            </button>
                        </div>
                       
                     {{--    @else

                        <div class="form-group col-md-6">
                            <button class="btn btn-outline-warning disabled">No Answer 1
                            </button>
                        </div> --}}
                   
                       
                        {{-- @endif --}}

                        {{-- @if ($status == 'na1') --}}

                        <div class="form-group col-md-6" style="display: none" id="na2">
                            <button class="btn btn-warning" data-toggle="modal" data-target="#edit-status-na"
                                    onclick="ChangeStatus('na2')">No Answer 2
                            </button>
                        </div>
                        
                      {{--   @else
            
                        <div class="form-group col-md-6">
                            <button class="btn btn-warning disabled" >No Answer 2
                            </button>
                        </div> --}}
                       
                        {{-- @endif --}}


                       {{--  @if ($status == 'pending_c') --}}

                        <div class="form-group col-md-6" style="display: none" id="AttConfNa1">
                            <button class="btn btn-warning" data-toggle="modal" data-target="#edit-status-na"
                                    onclick="ChangeStatus('AttConfNa1')">Att Conf No Answer 1
                            </button>
                        </div>
                {{--        
                        @endif

                        @if ($status == 'AttConfNa1') --}}

                        <div class="form-group col-md-6" style="display: none" id="AttConfNa2">
                            <button class="btn btn-warning" data-toggle="modal" data-target="#edit-status-na"
                                    onclick="ChangeStatus('AttConfNa2')">Att Conf No Answer 2
                            </button>
                        </div>
                       
                    {{--     @endif

                        @if ($status == 'confirmed1') --}}

                        <div class="form-group col-md-6" style="display: none" id="Conf1Na1"> 
                            <button class="btn btn-warning" data-toggle="modal" data-target="#edit-status-na"
                                    onclick="ChangeStatus('Conf1Na1')">Confirmed 1 No Answer 1
                            </button>
                        </div>
                       
                       {{--  @endif

                        @if ($status == 'Conf1Na1') --}}

                        <div class="form-group col-md-6" style="display: none" id="Conf1Na2">
                            <button class="btn btn-warning" data-toggle="modal" data-target="#edit-status-na"
                                    onclick="ChangeStatus('Conf1Na2')">Confirmed 1 No Answer 2
                            </button>
                        </div>
                       
                     {{--    @endif


                        @if ($status == 'pending_s') --}}

                        <div class="form-group col-md-6" style="display: none" id="AttShippNa1">
                            <button class="btn btn-warning" data-toggle="modal" data-target="#edit-status-na"
                                    onclick="ChangeStatus('AttShippNa1')">Att Shipp No Answer 1
                            </button>
                        </div>
                       
                      {{--   @endif

                        @if ($status == 'AttShippNa1') --}}

                        <div class="form-group col-md-6" style="display: none" id="AttShippNa2">
                            <button class="btn btn-warning" data-toggle="modal" data-target="#edit-status-na"
                                    onclick="ChangeStatus('AttShippNa2')">Att Shipp No Answer 2
                            </button>
                        </div>
                       
                        {{-- @endif --}}

                        
                        

                    </div>

                </div>

                <div class="form-group">

                    <label class="form-label" for="Shiping_id">Shiping section</label>

                    <div class="row" id="Shiping_id">

                       {{--  @if ($status == "confirmed2" || $status == 'pending_s' ) --}}

                        <div class="form-group col-md-6" style="display: none" id="en_p">
                            <button class="btn btn-dark" data-toggle="modal" data-target="#edit-status"
                                    onclick="ChangeStatus('en_p')">En préparation
                            </button>
                        </div>
                        {{--  @else

                         <div class="form-group col-md-6">
                            <button class="btn btn-dark disabled">En préparation
                            </button>
                        </div> --}}
                        {{-- @endif --}}

                        {{-- @if ($status == "en_p") --}}

                        <div class="form-group col-md-6" style="display: none" id="rs">
                            <button class="btn btn-secondary " data-toggle="modal" data-target="#edit-status"
                                    onclick="ChangeStatus('rs')">Ready to ship
                            </button>
                        </div>

                        {{-- @else
                        
                         <div class="form-group col-md-6">
                            <button class="btn btn-secondary disabled">Ready to ship
                            </button>
                        </div> --}}
                
                       
                        {{--  @endif --}}

                     

                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

@include('orders::modal.note')
@include('orders::modal.note_pending')
@include('orders::modal.na')

@push('js')


    <script>

        function ChangeStatus(status) {

           
            $('#status').val(status);
            $('#status-na').val(status);
            $('#status-pending').val(status);
            
        }

        function EditGetDataConfirm(id, button_id) {

            var status = $('#' + button_id).data('status');
            $('#status-confirm').val(status);

            var id = id;

            var url_change_confirm = '{{ route("order.update_confirm",":id") }}';

            url_change_confirm = url_change_confirm.replace(':id', id);

            $('#form-change-confirm').attr('action', url_change_confirm);


            /*****/

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

                    var name = $('#name-confirm').val(data.name);
                    var phone = $('#phone-confirm').val(data.phone);
                    /*  var store_id = $('#store_id').val(); */
                    var wilaya = $('#wilaya-confirm').val(data.wilaya);
                    /*  var id_mairie = $('#mairie_id').val(); */
                    var discount = $('#discount-confirm').val(data.discount);
                    var delivery_price = $('#delivery_price-confirm').val(data.delivery_price);
                    var address = $('#address-confirm').text(data.address);
                    var comment = $('#comment-confirm').text(data.comments);
                    var subt_total = $('#sub-total-confirm').val(data.sub_total);
                    var total = $('#total-confirm').val(data.total);


                    $('#store_id-confirm').empty();
                    $('#mairie_id-confirm').empty();

                    $('#store_id-confirm').append(' <option disabled="true" value="" selected>Choose store</option>');
                    $('#mairie_id-confirm').append(' <option disabled="true" value="" selected>Choose mairie</option>');


                    if (data.store_id != null) {

                        var store_id = data.store_id;
                        var store_name = data.store.name;

                        $('#store_id-confirm').append('<option value="' + store_id + '" selected>' + store_name + '</option>');

                    }

                    if (data.id_mairie) {

                        var id_mairie = data.id_mairie;
                        var mairie_name = data.mairie.name;
                        var yalidine_wilaya_name = data.mairie.yalidine_wilaya.name;


                        $('#mairie_id-confirm').append('<option value="' + id_mairie + '" selected>' + mairie_name + '-' + yalidine_wilaya_name + '</option>');

                        $('#wilaya-confirm').val(yalidine_wilaya_name);
                        $('#wilaya-confirm').attr('readonly', true);


                    }


                    var table = $("#orders_table_edit-confirm tbody");


                    table.empty();

                    $.each(data.order_products, function (idx, elem) {
                        table.append("<tr><td>" + elem.id + "</td><td>" + elem.product.name + "</td><td>" + elem.quantity + "</td>   <td>" + elem.price + "</td>  <td>" + elem.price * elem.quantity + "</td></tr>");
                    });
                }
            });


        }


    </script>

@endpush