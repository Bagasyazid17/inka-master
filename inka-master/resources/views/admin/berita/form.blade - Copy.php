@slot('body')
	<div class="form-group">
		{!! Form::label('judul', 'Judul Berita', array('class' => 'required-input')) !!}
		{!! Form::text('judul', null, array('placeholder' => 'Judul Berita','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('judul')])
		@endcomponent

	</div>

	<div class="form-group">
		{!! Form::label('thumbnail', 'Thumbnail', array('class' => 'required-input')) !!} </br>
		{{-- {!! Form::label('thumbnail', 'Upload Thumbnail', array('for' => 'thumbnail', 'class' => 'btn btn-success')) !!} --}}
		<label for="thumbnail" class="btn btn-success">
			<i class="fa fa-plus-square"></i>
			Upload Thumbnail
		</label>
		{!! Form::file('thumbnail', array('class' => 'hidden', 'onchange' => 'previewFile()')) !!}

		<div class="berita-img">
			<br>
			<img id="preview"
				@if(isset($edit))
					src="{{url('/')}}/{{$berita->thumbnail}}" alt="Image preview..."
				@endif
			>
		</div>

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('thumbnail')])
		@endcomponent

	</div>
	
	<div>		
		{!! Form::textarea('content', null, array('class' => 'hidden', 'id' => 'content')) !!}
		{!! Form::text('content_index', null, array('class' => 'hidden', 'id' => 'content_index', 'type' => 'number')) !!}
	</div>

	<div class="row">
        <div class="col-md-12" id="ckcontent">
			@if(isset($edit))
				{!! $berita->content !!}
			@endif
        </div>
    </div>
    <div class="row">
    	<div class="col-sm-12 add-element">
    		<a class="btn-circle add" column="1">Add 1 column</a>
    		<a class="btn-circle add" column="2">Add 2 column</a>
    		<a class="btn-circle add" column="3">Add 3 column</a>
    	</div>
    </div>
@endslot
  
@slot('footer')
<div class="form-group">
  {!! link_to_route('berita.index', 'Kembali', null, array('class' => 'btn  btn-default')) !!}
  <a id="submit" class="btn btn-success">Simpan</a>
</div>
@endslot

@push('scripts')
	<script type="text/javascript" src="{{url('/')}}/ckeditor/ckeditor.js"  data-turbolinks-track="reload"></script>
	<script type="text/javascript">
		CKEDITOR.disableAutoInline = true;

		function previewFile()
		{
			var file    = document.querySelector('input[type=file]').files[0];
			var reader  = new FileReader();

			reader.addEventListener("load", function ()
			{
				$('#preview').attr('src',reader.result);
			}, false);

			if (file) {
				reader.readAsDataURL(file);
			}
		}
		
		$(document).ready(function() {
			@if(isset($create))
				var index = 1;
			@elseif(isset($edit))
				var index = {{$berita->content_index}};
			    console.log(index);
			    for (var i = 1; i < index; i++) {
			    	var id = 'editor'+i;
			    	if ($('#'+id).length > 0)
						CKEDITOR.inline( id );
			    }
			@endif
			$('.add').on('click', function() {
				var column = $(this).attr('column');
				var width = 12/column;
				var element = '<div class="row">'+
									'<div class="remove-editor"><a class="btn-circle"><i class="lnr lnr-cross"></i></a></div>';
				for (var i = 0; i < column; i++) {
					element = element+'<div class="col-sm-'+width+' editor" id="editor'+(index+i)+'" contenteditable="true">'+
						'<h1>Let’s put a smile on that face!</h1>'+
					'</div>';
				}
				element = element+'</div>';
				$('#ckcontent').append(element);
				for (var i = 0; i < column; i++) {
					var id = 'editor'+(index+i);
					CKEDITOR.inline( id );
				}
				index = index+(+column);

			    $('#content_index').val(index);
			});

			$('#ckcontent').delegate('.remove-editor','click', function() {
				$(this).parent().remove();
			});

			$('#submit').on('click', function() {
				var content = $('#ckcontent').html();
			    $('#content').val(content);
				console.log(content);

			    $('#berita-form').submit();
			});
		});

	</script> 
@endpush