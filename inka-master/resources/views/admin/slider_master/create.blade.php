@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-user"></i> Tambah Master Slider
		@endslot

		@slot('preBody')
			{!! Form::open(['method' => 'POST','route' => 'slider-master.store']) !!}
		@endslot

		@include('admin.slider_master.form', ['create' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
