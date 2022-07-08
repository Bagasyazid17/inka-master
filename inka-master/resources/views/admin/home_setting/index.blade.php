@extends('layouts.admin.generals.index')

@section('title')
	<i class="lnr lnr-home"></i> Setting Halaman Awal
@endsection

@section('inner-content')
	<!-- <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover" id="datatable">
				<thead>
					<tr>
						<th>Halaman Awal</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Halaman Bahasa Indonesia</td>
						<td>
							<a class="btn-circle" href="{{route('home-setting.edit', ['id' => 'id'])}}"><i class="lnr lnr-pencil"></i> Edit</a>
						</td>
					</tr>
					<tr>
						<td>Halaman Bahasa Inggris</td>
						<td>
							<a class="btn-circle" href="{{route('home-setting.edit', ['id' => 'en'])}}"><i class="lnr lnr-pencil"></i> Edit</a>
						</td>
					</tr>
				</tbody>
			</table>
        </div>
    </div> -->

    <div class="row">
    <div class="col-md-12">
		<div class="panel panel-headline panel-dashboard">
	    	<div class="panel-heading">
				<div class="row">
					<div class="col-md-6">
			        	<h3 class="panel-title">
							<i class="lnr lnr-file-envelope"></i> Setting Content
						</h3>
					</div>
				</div>
			</div>
	    	<div class="panel-body">
				<div class="row">
			        <div class="col-md-12">
			            <table class="table table-striped table-hover datatable">
							<thead>
								<tr>
									<th>Halaman Awal</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Halaman Bahasa Indonesia</td>
									<td>
										<a class="btn-circle" href="{{route('home-setting.edit', ['id' => 'id'])}}"><i class="lnr lnr-pencil"></i> Edit</a>
									</td>
								</tr>
								<tr>
									<td>Halaman Bahasa Inggris</td>
									<td>
										<a class="btn-circle" href="{{route('home-setting.edit', ['id' => 'en'])}}"><i class="lnr lnr-pencil"></i> Edit</a>
									</td>
								</tr>
							</tbody>
						</table>
			        </div>
			    </div>
			</div>
		</div>
	</div>

    <div class="col-md-12">
		<div class="panel panel-headline panel-dashboard">
	    	<div class="panel-heading">
				<div class="row">
					<div class="col-md-6">
			        	<h3 class="panel-title">
							<i class="lnr lnr-file-envelope"></i> Daftar Footer
						</h3>
					</div>
				</div>
			</div>
	    	<div class="panel-body">
				<div class="row">
			        <div class="col-md-12">
			            <table class="table table-striped table-hover datatable">
							<thead>
								<tr>
									<th>Nama &nbsp;<img src="{{url('/')}}/icon/id.png"></th>
									<th>Nama &nbsp;<img src="{{url('/')}}/icon/en.png"></th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach($footer as $item)
								<tr>
									<td>{{$item->nama_id}}</td>
									<td>{{$item->nama_en}}</td>
									<td>
										<a class="btn-circle" href="{{route('sub-footer.index', ['id' => $item->id])}}"><i class="lnr lnr-magnifier"></i> Isi</a>
										<a class="btn-circle" href="{{route('footer.edit', ['id' => $item->id])}}"><i class="lnr lnr-pencil"></i> Edit</a>
										<a data-turbolinks="false" class="btn-circle" href="#" onclick="initDeleteAction({{$item->id}});"><i class="lnr lnr-trash"></i> Hapus</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
			        </div>
			    </div>
			</div>
			<div class="row">
		    	<div class="col-md-12">
		    		<div class="pull-left pagination">
						{!! link_to_route('footer.create', 'Tambah Data', null, array('class' => 'btn btn-success')) !!}
					</div>
		    	</div>
		    </div>
		</div>
	</div>
	</div>
@endsection

@section('deleteActionUrl', route('footer.index'))

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
		    	responsive: true
		    });
		});
	</script>
@endpush