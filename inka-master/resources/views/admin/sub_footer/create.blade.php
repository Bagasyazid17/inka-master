@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-envelope"></i> Tambah Sub Footer
		@endslot

		@slot('preBody')
			{!! Form::open(['method' => 'POST','route' => ['sub-footer.store', $footer->id]]) !!}
		@endslot

		@include('admin.sub_footer.form', ['create' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
