@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-user"></i> Tambah Data Berita
		@endslot

		@slot('preBody')
			{!! Form::open(['method' => 'POST','route' => 'berita.store', 'files' => 'true', 'enctype' => 'multipart/form-data', 'id' => 'berita-form']) !!}
		@endslot

		@include('admin.berita.form', ['create' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
