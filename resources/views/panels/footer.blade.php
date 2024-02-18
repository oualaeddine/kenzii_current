
    <!-- Modal to add new record -->
    <div class="modal modal-slide-in fade" id="Send-Sms-model">
        <div class="modal-dialog modal-lg sidebar-sm">
            <form class="add-new-record modal-content pt-0" action="{{route('send.sms')}}"
                  method="POST">
                @csrf
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">Send Sms</h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <div class="form-group">
                        <label class="form-label" for="phone">Phone Number</label>
                        <input
                                type="number"
                                class="form-control"
                                id="phone"
                                name="phone"
                                placeholder="Phone number"
                               
                        />
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="sms">Text Message</label>
                       {{--  <input
                                type="text"
                                id="sms"
                                class="form-control"
                                name="sms"
                                placeholder="Sms here"
                        /> --}}

                        <textarea name="sms"  class="form-control" id="sms" cols="30" rows="10"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary data-submit mr-1">Submit</button>
                    <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>



    {{-- add charge --}}

  <!-- Modal to add new record -->
  <div class="modal modal-slide-in fade" id="Enter-Charge-model">
    <div class="modal-dialog sidebar-sm">
        <form class="add-new-record modal-content pt-0" action="{{route('charges.store')}}"
              method="POST">
            @csrf
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">New Charge</h5>
            </div>
            <div class="modal-body flex-grow-1">
           
                <div class="row">
                    <div class="col-12 col-md-12 form-group">
                      <label for="pd-default">Date</label>
                      <input type="text" id="pd-default" name="date" class="form-control flatpickr-basic" required placeholder="YYYY-MM-DD" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="basic-icon-default-desc">
                        description</label>
                    <textarea class="form-control dt-post" name="description" id="basic-icon-default-desc" required cols="30" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label" for="type">
                        Type</label>
                        <select name="type" id="type" required class="form-control">
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
                      <label for="montant">Montant</label>
                      <input type="number" min="0" id="montant" name="montant" class="form-control" required placeholder="Montant" />
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12 col-md-12 form-group">
                      <label for="produit">Produit</label>
                      <input type="text" id="produit" name="produit" class="form-control" placeholder="Produit" />
                    </div>
                </div>

                <button type="submit" class="btn btn-primary data-submit mr-1">Submit</button>
                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel
                </button>
            </div>
        </form>
    </div>
</div>

<!-- BEGIN: Footer-->
<footer class="footer {{($configData['footerType']=== 'footer-hidden') ? 'd-none':''}} footer-light">
    <p class="clearfix mb-0">
    <span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2020<a class="ml-25"
                                                                                        href="https://berrehal.com"
                                                                                        target="_blank">Berrehal.com</a>
      <span class="d-none d-sm-inline-block">, All rights Reserved</span>
    </span>
        <span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    </p>
</footer>
<!-- END: Footer-->
