/* function confirmDelete(title, id) {
    alert('delete');
    return confirm('Tem certeza de que vai deletar ' + title + ' ' + id + '?');
} */

function confirmDelete() {
    if (confirm("Tem certeza que vai remover?"))
        return true;
    else
        return false;
}


$(document).ready(function() {
    $("#flip").click(function() {
        $("#panel").slideToggle("fast");
    }); 
});

$(function() {
    $('#datetimepicker1').datetimepicker({
        format: 'DD/MM/YYYY'
    });
});

$(function() {
    $('[data-toggle="tooltip"]').tooltip()
});

$(document).ready(function() {
    $('.gifplayer').gifplayer();
});

function marcarAssistido(obj) {
    var id = $(obj).attr('data-id');

    $(obj).remove();

    $("#load_marcar_concluido").show();

    $.ajax({
        url: '/estrutura_ead_psr4/ajax/marcar_assistido/' + id,
        type: 'GET',
        success: function() {        
            location.reload();
          }   
    });    
}