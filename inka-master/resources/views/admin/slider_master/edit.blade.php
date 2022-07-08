@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-user"></i> Edit Master Slider "<strong>{{ $sliderMaster->nama }}</strong>"
		@endslot

		@slot('preBody')
			{!! Form::model($sliderMaster, ['method' => 'PATCH','route' => ['slider-master.update', $sliderMaster->id]]) !!}
		@endslot

		@include('admin.slider_master.form', ['edit' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
