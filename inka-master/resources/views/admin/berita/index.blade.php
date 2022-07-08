@extends('layouts.admin.generals.index')

@section('title')
	<i class="lnr lnr-file-add"></i> Daftar Berita
@endsection

@section('inner-content')
	<div class="row" style="margin-bottom: 35px;">
		<div class="col-md-12">
			<strong>Filter Berita</strong>
			{!! Form::open(['method' => 'GET','route' => ['berita.index'], 'files' => 'true', 'enctype' => 'multipart/form-data', 'class' => 'row']) !!}
                <div class="col-sm-4">
                	<div class="form-group">
					    {!! Form::select('year', $year, null, array('placeholder' => 'Tahun','class' => 'form-control')) !!}
					</div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
					    {!! Form::select('month', $month, null, array('placeholder' => 'Bulan','class' => 'form-control')) !!}
					</div>
                </div>
                <div class="col-sm-4">
                    <button class="btn btn-primary berita-btn-filter" type="submit"><i class="lnr lnr-magnifier"></i> Filter</button>
                    <a class="btn btn-primary berita-btn-filter" href="{{route('berita.index')}}"><i class="lnr lnr-cross"></i> Reset</a>
                </div>
            {!! Form::close() !!}
		</div>
		<hr><hr>
	</div>
	<div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover" id="datatable">
				<thead>
					<tr>
						<th>Tanggal</th>
						<th>Judul</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@foreach($berita as $item)
					<tr>
						<td>{{$item->created_at->format('Y-m-d')}}</td>
						<td>{{$item->judul}}</td>
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
							<a class="btn-circle" href="{{route('app.berita.show', ['id' => $item->id])}}" target="_blank"><i class="lnr lnr-eye"></i> Lihat</a>
							<a class="btn-circle" href="{{route('berita.edit', ['id' => $item->id])}}"><i class="lnr lnr-pencil"></i> Edit</a>
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
				{!! link_to_route('berita.create', 'Tambah Data', null, array('class' => 'btn btn-success')) !!}
			</div>
			<div class="pull-right pagination">
				<a href="{{route('berita.trash')}}" class="btn btn-default"><i class="lnr lnr-trash"></i> Recycle Bin</a>
			</div>
    	</div>
    </div>
@endsection

@section('deleteActionUrl', route('berita.index'))

@push('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/datatables/media/css/dataTables.bootstrap.min.css">
@endpush

@push('headScripts')
    <script type="text/javascript" src="{{url('/')}}/datatables/media/js/jquery.dataTables.min.js"  data-turbolinks-track="reload"></script>
    <script type="text/javascript" src="{{url('/')}}/datatables/media/js/dataTables.bootstrap.min.js"  data-turbolinks-track="reload"></script>
@endpush

@push('scripts')
	<script type="text/javascript">
		var statusUrl = '{{route('berita.index')}}';

		$(document).ready(function() {
		    $('#datatable').DataTable({
		    	responsive: true,
		    	"order": [[ 0, "desc" ]]
		    });
		});
	</script>
    <script type="text/javascript" src="{{url('/')}}/js/updatestatus.js"  data-turbolinks-track="reload"></script>
@endpush