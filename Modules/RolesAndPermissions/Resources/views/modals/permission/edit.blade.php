<!-- Modal to add new record -->
<div class="modal  fade" id="permission-edit{{$permission->id}}">
    <div class="modal-dialog sidebar-sm">
        <form action="{{route('permissions.update',['permission'=>$permission->id])}}" method="post"
              class="add-new-user modal-content pt-0">
            @csrf
            @method('PUT')
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">Update Permission</h5>
            </div>
            <div class="modal-body flex-grow-1">
                <div class="form-group">
                    <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
                    <input
                            type="text"
                            value="{{$permission->name}}"
                            class="form-control dt-full-name"
                            id="basic-icon-default-fullname"
                            placeholder="John Doe"
                            name="name"
                            aria-label="John Doe"
                            autocomplete="current-password"
                            aria-describedby="basic-icon-default-fullname2"
                    />
                </div>

                <button type="submit" class="btn btn-primary mr-1 data-submit">Submit</button>
                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </form>

    </div>
</div>