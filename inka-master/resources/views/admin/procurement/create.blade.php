@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-user"></i> Tambah Data Procurement
		@endslot

		@slot('preBody')
			{!! Form::open(['method' => 'POST','route' => ['procurement.store'], 'id' => 'procurement-form', 'files' => 'true', 'enctype' => 'multipart/form-data']) !!}
		@endslot

		@include('admin.procurement.form', ['create' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
