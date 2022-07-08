@slot('body')
	<div class="form-group">
		{!! Form::label('nama', 'Nama Menu', array('class' => 'required-input')) !!}
		{!! Form::text('nama', null, array('placeholder' => 'Nama Menu','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('nama')])
		@endcomponent

	</div>
    
	<div class="form-group">
		<?php $bahasaOption = ['id' => 'Indonesia', 'en' => 'Inggris'] ?>
        {!! Form::label('bahasa', 'Bahasa',array('class' => 'required-input')) !!}
        {!! Form::select('bahasa', $bahasaOption, null, array('placeholder' => 'Bahasa','class' => 'form-control')) !!}

        @component('layouts.admin.components.forms.errors', ['errors' => $errors->get('bahasa')])
		@endcomponent
	</div>
	<!-- END OF EDITOR -->
@endslot
  
@slot('footer')
<div class="form-group">
  {!! link_to_route('menu.index', 'Kembali', null, array('class' => 'btn  btn-default')) !!}
  {!! Form::submit('Simpan', array('class' => 'btn btn-primary')) !!}
</div>
@endslot
