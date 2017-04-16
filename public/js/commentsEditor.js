//Hetkel ei tööta, aga hiljem vajalik ajaxiga kommentaaride muutmiseks, vb sobib ka tervede postituste muutmiseks, kui kohandada
$('#editPost').onclick = function () {
    newfun()
    
};


$(document).on( "click", '.edit',function() {
    console.log("ei");
    $('#edit-modal').modal({ show: true });
});

function minuFun() {
    console.log("wat");
}

$('.edit').on('click', function(event) {
    console.log("putsi sa ei tööta");
    $('#edit-modal').modal('show');
});