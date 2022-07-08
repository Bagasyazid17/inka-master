@slot('body')
	<div class="form-group">
		{!! Form::label('nama_id', 'Nama Sub Topik Bahasa Indonesia', array('class' => 'required-input')) !!}
		{!! Form::text('nama_id', null, array('placeholder' => 'Nama Sub Topik Bahasa Indonesia','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('nama_id')])
		@endcomponent

	</div>

	<div class="form-group">
		{!! Form::label('nama_en', 'Nama Sub Topik Bahasa Inggris', array('class' => 'required-input')) !!}
		{!! Form::text('nama_en', null, array('placeholder' => 'Nama Sub Topik Bahasa Inggris','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('nama_en')])
		@endcomponent

	</div>

	<div class="form-group">
		{!! Form::label('link', 'Link', array('class' => 'required-input')) !!}
		{!! Form::text('link', null, array('placeholder' => 'Link','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('link')])
		@endcomponent

	</div>
@endslot
  
@slot('footer')
<div class="form-group">
  {!! link_to_route('sub-footer.index', 'Kembali', ['footerId' => $footer->id], array('class' => 'btn  btn-default')) !!}
  {!! Form::submit('Simpan', array('class' => 'btn btn-primary')) !!}
</div>
@endslot