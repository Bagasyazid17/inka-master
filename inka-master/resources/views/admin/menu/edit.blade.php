@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-apartment"></i> Edit Data Menu "<strong>{{ $menu->nama }}</strong>"
		@endslot

		@slot('preBody')
			{!! Form::model($menu, ['method' => 'PATCH','route' => ['menu.update', $menu->id], 'id' => 'menu-form']) !!}
		@endslot

		@include('admin.menu.form', ['edit' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
