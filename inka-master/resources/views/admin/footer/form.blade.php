@slot('body')
	<div class="form-group">
		{!! Form::label('nama_id', 'Nama Topik Bahasa Indonesia', array('class' => 'required-input')) !!}
		{!! Form::text('nama_id', null, array('placeholder' => 'Nama Topik Bahasa Indonesia','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('nama_id')])
		@endcomponent

	</div>

	<div class="form-group">
		{!! Form::label('nama_en', 'Nama Topik Bahasa Inggris', array('class' => 'required-input')) !!}
		{!! Form::text('nama_en', null, array('placeholder' => 'Nama Topik Bahasa Inggris','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('nama_en')])
		@endcomponent

	</div>
@endslot
  
@slot('footer')
<div class="form-group">
  {!! link_to_route('home-setting.index', 'Kembali', null, array('class' => 'btn  btn-default')) !!}
  {!! Form::submit('Simpan', array('class' => 'btn btn-primary')) !!}
</div>
@endslot