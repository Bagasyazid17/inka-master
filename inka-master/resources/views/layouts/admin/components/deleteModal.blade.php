@component('layouts.admin.components.modal')
	@slot('id')
		modalKonfirmasi
	@endslot

	@slot('title')
		Konfirmasi Penghapusan Data
	@endslot

	@slot('body')
		Apakah Anda yakin ingin menghapus data?
	@endslot

	@slot('actions')
		<button type="button" class="btn btn-primary" onclick="doDeleteAction();">Ya, Hapus Data</button>
	@endslot
@endcomponent