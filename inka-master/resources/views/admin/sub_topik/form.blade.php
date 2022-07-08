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
		{!! Form::label('email', 'Email', array('class' => 'required-input')) !!}
		{!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('email')])
		@endcomponent

	</div>
@endslot
  
@slot('footer')
<div class="form-group">
  {!! link_to_route('sub-topik.index', 'Kembali', ['topikId' => $topik->id], array('class' => 'btn  btn-default')) !!}
  {!! Form::submit('Simpan', array('class' => 'btn btn-primary')) !!}
</div>
@endslot