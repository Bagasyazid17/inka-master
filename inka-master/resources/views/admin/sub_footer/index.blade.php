@extends('layouts.admin.generals.index')

@section('title')
	<i class="lnr lnr-envelope"></i> Daftar Sub footer pada footer "{{ $footer->nama_id }}"
@endsection

@section('inner-content')
	<div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover" id="datatable">
				<thead>
					<tr>
						<th>Nama &nbsp;<img src="{{url('/')}}/icon/id.png"></th>
						<th>Nama &nbsp;<img src="{{url('/')}}/icon/en.png"></th>
						<th>Link</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@foreach($subFooter as $item)
					<tr>
						<td>{{$item->nama_id}}</td>
						<td>{{$item->nama_en}}</td>
						<td>{{$item->link}}</td>
						<td>
							<a class="btn-circle" href="{{route('sub-footer.edit', ['footerId' => $footer->id, 'id' => $item->id])}}"><i class="lnr lnr-pencil"></i> Edit</a>
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
    			<a class="btn btn-default" href="{{route('home-setting.index')}}">Kembali</a>
				{!! link_to_route('sub-footer.create', 'Tambah Data', ['footerId' => $footer->id], array('class' => 'btn btn-success')) !!}
			</div>
    	</div>
    </div>
@endsection

@section('deleteActionUrl', route('sub-footer.index', $footer->id))

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