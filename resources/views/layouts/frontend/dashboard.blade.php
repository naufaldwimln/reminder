@extends('layouts.frontend.master.master')
@section('title', @$general_app->name ?? 'Mitra Pedagang')
@section('icon', @$general_app->icon ?? 'frontend/images/logo-mp.ico')
@section('content')
	<!-- Inspiro Slider -->
	@if ($general_app->slider == '1')
		@include('layouts.frontend.master.slider')
	@endif
	<!--end: Inspiro Slider -->

	<!-- WELCOME -->
	@if ($general_app->header == '1')
		@include('layouts.frontend.master.header')
	@endif
	<!-- end: WELCOME -->

	<!-- WORK -->
	@if ($general_app->work == '1')
		@include('layouts.frontend.master.work')
	@endif
	<!-- end: WORK -->

	@if ($general_app->shop == '1')
		@include('layouts.frontend.master.shop')
	@endif

	<!-- PORTFOLIO -->
	@if ($general_app->portofolio == '1')
		@include('layouts.frontend.master.portofolio')
	@endif
	<!-- end: PORTFOLIO -->

	<!-- SERVICES -->
	@if ($general_app->service == '1')
		@include('layouts.frontend.master.services')
	@endif
	<!-- end: SERVICES -->

	<!-- BLOG -->
	@if ($general_app->artikel == '1')
		@include('layouts.frontend.master.blog')
	@endif
	<!-- end: BLOG -->

	<!-- CLIENTS -->
	@if ($general_app->client == '1')
		@include('layouts.frontend.master.clients')
	@endif
	<!-- end: CLIENTS -->
@endsection