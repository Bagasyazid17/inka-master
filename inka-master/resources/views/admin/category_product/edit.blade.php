@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-train"></i> Edit Data Category Product "<strong>{{ $categoryProduct->nama_id }}</strong>"
		@endslot

		@slot('preBody')
			{!! Form::model($categoryProduct, ['method' => 'PATCH','route' => ['category-product.update', $categoryProduct->id]]) !!}
		@endslot

		@include('admin.category_product.form', ['edit' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
