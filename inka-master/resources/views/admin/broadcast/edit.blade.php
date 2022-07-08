@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-user"></i> Edit Data Broadcast "<strong>{{ $broadcast->judul }}</strong>"
		@endslot

		@slot('preBody')
			{!! Form::model($broadcast, ['method' => 'PATCH','route' => ['broadcast.update', $broadcast->id]]) !!}
		@endslot

		@include('admin.broadcast.form', ['edit' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
