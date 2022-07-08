@extends('layouts.admin.generals.index')

@section('title')
	<i class="lnr lnr-envelope"></i> Daftar Pesan
@endsection

@section('inner-content')
	<div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover" id="datatable">
				<thead>
					<tr>
						<th>Tanggal</th>
						<th>Topik</th>
						<th>Sub Topik</th>
						<th>Nama Pengirim</th>
						<th>Email</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@foreach($contact as $item)
					<tr>
						<td>{{$item->created_at->format('Y-m-d H:i')}}</td>
						<td>{{$item->subTopik->topik->nama_id}}</td>
						<td>{{$item->subTopik->nama_id}}</td>
						<td>{{$item->nama}}</td>
						<td>{{$item->email}}</td>
						<td>
							@if($item->status == 0)
								<span class="label label-danger">Baru</span>
							@elseif($item->status == 1)
								<span class="label label-info">Dibaca</span>
							@elseif($item->status == 2)
								<span class="label label-success">Dibalas</span>
							@endif
						</td>
						<td>
							<a class="btn-circle" href="{{route('contact.show', ['id' => $item->id])}}"><i class="lnr lnr-magnifier"></i> Selengkapnya</a>
							<a data-turbolinks="false" class="btn-circle" href="#" onclick="initDeleteAction({{$item->id}});"><i class="lnr lnr-trash"></i> Hapus</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
        </div>
    </div>
@endsection

@section('deleteActionUrl', route('contact.index'))

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
		    	"order": [[ 0, "desc" ]]
		    });
		} );
	</script>
@endpush