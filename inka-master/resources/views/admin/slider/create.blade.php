@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-user"></i> Tambah Gambar Slider "<strong>{{ $sliderMaster->nama }}</strong>"
		@endslot

		@slot('preBody')
			{!! Form::open(['method' => 'POST','route' => ['slider.store', $sliderMaster->id], 'files' => 'true', 'enctype' => 'multipart/form-data']) !!}
		@endslot

		@include('admin.slider.form', ['create' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
