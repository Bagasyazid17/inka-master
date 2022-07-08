@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-train"></i> Tambah Data Main Product
		@endslot

		@slot('preBody')
			{!! Form::open(['method' => 'POST','route' => ['master-product.store'], 'files' => 'true', 'enctype' => 'multipart/form-data']) !!}
		@endslot

		@include('admin.master_product.form', ['create' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
