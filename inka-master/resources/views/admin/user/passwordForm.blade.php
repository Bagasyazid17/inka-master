@slot('body')
	<div class="form-group">
		{!! Form::label('password_lama', 'Password Lama', array('class' => '')) !!}
		{!! Form::password('password_lama', array('placeholder' => 'Password Lama','class' => 'form-control')) !!}
		
		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('password_lama')])
		@endcomponent
	</div>
	<div class="form-group">
		{!! Form::label('password', 'Password Baru', array('class' => 'required-input')) !!}
		{!! Form::password('password', array('placeholder' => 'Password Baru','class' => 'form-control')) !!}
		
		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('password')])
		@endcomponent
	</div>
	<div class="form-group">
		{!! Form::label('password_confirmation', 'Konfirmasi Password Baru', array('class' => 'required-input')) !!}
		{!! Form::password('password_confirmation', array('placeholder' => 'Konfirmasi Password Baru','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('password_confirmation')])
		@endcomponent
	</div>

@endslot
  
@slot('footer')
<div class="form-group">
  {!! link_to_route('user.index', 'Kembali', null, array('class' => 'btn  btn-default')) !!}
  {!! Form::submit('Simpan', array('class' => 'btn btn-primary')) !!}
</div>
@endslot
