@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-user"></i> Tambah Data Karir
		@endslot

		@slot('preBody')
			{!! Form::open(['method' => 'POST','route' => ['karir.store'], 'id' => 'karir-form', 'files' => 'true', 'enctype' => 'multipart/form-data']) !!}
		@endslot

		@include('admin.karir.form', ['create' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
