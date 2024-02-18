<div class="modal fade modal-success text-left" id="modal-select-main">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel120">Select product main photo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form action="{{ route('productImages.select', $product_id) }}" method="post">
                @csrf

                <div class="modal-body">

                    <div class="container parent">
                        <div class="row">
                            @foreach ($products_photos as $image)

                                <div class='col col-md-4 text-center shadow-sm'>
                                    <input type="radio" name="image" id="img{{ $image->id }}" class="d-none imgbgchk"
                                        value="{{ $image->id }}" required>
                                    <label for="img{{ $image->id }}">
                                        <img src="{{ asset($image->link) }}" alt="Image{{ $image->id }}">
                                        <div class="tick_container">
                                            <div class="tick"><i class="fa fa-check"></i></div>
                                        </div>
                                    </label>
                                </div>

                            @endforeach


                        </div>
                    </div>



                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect waves-float waves-light">
                        Accept
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
