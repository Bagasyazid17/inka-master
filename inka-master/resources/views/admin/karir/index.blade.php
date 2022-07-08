@extends('layouts.admin.generals.index')

@section('title')
	<i class="lnr lnr-license"></i> Daftar Karir
@endsection

@section('inner-content')
	<div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover" id="datatable">
				<thead>
					<tr>
						<th>Nama</th>
						<th>Mulai</th>
						<th>Selesai</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@foreach($karir as $item)
					<tr>
						<td>{{$item->nama}}</td>
						<td>{{$item->mulai}}</td>
						<td>{{$item->selesai}}</td>
						<td>
							@if($item->status === 0)
								<button class="btn-success btn-circle-no-hover">Drafted
							@else
								<button class="btn-circle" onclick="updateStatus(this, {{$item->id}}, 'draft');"><i class="lnr lnr-construction"></i> Draft
							@endif
							</button>

							@if($item->status === 1)
								<button class="btn-success btn-circle-no-hover">Published</button>
							@else
								<button class="btn-circle" onclick="updateStatus(this, {{$item->id}}, 'publish');"><i class="lnr lnr-cloud-upload"></i> Publish
							@endif
							</button>

							@if($item->status === 2)
								<button class="btn-success btn-circle-no-hover">Archived</button>
							@else
								<button class="btn-circle" onclick="updateStatus(this, {{$item->id}}, 'archive');"><i class="lnr lnr-book"></i> Archive
							@endif
							</button>
						</td>
						<td>
							<a class="btn-circle" href="{{route('app.karir.show', ['id' => $item->id])}}" target="_blank"><i class="lnr lnr-eye"></i> Lihat</a>
							<a class="btn-circle" href="{{route('karir.edit', ['id' => $item->id])}}"><i class="lnr lnr-pencil"></i> Edit</a>
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
				{!! link_to_route('karir.create', 'Tambah Data', null, array('class' => 'btn btn-success')) !!}
			</div>
    	</div>
    </div>
@endsection

@section('deleteActionUrl', route('karir.index'))

@push('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/datatables/media/css/dataTables.bootstrap.min.css">
@endpush

@push('headScripts')
    <script type="text/javascript" src="{{url('/')}}/datatables/media/js/jquery.dataTables.min.js"  data-turbolinks-track="reload"></script>
    <script type="text/javascript" src="{{url('/')}}/datatables/media/js/dataTables.bootstrap.min.js"  data-turbolinks-track="reload"></script>
@endpush

@push('scripts')
	<script type="text/javascript">
		var statusUrl = '{{route('karir.index')}}';

		$(document).ready(function() {
		    $('#datatable').DataTable({
		    	responsive: true
		    });
		} );
	</script>
	<script type="text/javascript" src="{{url('/')}}/js/updatestatus.js"  data-turbolinks-track="reload"></script>
@endpush