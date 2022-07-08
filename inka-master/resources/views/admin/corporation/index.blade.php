@extends('layouts.admin.generals.index')

@section('title')
	<i class="lnr lnr-apartment"></i> Daftar Menu Corporation
@endsection

@section('inner-content')
	<div class="row">
        <div class="col-md-12">
        	<div class="row bahasa-tab-wrapper">
        		<div class="col-sm-2">
                    <div class="bahasa-tab" href="child-0">
                        Corporation &nbsp;<img src="{{url('/')}}/icon/id.png">
                    </div>
            	</div>
        		<div class="col-sm-2">
                    <div class="bahasa-tab" href="child-1">
                        Corporation &nbsp;<img src="{{url('/')}}/icon/en.png">
                    </div>
            	</div>
            </div>
        	<div class="post-content bahasa-child" id="child-0">
            	<table class="table table-striped table-hover" id="">
					<thead>
						<tr>
							<th>Menu Corporation</th>
							<th>Sub Menu</th>
							<th>Status</th>
							<th>Aksi</th>
							<th>Urutan</th>
						</tr>
					</thead>
					<tbody>
						@foreach($corporation_id as $item)
						<tr>
							<td>{{$item->nama}}</td>
							@if($item->has_sub != 1)
								<td> </td>
							@else
								<td>
									<ul class="sub-corp-list">
										@foreach($item->childCorporation as $index => $child)
											<li>{{$child->nama}}</li>
											<a class="btn-circle" href="{{route('corporation.edit', ['id' => $child->id])}}"><i class="lnr lnr-pencil"></i></a>
											<a data-turbolinks="false" class="btn-circle" href="#" onclick="initDeleteAction({{$child->id}});"><i class="lnr lnr-trash"></i></a>
											&nbsp;
											@if($index==0)
												<a class="btn-circle kolom-urutan" onclick="gantiUrutanChild({{$child->id}}, 'down');"><i class="lnr lnr-chevron-down"></i></a>
											@elseif($index == sizeof($item->childCorporation)-1)
												<a class="btn-circle kolom-urutan" style="visibility: hidden;"><i class="lnr lnr-chevron-down"></i></a>
												<a class="btn-circle kolom-urutan" onclick="gantiUrutanChild({{$child->id}}, 'up');"><i class="lnr lnr-chevron-up"></i></a>
											@else
												<a class="btn-circle kolom-urutan" onclick="gantiUrutanChild({{$child->id}}, 'down');"><i class="lnr lnr-chevron-down"></i></a>
												<a class="btn-circle kolom-urutan" onclick="gantiUrutanChild({{$child->id}}, 'up');"><i class="lnr lnr-chevron-up"></i></a>
											@endif
										@endforeach
									</ul>
								</td>
							@endif
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
								<a class="btn-circle" href="{{route('app.corporation.show', ['id' => $item->id])}}" target="_blank"><i class="lnr lnr-eye"></i> Lihat</a>
								<a class="btn-circle" href="{{route('corporation.edit', ['id' => $item->id])}}"><i class="lnr lnr-pencil"></i> Edit</a>
								<a data-turbolinks="false" class="btn-circle" href="#" onclick="initDeleteAction({{$item->id}});"><i class="lnr lnr-trash"></i> Hapus</a>
							</td>
							<td>
								@if($loop->iteration != $loop->last)
								<a class="btn-circle kolom-urutan" onclick="gantiUrutan({{$item->id}}, 'down');"><i class="lnr lnr-chevron-down"></i></a>
								@else
								<a class="btn-circle kolom-urutan" style="visibility: hidden;"><i class="lnr lnr-chevron-down"></i></a>
								@endif

								&nbsp;{{$item->urutan}}&nbsp;
								
								@if($loop->iteration != $loop->first)
								<a class="btn-circle kolom-urutan" onclick="gantiUrutan({{$item->id}}, 'up');"><i class="lnr lnr-chevron-up"></i></a>
								@else
								<a class="btn-circle kolom-urutan" style="visibility: hidden;"><i class="lnr lnr-chevron-up"></i></a>
								@endif
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
        	<div class="post-content bahasa-child" id="child-1">
            	<table class="table table-striped table-hover" id="">
					<thead>
						<tr>
							<th>Menu Corporation</th>
							<th>Sub Menu</th>
							<th>Status</th>
							<th>Aksi</th>
							<th>Urutan</th>
						</tr>
					</thead>
					<tbody>
						@foreach($corporation_en as $item)
						<tr>
							<td>{{$item->nama}}</td>
							@if($item->has_sub != 1)
								<td> </td>
							@else
								<td>
									<ul class="sub-corp-list">
										@foreach($item->childCorporation as $index => $child)
											<li>{{$child->nama}}</li>
											<a class="btn-circle" href="{{route('corporation.edit', ['id' => $child->id])}}"><i class="lnr lnr-pencil"></i></a>
											<a data-turbolinks="false" class="btn-circle" href="#" onclick="initDeleteAction({{$child->id}});"><i class="lnr lnr-trash"></i></a>
											&nbsp;
											@if($index==0)
												<a class="btn-circle kolom-urutan" onclick="gantiUrutanChild({{$child->id}}, 'down');"><i class="lnr lnr-chevron-down"></i></a>
											@elseif($index == sizeof($item->childCorporation)-1)
												<a class="btn-circle kolom-urutan" style="visibility: hidden;"><i class="lnr lnr-chevron-down"></i></a>
												<a class="btn-circle kolom-urutan" onclick="gantiUrutanChild({{$child->id}}, 'up');"><i class="lnr lnr-chevron-up"></i></a>
											@else
												<a class="btn-circle kolom-urutan" onclick="gantiUrutanChild({{$child->id}}, 'down');"><i class="lnr lnr-chevron-down"></i></a>
												<a class="btn-circle kolom-urutan" onclick="gantiUrutanChild({{$child->id}}, 'up');"><i class="lnr lnr-chevron-up"></i></a>
											@endif
										@endforeach
									</ul>
								</td>
							@endif
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
								<a class="btn-circle" href="{{route('app.corporation.show', ['id' => $item->id])}}" target="_blank"><i class="lnr lnr-eye"></i> Lihat</a>
								<a class="btn-circle" href="{{route('corporation.edit', ['id' => $item->id])}}"><i class="lnr lnr-pencil"></i> Edit</a>
								<a data-turbolinks="false" class="btn-circle" href="#" onclick="initDeleteAction({{$item->id}});"><i class="lnr lnr-trash"></i> Hapus</a>
							</td>
							<td>
								@if($loop->iteration != $loop->last)
								<a class="btn-circle kolom-urutan" onclick="gantiUrutan({{$item->id}}, 'down');"><i class="lnr lnr-chevron-down"></i></a>
								@else
								<a class="btn-circle kolom-urutan" style="visibility: hidden;"><i class="lnr lnr-chevron-down"></i></a>
								@endif

								&nbsp;{{$item->urutan}}&nbsp;
								
								@if($loop->iteration != $loop->first)
								<a class="btn-circle kolom-urutan" onclick="gantiUrutan({{$item->id}}, 'up');"><i class="lnr lnr-chevron-up"></i></a>
								@else
								<a class="btn-circle kolom-urutan" style="visibility: hidden;"><i class="lnr lnr-chevron-up"></i></a>
								@endif
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
				{!! link_to_route('corporation.create', 'Tambah Data', null, array('class' => 'btn btn-success')) !!}
			</div>
    	</div>
    </div>
@endsection

@section('deleteActionUrl', route('corporation.index'))

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
			$('table.table').DataTable();
		});
		var statusUrl = '{{route('corporation.index')}}';
		var urutanUrl = '{{route('corporation.index')}}';
	</script>
    <script type="text/javascript" src="{{url('/')}}/js/updatestatus.js"  data-turbolinks-track="reload"></script>
    <script type="text/javascript" src="{{url('/')}}/js/masterurutan.js"  data-turbolinks-track="reload"></script>

    <script type="text/javascript">
    	function gantiUrutanChild(id, action){
		    $.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
		    });
		    $.ajax({
		        method: 'PATCH',
		        url: urutanUrl+'/urutan-child/'+id+'/'+action,
		        data:{
		            id : id,
		            action : action
		        }
		    }).done(function (response) {
		        location.reload();
		    }).fail(function(jqXHR, textStatus, errorThrown) {
		        console.log("Error, please try again or contact site's developer.");
		        console.log(jqXHR);
		    });
		};
    </script>
@endpush