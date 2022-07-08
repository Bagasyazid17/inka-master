CKEDITOR.disableAutoInline = true;

if(state == 'edit'){
	$('.cke_editable_inline').attr('contenteditable', true);
	$('.cke_editable_inline').attr('tabindex', 0);
	$('.image-caption').attr('contenteditable', true);

	$('.type').append('<div class="reset-content"><a class="btn-circle"><i class="lnr lnr-cross"></i></a></div>');
	$('.section').append('<div class="remove-editor"><a class="btn-circle"><i class="lnr lnr-trash"></i></a></div>');

	for (var i = 1; i < index; i++) {
		var id = 'editor'+i;
		if ($('#'+id).length > 0)
			CKEDITOR.inline( id );
	}
}

$(document).ready(function() {
	

	var activeWrapper = '';
	var editor = '';

	$(document).delegate('.add-row', 'click', function() {
		var column = $(this).attr('column');
		// var parent = $(this).parent().empty();
		$('#add-modal').modal('hide');
		var width = 12/column;
		
		var element = '<div class="row section">'+
								'<div class="remove-editor"><a class="btn-circle"><i class="lnr lnr-trash"></i></a></div>';
		for (var i = 0; i < column; i++) {
			element = element+'<div class="col-sm-'+width+'">'+
									'<div class="type">'+
										'<div data-toggle="modal" data-target="#type-modal" class="choose-type center">'+
											'<a><img src="'+baseUrl+'icon/plus.png"></a>'+
										'</div>'+
									'</div>'+
								'</div>';
		}
		element = element+'</div>';
		$('#ckcontent').append(element);
	});

	$(document).delegate('.choose-type', 'click', function() {
		activeWrapper = $(this).parent();
	});

	$(document).delegate('.add-element', 'click', function() {
		var div = activeWrapper;
		$('#type-modal').modal('hide');
		var media = $(this).attr('media');
		div.empty();
		div.append('<div class="reset-content"><a class="btn-circle"><i class="lnr lnr-cross"></i></a></div>');
		if (media == 'text') {
			div.append('<div class="text-wrapper" id="editor'+index+'" contenteditable="true">'+
						'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'+
						'</div>');
			
			// ckeditor = CKEDITOR.inline('editor'+index, {
			// 	filebrowserBrowseUrl: baseUrl+'ckfinder/ckfinder.html',
			// 	filebrowserImageBrowseUrl: baseUrl+'ckfinder/ckfinder.html?type=Images',
			// 	filebrowserUploadUrl: baseUrl+'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
			// 	filebrowserImageUploadUrl: baseUrl+'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
			// });
			
			ckeditor = CKEDITOR.inline('editor'+index);
			index++;
		}
		else if(media == 'video'){
			div.append('<div class="center">'+
							'<input type="text" class="video-src form-control" placeholder="Link Youtube Video">'+
								'<a class="btn-circle video-submit">Submit</a>'+
						'</div>');
		}
		else if(media == 'image'){
			div.append('<div class="image-wrapper"></div>'+
						'<div class="center">'+
							'<a class="browse-server btn btn-success">Browse Server</a>'+
						'</div>');
		}

	});

	$(document).delegate('.browse-server', 'click', function() {
		var div = $(this).parent().siblings(".image-wrapper");
		var browseServer = $(this);
		// CKFinder.modal( {
		// 	chooseFiles: true,
		// 	width: 800,
		// 	height: 600,
		// 	onInit: function( finder ) {
		// 		finder.on( 'files:choose', function( evt ) {
		// 			div.empty();
		// 			var file = evt.data.files.first();
					
		// 			var fileUrl = baseUrl+file.getUrl().split("public/")[1];
		// 			// var fileUrl = file.getUrl();
					
		// 			div.append('<img src="'+fileUrl+'"></img>');

		// 			browseServer.parent().remove();
		// 		} );

		// 		finder.on( 'file:choose:resizedImage', function( evt ) {
		// 			var fileUrl = baseUrl+evt.data.resizedUrl.split("public/")[1];
		// 			// var fileUrl = evt.data.resizedUrl;
		// 			div.empty();
		// 			browseServer.remove();
		// 			div.append('<img src="'+fileUrl+'"></img>');
		// 		} );
		// 	}
		// } );

		window.KCFinder = {
			callBack: function(url) {
				window.KCFinder = null;
				div.append('<img src="'+url+'"></img>');
				div.append('<div class="image-caption" contenteditable="true"><i>Caption</i></div>');
				browseServer.parent().remove();
			}
		};
		window.open(baseUrl+'/kcfinder/browse.php?type=images&dir=images/public',
			'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
			'directories=0, resizable=1, scrollbars=0, width=800, height=600'
		);
	});

	$(document).delegate('.video-submit', 'click', function() {
		var div = $(this).parent();
		var src = $(this).siblings("input").val();
		div.empty();	
		src = src.replace('watch?v=', 'embed/');
		div.append('<div class="reset-content"><a class="btn-circle"><i class="lnr lnr-cross"></i></a></div>');
		div.append('<div class="video-wrapper">'+
					'<iframe src="'+src+'" frameborder="0" allowfullscreen></iframe>'+
				'</div>');
	});

	$('#ckcontent').delegate('.remove-editor','click', function() {
		$(this).parent().remove();
	});

	$('#ckcontent').delegate('.reset-content','click', function() {
		var div = $(this).parent()
		div.empty();
		div.append('<div data-toggle="modal" data-target="#type-modal" class="choose-type center"><img src="'+baseUrl+'icon/plus.png"></div>');
	});

	$('#preview').on('click', function(){
		var content = $('#ckcontent').html();
		content = content.replace(/contenteditable="true"/g,'');
		content = content.replace(/<div class="reset-content"><a class="btn-circle"><i class="lnr lnr-cross"><\/i><\/a><\/div>/g,'');
		content = content.replace(/<div class="remove-editor"><a class="btn-circle"><i class="lnr lnr-trash"><\/i><\/a><\/div>/g,'');
		content = content.replace(/<div class="type"><div data-toggle="modal" data-target="#type-modal" class="choose-type center"><a><img src="http:\/\/localhost\/inka\/public\/icon\/plus.png"><\/a><\/div><\/div>/g,'');
		content = content.replace(/<div class="col-sm-12"><\/div>/g,'');
		content = content.replace(/<div class="col-sm-6"><\/div>/g,'');
		content = content.replace(/<div class="col-sm-4"><\/div>/g,'');
		content = content.replace(/<div class="row section"><\/div>/g,'');
		// content = content.replace(//g,'');
		
	    $.ajax({
	        method: 'POST',
	        url: previewUrl,
	        dataType: 'json',
	        data: {
	        	"_token" : $('meta[name=csrf-token]').attr('content'),
	        	"content" : content
	        }
	    }).done(function (response) {
	        var w = window.open(previewUrl+'/'+response);
	    }).fail(function(jqXHR, textStatus, errorThrown) {
	    	console.log(jqXHR);
	    	console.log(textStatus + ': ' + errorThrown);
	    });
	});
	
	$('#submit').on('click', function() {
	    $('.remove-editor').remove();
	    $('.reset-content').remove();
	    $('.choose-type').remove();
	    $('.image-caption').removeAttr('contenteditable');

		$('.cke_editable_inline').attr('contenteditable', false);
		$('.cke_editable_inline').removeAttr('tabindex');

	    $('#content_index').val(index);

		var content = $('#ckcontent').html();
	    $('#content').val(content);

	    form.submit();
	});
});