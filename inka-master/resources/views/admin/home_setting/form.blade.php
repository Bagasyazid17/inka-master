@slot('body')
	
	{!! Form::label('nama', 'Daftar Element', array('class' => 'required-input')) !!}
	{!! Form::hidden('lang_id', $lang_id) !!}

	<div class="home-list">
		@foreach($homeSetting as $item)
		<div class="home-element-group">
			<div class="delete-home-element">
				delete
			</div>
			<div class="form-group">
				{!! Form::label('nama', 'Element', array('class' => '')) !!}
				{!! Form::select('nama[]', $option, $item->nama, array('placeholder' => 'Element','class' => 'form-control input-element')) !!}

				@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('nama')])
				@endcomponent
			</div>
			
			<div class="row non-survey" @if($item->nama == 'survey') style="display: none;" @endif>
				<div class="col-sm-6">
					{!! Form::label('total_item', 'Jumlah Item', array('class' => '')) !!}
					{!! Form::text('total_item[]', $item->total_item, array('placeholder' => 'Jumlah item','class' => 'form-control')) !!}
				</div>
				<div class="col-sm-6">
					{!! Form::label('column', 'Jumlah Kolom', array('class' => '')) !!}
					{!! Form::select('column[]', $column, $item->column, array('placeholder' => 'Jumlah Kolom','class' => 'form-control')) !!}
				</div>
			</div>
			
			<div class="row survey" @if($item->nama != 'survey') style="display: none;" @endif>
				<div class="col-sm-12">
					{!! Form::label('link', 'Link', array('class' => '')) !!}
					{!! Form::text("link[]", $item->link, array("placeholder" => "Link","class" => "form-control")) !!}
				</div>
			</div>
			
		</div>
		@endforeach
	</div>

	<div class="home-add">
		<a class="add-option btn btn-success">Tambah Elemen</a>
	</div>
@endslot
  
@slot('footer')
<div class="form-group">
	{!! link_to_route('home-setting.index', 'Kembali', null, array('class' => 'btn  btn-default')) !!}
	{!! Form::submit('Simpan', array('class' => 'btn btn-primary')) !!}
</div>
@endslot

@push('stylesheets')
@endpush

@push('scripts')
	<script type="text/javascript">
		$(document).ready(function(){
			$('.add-option').on('click', function(){
				$('.home-list').append('<div class="home-element-group">'+
											'<div class="delete-home-element">'+
												'delete'+
											'</div>'+
											'<div class="form-group">'+
												'{!! Form::label('nama', 'Element', array('class' => '')) !!}'+
												'{!! Form::select("nama[]", $option, null, array("placeholder" => "Element","class" => "form-control input-element")) !!}'+
											'</div>'+
											'<div class="row non-survey" style="display: none;">'+
												'<div class="col-sm-6">'+
													'{!! Form::label('total_item', 'Jumlah Item', array('class' => '')) !!}'+
													'{!! Form::text("total_item[]", null, array("placeholder" => "Jumlah item","class" => "form-control")) !!}'+
												'</div>'+
												'<div class="col-sm-6">'+
													'{!! Form::label('column', 'Jumlah Kolom', array('class' => '')) !!}'+
													'{!! Form::select("column[]", $column, null, array("placeholder" => "Jumlah Kolom","class" => "form-control")) !!}'+
												'</div>'+
											'</div>'+
											'<div class="row survey" style="display: none;">'+
												'<div class="col-sm-12">'+
													'{!! Form::label('link', 'Link', array('class' => '')) !!}'+
													'{!! Form::text("link[]", null, array("placeholder" => "Link","class" => "form-control")) !!}'+
												'</div>'+
											'</div>'+
										'</div>'
					);
			});

			$(document).delegate('.delete-home-element', 'click', function(){
				$(this).parent().remove();
			});

			$(document).delegate('.input-element', 'click', function(){
				if ($(this).val() == 'survey') {
					$(this).parent().siblings('.non-survey').hide();
					$(this).parent().siblings('.survey').show();
				}
				else{
					$(this).parent().siblings('.survey').hide();
					$(this).parent().siblings('.non-survey').show();
				}
			});
		});
	</script>
@endpush


