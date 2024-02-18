<!-- Modal to add new record -->
<div class="modal modal-slide-in fade" id="modals-slide-in-category-edit">
    <div class="modal-dialog sidebar-sm">
        <form class="add-new-record modal-content pt-0" id="form-edit-category"  method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">Edit category</h5>
            </div>
            <div class="modal-body flex-grow-1">
                <div class="form-group">
                    <label class="form-label" for="name-edit">Name</label>
                    <input
                            type="text"
                            class="form-control dt-full-name"
                            id="name-edit"
                            name="name"
                            placeholder="Category name"
                            aria-label="Category name"
                    />
                </div>
                <div class="form-group">
                    <label class="form-label" for="basic-icon-default-post">description</label>
                    <input
                            type="text"
                            id="desc-edit"
                            class="form-control dt-post"
                            name="desc"
                            placeholder="description"
                            aria-label="description"
                    />
                </div>

                <div class="form-group">
                    <label class="form-label" for="image-edit">Category image</label>
                    <input
                            type="file"
                            id="image-edit"
                            class="form-control dt-post"
                            name="image"
                            placeholder="Category image"
                            aria-label="Category image"
                    />
                </div>
                

                <div class="form-group">
                    <label class="form-label" for="icon-edit">Category icon</label>
                    <input
                            type="file"
                            id="icon-edit"
                            class="form-control icon"
                            name="icon"
                            placeholder="Category icon"
                            aria-label="Category icon"
                    />
                </div>

                <button type="submit" class="btn btn-success data-submit mr-1">Save</button>
                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>

@push('js')
        <script>

            function categoryEdit(id){

                   var url_change_edit_form = '{{ route("categories.update",":id") }}';

                   url_change_edit_form  =  url_change_edit_form .replace(':id', id);

                $('#form-edit-category').attr('action',url_change_edit_form );

                
                var id = id;

                var url_update = '{{ route("api.category",":id") }}';

                url_update = url_update.replace(':id', id);

                $.ajax({
                    url: url_update,
                    type: 'GET', dataType: 'json',
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },

                    error: function (error) {
                        toastr.error("Something went wrong , try again please !");
                    },
                    success: function (data) {

                        var data = data.data;

                        var name = $('#name-edit').val(data.name);
                        var desc = $('#desc-edit').val(data.desc);


                    }
                });


            }

        </script>
        
        @endpush