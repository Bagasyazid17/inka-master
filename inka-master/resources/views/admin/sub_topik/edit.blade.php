@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-envelope"></i> Edit Sub Topik "<strong>{{ $subTopik->nama_id }}</strong>"
		@endslot

		@slot('preBody')
			{!! Form::model($subTopik, ['method' => 'PATCH','route' => ['sub-topik.update', $topik->id, $subTopik->id]]) !!}
		@endslot

		@include('admin.sub_topik.form', ['edit' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
