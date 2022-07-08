@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-picture"></i> Tambah Data Galeri
		@endslot

		@slot('preBody')
			{!! Form::open(['method' => 'POST','route' => ['galeri.store']]) !!}
		@endslot

		@include('admin.galeri.form', ['create' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
