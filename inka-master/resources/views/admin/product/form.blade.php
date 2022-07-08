@slot('body')
	<div class="form-group">
		<?php $bahasaOption = ['id' => 'Indonesia', 'en' => 'Inggris'] ?>
        {!! Form::label('bahasa', 'Bahasa',array('class' => 'required-input')) !!}
        {!! Form::select('bahasa', $bahasaOption, null, array('placeholder' => 'Bahasa','class' => 'form-control')) !!}

        @component('layouts.admin.components.forms.errors', ['errors' => $errors->get('bahasa')])
		@endcomponent
    </div>

	@if($isCatalogue == 0)
		<div class="form-group">
			{!! Form::label('master_product_id', 'Main Product') !!}
			@if(isset($create))
				{!! Form::select('master_product_id', $masterProduct, null, array('placeholder' => 'Pilih Main Product','class' => 'form-control')) !!}
			@endif
			@if(isset($edit))
				@if($product->categoryProduct)
					@if($product->categoryProduct->masterProduct)
						{!! Form::select('master_product_id', $masterProduct, $product->categoryProduct->masterProduct->id, 	array('placeholder' => 'Pilih Main Product','class' => 'form-control')) !!}
					@else
						{!! Form::select('master_product_id', $masterProduct, null, array('placeholder' => 'Pilih Main Product','class' => 'form-control')) !!}
					@endif
				@else
					{!! Form::select('master_product_id', $masterProduct, null, array('placeholder' => 'Pilih Main Product','class' => 'form-control')) !!}
				@endif
			@endif
			@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('master_product_id')])
			@endcomponent
		</div>

		<div id="category-product">
			
			<div class="form-group">
				{!! Form::label('category_product_id', 'Category Product') !!}
				{!! Form::select('category_product_id', $categoryProduct, null, array('placeholder' => 'Pilih Category Product','class' => 'form-control')) !!}

				@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('category_product_id')])
				@endcomponent
			</div>
			
		</div>
	@endif

	<div class="form-group">
		{!! Form::label('nama', 'Nama', array('class' => 'required-input')) !!}
		{!! Form::text('nama', null, array('placeholder' => 'Nama','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('nama')])
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
			{!! $product->content !!}
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

	@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('content')])
	@endcomponent

@endslot
  
@slot('footer')
<div class="form-group">
  {!! link_to_route('product.index', 'Kembali', ['isCatalogue' => $isCatalogue], array('class' => 'btn  btn-default')) !!}
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
			var index = {{$product->content_index}};
		@endif

		var baseUrl = '{{url('/')}}/';
		var form = $('#product-form');
		var previewUrl = '{{route('preview.store')}}';

		@if ($isCatalogue == 0)
			$(document).ready( function () {
				$('select[name="master_product_id"]').on('change', function() {
					// $('#category-product').empty();
					var master_product_id = $(this).val();
					var url = '{{ route("category-product.list", ['id'=>":id"]) }}';
					url = url.replace(':id',master_product_id);
					$('select[name="category_product_id"]').empty();
					$('select[name="category_product_id"]').append('<option value="" selected>Category Product</option></select>');
					
					$.ajax({
						url: url,
						type: "GET",
						dataType: "json",
						success:function(data) {
							if(data.length > 0){
								// $('#category-product').append('<div class="form-group">'+
								// 					'<label for="category_product_id" class="required-input">Category Product</label>'+
								// 					'<select class="form-control" id="category_product_id" name="category_product_id">'+
								// 					'<option value="" selected>Category Product</option></select>'+
								// 					'</div>');

								data.forEach(function(item) {
									$('select[name="category_product_id"]').append('<option value="'+item['id']+'">'+item['nama_id']+'</option>');
								});
							}
						}
					});
				});
			});
		@endif
	</script>

	<script type="text/javascript" src="{{url('/')}}/js/editor.js"  data-turbolinks-track="reload"></script>
@endpush
