{{-- Vendor Scripts --}}
<script src="{{ asset(mix('vendors/js/vendors.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/ui/prism.min.js')) }}"></script>


@yield('vendor-script')
{{-- Theme Scripts --}}
<script src="{{ asset(mix('js/core/app-menu.js')) }}"></script>
<script src="{{ asset(mix('js/core/app.js')) }}"></script>

<script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap4.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>

<script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/swiper.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/dropzone.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>

<script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
{{-- <script src="{{ asset(mix('vendors/js/editors/quill/katex.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/editors/quill/highlight.min.js')) }}"></script> --}}
{{-- <script src="{{ asset(mix('vendors/js/editors/quill/quill.min.js')) }}"></script> --}}

<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

@if($configData['blankPage'] === false)
    <script src="{{ asset(mix('js/scripts/customizer.js')) }}"></script>
@endif
{{-- page script --}}
@yield('page-script')
{{-- page script --}}
<script src="{{ asset(mix('js/scripts/extensions/ext-component-swiper.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/forms/form-file-uploader.js')) }}"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="{{ asset(mix('js/scripts/extensions/ext-component-toastr.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
<script src="{{ asset(mix('js/scripts/forms/form-quill-editor.js')) }}"></script>

<script >
    @if(Session::has('success'))
    
           toastr.success("{{ Session::get('success') }}")
    
   
    @endif
  
  
    @if(Session::has('orange'))
    
           toastr.info("{{ Session::get('orange') }}")
    
   
    @endif
  
  
    @if(Session::has('error'))
    
           toastr.error("{{ Session::get('error') }}")
    
   
    @endif
</script>