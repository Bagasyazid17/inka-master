@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-user"></i> Edit Data Berita "<strong>{{ $berita->judul }}</strong>"
		@endslot

		@slot('preBody')
			{!! Form::model($berita, ['method' => 'PATCH','route' => ['berita.update', $berita->id], 'files' => 'true', 'enctype' => 'multipart/form-data', 'id' => 'berita-form']) !!}
		@endslot

		@include('admin.berita.form', ['edit' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
