@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-apartment"></i> Tambah Halaman Menu "<strong>{{ $menu->nama }}</strong>"
		@endslot

		@slot('preBody')
			{!! Form::open(['method' => 'POST','route' => ['page.store', $menu->id], 'id' => 'page-form']) !!}
		@endslot

		@include('admin.page.form', ['create' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
