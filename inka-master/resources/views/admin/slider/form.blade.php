@slot('body')
	<div class="form-group">
		{!! Form::label('judul', 'Judul Gambar', array('class' => 'required-input')) !!}
		{!! Form::text('judul', null, array('placeholder' => 'Judul Gambar','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('judul')])
		@endcomponent

	</div>

	<div class="form-group">
		{!! Form::label('tagline_1', 'Tagline #1', array('class' => '')) !!}
		{!! Form::text('tagline_1', null, array('placeholder' => 'Kata-kata yang tertera pada gambar','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('tagline_1')])
		@endcomponent

	</div>

	<div class="form-group">
		{!! Form::label('tagline_2', 'Tagline #2', array('class' => '')) !!}
		{!! Form::text('tagline_2', null, array('placeholder' => 'Kata-kata yang tertera pada gambar, di bawah kata-kata sebelumnya','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('tagline_2')])
		@endcomponent

	</div>

	<div class="form-group">
		{!! Form::label('url', 'Link', array('class' => '')) !!}
		{!! Form::text('url', null, array('placeholder' => 'Link ketika gambar di klik','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('url')])
		@endcomponent

	</div>

	<div class="form-group">
		{!! Form::label('gambar', 'Gambar', array('class' => 'required-input')) !!} </br>
		<label id="image-upload" class="btn btn-success">
			<i class="fa fa-plus-square"></i>
			Upload Gambar
		</label>
		{!! Form::text('gambar', null, array('class' => 'hidden', 'id' => 'gambar')) !!}

		<div class="slider-img">
			<br>
			<img id="image-preview"
				@if(isset($edit))
					src="{{url('/')}}/{{$slider->gambar}}"
				@endif
			>
		</div>

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('gambar')])
		@endcomponent

	</div>
@endslot

@slot('footer')
<div class="form-group">
  {!! link_to_route('slider.index', 'Kembali', ['sliderMasterId' => $sliderMaster->id], array('class' => 'btn  btn-default')) !!}
  {!! Form::submit('Simpan', array('class' => 'btn btn-primary')) !!}
</div>
@endslot

@push('scripts')
	<script type="text/javascript">
		var baseUrl = '{{url('/')}}/';

		var target = $('#gambar');
	</script>
	<script type="text/javascript" src="{{url('/')}}/js/imageupload.js"  data-turbolinks-track="reload"></script>
@endpush
