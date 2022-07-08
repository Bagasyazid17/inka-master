@extends('layouts.admin.master')

@section('content')
	@component('layouts.admin.components.panelHeadline')
		@slot('title')
			<i class="lnr lnr-envelope"></i> Isi Pesan dari "<strong>{{ $contact->nama }}</strong>"
		@endslot

		@slot('preBody')
			{!! Form::model($contact, ['method' => 'PATCH','route' => ['contact.update', $contact->id]]) !!}
		@endslot
		
		@slot('body')
			<div class="contact-header row">
				<div class="col-sm-6 contact-header-left">
					<h4>Pengirim: <strong>{{$contact->nama}}</strong></h4>
					<h5><strong>Email: </strong> {{$contact->email}}</h5>
					<h5><strong>Telepon: </strong> {{$contact->telepon}}</h5>
				</div>
				<div class="col-sm-6 contact-header-right">
					<h5><strong>{{$contact->created_at->format('d F Y h:ia')}}</strong></h5>
					<h5><strong>Topik: </strong> {{$contact->subTopik->topik->nama_id}}</h5>
					<h5><strong>Sub topik: </strong> {{$contact->subTopik->nama_id}}</h5>
				</div>
			</div>

			<div class="form-group">
				{!! Form::textarea('content', null, ['class' => 'form-control', 'readonly']) !!}
			</div>

			@if($contact->status == 2)
			<div class="form-group reply-form">
				{!! Form::label('replied_by', 'Dibalas Oleh', array('class' => '')) !!}
				{!! Form::text('replied_by', $contact->repliedBy ? $contact->repliedBy->name: '', ['class' => 'form-control', 'readonly']) !!}
			</div>
			@endif

			<div class="form-group reply-form">
				{!! Form::label('reply', 'Balasan', array('class' => '')) !!}
				{!! Form::textarea('reply', null, ['class' => 'form-control reply-textarea', 'id' => 'balas-pesan']) !!}
			</div>
		@endslot

		@slot('footer')
			<div class="form-group">
			  {!! link_to_route('contact.index', 'Kembali', null, array('class' => 'btn  btn-default')) !!}
			  @if($contact->status != 2)
			  	<a class="btn btn-primary reply-btn">Balas</a>
			  	{!! Form::submit('Kirim', array('class' => 'btn btn-primary reply-form')) !!}
			  @endif
			</div>
		@endslot

		@slot('postFooter')
			{!! Form::close() !!}
		@endslot
	@endcomponent
@endsection

@push('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/css/editor.css">
@endpush

@push('scripts')
	<script type="text/javascript" src="{{url('/')}}/ckeditor/ckeditor.js"  data-turbolinks-track="reload"></script>
	<script type="text/javascript">
		$('documnet').ready(function(){
			@if($contact->status == 2)
				$('.reply-form').show();
				$('.reply-textarea').attr('readonly', true);
				CKEDITOR.replace( 'balas-pesan' );
			@endif

			$('.reply-btn').on('click', function(){
				$('.reply-form').show();
				CKEDITOR.replace( 'balas-pesan' );
				$('.reply-btn').hide();
			})
		})
	</script>
@endpush