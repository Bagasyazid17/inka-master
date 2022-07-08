@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-envelope"></i> Tambah Sub Topik
		@endslot

		@slot('preBody')
			{!! Form::open(['method' => 'POST','route' => ['sub-topik.store', $topik->id]]) !!}
		@endslot

		@include('admin.sub_topik.form', ['create' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
