<div
        class="modal text-left"
        id="edit-status-na"
        tabindex="-1"
        role="dialog"
        aria-labelledby="edit-status-na"
        aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="edit-status-na">Change status</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form class="modal-content pt-0" id="form-change-status-na"
                   method="POST">
                @csrf
              
                <div class="modal-body">

                    <input type="hidden" name="status" id="status-na" value="">

                    <div class="form-group col-md-12">
                        <label class="form-label" for="comment">Comment</label>

                        <div class="demo-inline-spacing">
                         
                            <div class="form-check form-check-inline">
                              <input
                                class="form-check-input"
                                type="radio"
                                name="comment"
                                id="no_answer"
                                value="no answer"
                                required
                              />
                              <label class="form-check-label" for="no_answer">No Answer</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input
                                  class="form-check-input"
                                  type="radio"
                                  name="comment"
                                  id="phone_closed"
                                  value="phone closed"
                                  required
                                />
                                <label class="form-check-label" for="phone_closed">Phone Closed</label>
                              </div>

                              <div class="form-check form-check-inline">
                                <input
                                  class="form-check-input"
                                  type="radio"
                                  name="comment"
                                  id="other"
                                  value="other"
                                  required
                                />
                                <label class="form-check-label" for="other">Other</label>
                              </div>
                
     
                          </div>

                          <div class="form-group col-md-12">
                            <label class="form-label" for="comment-note">Comment</label>
           
                            <textarea name="comment_note" class="form-control dt-post" placeholder="comment" id="comment-note"
                            cols="30" rows="6"> </textarea>
                           
                          </div>

                        {{-- <textarea name="comment" class="form-control dt-post" required  placeholder="comment" id="comment"
                        cols="30" rows="6"> </textarea> --}}
                     
                       
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