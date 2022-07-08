@component('layouts.admin.components.modal')
	@slot('id')
		modalPermanenDelete
	@endslot

	@slot('title')
		Konfirmasi Penghapusan Data Permanen
	@endslot

	@slot('body')
		Apakah Anda yakin ingin menghapus data secara permanen?
	@endslot

	@slot('actions')
		<button type="button" class="btn btn-primary" onclick="doPermanenDeleteAction();">Ya, Hapus Permanen</button>
	@endslot
@endcomponent