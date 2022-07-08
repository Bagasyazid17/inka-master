@extends('layouts.admin.master')

@section('content')
	<div class="col-md-12">
		<div class="panel panel-headline panel-dashboard">
	    	<div class="panel-heading">
				<div class="row">
					<div class="col-md-6">
			        	<h3 class="panel-title">
							<i class="lnr lnr-file-envelope"></i> Pesan Terbaru
						</h3>
					</div>
					<div class="col-md-6" align="right">
						<a class="btn btn-info" href="{{route('contact.index')}}"><i class="lnr lnr-magnifier"></i> Detail</a>
					</div>
				</div>
			</div>
	    	<div class="panel-body">
	    		<div class="row">
					<div class="col-md-3">
						<div class="metric">
							<span class="icon"><i class="fa fa-inbox"></i></span>
							<p>
								<span class="number">{{$contactBaru}}</span>
								<span class="title">Pesan Baru</span>
							</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="metric">
							<span class="icon"><i class="fa fa-eye"></i></span>
							<p>
								<span class="number">{{$contactBaca}}</span>
								<span class="title">Pesan Belum Dibalas</span>
							</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="metric">
							<span class="icon"><i class="fa fa-reply"></i></span>
							<p>
								<span class="number">{{$contactBalas}}</span>
								<span class="title">Pesan Telah Dibalas</span>
							</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="metric">
							<span class="icon"><i class="fa fa-envelope"></i></span>
							<p>
								<span class="number">{{$contactTotal}}</span>
								<span class="title">Pesan Masuk</span>
							</p>
						</div>
					</div>
				</div>

				<div class="row">
			        <div class="col-md-12">
			            <table class="table table-striped table-hover datatable">
							<thead>
								<tr>
									<th>Nama Pengirim</th>
									<th>Pesan</th>
								</tr>
							</thead>
							<tbody>
								@foreach($contact as $item)
								<tr>
									<td>{{$item->nama}}</td>
									<td>{{$item->content}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
			        </div>
			    </div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="col-md-6">
			<div class="panel panel-headline panel-dashboard">
		    	<div class="panel-heading">
					<div class="row">
						<div class="col-md-6">
				        	<h3 class="panel-title">
								<i class="lnr lnr-file-add"></i> Berita Terbaru
							</h3>
						</div>
						<div class="col-md-6" align="right">
							<a class="btn btn-info" href="{{route('berita.index')}}"><i class="lnr lnr-magnifier"></i> Detail</a>
						</div>
					</div>
				</div>
		    	<div class="panel-body">
					<div class="row">
				        <div class="col-md-12">
				            <table class="table table-striped table-hover datatable">
								<thead>
									<tr>
										<th>Judul</th>
									</tr>
								</thead>
								<tbody>
									@foreach($berita as $item)
									<tr>
										<td>{{$item->judul}}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
				        </div>
				    </div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-headline panel-dashboard">
		    	<div class="panel-heading">
					<div class="row">
						<div class="col-md-6">
				        	<h3 class="panel-title">
						<i class="lnr lnr-train"></i> Korporasi Terbaru
							</h3>
						</div>
						<div class="col-md-6" align="right">
							<a class="btn btn-info" href="{{route('corporation.index')}}"><i class="lnr lnr-magnifier"></i> Detail</a>
						</div>
					</div>
				</div>
		    	<div class="panel-body">
					<div class="row">
				        <div class="col-md-12">
				            <table class="table table-striped table-hover datatable">
								<thead>
									<tr>								
										<th>Nama</th>
									</tr>
								</thead>
								<tbody>
									@foreach($corporation as $item)
									<tr>
										<td>{{$item->nama}}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
				        </div>
				    </div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-md-12">
		<div class="col-md-6">
			<div class="panel panel-headline panel-dashboard">
		    	<div class="panel-heading">
					<div class="row">
						<div class="col-md-6">
				        	<h3 class="panel-title">
						<i class="lnr lnr-train"></i> Produk Terbaru
							</h3>
						</div>
						<div class="col-md-6" align="right">
							<a class="btn btn-info" href="{{route('product.index', ['isCatalogue' => 0])}}"><i class="lnr lnr-magnifier"></i> Detail</a>
						</div>
					</div>
				</div>
		    	<div class="panel-body">
					<div class="row">
				        <div class="col-md-12">
				            <table class="table table-striped table-hover datatable">
								<thead>
									<tr>								
										<th>Nama</th>
									</tr>
								</thead>
								<tbody>
									@foreach($product as $item)
									<tr>
										<td>{{$item->nama}}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
				        </div>
				    </div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-headline panel-dashboard">
		    	<div class="panel-heading">
					<div class="row">
						<div class="col-md-6">
				        	<h3 class="panel-title">
						<i class="lnr lnr-train"></i> Katalog Terbaru
							</h3>
						</div>
						<div class="col-md-6" align="right">
							<a class="btn btn-info" href="{{route('product.index', ['isCatalogue' => 1])}}"><i class="lnr lnr-magnifier"></i> Detail</a>
						</div>
					</div>
				</div>
		    	<div class="panel-body">
					<div class="row">
				        <div class="col-md-12">
				            <table class="table table-striped table-hover datatable">
								<thead>
									<tr>								
										<th>Nama</th>
									</tr>
								</thead>
								<tbody>
									@foreach($catalogue as $item)
									<tr>
										<td>{{$item->nama}}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
				        </div>
				    </div>
				</div>
			</div>
		</div>
	</div>
@endsection

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
		    $('.datatable').DataTable({
		    	responsive: true
		    });
		});
	</script>
@endpush