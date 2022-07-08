@extends('layouts.admin.generals.index')

@section('title')
	<i class="lnr lnr-envelope"></i> Daftar Sub Topik pada Topik "{{ $topik->nama_id }}"
@endsection

@section('inner-content')
	<div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover" id="datatable">
				<thead>
					<tr>
						<th>Nama &nbsp;<img src="{{url('/')}}/icon/id.png"></th>
						<th>Nama &nbsp;<img src="{{url('/')}}/icon/en.png"></th>
						<th>Email</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($subTopik as $item)
					<tr>
						<td>{{$item->nama_id}}</td>
						<td>{{$item->nama_en}}</td>
						<td>{{ $item->email }}</td>
						<td>
							<a class="btn-circle" href="{{route('sub-topik.edit', ['topikId' => $topik->id, 'id' => $item->id])}}"><i class="lnr lnr-pencil"></i> Edit</a>
							<a data-turbolinks="false" class="btn-circle" href="#" onclick="initDeleteAction({{$item->id}});"><i class="lnr lnr-trash"></i> Hapus</a>
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
    			<a class="btn btn-default" href="{{route('topik.index')}}">Kembali</a>
				{!! link_to_route('sub-topik.create', 'Tambah Data', ['topikId' => $topik->id], array('class' => 'btn btn-success')) !!}
			</div>
    	</div>
    </div>
@endsection

@section('deleteActionUrl', route('sub-topik.index', $topik->id))

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
	</script>
@endpush