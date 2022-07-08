$(document).ready(function() {
	$('#image-upload').on('click', function(){

		window.open(baseUrl+'/kcfinder/browse.php?type=images&dir=images/public',
			'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
			'directories=0, resizable=1, scrollbars=0, width=800, height=600'
		);
		window.KCFinder = {
			callBack: function(url) {
				window.KCFinder = null;
				urlUpload = url;

				// For Development Only !
				urlUpload = urlUpload.replace('\/inka\/public','');
				
				$('#image-preview').attr('src', url);
				target.attr('value', urlUpload);
			}
		};
	});
});