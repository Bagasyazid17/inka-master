@extends('layouts.admin.generals.index')

@section('title')
	<i class="lnr lnr-file-add"></i> Recycle Bin Berita
@endsection

@section('inner-content')
	<div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover" id="datatable">
				<thead>
					<tr>
						<th>Judul</th>
						<th>Konten</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@foreach($berita as $item)
					<tr>
						<td>{{$item->judul}}</td>
						<td>{{str_limit(preg_replace('/\s+/',' ',preg_replace('/[\r\n]+|&nbsp;/',' ',strip_tags($item->content))), 30)}}</td>
						<td>
							<a data-turbolinks="false" class="btn-circle" href="#" onclick="initRestoreAction({{$item->id}});"><i class="lnr lnr-undo"></i> Restore</a>
							<a data-turbolinks="false" class="btn-circle" href="#" onclick="initPermanenDeleteAction({{$item->id}});"><i class="lnr lnr-trash"></i> Hapus Permanen</a>
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
				{!! link_to_route('berita.index', 'Kembali', null, array('class' => 'btn btn-primary')) !!}
			</div>
    	</div>
    </div>
    @include('layouts.admin.components.restoreModal')
    @include('layouts.admin.components.permanenDeleteModal')
@endsection

@section('trashActionUrl', route('berita.trash'))

@push('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/datatables/media/css/dataTables.bootstrap.min.css">
@endpush

@push('headScripts')
    <script type="text/javascript" src="{{url('/')}}/datatables/media/js/jquery.dataTables.min.js"  data-turbolinks-track="reload"></script>
    <script type="text/javascript" src="{{url('/')}}/datatables/media/js/dataTables.bootstrap.min.js"  data-turbolinks-track="reload"></script>
@endpush

@push('scripts')
	@include('layouts.admin.scripts.doTrashAction')
	<script type="text/javascript">
		var statusUrl = '{{route('berita.index')}}';

		$(document).ready(function() {
		    $('#datatable').DataTable({
		    	responsive: true
		    });
		});
	</script>
    <script type="text/javascript" src="{{url('/')}}/js/updatestatus.js"  data-turbolinks-track="reload"></script>
@endpush