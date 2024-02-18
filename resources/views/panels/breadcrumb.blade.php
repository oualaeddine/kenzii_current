<div class="content-header row">
    <div class="content-header-left col-md-8 col-8 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">@yield('title')</h2>
                <div class="breadcrumb-wrapper">
                    @yield('breadcrumbs')
                </div>
            </div>
        </div>
    </div>

    <div class="content-header-right col-md-4 col-4 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                @yield('breadcrumb_btn')
            </div>
        </div>
    </div>
</div>
