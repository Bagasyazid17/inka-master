@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-user"></i> Edit Halaman Awal "<strong>{{ $bahasa }}</strong>"
		@endslot

		@slot('preBody')
			{!! Form::open(['method' => 'POST','route' => 'home-setting.store' ]) !!}
		@endslot

		@include('admin.home_setting.form', ['edit' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
