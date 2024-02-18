<div class="modal modal-slide-in fade" id="modals-slide-in-store-category">
    <div class="modal-dialog">
        <form action="{{route('stores.category.store',$store_id)}}" method="post" class="add-new-user modal-content pt-0">
            @csrf
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">New Store Category</h5>
            </div>
            <div class="modal-body flex-grow-1">

                
                <div class="form-group">

                    <label class="form-label" for="category_id">Category</label>

                    <select name="category_id" id="category_id" required class="form-control">
                        <option disabled="true" value="" selected>Choose category</option>
                    </select>

                </div>

                <button type="submit" class="btn btn-primary mr-1 data-submit">Submit</button>
                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>


@push('js')

<script>


                /*----------------------------------*///

                var id = '{{$store_id;}}';

                var url_storecatgories = '{{ route("api.store.categories",":id") }}';

                url_storecatgories  = url_storecatgories.replace(':id', id);


                let ajaxSelectcategory = {
                    url: url_storecatgories,
                    processResults: procRescategorys
                };

                $('#category_id' ).select2({
                    theme: 'bootstrap4',
                    ajax: ajaxSelectcategory
                });

                function procRescategorys(data) {
                    // Transforms the top-level key of the response object from 'items' to 'results'
                    let items = [];

                    for (let x = 0; x < data.data.length; x++) {
                        let category = data.data[x];
                        items.push({
                            id: category.id,
                            text: category.name,
                        });
                    }
                    return {results: items};
                }


</script>
    
@endpush