@slot('body')
	<div class="form-group">
		{!! Form::label('nama', 'Nama', array('class' => 'required-input')) !!}
		{!! Form::text('nama', null, array('placeholder' => 'Nama','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('nama')])
		@endcomponent

	</div>
@endslot
  
@slot('footer')
<div class="form-group">
  {!! link_to_route('galeri.index', 'Kembali', null, array('class' => 'btn  btn-default')) !!}
  {!! Form::submit('Simpan', array('class' => 'btn btn-primary')) !!}
</div>
@endslot