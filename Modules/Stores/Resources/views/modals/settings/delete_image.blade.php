<div class="modal fade modal-danger text-left" id="archive-setting-image" tabindex="-1"
    aria-labelledby="myModalLabel120" aria-hidden="true" style="display: none;">
   <div class="modal-dialog modal-dialog-centered" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="myModalLabel120">Archive Setting image</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">×</span>
               </button>
           </div>
           <form method="post" id="form-archive-setting-image">
               @csrf
               @method('delete')
               <div class="modal-body">
                   Are you sure to archive this setting image ?
               </div>
               <div class="modal-footer">
                   <button type="submit" class="btn btn-danger waves-effect waves-float waves-light">Accept</button>
               </div>
           </form>
       </div>
   </div>
</div>

@push('js')

        <script>

            function DeleteSettingImage(id){

                var url_delete_store = '{{ route("store.settings.delete_image",":id") }}';

                url_delete_store  = url_delete_store .replace(':id', id);


                $('#form-archive-setting-image').attr('action', url_delete_store);

               
            }
            
        </script>
    
@endpush