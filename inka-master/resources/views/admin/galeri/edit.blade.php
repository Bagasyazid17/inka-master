@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-picture"></i> Edit Data Galeri "<strong>{{ $galeri->nama }}</strong>"
		@endslot

		@slot('preBody')
			{!! Form::model($galeri, ['method' => 'PATCH','route' => ['galeri.update', $galeri->id]]) !!}
		@endslot

		@include('admin.galeri.form', ['edit' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
