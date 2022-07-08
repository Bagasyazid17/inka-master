@extends('layouts.admin.generals.index')

@section('title')
	<i class="lnr lnr-film-play"></i> Daftar Gambar Slider "{{ $sliderMaster->nama }}"
@endsection

@section('inner-content')
	<div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover" id="datatable">
				<thead>
					<tr>
						<th>Judul</th>
						<th>Pratinjau</th>
						<th>Aksi</th>
						<th>Urutan</th>
					</tr>
				</thead>
				<tbody>
					@foreach($slider as $item)
					<tr>
						<td>{{$item->judul}}</td>
						<td><img src="{{url('/')}}/{{$item->gambar}}" class="slider-preview"></td>
						<td>
							<a class="btn-circle" href="{{route('slider.edit', ['id' => $item->id, 'sliderMasterId' => $sliderMaster->id])}}"><i class="lnr lnr-pencil"></i> Edit</a>
							<a data-turbolinks="false" class="btn-circle" href="#" onclick="initDeleteAction({{$item->id}});"><i class="lnr lnr-trash"></i> Hapus</a>
						</td>
						<td>
							@if($loop->iteration != $loop->last)
							<a class="btn-circle kolom-urutan" onclick="gantiUrutan({{$item->id}}, 'down');"><i class="lnr lnr-chevron-down"></i></a>
							@else
							<a class="btn-circle kolom-urutan" style="visibility: hidden;"><i class="lnr lnr-chevron-down"></i></a>
							@endif

							&nbsp;{{$item->urutan}}&nbsp;
							
							@if($loop->iteration != $loop->first)
							<a class="btn-circle kolom-urutan" onclick="gantiUrutan({{$item->id}}, 'up');"><i class="lnr lnr-chevron-up"></i></a>
							@else
							<a class="btn-circle kolom-urutan" style="visibility: hidden;"><i class="lnr lnr-chevron-up"></i></a>
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
    			<a class="btn btn-default" href="{{route('slider-master.index')}}">Kembali</a>
				{!! link_to_route('slider.create', 'Tambah Data', ['sliderMasterId' => $sliderMaster->id], array('class' => 'btn btn-success')) !!}
				{{-- <a id="lihat-urutan" class="btn btn-info urutan-batal">Ubah Urutan</a>
				<a id="batal-urutan" style="display: none;" class="btn btn-info urutan-lihat">Batal</a>
				<a id="simpan-urutan" style="display: none;" class="btn btn-success urutan-lihat">Simpan Urutan</a> --}}
			</div>
    	</div>
    </div>
@endsection

@section('deleteActionUrl', route('slider.index', $sliderMaster->id))

@push('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/datatables/media/css/dataTables.bootstrap.min.css">
    {{-- <link rel="stylesheet" type="text/css" href="{{url('/')}}/datatables/media/css/rowReorder.bootstrap.min.css"> --}}
@endpush

@push('headScripts')
    <script type="text/javascript" src="{{url('/')}}/datatables/media/js/jquery.dataTables.min.js"  data-turbolinks-track="reload"></script>
    <script type="text/javascript" src="{{url('/')}}/datatables/media/js/dataTables.bootstrap.min.js"  data-turbolinks-track="reload"></script>
    {{-- <script type="text/javascript" src="{{url('/')}}/datatables/media/js/dataTables.rowReorder.min.js"  data-turbolinks-track="reload"></script> --}}
@endpush

@push('scripts')
	<script type="text/javascript">
		var urutanUrl = '{{route('slider.index', ['id' => $sliderMaster->id])}}';
		var masterId = {{$sliderMaster->id}};

		// $(document).ready(function() {
		//     $('#datatable').DataTable({
		//     	responsive: true,
		//     	rowReorder: true,
  //       		selector: 'tr',
		//     });
		// });
	</script>
    <script type="text/javascript" src="{{url('/')}}/js/sliderurutan.js"  data-turbolinks-track="reload"></script>
@endpush