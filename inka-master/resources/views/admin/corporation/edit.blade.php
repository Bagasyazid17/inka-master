@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-apartment"></i> Edit Data Menu Corporation "<strong>{{ $corporation->nama }}</strong>"
		@endslot

		@slot('preBody')
			{!! Form::model($corporation, ['method' => 'PATCH','route' => ['corporation.update', $corporation->id], 'id' => 'corporation-form']) !!}
		@endslot

		@include('admin.corporation.form', ['edit' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
