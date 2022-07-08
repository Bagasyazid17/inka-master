@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-envelope"></i> Tambah Data Topik
		@endslot

		@slot('preBody')
			{!! Form::open(['method' => 'POST','route' => ['topik.store']]) !!}
		@endslot

		@include('admin.topik.form', ['create' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
