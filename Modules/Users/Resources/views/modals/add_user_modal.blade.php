<div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in-user">
    <div class="modal-dialog">
        <form action="{{route('users.store')}}" method="post" class="add-new-user modal-content pt-0">
            @csrf
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">New User</h5>
            </div>
            <div class="modal-body flex-grow-1">
                <div class="form-group">
                    <label class="form-label" for="basic-icon-default-fullname">Email</label>
                    <input
                            type="email"
                            class="form-control dt-full-name"
                            id="basic-icon-default-fullname"
                            placeholder="email@email.com"
                            name="email"
                            autocomplete="current-password"
                            aria-describedby="basic-icon-default-fullname2"
                    />
                </div>
                <div class="form-group">
                    <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
                    <input
                            type="text"
                            class="form-control dt-full-name"
                            id="basic-icon-default-fullname"
                            placeholder="John Doe"
                            name="name"
                            aria-label="John Doe"
                            autocomplete="current-password"
                            aria-describedby="basic-icon-default-fullname2"
                    />
                </div>
                <div class="form-group">
                    <label class="form-label" for="basic-icon-default-uname">Username</label>
                    <input
                            type="text"
                            id="basic-icon-default-uname"
                            class="form-control dt-uname"
                            placeholder="MrCookie"
                            autocomplete="current-password"
                            name="username"
                    />
                </div>
                <div class="form-group">
                    <label class="form-label" for="basic-icon-default-email">Password</label>
                    <input
                            type="password"
                            id="basic-icon-default-email"
                            class="form-control dt-email"
                            placeholder="***********"
                            name="password"
                    />
                </div>
                <div class="form-group">
                    <label class="form-label" for="basic-icon-default-email">Confirm Password</label>
                    <input
                            type="password"
                            id="basic-icon-default-email"
                            class="form-control dt-email"
                            placeholder="***********"
                            aria-label="***********"
                            name="password_confirmation"
                    />
                </div>
                <div class="form-group">
                    <label for="normalMultiSelect">Role(s)</label>
                    <select class="form-control" name="roles[]" id="normalMultiSelect" multiple="multiple">
                        @foreach($roles as $role)
                            <option value="{{$role->name}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mr-1 data-submit">Submit</button>
                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>
