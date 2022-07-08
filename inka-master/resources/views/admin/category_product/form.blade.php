@slot('body')
	<div class="form-group">
		{!! Form::label('nama_id', 'Nama Bahasa Indonesia', array('class' => 'required-input')) !!}
		{!! Form::text('nama_id', null, array('placeholder' => 'Nama Bahasa Indonesia','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('nama_id')])
		@endcomponent

	</div>
	<div class="form-group">
		{!! Form::label('nama_en', 'Nama Bahasa Inggris', array('class' => 'required-input')) !!}
		{!! Form::text('nama_en', null, array('placeholder' => 'Nama Bahasa Inggris','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('nama_en')])
		@endcomponent

	</div>
	<div class="form-group">
		{!! Form::label('master_product_id', 'Main Product') !!}
		{!! Form::select('master_product_id', $masterProduct, null, array('placeholder' => 'Pilih Main Product','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('master_product_id')])
		@endcomponent
	</div>
@endslot
  
@slot('footer')
<div class="form-group">
  {!! link_to_route('category-product.index', 'Kembali', null, array('class' => 'btn  btn-default')) !!}
  {!! Form::submit('Simpan', array('class' => 'btn btn-primary')) !!}
</div>
@endslot