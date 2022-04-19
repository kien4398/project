<!DOCTYPE html>
<html>
@include('backend/master/layouts/head')
@yield('css')
<body>
		@include('backend/master/layouts/header')
		
        @include('backend/master/layouts/sidebar')

        @yield('main')

        
        @yield('js')
        
        <script src="js/bootstrap.min.js"></script>	
        <script src="js/bootstrap-table.js"></script>
    @include('backend/master/layouts.general-js')
</body>

</html>
