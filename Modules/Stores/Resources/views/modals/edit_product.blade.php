<div class="modal modal-slide-in fade" id="edit-product-store">
    <div class="modal-dialog">
        <form method="post" class="modal-content pt-0" id="form-edit-store-product">
            @csrf
            @method("PUT")
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title">Update Store Product</h5>
            </div>
            <div class="modal-body flex-grow-1">

                 
                <div class="form-group">

                    <label class="form-label" for="category_store_id">Categories</label>

                    <select name="category_store_id[]" id="category_store_id" class="form-control" multiple="multiple" >
                        
                    </select>

                </div>


                <div class="form-group">

                    <label class="form-label" for="product_id-edit">Products</label>

                    <select name="product_id" id="product_id-edit" required class="form-control">
                        <option disabled="true" value="" selected>Choose product</option>
                    </select>

                </div>

                <input type="hidden" name="pg_nb" id="pg_nb">

                <div class="form-group demo-inline-spacing">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" name="visible" id="visible-edit" value="1"  />
                      <label class="form-check-label" for="visible-edit">Visible</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="featured" id="featured-edit" value="1"  />
                        <label class="form-check-label" for="featured-edit">Featured</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="new-edit" name="new" value="1"  />
                        <label class="form-check-label" for="new-edit">New</label>
                      </div>
                  
                  </div>

                <div class="form-group">
                    <label class="form-label" for="price-edit">Price</label>
                    <input
                            type="number"
                            class="form-control"
                            id="price-edit"
                            min="1"
                            placeholder="Product price"
                            name="price"
                    />
                </div>

                
                <div class="form-group">
                    <label class="form-label" for="price_old-edit">Price Old</label>
                    <input
                            type="number"
                            class="form-control"
                            id="price_old-edit"
                            min="0"
                            placeholder="Product price old"
                            name="price_old"
                    />
                </div>
   
                <div class="form-group">
                    <label class="form-label" for="price_text-edit">price text</label>
                    <textarea class="form-control" id="price_text-edit" name="price_text" cols="20" rows="5"></textarea>
                </div>

                <div class="form-group">
                    <label class="form-label" for="url">Landing url</label>
                    <textarea class="form-control" id="url" name="url" cols="20" rows="5"></textarea>
                </div>

                <div class="form-group">
                    <label class="form-label" for="discount-edit">Discount</label>
                    <input
                            type="number"
                            class="form-control"
                            id="discount-edit"
                            min="0"
                            placeholder="Product Discount"
                            name="discount"
                    />
                </div>

                
              
                <button type="submit" class="btn btn-primary mr-1 data-submit">Save Changes</button>
                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>


@push('js')

<script>

                /*----------------------------------*///
             /*    let ajaxSelectProductEdit = {
                    url: '{{ route("api.products.all") }}',
                    processResults: procResProductsEdit
                }; */

               /*  $('#product_id-edit').select2({
                    theme: 'bootstrap4',
                    ajax: ajaxSelectProductEdit
                }); */
                
                $('#product_id-edit').select2({
                /*  placeholder: "Start typing ...", */
                theme: 'bootstrap4',
                ajax: {
                    url: '{{ route("api.products.all") }}',
                    dataType: 'json',
                    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                    processResults: function(data) {
                        return {
                            results: data
                        };
                    },

                }
                });

         /*        function procResProductsEdit(data) {
                    // Transforms the top-level key of the response object from 'items' to 'results'
                    let items = [];

                    for (let x = 0; x < data.data.length; x++) {
                        let product = data.data[x];
                        items.push({
                            id: product.id,
                            text: '('+product.num+')'+product.name,
                            data: product.num
                        });
                    }
                    return {results: items};
                }
 */

</script>
    
@endpush