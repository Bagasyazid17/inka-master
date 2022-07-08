@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			@yield('title')
		@endslot

		@slot('body')
			
			@yield('inner-content')

	        @include('layouts.admin.components.deleteModal')
		@endslot
	@endcomponent
@endsection

@push('scripts')
	@include('layouts.admin.scripts.doDeleteAction')
@endpush