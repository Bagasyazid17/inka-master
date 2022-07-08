@slot('body')
	<div class="form-group">
		{!! Form::label('judul', 'Judul Broadcast', array('class' => 'required-input')) !!}
		{!! Form::text('judul', null, array('placeholder' => 'Judul Broadcast','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('judul')])
		@endcomponent

	</div>

	<div class="form-group">
		{!! Form::label('content', 'Konten Broadcast', array('class' => 'required-input')) !!}
		{!! Form::textarea('content', null, array('placeholder' => 'Konten Broadcast','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('content')])
		@endcomponent

	</div>
@endslot

@slot('footer')
<div class="form-group">
  {!! link_to_route('broadcast.index', 'Kembali', null, array('class' => 'btn  btn-default')) !!}
  {!! Form::submit('Simpan', array('class' => 'btn btn-primary')) !!}
</div>
@endslot

@push('scripts')
	<script type="text/javascript">
	</script> 
@endpush