@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-user"></i> Edit Data User "<strong>{{ $user->name }}</strong>"
		@endslot

		@slot('preBody')
			{!! Form::model($user, ['method' => 'PATCH','route' => ['user.update', $user->id], 'files' => 'true', 'enctype' => 'multipart/form-data']) !!}
		@endslot

		@include('admin.user.form', ['edit' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
