@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-envelope"></i> Edit Data Topik "<strong>{{ $topik->nama_id }}</strong>"
		@endslot

		@slot('preBody')
			{!! Form::model($topik, ['method' => 'PATCH','route' => ['topik.update', $topik->id]]) !!}
		@endslot

		@include('admin.topik.form', ['edit' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
