@extends('layouts.admin.generals.index')

@section('title')
	<i class="lnr lnr-picture"></i> Daftar Media {{$galeri->nama}}
@endsection

@section('inner-content')
	<div class="media-wrapper grid">
		@foreach($media as $item)
	        <div class="grid-item media-item">
	        	<img src="{{url('/')}}/{{$item->link}}">
	        	<div class="control-item">
		            <a class="btn-circle" href="{{route('media.edit', ['galeriId' => $galeri->id, 'id' => $item->id])}}"><i class="lnr lnr-pencil"></i></a>
		            <a data-turbolinks="false" class="btn-circle" href="#" onclick="initDeleteAction({{$item->id}});"><i class="lnr lnr-trash"></i> </a>
	            </div>
	        </div>
        @endforeach
    </div>
    <div class="row">
    	<div class="col-md-12">
    		<div class="pull-left pagination">
    			<a class="btn btn-default" href="{{route('galeri.index')}}">Kembali</a>
    			<a class="btn btn-success" href="{{route('media.create', ['galeriId' => $galeri->id])}}"><i class="lnr lnr-pencil"></i> Tambah Media</a>
			</div>
    	</div>
    </div>
@endsection

@section('deleteActionUrl', route('media.index', $galeri->id))

@push('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/datatables/media/css/dataTables.bootstrap.min.css">
@endpush

@push('headScripts')
    <script type="text/javascript" src="{{url('/')}}/datatables/media/js/jquery.dataTables.min.js"  data-turbolinks-track="reload"></script>
    <script type="text/javascript" src="{{url('/')}}/datatables/media/js/dataTables.bootstrap.min.js"  data-turbolinks-track="reload"></script>
    <script type="text/javascript" src="{{url('/')}}/js/isotope.pkgd.min.js"  data-turbolinks-track="reload"></script>
@endpush

@push('scripts')
	<script type="text/javascript">
		$(document).ready(function() {
		    $('#datatable').DataTable({
		    	responsive: true
		    });

			$('.grid').isotope({
				itemSelector: '.grid-item',
				masonry: {
					
				}
			});
		});
	</script>
@endpush