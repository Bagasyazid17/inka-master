@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-picture"></i> Tambah Media "<strong>{{ $galeri->nama }}</strong>"
		@endslot

		@slot('preBody')
			{!! Form::open(['method' => 'POST','route' => ['media.store', $galeri->id], 'enctype'=>'multipart/form-data']) !!}
		@endslot

		@include('admin.media.form', ['create' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
