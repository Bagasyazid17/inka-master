@slot('body')
	<div class="form-group">
		{!! Form::label('nama', 'Nama', array('class' => 'required-input')) !!}
		{!! Form::text('nama', null, array('placeholder' => 'Nama','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('nama')])
		@endcomponent

	</div>

	<div class="form-group">
		{!! Form::label('type', 'Tipe Media') !!}
		{!! Form::select('type', [1=>'Gambar'], 1, array('class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('category_product_id')])
		@endcomponent
	</div>

	<div id="gambar-form" style="display: none;">
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
						src="{{url('/')}}/{{$media->link}}" alt="Image preview..."
					@endif
				>
			</div>
		</div>

		<div class="form-group">			
			<?php
				$tag = '';
				if (isset($edit)) {
					foreach ($media->mediaTag as $key => $item) {
						$tag = $tag.' '.$item->nama;
					}
				}
			?>
			{!! Form::label('tag', 'Tag', array('class' => '')) !!}
			{!! Form::text('tag', $tag, array('placeholder' => 'Tag','class' => 'form-control')) !!}

			@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('tag')])
			@endcomponent

		</div>
	</div>

	<div class="form-group" id="link-form"  style="display: none;">
		{!! Form::label('link', 'Link Video', array('class' => 'required-input')) !!}
		{!! Form::text('link', null, array('placeholder' => 'Link Video','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('link')])
		@endcomponent
	</div>

@endslot
  
@slot('footer')
<div class="form-group">
  <a class="btn btn-default" href="{{route('media.index', ['galeriId' => $galeri->id])}}">Kembali</a>
  {!! Form::submit('Simpan', array('class' => 'btn btn-primary')) !!}
</div>
@endslot

@push('scripts')
	<script type="text/javascript">
		var baseUrl = '{{url('/')}}/';

		var target = $('#gambar');
		$('#gambar-form').fadeIn();
		$(document).ready( function () {
			$('select[name="type"]').on('change', function(){
				var type = $(this).val();
				if(type == 1){
					$('#link-form').fadeOut();
					$('#gambar-form').fadeIn();
				}
				else if(type == 2){
					$('#gambar-form').fadeOut();
					$('#link-form').fadeIn();
				}
			});
			
			@if(isset($edit))
				@if($media->type == 1)
					$('#gambar-form').fadeIn();
				@elseif($media->type == 1)
					$('#link-form').fadeIn();
				@endif
			@endif
		});

	</script>
	<script type="text/javascript" src="{{url('/')}}/js/imageupload.js"  data-turbolinks-track="reload"></script>
@endpush
