<div class="modal modal-slide-in fade" id="modal-edit-setting-text">
    <div class="modal-dialog">
        <form  method="post" class="modal-content pt-0" id="form-edit-setting-text">
            @csrf
            @method('put')
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">Update Store Setting Text Value</h5>
            </div>
            <div class="modal-body flex-grow-1">

                <div class="form-group">
                    <label class="form-label" for="name-edit">Name</label>
                    <input
                            type="text"
                            class="form-control"
                            id="name-edit"
                            placeholder="Put Name"
                            name="name"
                    />
                </div>

                <div class="form-group">
                    <label class="form-label" for="group">Group</label>
                    <input
                            type="text"
                            class="form-control"
                            id="group-edit"
                            placeholder="Put group"
                            name="group"
                    />
                </div>

                <div class="form-group">
                    <label class="form-label" for="priorty">priorty</label>
                    <input
                            type="text"
                            class="form-control"
                            id="priorty-edit"
                            placeholder="Put priorty"
                            name="priorty"
                    />
                </div>


                <div class="form-group">
                    <label class="form-label" for="value-edit">Value To Show </label>
                    <textarea class="form-control" id="value-edit" name="value" cols="20" rows="5"></textarea>
                </div>

                <button type="submit" class="btn btn-primary mr-1 data-submit">Submit</button>
                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>

@push('js')

    <script>

            function EditSettingText(id){

                        /************************////

                        var id = id;

                        var url_update_store = '{{ route("store.settings.update",":id") }}';

                        url_update_store  = url_update_store .replace(':id', id);

                        
                        $('#form-edit-setting-text').attr('action', url_update_store);

                        var url_update = '{{ route("store.settings.edit",":id") }}';

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
                                var value = $('#value-edit').val(data.value);
                                var group = $('#group-edit').val(data.group);
                                var priorty = $('#priorty-edit').val(data.priorty);

                            }
                        });

                }
    </script>



@endpush