@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-user"></i> Edit Password
		@endslot

		@slot('preBody')
			{!! Form::model(null, ['method' => 'PATCH','route' => 'password.update']) !!}
		@endslot

		@include('admin.user.passwordForm')

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
