     <!-- Modal to edit new record -->
     <div class="modal modal-slide-in fade" id="edit_charge">
        <div class="modal-dialog sidebar-sm">
            <form class="add-new-record modal-content pt-0" action="" method="POST" id="charge_edit_form">
                @csrf
                @method('PUT')
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">Update Charge</h5>
                </div>
                <div class="modal-body flex-grow-1">
               
                    <div class="row">
                        <div class="col-12 col-md-12 form-group">
                          <label for="date-edit">Date</label>
                          <input type="text" id="date-edit" name="date" class="form-control flatpickr-basic" required placeholder="YYYY-MM-DD" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="desc-edit">
                            description</label>
                        <textarea class="form-control dt-post" name="description" id="desc-edit" required cols="30" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="type-edit">
                            Type</label>
                            <select name="type" id="type-edit" required class="form-control">
                                <option value="" disabled="disabled" selected>Choose type</option>
                                <option value="facebook_ad" >Publicité Facebook</option>
                                <option value="instagram_ad" >Publicité instagram</option>
                                <option value="snapchat_ad" >Publicité snapchat</option>
                                <option value="transport" >Transport</option>
                                <option value="support" >Support</option>
                                <option value="emballage" >Emballage</option>
                                <option value="autre" >Autre...</option>
                            </select>
                      
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-12 form-group">
                          <label for="montant-edit">Montant</label>
                          <input type="number" min="0" id="montant-edit" name="montant" class="form-control" required placeholder="Montant" />
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12 col-md-12 form-group">
                          <label for="produit-edit">Produit</label>
                          <input type="text" id="produit-edit" name="produit" class="form-control" placeholder="Produit" />
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary data-submit mr-1">Save changes</button>
                    <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>