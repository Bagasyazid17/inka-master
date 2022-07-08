@slot('body')
	<div class="form-group">
		{!! Form::label('nama', 'Nama Master Slider', array('class' => 'required-input')) !!}
		{!! Form::text('nama', null, array('placeholder' => 'Nama Master Slider','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('nama')])
		@endcomponent

	</div>

	<div class="form-group">
		{!! Form::label('deskripsi', 'Deskripsi Master Slider', array('class' => 'required-input')) !!}
		{!! Form::text('deskripsi', null, array('placeholder' => 'Deskripsi singkat master slider','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('deskripsi')])
		@endcomponent

	</div>
@endslot
  
@slot('footer')
<div class="form-group">
  {!! link_to_route('slider-master.index', 'Kembali', null, array('class' => 'btn  btn-default')) !!}
  {!! Form::submit('Simpan', array('class' => 'btn btn-primary')) !!}
</div>
@endslot
