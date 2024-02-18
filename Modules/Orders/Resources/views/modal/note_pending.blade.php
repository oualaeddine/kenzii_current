<div
        class="modal text-left"
        id="edit-status-pending"
        tabindex="-1"
        role="dialog"
        aria-labelledby="edit-status-pending"
        aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="edit-status-pending">Change status</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form class="modal-content pt-0" id="form-change-status-pending"
                   method="POST">
                @csrf

    
                <div class="modal-body">
                    <input type="hidden" name="status" id="status-pending" value="">

                    <div class="row">
                        <div class="col-12 col-md-12 form-group">
                          <label for="pd-default">Alert Date</label>
                          <input type="text" id="pd-default" name="alert_date" class="form-control flatpickr-basic" required placeholder="YYYY-MM-DD" />
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label class="form-label" for="comment-note">Comment</label>
       
                        <textarea name="comment" class="form-control dt-post" placeholder="comment" id="comment-note"
                        cols="30" rows="6"> </textarea>
                       
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-success data-submit mr-1" >
                        Save changes
                    </button>
                    <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>