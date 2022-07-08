function updateStatus(element, id, status){
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
    $.ajax({
        method: 'PATCH',
        url: statusUrl+'/status/'+id+'/'+status,
        data:{
        	id : id,
        	status : status
        }
    }).done(function (response) {
        var td = element.parentNode;
        while(td.firstChild){
            td.removeChild(td.firstChild);
        }
        if (status == 'draft')
            draft = "<button class=\"btn-success btn-circle-no-hover\">Drafted</button>&nbsp;"
        else
            draft = "<button class=\"btn-circle\" onclick=\"updateStatus(this, "+id+", 'draft');\">" +
                    "<i class=\"lnr lnr-construction\"></i> Draft</button>&nbsp;";

        if (status == 'publish')
            publish = "<button class=\"btn-success btn-circle-no-hover\">Published</button>&nbsp;"
        else
            publish = "<button class=\"btn-circle\" onclick=\"updateStatus(this, "+id+", 'publish');\">" +
                    "<i class=\"lnr lnr-cloud-upload\"></i> Publish</button>&nbsp;";

        if (status == 'archive')
            archive = "<button class=\"btn-success btn-circle-no-hover\">Archived</button>"
        else
            archive = "<button class=\"btn-circle\" onclick=\"updateStatus(this, "+id+", 'archive');\">" +
                    "<i class=\"lnr lnr-book\"></i> Archive</button>";
        
        td.insertAdjacentHTML( 'beforeend', draft );
        td.insertAdjacentHTML( 'beforeend', publish );
        td.insertAdjacentHTML( 'beforeend', archive );

    	// location.reload();
    }).fail(function(jqXHR, textStatus, errorThrown) {
    	console.log("Error, please try again or contact site's developer.");
        console.log(jqXHR); // for debugging
    });
};