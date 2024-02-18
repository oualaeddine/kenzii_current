<div class="modal modal-slide-in fade" id="modal-add-setting-image">
    <div class="modal-dialog">
        <form action="{{route('store.settings.store_image',$store_id)}}" method="post" class="add-new-user modal-content pt-0" enctype="multipart/form-data">
            @csrf
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">New Store Setting Image Value</h5>
            </div>
            <div class="modal-body flex-grow-1">

                <input type="hidden" name="store_id" value="{{$store_id}}">

                <div class="form-group">
                    <label class="form-label" for="name">Name</label>
                    <input
                            type="text"
                            class="form-control"
                            id="name"
                            placeholder="Put Name"
                            name="name"
                    />
                </div>

                <div class="form-group">
                    <label class="form-label" for="value">Value To Show </label>
                        <input
                        type="file"
                        class="form-control"
                        id="value"
                        name="value"
                        />
                </div>

                <div class="form-group">
                    <label class="form-label" for="group">Group</label>
                    <input
                            type="text"
                            class="form-control"
                            id="group"
                            placeholder="Put group"
                            name="group"
                    />
                </div>

                <div class="form-group">
                    <label class="form-label" for="priorty">priorty</label>
                    <input
                            type="text"
                            class="form-control"
                            id="priorty"
                            placeholder="Put priorty"
                            name="priorty"
                    />
                </div>


                <button type="submit" class="btn btn-primary mr-1 data-submit">Submit</button>
                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>