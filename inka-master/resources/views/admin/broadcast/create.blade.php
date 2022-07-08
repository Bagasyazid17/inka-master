@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-user"></i> Tambah Data Broadcast
		@endslot

		@slot('preBody')
			{!! Form::open(['method' => 'POST','route' => ['broadcast.store']]) !!}
		@endslot

		@include('admin.broadcast.form', ['create' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
