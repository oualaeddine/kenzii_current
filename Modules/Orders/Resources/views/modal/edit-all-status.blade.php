{{--  <!-- Modal to add new record -->
 <div class="modal fade" id="edit-order{{$o->id}}">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <form class="add-new-record modal-content pt-0" action="{{route('order.update',$o->id)}}" method="POST">
          @csrf
          @method('PUT')
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
        <div class="modal-header mb-1">
          <h5 class="modal-title" id="exampleModalLabel">Edit order</h5>
        </div>
        <div class="modal-body flex-grow-1">

        
       

          <button type="submit" class="btn btn-success data-submit mr-1">Save changes</button>
          <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
 --}}
 <div
 class="modal text-left"
 id="edit-status-all"
 tabindex="-1"
 role="dialog"
 aria-labelledby="edit-status-all"
 aria-hidden="true"
>
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
 <div class="modal-content">
     <div class="modal-header">
         <h4 class="modal-title" id="edit-status-all-title">Edit order status</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
     </div>

     <form class="add-new-record modal-content pt-0"
           {{-- action="{{route('order.update',$o->id)}}" --}} id="form-status-all-edit" method="POST">
         @csrf
         @method('PUT')
         <div class="modal-body">

            <div class="form-group col-md-12">
                <label class="form-label" for="last_status-all">Status</label>

              
                    <select name="last_status" id="last_status-all" required class="form-control mairie-select">
                         <option value="en_p">en_p</option>
                         <option value="canceled">canceled</option>
                         <option value="new">new</option>
                         <option value="confirmed1">confirmed1</option>
                         <option value="confirmed2">confirmed2</option>
                         <option value="na1">no answer 1</option>
                         <option value="na2">no answer 2</option>
                         <option value="AttConfNa1">AttConfNa1</option>
                         <option value="AttConfNa2">AttConfNa2</option>
                         <option value="Conf1Na1">Conf1Na1</option>
                         <option value="Conf1Na2">Conf1Na2</option>
                         <option value="AttShippNa1">AttShippNa1</option>
                         <option value="AttShippNa2">AttShippNa2</option>
                         <option value="pending_s">َAtt Ship</option>
                         <option value="pending_c">Att Conf</option>
                         <option value="rs"> Ready for ship</option>
                        
                    </select>

            </div>

         </div>
         <div class="modal-footer">
             <button type="sumbit" class="btn btn-success data-submit mr-1">
                 Save changes
             </button>
             <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
         </div>
     </form>
 </div>
</div>
</div>
