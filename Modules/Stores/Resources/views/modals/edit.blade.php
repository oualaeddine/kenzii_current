<!-- Modal to add new record -->
<div class="modal modal-slide-in fade" id="modals-store-edit-slide-in{{$store->id}}">
    <div class="modal-dialog sidebar-sm">
        <form action="{{route('stores.update',['store'=>$store->id])}}" method="post"
              class="add-new-user modal-content pt-0">
            @csrf
            @method('PUT')
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">Update Store</h5>
            </div>
            <div class="modal-body flex-grow-1">
                <div class="form-group">
                    <label class="form-label" for="basic-icon-default-fullname">Name</label>
                    <input
                            type="text"
                            class="form-control dt-full-name"
                            id="basic-icon-default-fullname"
                            placeholder="Berrahel Store"
                            name="name"
                            value="{{$store->name}}"
                            autocomplete="current-password"
                            aria-describedby="basic-icon-default-fullname2"
                    />
                </div>
                <div class="form-group">
                    <label class="form-label" for="basic-icon-default-uname">Domain</label>
                    <input
                            type="text"
                            id="basic-icon-default-uname"
                            class="form-control dt-uname"
                            placeholder="www.example.com"
                            autocomplete="current-password"
                            value="{{$store->domain}}"
                            name="domain"
                    />
                </div>
                <div class="form-group">
                    <label class="form-label" for="basic-icon-default-email">Privacy</label>
                    <textarea class="form-control dt-email" name="privacy" cols="30" rows="5">
                        {{$store->privacy}}
                    </textarea>
                </div>
                <div class="form-group">
                    <label class="form-label" for="basic-icon-default-email">Terms</label>
                    <textarea class="form-control dt-email" name="terms" cols="30" rows="5">{{$store->terms}}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label" for="fb">FB link</label>
                    <textarea class="form-control " id="fb" name="fb" cols="30" rows="5">{{$store->fb}}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label" for="basic-icon-default-email">FB Pixel</label>
                    <textarea class="form-control dt-email" name="fb_pixel" cols="30" rows="5">{{$store->fb_pixel}}</textarea>
                </div>
                <div class="form-group">
                    <label class="form-label" for="access_token">Access Token</label>
                    <textarea class="form-control dt-email" name="access_token" cols="30" rows="5">{{$store->access_token}}</textarea>
                </div>
                <div class="form-group">
                    <label class="form-label" for="basic-icon-default-email">Google Analytics</label>
                    <textarea class="form-control" name="google_analytics" cols="30" rows="5">{{$store->google_analytics}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary mr-1 data-submit">Submit</button>
                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
            </div>

        </form>
    </div>
</div>