@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-user"></i> Edit Gambar Slider "<strong>{{ $slider->judul }}</strong>"
		@endslot

		@slot('preBody')
			{!! Form::model($slider, ['method' => 'PATCH','route' => ['slider.update', $sliderMaster->id, $slider->id], 'files' => 'true', 'enctype' => 'multipart/form-data']) !!}
		@endslot

		@include('admin.slider.form', ['edit' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
