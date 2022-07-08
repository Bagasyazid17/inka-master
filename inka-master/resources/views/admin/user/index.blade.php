@extends('layouts.admin.generals.index')

@section('title')
	<i class="lnr lnr-users"></i> Daftar User
@endsection

@section('inner-content')
	<div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover" id="datatable">
				<thead>
					<tr>
						<th>Nama</th>
						<th>Email</th>
						<th>Role</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@foreach($user as $item)
					<tr>
						<td>{{$item->name}}</td>
						<td>{{$item->email}}</td>
						<td>{{$item->role->nama}}</td>
						<td>
							<a class="btn-circle" href="{{route('user.edit', ['id' => $item->id])}}"><i class="lnr lnr-pencil"></i> Edit</a>
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
				{!! link_to_route('user.create', 'Tambah Data', null, array('class' => 'btn btn-success')) !!}
			</div>
    	</div>
    </div>
@endsection

@section('deleteActionUrl', route('user.index'))

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
		} );
	</script>
@endpush