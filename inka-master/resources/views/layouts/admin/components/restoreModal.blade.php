@component('layouts.admin.components.modal')
	@slot('id')
		modalRestore
	@endslot

	@slot('title')
		Konfirmasi Pengembalian Data
	@endslot

	@slot('body')
		Apakah Anda yakin ingin mengembalikan data?
	@endslot

	@slot('actions')
		<button type="button" class="btn btn-primary" onclick="doRestoreAction();">Ya, Kembalikan Data</button>
	@endslot
@endcomponent