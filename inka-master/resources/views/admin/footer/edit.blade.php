@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-envelope"></i> Edit Data Footer "<strong>{{ $footer->nama_id }}</strong>"
		@endslot

		@slot('preBody')
			{!! Form::model($footer, ['method' => 'PATCH','route' => ['footer.update', $footer->id]]) !!}
		@endslot

		@include('admin.footer.form', ['edit' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
