<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layout.head')
    @stack('css')
	<title>@lang('common.Mata3em') | @yield('title')</title>
	 <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>
<body class="theme-red text-{{dirFull()}}" dir='{{direction()}}'>
	<section id="container">
		<!--header start-->
		@include('layout.header')
		<!--header end-->
		<!--sidebar start-->
		@include('layout.sidebar')
		<!--sidebar end-->
		<!--main content start-->
		<section class="content">
			<section class="container-fluid text-{{dirFull()}}">
				@yield('content')
			</section>
		</section>
		<!--main content end-->
		<!--footer start-->
		<!--footer end-->
	</section>

	<!-- js placed at the end of the document so the pages load faster -->
	@include('layout.foot')
	@stack('modals')
	@stack('js')
</body>
</html>
