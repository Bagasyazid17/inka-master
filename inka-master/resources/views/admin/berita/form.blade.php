@slot('body')
	<div class="form-group">
		{!! Form::label('judul', 'Judul Berita', array('class' => 'required-input')) !!}
		{!! Form::text('judul', null, array('placeholder' => 'Judul Berita','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('judul')])
		@endcomponent

	</div>

	<div class="form-group">
		{!! Form::label('tanggal', 'Tanggal Berita', array('class' => '')) !!}
		@if(isset($create))
			{!! Form::Date('tanggal', \Carbon\Carbon::now(), array('class' => 'form-control')) !!}
		@elseif(isset($edit))
			{!! Form::Date('tanggal', $berita->created_at, array('class' => 'form-control')) !!}
		@endif

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('tanggal')])
		@endcomponent

	</div>	

	<div class="form-group">
		{!! Form::label('thumbnail', 'Thumbnail', array('class' => 'required-input')) !!} </br>
		{{-- {!! Form::label('thumbnail', 'Upload Thumbnail', array('for' => 'thumbnail', 'class' => 'btn btn-success')) !!} --}}
		<label id="image-upload" class="btn btn-success">
			<i class="fa fa-plus-square"></i>
			Upload Thumbnail
		</label>
		{!! Form::text('thumbnail', null, array('class' => 'hidden', 'id' => 'thumbnail')) !!}

		<div class="berita-img">
			<br>
			<img id="image-preview"
				@if(isset($edit))
					src="{{url('/')}}/{{$berita->thumbnail}}" alt=""
				@endif
			>
		</div>

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('thumbnail')])
		@endcomponent

	</div>
	
	<!-- EDITOR -->
	<div>
		{!! Form::label('content', 'Konten', array('class' => 'required-input')) !!}
		{!! Form::textarea('content', null, array('class' => 'hidden', 'id' => 'content')) !!}
		{!! Form::text('content_index', null, array('class' => 'hidden', 'id' => 'content_index', 'type' => 'number')) !!}
	</div>

	<div id="ckcontent">
		@if(isset($edit))
			{!! $berita->content !!}
		@endif
    </div>

    <div class="add">
		<a data-toggle="modal" data-target="#add-modal"><img src="{{url('/')}}/icon/add.png"></a>
    </div>

    <!-- Modal -->
	<div class="modal fade" id="add-modal" role="dialog">
		<div class="modal-dialog" id="content-type">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Jumlah Kolom</h4>
			</div>
			<div class="modal-body">
				<div class="row-number">
					<a class="add-row" column="1">
						<img src="{{url('/')}}/icon/1.png">
						<div class="add-row-label">
							Kolom
						</div>
					</a>
					<a class="add-row" column="2">
						<img src="{{url('/')}}/icon/2.png">
						<div class="add-row-label">
							Kolom
						</div>
					</a>
					<a class="add-row" column="3">
						<img src="{{url('/')}}/icon/3.png">
						<div class="add-row-label">
							Kolom
						</div>
					</a>
				</div>
			</div>
		</div>

		</div>
	</div>

	<div class="modal fade" id="type-modal" role="dialog">
		<div class="modal-dialog" id="content-type">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Content Type</h4>
				</div>
				<div class="modal-body">
					<div class="content-type">
						<a class="add-element" media="text">
							<img src="{{url('/')}}/icon/text.png">
							<div class="add-element-label">
								Text
							</div>
						</a>
						<a class="add-element" media="image">
							<img src="{{url('/')}}/icon/image.png">
							<div class="add-element-label">
								Gambar
							</div>
						</a>
						<a class="add-element" media="video">
							<img src="{{url('/')}}/icon/video.png">
							<div class="add-element-label">
								Youtube Video
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF EDITOR -->

@endslot
  
@slot('footer')
<div class="form-group">
  {!! link_to_route('berita.index', 'Kembali', null, array('class' => 'btn  btn-default')) !!}
  <a id="submit" class="btn btn-success">Simpan</a>
  <a id="preview" class="btn btn-info">Preview</a>
</div>
@endslot

@push('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/css/editor.css">
@endpush

@push('scripts')
	<script type="text/javascript" src="{{url('/')}}/ckeditor/ckeditor.js"  data-turbolinks-track="reload"></script>
	<script type="text/javascript">
		@if(isset($create))
			var state = 'create';
			var index = 1;
		@elseif(isset($edit))
			var state = 'edit';
			var index = {{$berita->content_index}};
		@endif

		var baseUrl = '{{url('/')}}/';
		var form = $('#berita-form');
		var previewUrl = '{{route('preview.store')}}';

		var target = $('#thumbnail');
	</script>
	<script type="text/javascript" src="{{url('/')}}/js/imageupload.js"  data-turbolinks-track="reload"></script>
	<script type="text/javascript" src="{{url('/')}}/js/editor.js"  data-turbolinks-track="reload"></script>
@endpush