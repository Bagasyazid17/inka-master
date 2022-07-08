@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			@if($isCatalogue == 0)
				<i class="lnr lnr-train"></i> Edit Product "<strong>{{ $product->nama }}</strong>"
			@elseif($isCatalogue == 1)
				<i class="lnr lnr-train"></i> Edit Katalog "<strong>{{ $product->nama }}</strong>"
			@endif
		@endslot

		@slot('preBody')
			{!! Form::model($product, ['method' => 'PATCH','route' => ['product.update', $isCatalogue, $product->id], 'id' => 'product-form']) !!}
		@endslot

		@include('admin.product.form', ['edit' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
