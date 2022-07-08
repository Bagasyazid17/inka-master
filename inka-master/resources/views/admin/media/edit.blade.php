@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-picture"></i> Edit Data Media "<strong>{{ $media->nama }}</strong>"
		@endslot

		@slot('preBody')
			{!! Form::model($media, ['method' => 'PATCH','route' => ['media.update', $galeri->id, $media->id], 'enctype'=>'multipart/form-data']) !!}
		@endslot

		@include('admin.media.form', ['edit' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
