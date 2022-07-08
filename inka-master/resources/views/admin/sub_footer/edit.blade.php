@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-envelope"></i> Edit Sub Footer "<strong>{{ $subFooter->nama_id }}</strong>"
		@endslot

		@slot('preBody')
			{!! Form::model($subFooter, ['method' => 'PATCH','route' => ['sub-footer.update', $footer->id, $subFooter->id]]) !!}
		@endslot

		@include('admin.sub_footer.form', ['edit' => true])

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection
