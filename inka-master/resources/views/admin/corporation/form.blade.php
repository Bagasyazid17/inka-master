@slot('body')
	<div class="form-group">
		{!! Form::label('nama', 'Nama Menu', array('class' => 'required-input')) !!}
		{!! Form::text('nama', null, array('placeholder' => 'Nama Menu','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('nama')])
		@endcomponent

	</div>

	
	<div class="form-group">
		<?php $categoryOption = [0 => 'Main', 1 => 'Parent', 2 => 'Child'] ?>
        {!! Form::label('has_sub', 'Category Menu',array('class' => 'required-input')) !!}
        {!! Form::select('has_sub', $categoryOption, null, array('placeholder' => 'Categori Menu','class' => 'form-control')) !!}

        @component('layouts.admin.components.forms.errors', ['errors' => $errors->get('has_sub')])
		@endcomponent
    </div>

    
	<div class="form-group" id="bahasa-corporation">
			<?php $bahasaOption = ['id' => 'Indonesia', 'en' => 'Inggris'] ?>
	        {!! Form::label('bahasa', 'Bahasa',array('class' => 'required-input')) !!}
	        {!! Form::select('bahasa', $bahasaOption, null, array('placeholder' => 'Bahasa','class' => 'form-control')) !!}

	        @component('layouts.admin.components.forms.errors', ['errors' => $errors->get('bahasa')])
			@endcomponent
	</div>
	
    @if(isset($edit) && $corporation->has_sub == 2)
    	<?php $display = ''; ?>
    @else
    	<?php $display = 'none'; ?>
    @endif

    <div class="form-group" id="parent-corporation" style="display: {{$display}};">
        {!! Form::label('corporation_id', 'Parent Corporation',array('class' => 'required-input')) !!}
        {!! Form::select('corporation_id', $parentCorporation, null, array('placeholder' => 'Parent Corporation','class' => 'form-control')) !!}

        @component('layouts.admin.components.forms.errors', ['errors' => $errors->get('corporation_id')])
		@endcomponent
    </div>


    <!-- <div id="parent-corporation"></div> -->

	<!-- EDITOR -->
	<div id="content-label" style="display: none;">
		{!! Form::label('content', 'Konten', array('class' => 'required-input')) !!}
		{!! Form::textarea('content', null, array('class' => 'hidden', 'id' => 'content')) !!}
		{!! Form::text('content_index', null, array('class' => 'hidden', 'id' => 'content_index', 'type' => 'number')) !!}
	</div>

	<div id="ckcontent">
		@if(isset($edit))
			{!! $corporation->content !!}
		@endif
    </div>

    @if(isset($edit) && $corporation->has_sub == 1)
    	<?php $addDisplay = 'none'; ?>
    @else
    	<?php $addDisplay = ''; ?>
    @endif
    <div class="add" style="display: {{$addDisplay}};">
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
  {!! link_to_route('corporation.index', 'Kembali', null, array('class' => 'btn  btn-default')) !!}
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
			var index = {{$corporation->content_index}};
		@endif

		var baseUrl = '{{url('/')}}/';
		var form = $('#corporation-form');
		var previewUrl = '{{route('preview.store')}}';

		$(document).ready(function() {
			@if(isset($edit) && $corporation->has_sub != 1)
				// $('#parent-corporation').show();
				// $('.add').show();
			@else
				// $('#parent-corporation').hide();
				// $('.add').hide();
			@endif

			@if(isset($create))
				$('.add').hide();
			@endif

			$('select[name="has_sub"]').on('change', function() {
				var has_sub = $(this).val();
				console.log(has_sub);
				$('#content-corporation').empty();
				if(has_sub){
					switch(has_sub){
						case '0':
							$('#content-label').show();
							$('.add').show();
							$('#bahasa-corporation').show();
							$('#parent-corporation').hide();
							break;
						case '1':
							$('#bahasa-corporation').show();
							$('#parent-corporation').val(null);
							$('#parent-corporation').hide();
							$('#content-label').hide();
							$('.add').hide();
							break;
						case '2':
							$('#bahasa-corporation').show();
							$('#parent-corporation').show();
							$('.content-label').hide();
							$('.add').hide();
							break;
					}
				}
				else{
					$('#parent-corporation').hide();
					$('#parent-corporation').val(null);
					$('#content-label').hide();
					$('.add').hide();	
				}
				console.log(has_sub);
			});

			$('select[name="corporation_id"]').on('change', function() {
				// $('#content-corporation').empty();
				$('#content-label').show();
				$('.add').show();
			});


		});
	</script>

	<script type="text/javascript" src="{{url('/')}}/js/editor.js"  data-turbolinks-track="reload"></script>
@endpush

