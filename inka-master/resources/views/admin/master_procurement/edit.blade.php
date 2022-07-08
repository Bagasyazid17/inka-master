@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-user"></i> Edit Data Master Procurement "<strong>{{ $masterProcurement->nama }}</strong>"
		@endslot

		@slot('preBody')
			{!! Form::model($masterProcurement, ['method' => 'PATCH','route' => ['master-procurement.update', $masterProcurement->id]]) !!}
		@endslot

		@include('admin.master_procurement.form', ['edit' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
