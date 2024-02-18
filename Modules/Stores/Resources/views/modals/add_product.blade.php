<div class="modal modal-slide-in fade" id="modals-slide-in-store-product">
    <div class="modal-dialog">
        <form action="{{route('stores.product.store',$store_id)}}" method="post" class="add-new-user modal-content pt-0">
            @csrf
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">New Store Product</h5>
            </div>
            <div class="modal-body flex-grow-1">

                
                <div class="form-group">

                    <label class="form-label" for="product_id">Product</label>

                    <select name="product_id" id="product_id" required class="form-control">
                        <option disabled="true" value="" selected>Choose product</option>
                    </select>

                </div>

                <div class="form-group demo-inline-spacing">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" name="visible" id="visible" value="1"  />
                      <label class="form-check-label" for="visible">Visible</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="featured" id="featured" value="1"  />
                        <label class="form-check-label" for="featured">Featured</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="new" name="new" value="1"  />
                        <label class="form-check-label" for="new">New</label>
                      </div>
                  
                  </div>

                <div class="form-group">
                    <label class="form-label" for="price">Price</label>
                    <input
                            type="number"
                            class="form-control"
                            id="price"
                            min="1"
                            placeholder="Product price"
                            name="price"
                    />
                </div>

                
                <div class="form-group">
                    <label class="form-label" for="price_old">Price Old</label>
                    <input
                            type="number"
                            class="form-control"
                            id="price_old"
                            min="0"
                            placeholder="Product price old"
                            name="price_old"
                    />
                </div>
   
                <div class="form-group">
                    <label class="form-label" for="price_text">price text</label>
                    <textarea class="form-control" id="price_text" name="price_text" cols="20" rows="5"></textarea>
                </div>

                <div class="form-group">
                    <label class="form-label" for="url">Landing url</label>
                    <textarea class="form-control" id="url" name="url" cols="20" rows="5"></textarea>
                </div>

                <div class="form-group">
                    <label class="form-label" for="discount">Discount</label>
                    <input
                            type="number"
                            class="form-control"
                            id="discount"
                            min="0"
                            placeholder="Product Discount"
                            name="discount"
                    />
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

            /*     let ajaxSelectProduct = {
                    url: '{{ route("api.products.all") }}',
                    processResults: procResProducts
                }; */

             /*    $('#product_id').select2({
                    theme: 'bootstrap4',
                    dropdownParent: $("#modals-slide-in-store-product"),
                    ajax: ajaxSelectProduct
                });
 */

                $('#product_id').select2({
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

             /*    function procResProducts(data) {
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
                } */


</script>
    
@endpush