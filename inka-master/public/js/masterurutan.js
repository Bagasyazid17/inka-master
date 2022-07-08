function gantiUrutan(id, action){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        method: 'PATCH',
        url: urutanUrl+'/urutan/'+id+'/'+action,
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

$(document).ready(function() {
    $('.datatable').DataTable({
        "paging": false,
        "responsive": true,
        "orderable": false,
        "order": [],
	});

    $('.bahasa-tab').first().addClass('bahasa-active');
    $('#child-0').show();
    $('.bahasa-tab').on('click', function(){
        $('.bahasa-tab').removeClass('bahasa-active');
        var child = $(this).attr('href');
        $(this).addClass('bahasa-active');
        $('.bahasa-child').hide();
        $('#'+child).show();
    });
});