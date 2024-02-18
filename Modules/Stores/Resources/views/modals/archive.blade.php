<div class="modal fade modal-danger text-left" id="archive-store{{$store->id}}" tabindex="-1"
     aria-labelledby="myModalLabel120" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel120">Archive Store</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{route('stores.delete',['store'=>$store->id])}}" method="post">
                @csrf
                @method('delete')
                <div class="modal-body">
                    Are you sure to archive this Store ?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger waves-effect waves-float waves-light">Accept</button>
                </div>
            </form>
        </div>
    </div>
</div>