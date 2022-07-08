@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-train"></i> Tambah Data Category Product
		@endslot

		@slot('preBody')
			{!! Form::open(['method' => 'POST','route' => ['category-product.store']]) !!}
		@endslot

		@include('admin.category_product.form', ['create' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
