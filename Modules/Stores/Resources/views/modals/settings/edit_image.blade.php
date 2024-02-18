<div class="modal modal-slide-in fade" id="modal-edit-setting-image">
    <div class="modal-dialog">
        <form  method="post" class="modal-content pt-0" enctype="multipart/form-data" id="form-edit-setting-image">
            @csrf
            @method('put')
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">New Store Setting Image Value</h5>
            </div>
            <div class="modal-body flex-grow-1">

                <div class="form-group">
                    <label class="form-label" for="name">Name</label>
                    <input
                            type="text"
                            class="form-control"
                            id="name-image-edit"
                            placeholder="Put Name"
                            name="name"
                    />
                </div>

                <div class="form-group">
                    <label class="form-label" for="value">Value To Show </label>
                        <input
                        type="file"
                        class="form-control"
                        id="value-image-edit"
                        name="value"
                        />
                </div>

                <div class="form-group">
                    <label class="form-label" for="group">Group</label>
                    <input
                            type="text"
                            class="form-control"
                            id="group-image-edit"
                            placeholder="Put group"
                            name="group"
                    />
                </div>

                <div class="form-group">
                    <label class="form-label" for="priorty">priorty</label>
                    <input
                            type="text"
                            class="form-control"
                            id="priorty-image-edit"
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


<script>

    function EditSettingImage(id){

                /************************////

                var id = id;

                var url_update_store = '{{ route("store.settings.update_image",":id") }}';

                url_update_store  = url_update_store .replace(':id', id);

                
                $('#form-edit-setting-image').attr('action', url_update_store);

                var url_update = '{{ route("store.settings.edit_image",":id") }}';

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
                        var name = $('#name-image-edit').val(data.name);
                        var group = $('#group-image-edit').val(data.group);
                        var priorty = $('#priorty-image-edit').val(data.priorty);

                    }
                });

        }
</script>