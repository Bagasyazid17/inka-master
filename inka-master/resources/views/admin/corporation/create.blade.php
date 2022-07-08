@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-apartment"></i> Tambah Menu Corporation
		@endslot

		@slot('preBody')
			{!! Form::open(['method' => 'POST','route' => ['corporation.store'], 'id' => 'corporation-form']) !!}
		@endslot

		@include('admin.corporation.form', ['create' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
