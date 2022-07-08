// function swapDataTableRows(selector, row1Index, row2Index)
// {
//     var datatable = selector.DataTable();
//     console.log(row1Index, row2Index);
//     //var rows = datatable.rows().data();
//     var row1Data = datatable.row(row1Index).data();
//     var row2Data = datatable.row(row2Index).data();

//     datatable.row(row1Index).data(row2Data).draw();
//     datatable.row(row2Index).data(row1Data).draw();
//     datatable.draw();
// }

// function gantiUrutan(oldId, action){
//     // var modifier = null;
//     if (action == 'up') {
//         // modifier = -1;
//         swapDataTableRows($('#datatable'), oldId-1, oldId-2);
//     }
//     else if (action == 'down'){
//         // modifier = 1;
//         swapDataTableRows($('#datatable'), oldId, oldId-1);
//     }

//     // id[oldId-1][1] = id[oldId-1][1] + modifier;
// };

function gantiUrutan(sliderId, action){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        method: 'PATCH',
        url: urutanUrl+'/urutan/'+sliderId+'/'+action,
        data:{
            id : masterId,
            sliderId : sliderId,
            action : action
        }
    }).done(function (response) {
        location.reload();
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log("Error, please try again or contact site's developer.");
    });
};

$(document).ready(function() {
    var table = null;
    // var kolomUrutan = 3;

    table = $('#datatable').DataTable({
        // "autoWidth": false,
        "paging": false,
        "responsive": true,
        "orderable": false,
        "order": [],
        // "columnDefs": [
        // {
        //     "targets": kolomUrutan,
        //     "visible": false
        // }]
    });

    // $('#lihat-urutan').on('click', function() {
    //     $('.urutan-batal').hide(0, function(){
    //         table.column(kolomUrutan).visible(true);
    //         $('.urutan-lihat').fadeIn();
    //     });
    // });

    // $('#batal-urutan').on('click', function() {
    //     $('.urutan-lihat').hide(0, function(){
    //         table.column(kolomUrutan).visible(false);
    //         $('.urutan-batal').fadeIn();
    //     });
    // });
});
