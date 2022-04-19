<!DOCTYPE html>
<html lang="en">
@include('frontend/master/layouts/head')
<body>
    <!-- Header -->
    @include('frontend/master/layouts/header')

    @yield('main')

    <!-- footer -->
    @include('frontend/master/layouts/footer')
    <!-- <div id="footer-bottom2"></div> -->
    <!-- end footer -->
</body>
</html>