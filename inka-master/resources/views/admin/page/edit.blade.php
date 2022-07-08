@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-apartment"></i> Edit Halaman "<strong>{{ $page->nama }}</strong>"
		@endslot

		@slot('preBody')
			{!! Form::model($page, ['method' => 'PATCH','route' => ['page.update', $menu->id, $page->id], 'id' => 'page-form']) !!}
		@endslot

		@include('admin.page.form', ['edit' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
