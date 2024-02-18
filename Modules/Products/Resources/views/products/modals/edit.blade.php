<!-- Modal to add new record -->
<div class="modal modal-slide-in fade" id="modals-slide-in-product-edit">
    <div class="modal-dialog sidebar-sm">
        <form class="add-new-record modal-content pt-0" id="form-edit-product"  method="POST">
            @csrf
            @method('PUT')
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
                <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
            </div>
            <div class="modal-body flex-grow-1">
                <div class="form-group">
                    <label class="form-label" for="product-name-edit">Name</label>
                    <input
                            type="text"
                            class="form-control dt-full-name"
                            id="product-name-edit"
                            name="name"
                         
                            placeholder="Product name"
                            aria-label="Product name"
                    />
                </div>

                <div class="form-group">
                    <label class="form-label" for="slug-edit">Slug</label>
                    <input
                            type="text"
                            class="form-control dt-full-slug"
                            id="slug-edit"
                            name="slug"
                            placeholder="Product slug"
                            aria-label="Product slug"
                    />
                </div>

                <div class="form-group">
                    <label class="form-label" for="basic-icon-default-Brand">Brand</label>
                    <select name="brand_id" id="brand_id" required class="form-control">
                       
                    </select>
                </div>

                <input type="hidden" name="pg_nb" id="pg_nb">

                <div class="form-group">
                    <label class="form-label" for="basic-icon-default-manufacturer">Manufacturer</label>
                    <input
                            type="text"
                            class="form-control dt-full-manufacturer"
                            id="manufacturer-edit"
                            name="manufacturer"
                            placeholder="Product manufacturer"
                            aria-label="Product manufacturer"
                    />
                </div>

                <div class="form-group">
                    <label class="form-label" for="basic-icon-default-sizes">Sizes</label>
                    <input
                            type="text"
                            class="form-control dt-full-sizes"
                            id="sizes-edit"
                            name="sizes"
                            placeholder="Product sizes"
                            aria-label="Product sizes"
                    />
                </div>

          

                <div class="form-group">
                    <label class="form-label" for="basic-icon-default-num">Product Num</label>
                    <input
                            type="text"
                            class="form-control dt-full-num"
                            id="num-edit"
                            name="num"
                            placeholder="Product num"
                            aria-label="Product num"
                    />
                </div>

                

                <div class="form-group">
                    <label class="form-label" for="video_url">Video url</label>
                    <input
                            type="text"
                            class="form-control dt-full-num"
                            id="video_url"
                            name="video_url"
                            placeholder="Video url"
                            aria-label="video_url"
                    />
                </div>




                <div class="form-group">
                    <label class="form-label" for="short-desc-edit">short description</label>
                    <input
                            type="text"
                            id="short-desc-edit"
                            class="form-control dt-post"
                            name="short_description"
                            
                            placeholder="Short description"
                            aria-label="Short description"
                    />
                </div>


                <div class="form-group">
                    <label class="form-label" for="long-desc-edit">long
                        description</label>

                        <div class="row">
                            <div class="col-sm-12">
                              <div id="full-wrapper">
                                <div id="full-container">
                                  <div class="quill-textarea-edit" id="long-desc-edit" name="long_description">
                                 
                                    
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                    {{-- <textarea class="form-control dt-post" name="long_description"
                              id="basic-icon-default-long-desc" cols="30" rows="10"></textarea> --}}

                </div>

                <textarea style="display: none" id="long_description-edit" name="long_description"></textarea>

                <button type="submit" class="btn btn-success data-submit mr-1">Save</button>
                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>

@push('js')



        <script>

            
            $('#product-name-edit').on('input',function(){
                var Text = $(this).val();
                Text = Text.toLowerCase();
                Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
                $("#slug-edit").val(Text);  
            })

            function productEdit(id){

                var table = $('#products_table').DataTable();

                var info = table.page.info();
                $('#pg_nb').val(info.page);

                var url_change_edit_form = '{{ route("products.update",":id") }}';

                url_change_edit_form  =  url_change_edit_form .replace(':id', id);

                $('#form-edit-product').attr('action',url_change_edit_form );

                
                var id = id;

                var url_update = '{{ route("api.product",":id") }}';

                url_update = url_update.replace(':id', id);

                var data;

                var brand ;

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

                        data = data.data;

                        if(data.brand != null ){
                            brand = data.brand.name;
                            brand_id = data.brand.id;
                        }else{
                            brand = 'Choose Brand';
                            brand_id = '';
                        }
                        
                        var name = $('#product-name-edit').val(data.name);

                        var manufacturer = $('#manufacturer-edit').val(data.manufacturer);
                        var sizes = $('#sizes-edit').val(data.sizes);
                        var num = $('#num-edit').val(data.num);
                        var video_url = $('#video_url').val(data.video_url);
                        var slug_edit = $('#slug-edit').val(data.slug);
  
                        $('#long-desc-edit :first-child').empty();
                        var long_desc_edit = $('#long-desc-edit :first-child').html(data.long_description);
                        /*  var store_id = $('#store_id').val(); */
                        var short_desc = $('#short-desc-edit').val(data.short_description);
                        /*  var id_mairie = $('#mairie_id').val(); */
                        var long_description_text = $('#long_description-edit').val(data.long_description);


                        $('#brand_id').append('<option selected value="'+brand_id+'">'+brand+'</option>');


                        $('#brand_id').select2({
                        /* placeholder: brand, */
                    /*   placeholder: data.brand.name,
                        allowClear: true, */
                        theme: 'bootstrap4',
                        ajax: {
                            url: '{{ route("brands.get") }}',
                            dataType: 'json',
                            // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                            processResults: function(data) {
                                return {
                                    results: data
                                };
                            },

                        }
                        });

                    }
                });

                  
                
               

                


            }


            $(document).ready(function(){

                var quill = new Quill('.quill-textarea-edit', {
           
            theme: 'snow',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'indent': '-1'}, { 'indent': '+1' }]
                ]
            }
         });

         quill.on('text-change', function(delta, oldDelta, source) {
         
            $('#long_description-edit').val(quill.container.firstChild.innerHTML);
        });


  
            });
        </script>
        
        @endpush