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
		{!! Form::label('deskripsi', 'Deskripsi', array('class' => '')) !!}
		{!! Form::text('deskripsi', null, array('placeholder' => '(Opsional) Deskripsi singkat untuk memudahkan pencarian pada Dashboard','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('deskripsi')])
		@endcomponent

	</div>

	<div class="form-group">
		{!! Form::label('icon', 'Icon', array('class' => 'required-input')) !!} </br>
		{{-- {!! Form::label('icon', 'Upload Icon', array('for' => 'icon', 'class' => 'btn btn-success')) !!} --}}
		<label for="icon" class="btn btn-success">
			<i class="fa fa-plus-square"></i>
			Upload Icon
		</label>
		{!! Form::file('icon', array('class' => 'hidden', 'onchange' => 'imagePreview()')) !!}

		<div>
			<br>
			<img id="image-preview"
				@if(isset($edit))
					src="{{url('/')}}{{$masterProduct->icon}}" alt="Avatar" class="img-circle avatar" 
				@endif
			>
		</div>

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('icon')])
		@endcomponent

	</div>
@endslot
  
@slot('footer')
<div class="form-group">
  {!! link_to_route('master-product.index', 'Kembali', null, array('class' => 'btn  btn-default')) !!}
  {!! Form::submit('Simpan', array('class' => 'btn btn-primary')) !!}
</div>
@endslot

@push('scripts')
	<script type="text/javascript">
		function imagePreview()
	        {
	            var file    = document.querySelector('input[type=file]').files[0];
	            var reader  = new FileReader();

	            reader.addEventListener("load", function ()
	            {
	                $('#image-preview').attr('src',reader.result);
	            }, false);

	            if (file) {
	                reader.readAsDataURL(file);
	            }
	        };
	</script>
@endpush