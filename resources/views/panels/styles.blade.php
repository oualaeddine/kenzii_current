<link rel="stylesheet" href="{{ asset(mix('vendors/css/vendors.min.css')) }}"/>
<link rel="stylesheet" href="{{ asset(mix('vendors/css/ui/prism.min.css')) }}"/>
{{-- Vendor Styles --}}
@yield('vendor-style')
{{-- Theme Styles --}}
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/swiper.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/core.css')) }}"/>
<link rel="stylesheet" href="{{ asset(mix('vendors/css/file-uploaders/dropzone.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/katex.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/monokai-sublime.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.snow.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.bubble.css')) }}">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Inconsolata&family=Roboto+Slab&family=Slabo+27px&family=Sofia&family=Ubuntu+Mono&display=swap" rel="stylesheet">
{{-- {!! Helper::applClasses() !!} --}}
@php $configData = Helper::applClasses(); @endphp

{{-- Page Styles --}}
@if($configData['mainLayoutType'] === 'horizontal')
    <link rel="stylesheet" href="{{ asset(mix('css/base/core/menu/menu-types/horizontal-menu.css')) }}"/>
@endif
<link rel="stylesheet" href="{{ asset(mix('css/base/core/menu/menu-types/vertical-menu.css')) }}"/>
<!-- <link rel="stylesheet" href="{{ asset(mix('css/base/core/colors/palette-gradient.css')) }}"> -->

{{-- Page Styles --}}
@yield('page-style')
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-swiper.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-file-uploader.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-pickadate.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-quill-editor.css')) }}">

{{-- Laravel Style --}}
<link rel="stylesheet" href="{{ asset(mix('css/overrides.css')) }}"/>

{{-- Custom RTL Styles --}}

@if($configData['direction'] === 'rtl' && isset($configData['direction']))
    <link rel="stylesheet" href="{{ asset(mix('css/custom-rtl.css')) }}"/>
@endif


<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap4.min.css')) }}">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.bootstrap.min.css">

<link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">


{{-- user custom styles --}}
<link rel="stylesheet" href="{{ asset(mix('css/style.css')) }}"/>
<link rel="stylesheet" href="{{ asset(mix('css/style-rtl.css')) }}"/>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
<link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.3.4/dist/select2-bootstrap4.min.css"
      rel="stylesheet"/>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous" referrerpolicy="no-referrer"/>