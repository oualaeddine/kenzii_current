                <!-- Modal to add new record -->
                <div class="modal modal-slide-in fade" id="modals-slide-in-bon">
                    <div class="modal-dialog">
                        <form class="add-new-record modal-content pt-0" action=""
                              method="POST" id="bon-achats-form">
                            @csrf
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                            <div class="modal-header mb-1">
                                <h5 class="modal-title" id="TitleModalBonAchat">New Bon D'achat</h5>
                            </div>
                            <div class="modal-body flex-grow-1">
                                <div class="form-group">

                                    <label class="form-label" for="product_id">Product</label>
                
                                    <select name="product_id" id="product_id" required class="form-control">
                                        <option disabled="true" value="" selected>Choose product</option>
                                    </select>
                
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="quantity">Quantity</label>
                                    <input
                                            type="number"
                                            class="form-control"
                                            id="quantity"
                                            min="1"
                                            placeholder="Quantity"
                                            name="quantity"
                                    />
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="unit_price">Unit Price</label>
                                    <input
                                            type="number"
                                            class="form-control"
                                            id="unit_price"
                                            min="1"
                                            placeholder="Unit price"
                                            name="unit_price"
                                    />
                                </div>


                                <div class="form-group">
                                    <label class="form-label" for="seller">Seller</label>
                                    <input
                                            type="text"
                                            id="seller"
                                            class="form-control"
                                            name="seller"
                                            placeholder="Seller"
                                            
                                    />
                                </div>
                 
                                <button type="submit" class="btn btn-primary data-submit mr-1" id="btn_submit_bon">Submit</button>
                                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>