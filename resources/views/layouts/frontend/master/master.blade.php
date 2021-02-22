<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<!-- Document title -->
	<title> @yield('title') </title>
	<link rel="icon" href="@php 
        echo detail_app()->icon
        @endphp" type="image/ico" />
	<!-- Stylesheets & Fonts -->
	<link href="{{ asset('frontend/css/plugins.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">
</head>
<body>
	<!-- Body Inner -->
	<div class="body-inner">
		<!-- Header -->
		@include('layouts.frontend.master.head')
		<!-- end: Header -->

		@yield('content')

		<!-- Footer -->
		@include('layouts.frontend.master.footer')
		<!-- end: Footer -->

	</div>
	<!-- end: Body Inner -->

	<!-- Scroll top -->
	<a id="scrollTop"><i class="icon-chevron-up1"></i><i class="icon-chevron-up1"></i></a>

	<!--Plugins-->
	<script src="{{ asset('frontend/js/jquery.js') }}"></script>
	<script src="{{ asset('frontend/js/plugins.js') }}"></script>

	<!--Template functions-->
	<script src="{{ asset('frontend/js/functions.js') }}"></script>
	@yield('script')
</body>

</html>