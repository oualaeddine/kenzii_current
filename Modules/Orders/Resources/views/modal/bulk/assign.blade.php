<!-- Modal -->
<div id="mutlipleAssign" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Bulk Assign</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         
        </div>
        <form action="{{route('bulk.order.assign')}}" method="POST">
          @csrf
    
        <div class="modal-body">
  
          <div class="alert alert-danger">
              <div class="empty_record" style="display: none">
              <h4>please check some records </h4>
              </div>
          </div>

              <div class="not_empty_record" style="display: none">
                
                <div class="form-group">

                  <label class="form-label" for="operator_id">Operator</label>

                  <select name="operator_id" id="operator_id"  class="form-control">
                      <option disabled="true" value="" selected>Choose operator</option>

                      @foreach ($operators as $operator)
                      <option value="{{$operator->id}}" >{{$operator->name}}</option>
                      @endforeach
                  </select>

                </div>
              

                <input type="hidden" name="orders" class="orders_list">


              </div>
          
        </div>
        <div class="modal-footer">
          <div class="empty_record" style="display: none">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
          </div>
          <div class="not_empty_record" style="display: none">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success">Yes</button>
        </div>
      </div>

       </form>
      </div>
    </div>
  </div>
