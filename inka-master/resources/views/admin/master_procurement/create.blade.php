@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-user"></i> Tambah Data Master Procurement
		@endslot

		@slot('preBody')
			{!! Form::open(['method' => 'POST','route' => ['master-procurement.store']]) !!}
		@endslot

		@include('admin.master_procurement.form', ['create' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
