<!DOCTYPE html>
<html lang="en">
@include('frontend/master/layouts/head')
<body>
    @yield('css')
    <!-- Header -->
    @include('frontend/master/layouts/header')

    @yield('main')

    <!-- footer -->
    @include('frontend/master/layouts/footer')
    <!-- <div id="footer-bottom2"></div> -->
    <!-- end footer -->
    @yield('js')
</body>
</html>