<div
        class="modal fade text-left"
        id="view-extra-store{{$store->id}}"
        tabindex="-1"
        role="dialog"
        aria-labelledby="myModalLabel17"
        aria-hidden="true"
>
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">View Store</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group mt-2">
                    <label class="d-block" for="validationBio"><span class="badge d-block badge-primary">Privacy</span></label>
                    <textarea class="form-control" id="validationBio" name="validationBiojq" readonly
                              rows="3">{{$store->privacy}}</textarea>
                </div>

                <div class="form-group mt-2">
                    <label class="d-block" for="validationBio"><span
                                class="badge d-block badge-primary">Terms</span></label>
                    <textarea class="form-control" id="validationBio" name="validationBiojq" readonly
                              rows="3">{{$store->terms}}</textarea>
                </div>
                <div class="form-group mt-2">
                    <label class="d-block" for="validationBio"><span class="badge d-block badge-primary">FB Pixel</span></label>
                    <textarea class="form-control" id="validationBio" name="validationBiojq" readonly
                              rows="3">{{$store->fb_pixel}}</textarea>
                </div>
                <div class="form-group mt-2">
                    <label class="d-block" for="validationBio"><span class="badge d-block badge-primary">Google Analytics</span></label>
                    <textarea class="form-control" id="validationBio" name="validationBiojq" readonly
                              rows="3">{{$store->google_analytics}}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>