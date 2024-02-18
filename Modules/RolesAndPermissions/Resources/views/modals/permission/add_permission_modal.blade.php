<div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in-role-permissions">
    <div class="modal-dialog">
        <form action="{{route('permissions.store')}}" method="post" class="add-new-user modal-content pt-0">
            @csrf
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">New Permission</h5>
            </div>
            <div class="modal-body flex-grow-1">
                <div class="form-group">
                    <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
                    <input
                            type="text"
                            class="form-control dt-full-name"
                            id="basic-icon-default-fullname"
                            placeholder="Can XYZ"
                            name="name"
                            aria-label="John Doe"
                            autocomplete="current-password"
                            aria-describedby="basic-icon-default-fullname2"
                            required
                    />

                </div>
                <button type="submit" class="btn btn-primary mr-1 data-submit">Submit</button>
                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>


