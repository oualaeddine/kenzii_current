<!-- Modal to add new record -->
<div class="modal modal-slide-in fade" id="modals-user-edit-slide-in{{$user->id}}">
    <div class="modal-dialog sidebar-sm">
        <form action="{{route('users.update',['user'=>$user->id])}}" method="post"
              class="add-new-user modal-content pt-0">
            @csrf
            @method('PUT')
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
            </div>
            <div class="modal-body flex-grow-1">
                <div class="form-group">
                    <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
                    <input
                            type="text"
                            value="{{$user->name}}"
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
                            value="{{$user->username}}"
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
                            <option @if($user->hasRole($role->name)) selected @endif value="{{$role->name}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="user-role">Is Active</label>
                    <select id="user-role" class="form-control" name="is_active">
                        <option @if($user->is_active == 0) selected @endif value="0">InActive</option>
                        <option @if($user->is_active == 1) selected @endif value="1">Active</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mr-1 data-submit">Submit</button>
                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </form>
        {{--      <form class="add-new-record modal-content pt-0" action="{{route('products.update',$p->id)}}" method="POST">--}}
        {{--          @csrf--}}
        {{--          @method('PUT')--}}
        {{--        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>--}}
        {{--        <div class="modal-header mb-1">--}}
        {{--          <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>--}}
        {{--        </div>--}}
        {{--        <div class="modal-body flex-grow-1">--}}
        {{--          <div class="form-group">--}}
        {{--            <label class="form-label"  for="basic-icon-default-name">Name</label>--}}
        {{--            <input--}}
        {{--              type="text"--}}
        {{--              class="form-control dt-full-name"--}}
        {{--              id="basic-icon-default-name"--}}
        {{--              name="name"--}}
        {{--              value="{{$p->name}}"--}}
        {{--              placeholder="Product name"--}}
        {{--              aria-label="Product name"--}}
        {{--            />--}}
        {{--          </div>--}}
        {{--          <div class="form-group">--}}
        {{--            <label class="form-label" for="basic-icon-default-post">short description</label>--}}
        {{--            <input--}}
        {{--              type="text"--}}
        {{--              id="basic-icon-default-post"--}}
        {{--              class="form-control dt-post"--}}
        {{--              name="short_description"--}}
        {{--              value="{{$p->short_description}}"--}}
        {{--              placeholder="Short description"--}}
        {{--              aria-label="Short description"--}}
        {{--            />--}}
        {{--          </div>--}}
        {{--         --}}
        {{--          <div class="form-group">--}}
        {{--              <label class="form-label" for="basic-icon-default-long-desc">long description</label>--}}
        {{--              <textarea  class="form-control dt-post" name="long_description" id="basic-icon-default-long-desc" cols="30" rows="10"> {{$p->long_description}}</textarea>--}}
        {{--            --}}
        {{--            </div>--}}
        {{--         --}}
        {{--          <button type="submit" class="btn btn-success data-submit mr-1">Save</button>--}}
        {{--          <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>--}}
        {{--        </div>--}}
        {{--      </form>--}}
    </div>
</div>