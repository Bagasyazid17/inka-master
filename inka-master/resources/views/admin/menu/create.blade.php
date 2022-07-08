@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-apartment"></i> Tambah Menu
		@endslot

		@slot('preBody')
			{!! Form::open(['method' => 'POST','route' => ['menu.store'], 'id' => 'menu-form']) !!}
		@endslot

		@include('admin.menu.form', ['create' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
