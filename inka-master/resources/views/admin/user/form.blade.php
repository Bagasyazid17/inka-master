@slot('body')
	<div class="form-group">
		{!! Form::label('name', 'Nama', array('class' => 'required-input')) !!}
		{!! Form::text('name', null, array('placeholder' => 'Nama','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('name')])
		@endcomponent

	</div>

	<div class="form-group">
		{!! Form::label('email', 'Email', array('class' => 'required-input')) !!}
		{!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('email')])
		@endcomponent
	</div>

	<div class="form-group">
		@if(isset($create))
		{!! Form::label('password', 'Password', array('class' => 'required-input')) !!}
		{!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
		
		@endif
		
		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('password')])
		@endcomponent
	</div>
	<div class="form-group">
		@if(isset($create))
		{!! Form::label('password_confirmation', 'Konfirmasi Password', array('class' => 'required-input')) !!}
		{!! Form::password('password_confirmation', array('placeholder' => 'Konfirmasi Password','class' => 'form-control')) !!}
		@endif
		

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('password_confirmation')])
		@endcomponent
	</div>


	<div class="form-group">
		{!! Form::label('alamat', 'Alamat', array('class' => 'required-input')) !!}
		{!! Form::text('alamat', null, array('placeholder' => 'Alamat','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('alamat')])
		@endcomponent

	</div>

	<div class="form-group">
		{!! Form::label('nomor_ktp', 'Nomor KTP', array('class' => 'required-input')) !!}
		{!! Form::text('nomor_ktp', null, array('placeholder' => 'Nomor KTP','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('nomor_ktp')])
		@endcomponent

	</div>

	<div class="form-group">
		{!! Form::label('nomor_telpon', 'Nomor Telpon/HP', array('class' => 'required-input')) !!}
		{!! Form::text('nomor_telpon', null, array('placeholder' => '0xx-xxxx atau 08xx-xxxx-...','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('nomor_telpon')])
		@endcomponent

	</div>

	<div class="form-group">
		{!! Form::label('departemen', 'Departemen', array('class' => 'required-input')) !!}
		{!! Form::text('departemen', null, array('placeholder' => 'Departemen','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('departemen')])
		@endcomponent

	</div>

	<div class="form-group">
		{!! Form::label('foto', 'Foto', array('class' => 'required-input')) !!} </br>
		{{-- {!! Form::label('foto', 'Upload Foto', array('for' => 'foto', 'class' => 'btn btn-success')) !!} --}}
		<label for="foto" class="btn btn-success">
			<i class="fa fa-plus-square"></i>
			Upload Foto
		</label>
		{!! Form::file('foto', array('class' => 'hidden', 'onchange' => 'imagePreview()')) !!}

		<div>
			<br>
			<img id="image-preview"
				@if(isset($edit))
					src="{{url('/')}}{{$user->foto}}" alt="Avatar" class="img-circle avatar" 
				@endif
			>
		</div>

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('foto')])
		@endcomponent

	</div>

	<div class="form-group">
		{!! Form::label('role_id', 'Role', array('class' => 'required-input')) !!}
		{!! Form::select('role_id', $role, null, array('placeholder' => 'Pilih Role','class' => 'form-control')) !!}

		@component('layouts.admin.components.forms.errors', ['errors' => $errors->get('role_id')])
		@endcomponent
	</div>

	@if(isset($edit) && $user->role_id != 1)
		<?php $display = 'block' ?>
	@else
		<?php $display = 'none' ?>
	@endif

	<div class="form-group row admin-sub-topik" style="display:{{$display}};">
		<div class="col-sm-3 col-xs-4">
			{!! Form::label('sub_topik_id', 'Sub Topik', array('class' => 'required-input')) !!}
		</div>
		<div class="col-sm-9 col-xs-8">
			<div class="form-group add-sub-topik">
			@if(isset($edit))
				@foreach($user->hasSubTopik as $item)
				<div class="row">
					<div class="col-xs-10">
						{!! Form::select('sub_topik_id[]', $subTopik, $item->sub_topik_id, array('placeholder' => 'Pilih Sub Topik','class' => 'form-control')) !!}
					</div>
					<div class="col-xs-2">
						<a class="btn-circle remove-sub-topik"><i class="lnr lnr-cross"></i></a>
					</div>
				</div>
				@endforeach
			@endif
			</div>
			<a class="btn-circle add-sub-topik-btn"><i class="lnr lnr-plus-circle"></i> Tambah Sub Topik</a>
		</div>
	</div>
@endslot
  
@slot('footer')
<div class="form-group">
  {!! link_to_route('user.index', 'Kembali', null, array('class' => 'btn  btn-default')) !!}
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

    $(document).ready(function(){
    	$('select[name="role_id"]').on('change', function() {
    		if ($(this).val()){
	    		if ($(this).val() == 1) {
	    			$('.admin-sub-topik').hide();
	    		}
	    		else{
	    			$('.admin-sub-topik').show();	
	    		}
    		} 
    		else{
    			$('.admin-sub-topik').hide();
    		}

    	});

    	$('.add-sub-topik-btn').on('click', function(){
    		var element = '<div class="row">'+
							'<div class="col-xs-10">'+
								'{!! Form::select("sub_topik_id[]", $subTopik, null, array("placeholder" => "Pilih Sub Topik","class" => "form-control")) !!}'+
							'</div>'+
							'<div class="col-xs-2">'+
								'<a class="btn-circle remove-sub-topik"><i class="lnr lnr-cross"></i></a>'+
							'</div>'+
						'</div>';
    		$('.add-sub-topik').append(element);
    	})

    	$(document).delegate('.remove-sub-topik', 'click', function(){
    		$(this).parent().parent().remove();
    	});
    });
</script>
@endpush
