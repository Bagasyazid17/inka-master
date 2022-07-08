@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			@if($isCatalogue == 0)
				<i class="lnr lnr-train"></i> Tambah Data Product
			@elseif($isCatalogue == 1)
				<i class="lnr lnr-train"></i> Tambah Data Katalog
			@endif
		@endslot

		@slot('preBody')
			{!! Form::open(['method' => 'POST','route' => ['product.store', $isCatalogue], 'id' => 'product-form']) !!}
		@endslot

		@include('admin.product.form', ['create' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
