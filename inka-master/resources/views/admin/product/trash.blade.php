@extends('layouts.admin.generals.index')

@section('title')
	@if($isCatalogue == 0)
		<i class="lnr lnr-train"></i> Recycle Bin Product
	@elseif($isCatalogue == 1)
		<i class="lnr lnr-train"></i> Recycle Bin Catalogue
	@endif	
@endsection

@section('inner-content')
	<div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover" id="datatable">
				<thead>
					<tr>
						@if($isCatalogue == 0)
						<th>Main Product</th>
						<th>Sub Product</th>
						@endif
						
						<th>Nama</th>
						<th>Bahasa</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						@if($isCatalogue == 0)
						<th></th>
						<th></th>
						@endif
						
						<th></th>
						<th></th>
						<th></th>
					</tr>
				</tfoot>
				<tbody>
					@foreach($product as $item)
					<tr>
						@if($isCatalogue == 0)
							@if($item->category_product_id)
							<td>{{$item->categoryProduct->masterProduct->nama_id}}</td>
							<td>{{$item->categoryProduct->nama_id}}</td>
							@else
							<td></td>
							<td></td>
							@endif
						@endif

						<td>{{$item->nama}}</td>
						<td>
							@if($item->bahasa === 'id')Indonesia</td>
							@elseif($item->bahasa === 'en')Inggris</td>
							@endif
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
				{!! link_to_route('product.index', 'Kembali', ['isCatalogue' => $isCatalogue], array('class' => 'btn btn-primary')) !!}
			</div>
    	</div>
    </div>
    @include('layouts.admin.components.restoreModal')
    @include('layouts.admin.components.permanenDeleteModal')
@endsection

@section('trashActionUrl', route('product.trash', ['isCatalogue' => $isCatalogue]))

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
		$(document).ready(function() {

			@if($isCatalogue == 0)
				var col = 3;
			@else
				var col = 1;
	        @endif
		    $('#datatable').DataTable({
		    	responsive: true,

        		initComplete: function () {
			    	this.api().columns([col]).every( function () {
		                var column = this;
		                var select = $('<select><option value="">Semua Bahasa</option></select>')
		                    .appendTo( $(column.footer()).empty() )
		                    .on( 'change', function () {
		                        var val = $.fn.dataTable.util.escapeRegex(
		                            $(this).val()
		                        );
		 
		                        column
		                            .search( val ? '^'+val+'$' : '', true, false )
		                            .draw();
		                    });
		 
		                column.data().unique().sort().each( function ( d, j ) {
		                    select.append( '<option value="'+d+'">'+d+'</option>' )
		                });
		            });
	            }
		    });

		    function format ( d ) {
				return '<strong>Data Teknis</strong>'+
				'<table class="data-teknis-table">'+
				'<tr>'+
				'<td><strong>'+d.productData.label+' : </strong></td>'+
				'<td>'+d.productData.value+'</td>'+
				'</tr>'+
				'</table>';
			}

			$('#datatable tbody').on('click', 'tr', function () {
				var tr = $(this).closest('tr');
				var row = table.row( $(this) );

				if ( row.child.isShown() ) {
					row.child.hide();
					tr.removeClass('shown');
				}
				else {
					row.child( format(row.data()) ).show();
					tr.addClass('shown');
				}
			});

		});
	</script>
@endpush