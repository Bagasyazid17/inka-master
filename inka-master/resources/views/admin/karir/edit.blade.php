@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-user"></i> Edit Data Karir "<strong>{{ $karir->nama }}</strong>"
		@endslot

		@slot('preBody')
			{!! Form::model($karir, ['method' => 'PATCH','route' => ['karir.update', $karir->id], 'id' => 'karir-form', 'files' => 'true', 'enctype' => 'multipart/form-data']) !!}
		@endslot

		@include('admin.karir.form', ['edit' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
