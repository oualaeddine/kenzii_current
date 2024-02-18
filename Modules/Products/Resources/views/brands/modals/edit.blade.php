                <!-- Modal to add new record -->
                <div class="modal modal-slide-in fade" id="edit-brand">
                    <div class="modal-dialog">
                        <form class="add-new-record modal-content pt-0" action=""
                              method="POST" id="brand_edit_form">
                            @csrf
                            @method('put')

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                            <div class="modal-header mb-1">
                                <h5 class="modal-title" >Edit Brand</h5>
                            </div>
                            <div class="modal-body flex-grow-1">
        

                                <div class="form-group">
                                    <label class="form-label" for="name">Name</label>
                                    <input
                                            type="text"
                                            id="name-edit"
                                            class="form-control"
                                            name="name"
                                            placeholder="Enter name of brand "
                                            
                                    />
                                </div>
                 
                                <button type="submit" class="btn btn-success data-submit mr-1" id="btn_submit_brand_edit">Save changes</button>
                                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>