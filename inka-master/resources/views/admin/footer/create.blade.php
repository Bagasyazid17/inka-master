@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-envelope"></i> Tambah Data Footer
		@endslot

		@slot('preBody')
			{!! Form::open(['method' => 'POST','route' => ['footer.store']]) !!}
		@endslot

		@include('admin.footer.form', ['create' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
