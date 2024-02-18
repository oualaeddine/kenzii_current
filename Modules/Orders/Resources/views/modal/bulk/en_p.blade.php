<!-- Modal -->
<div id="mutlipleen_p" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Bulk en_p</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         
        </div>

        <form action="{{route('bulk.order.en_p')}}" method="POST">
            @csrf
            @method('PUT')

       
        <div class="modal-body">
  
          <div class="alert alert-danger">
              <div class="empty_record" style="display: none">
              <h4>please check some records </h4>
              </div>

              <div class="not_empty_record" style="display: none">
                
              <h4>change status to en_p for <span class="record_count"></span> orders ? </h4>

              <input type="hidden" name="orders" class="orders_list">

              </div>
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
