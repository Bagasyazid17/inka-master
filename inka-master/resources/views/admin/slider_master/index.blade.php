@extends('layouts.admin.generals.index')

@section('title')
	<i class="lnr lnr-film-play"></i> Daftar Master Slider
@endsection

@section('inner-content')
	<div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover" id="datatable">
				<thead>
					<tr>
						<th>Nama</th>
						<th>Deskripsi</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@foreach($sliderMaster as $item)
					<tr>
						<td>{{$item->nama}}</td>
						<td>{{$item->deskripsi}}</td>
						<td>
							<a class="btn-circle" href="{{route('slider.index', ['id' => $item->id])}}"><i class="lnr lnr-magnifier"></i> Isi</a>
							<a class="btn-circle" href="{{route('slider-master.edit', ['id' => $item->id])}}"><i class="lnr lnr-pencil"></i> Edit</a>
							@if($item->id > 2)
							<a data-turbolinks="false" class="btn-circle" href="#" onclick="initDeleteAction({{$item->id}});"><i class="lnr lnr-trash"></i> Hapus</a>
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
        </div>
    </div>
    <div class="row">
    	<div class="col-md-12">
    		<div class="pull-left pagination">
				{!! link_to_route('slider-master.create', 'Tambah Data', null, array('class' => 'btn btn-success')) !!}
			</div>
    	</div>
    </div>
@endsection

@section('deleteActionUrl', route('slider-master.index'))

@push('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/datatables/media/css/dataTables.bootstrap.min.css">
@endpush

@push('headScripts')
    <script type="text/javascript" src="{{url('/')}}/datatables/media/js/jquery.dataTables.min.js"  data-turbolinks-track="reload"></script>
    <script type="text/javascript" src="{{url('/')}}/datatables/media/js/dataTables.bootstrap.min.js"  data-turbolinks-track="reload"></script>
@endpush

@push('scripts')
	<script type="text/javascript">
		$(document).ready(function() {
		    $('#datatable').DataTable({
		    	responsive: true,
		    });
		});

		// var id = [];
		// @foreach($sliderMaster as $item)
		// 	id.push([{{$item->id}},{{$item->id}}]);
		// @endforeach
	</script>
@endpush