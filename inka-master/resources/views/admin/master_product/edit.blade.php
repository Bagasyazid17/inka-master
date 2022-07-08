@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-train"></i> Edit Data Main Product "<strong>{{ $masterProduct->nama_id }}</strong>"
		@endslot

		@slot('preBody')
			{!! Form::model($masterProduct, ['method' => 'PATCH','route' => ['master-product.update', $masterProduct->id], 'files' => 'true', 'enctype' => 'multipart/form-data']) !!}
		@endslot

		@include('admin.master_product.form', ['edit' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
