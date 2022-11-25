<!doctype html>
<html class="no-js" lang="en">

<!-- HEAD -->
@include('layouts.head')

<body class="mini-navbar">

    <!-- SIDEBAR -->
    @include('layouts.sidebar')

    <div class="all-content-wrapper">

        <!-- SIDEBAR -->
        @include('layouts.navbar')

        <!--MENU -->
        @yield('dashboard')
        
        <!-- USER -->
        @yield('indicator-list')
        @yield('indicator-create')
        @yield('indicator-update')
        @yield('indicator-detail-list')
        @yield('indicator-detail-create')
        @yield('indicator-detail-update')
        @yield('user-validation-list')
        

    </div>

    <!-- FOOTER -->
    @include('layouts.footer')

    <!-- SCRIPT -->
    @include('layouts.script')
    

</body>

</html>