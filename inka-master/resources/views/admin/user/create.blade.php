@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-user"></i> Tambah Data User
		@endslot

		@slot('preBody')
			{!! Form::open(['method' => 'POST','route' => ['user.store'], 'files' => 'true', 'enctype' => 'multipart/form-data']) !!}
		@endslot

		@include('admin.user.form', ['create' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
