@extends('layouts.admin.generals.index')

@section('title')
	<i class="lnr lnr-train"></i> Daftar Main Product
@endsection

@section('inner-content')
	<div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover" id="datatable">
				<thead>
					<tr>
						<th>Nama &nbsp;<img src="{{url('/')}}/icon/id.png"></th>
						<th>Nama &nbsp;<img src="{{url('/')}}/icon/en.png"></th>
						<th>Deskripsi</th>
						<th>Aksi</th>
						<th>Urutan</th>
					</tr>
				</thead>
				<tbody>
					@foreach($masterProduct as $item)
					<tr>
						<td>{{$item->nama_id}}</td>
						<td>{{$item->nama_en}}</td>
						<td>{{$item->deskripsi}}</td>
						{{-- <td>{{$item->created_at}}</td>
						<td>{{$item->updated_at}}</td> --}}
						<td>
							<a class="btn-circle" href="{{route('master-product.edit', ['id' => $item->id])}}"><i class="lnr lnr-pencil"></i> Edit</a>
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
				{!! link_to_route('master-product.create', 'Tambah Data', null, array('class' => 'btn btn-success')) !!}
			</div>
    	</div>
    </div>
@endsection

@section('deleteActionUrl', route('master-product.index'))

@push('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/datatables/media/css/dataTables.bootstrap.min.css">
@endpush

@push('headScripts')
    <script type="text/javascript" src="{{url('/')}}/datatables/media/js/jquery.dataTables.min.js"  data-turbolinks-track="reload"></script>
    <script type="text/javascript" src="{{url('/')}}/datatables/media/js/dataTables.bootstrap.min.js"  data-turbolinks-track="reload"></script>
@endpush

@push('scripts')
	<script type="text/javascript">	
		var urutanUrl = '{{route('master-product.index')}}';
	</script>
    <script type="text/javascript" src="{{url('/')}}/js/masterurutan.js"  data-turbolinks-track="reload"></script>
@endpush