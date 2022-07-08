	<script>	
		var deleteId = '';

		function initDeleteAction(id) {
			deleteId = id;
			$('#modalKonfirmasi').modal('show');
		}
		
		function doDeleteAction() {
			var id = deleteId;
			deleteId = '';
			
			var deleteForm = document.createElement('form');
			deleteForm.action = "@yield('deleteActionUrl')/" + id;
			deleteForm.method = "POST";
			var methodField = document.createElement('input');
			methodField.type = "hidden";
			methodField.name = "_method";
			methodField.value = "DELETE";
			var tokenField = document.createElement('input');
			tokenField.type = "hidden";
			tokenField.name = "_token";
			tokenField.value = "{{ csrf_token() }}";

			deleteForm.appendChild(methodField);
			deleteForm.appendChild(tokenField)
			document.body.appendChild(deleteForm);
			deleteForm.submit();
		}
	</script>