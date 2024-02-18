<div class="modal fade modal-danger text-left" id="delete-photo-product" tabindex="-1" aria-labelledby="myModalLabel120"
     aria-hidden="true" style="display: none;z-index:999999">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel120">Delete product photo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form action="{{-- {{route('productImages.delete',$p_p->id)}} --}}" method="post">
                @csrf
                @method('delete')

                <div class="modal-body">
                    Are you sure to delete this product photo?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger waves-effect waves-float waves-light">Accept</button>
                </div>
            </form>
        </div>
    </div>
</div>