<!-- Modal to add new record -->
<div class="modal fade" id="add-permission{{$role->id}}">
    <div class="modal-dialog sidebar-sm">
        <form action="{{route('role.update',['role'=>$role->id])}}" method="post"
              class="add-new-user modal-content pt-0">
            @csrf
            @method('PUT')
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">Update Permission for role {{ucfirst($role->name)}}</h5>
            </div>
            <div class="modal-body flex-grow-1">
                <div class="form-group">
                    <div class="form-group">
                        <label for="normalMultiSelect">Multiple Select</label>
                        <select class="form-control" name="permissions[]" id="normalMultiSelect" multiple="multiple">

                            @foreach($permissions as $permission)
                                <option @if($role->hasPermissionTo($permission->name)) selected @endif value="{{$permission->id}}">{{$permission->name}}</option>
                            @endforeach
                        </select>
                    </div>
                <button type="submit" class="btn btn-primary mr-1 data-submit">Submit</button>
                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
            </div>
            </div>
        </form>

    </div>
</div>