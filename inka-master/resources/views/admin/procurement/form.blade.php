@slot('body')
	<div class="form-group">
		{!! Form::label('judul', 'Judul Procurement', array('class' => 'required-input')) !!}
		{!! Form::text('judul', null, array('placeholder' => 'Judul Procurement','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('judul')])
		@endcomponent
	</div>

	<div class="form-group">
		{!! Form::label('mulai', 'Tanggal Mulai', array('class' => 'required-input')) !!}
		{!! Form::date('mulai', null, array('placeholder' => 'Tanggal Mulai','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('mulai')])
		@endcomponent
	</div>
	
	<div class="form-group">
		{!! Form::label('selesai', 'Tanggal Selesai', array('class' => 'required-input')) !!}
		{!! Form::date('selesai', null, array('placeholder' => 'Tanggal Mulai','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('selesai')])
		@endcomponent
	</div>

	<div class="form-group">
		{!! Form::label('master_procurement_id', 'Master Procurement') !!}
		{!! Form::select('master_procurement_id', $masterProcurement, null, array('placeholder' => 'Pilih Master Procurement','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('master_procurement_id')])
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
			{!! $procurement->content !!}
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

	<div class="document-wrapper">
		<div class="document-list">
			@if(isset($edit))
				@foreach($procurement->document as $item)
					<div class="row procurement-file">
						<div class="col-xs-10">
							<a href="{{route('procurement.download-document', ['id' => $item->id])}}" target="_blank" class="form-control">{{$item->nama}}</a>
						</div>
						<div class="col-xs-2">
							<div class="delete-document" document="{{$item->id}}"><a class="btn-circle"><i class="lnr lnr-trash"></i></a></div>
						</div>
					</div>
				@endforeach
			@endif
		</div>
		<div class="document-add">
			<a class="btn btn-success document-add-btn">Tambah File</a>
		</div>
	</div>

@endslot
  
@slot('footer')
<div class="form-group">
  {!! link_to_route('procurement.index', 'Kembali', null, array('class' => 'btn  btn-default')) !!}
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
			var index = {{$procurement->content_index}};
		@endif

		var baseUrl = '{{url('/')}}/';
		var form = $('#procurement-form');
		var previewUrl = '{{route('preview.store')}}';
	</script>

	<script type="text/javascript" src="{{url('/')}}/js/editor.js"  data-turbolinks-track="reload"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('.document-add-btn').on('click', function(){
				var string = ''
				var file = '<div class="row karir-file">'+
								'<div class="col-xs-10">'+
									'{!! Form::file("document[]", array("class" => "form-control")) !!}'+
								'</div>'+
								'<div class="col-xs-2">'+
									'<div class="remove-document"><a class="btn-circle"><i class="lnr lnr-trash"></i></a></div>'+
								'</div>'+
							'</div>';
				$('.document-list').append(file);
			});

			$(document).delegate('.remove-document', 'click', function() {
				$(this).parent().parent().remove();
			});

			$('.delete-document').on('click', function(){
				var document_id = $(this).attr('document');
				var active = $(this);
				$.ajax({
			        method: 'POST',
			        url: '{{route('procurement.delete-document')}}',
			        dataType: 'json',
			        data: {
			        	"_token" : $('meta[name=csrf-token]').attr('content'),
			        	"document_id" : document_id
			        }
			    }).done(function (response) {
			        active.parent().parent().remove();
			    }).fail(function(jqXHR, textStatus, errorThrown) {
			    	console.log(jqXHR);
			    	console.log(textStatus + ': ' + errorThrown);
			    });
			});
		});
	</script>
@endpush