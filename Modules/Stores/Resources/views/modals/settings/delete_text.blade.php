<div class="modal fade modal-danger text-left" id="archive-setting-text" tabindex="-1"
    aria-labelledby="myModalLabel120" aria-hidden="true" style="display: none;">
   <div class="modal-dialog modal-dialog-centered" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="myModalLabel120">Archive Setting Text</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">×</span>
               </button>
           </div>
           <form method="post" id="form-archive-setting-text">
               @csrf
               @method('delete')
               <div class="modal-body">
                   Are you sure to archive this setting text ?
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

            function DeleteSettingText(id){

                var url_delete_store = '{{ route("store.settings.delete",":id") }}';

                url_delete_store  = url_delete_store .replace(':id', id);

                $('#form-archive-setting-text').attr('action', url_delete_store);

               
            }
            
        </script>
    
@endpush