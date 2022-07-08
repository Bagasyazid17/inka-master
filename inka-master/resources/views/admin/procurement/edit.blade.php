@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-user"></i> Edit Data Procurement "<strong>{{ $procurement->judul }}</strong>"
		@endslot

		@slot('preBody')
			{!! Form::model($procurement, ['method' => 'PATCH','route' => ['procurement.update', $procurement->id], 'id' => 'procurement-form', 'files' => 'true', 'enctype' => 'multipart/form-data']) !!}
		@endslot

		@include('admin.procurement.form', ['edit' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
