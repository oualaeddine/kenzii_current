<!DOCTYPE html>
<html lang="ar">
@include('store.partials.head')
<body>
@include('store.partials.facebook_chat')
@include('store.partials.header')
<!-- Wrapper -->
<div class="lx-wrapper" dir="rtl">
    @yield('content')
</div>
@include('store.partials.footer')
<div class="lx-popup">
    <div class="lx-popup-inside">
        <a href="javascript:;"><i class="material-icons lx-remove">close</i></a>
        <a href="javascript:;"><i class="material-icons lx-angle-left">keyboard_arrow_left</i></a>
        <a href="javascript:;"><i class="material-icons lx-angle-right">keyboard_arrow_right</i></a>
        <div class="lx-popup-content">
            <div class="lx-popup-image">
                <img src="#" alt="image title here"/>
            </div>
        </div>
    </div>
</div>

@include('store.partials.js')
</body>
</html>
