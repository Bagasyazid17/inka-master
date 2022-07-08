	<script>	
		var restoreId = '';
		var permanenId = '';

		function initRestoreAction(id) {
			restoreId = id;
			$('#modalRestore').modal('show');
		}

		function initPermanenDeleteAction(id) {
			permanenId = id;
			$('#modalPermanenDelete').modal('show');
		}
		
		function doRestoreAction() {
			var id = restoreId;
			restoreId = '';
			
			var restoreForm = document.createElement('form');
			restoreForm.action = "@yield('trashActionUrl')/" + id;
			restoreForm.method = "POST";
			var methodField = document.createElement('input');
			methodField.type = "hidden";
			methodField.name = "_method";
			methodField.value = "POST";
			var tokenField = document.createElement('input');
			tokenField.type = "hidden";
			tokenField.name = "_token";
			tokenField.value = "{{ csrf_token() }}";

			restoreForm.appendChild(methodField);
			restoreForm.appendChild(tokenField)
			document.body.appendChild(restoreForm);
			restoreForm.submit();
		}

		function doPermanenDeleteAction() {
			var id = permanenId;
			permanenId = '';
			
			var permanenDeleteForm = document.createElement('form');
			permanenDeleteForm.action = "@yield('trashActionUrl')/" + id;
			permanenDeleteForm.method = "POST";
			var methodField = document.createElement('input');
			methodField.type = "hidden";
			methodField.name = "_method";
			methodField.value = "DELETE";
			var tokenField = document.createElement('input');
			tokenField.type = "hidden";
			tokenField.name = "_token";
			tokenField.value = "{{ csrf_token() }}";

			permanenDeleteForm.appendChild(methodField);
			permanenDeleteForm.appendChild(tokenField)
			document.body.appendChild(permanenDeleteForm);
			permanenDeleteForm.submit();
		}
	</script>