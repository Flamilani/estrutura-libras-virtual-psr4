<div class="container mt-3">
 <div id="loading" class="alert alert-info text-center" role="alert">
<i class="fa fa-refresh fa-spin fa-2x fa-fw"></i> 
<span>Carregando...</span>
</div>
<?php foreach($modulos as $modulo): ?>
	<ul class="aula_sortable list-group mb-3">
  <li class="list-group-item active">
  <a data-toggle="tooltip" title="Voltar para Aulas" class="btn btn-info" 
href="<?= BASE; ?>admin/cursos/aulas/<?php echo $modulo['id_curso']; ?>" role="button">
<i class="fa fa-arrow-left" aria-hidden="true"></i>
</a> Ordenar Aulas de: <?php echo $modulo['nome']; ?>
    </li>
  <?php foreach($modulo['aulas'] as $aula): ?>
  <li data-curso="<?php echo $aula['id_curso']; ?>" data-modulo="<?php echo $aula['id_modulo']; ?>" data-id="<?php echo $aula['id']; ?>" class="list-group-item list-group-item-primary all-scroll">
	<?php echo $aula['nome']; ?> 
	</li>	
	<?php endforeach; ?>
	</ul>
<?php endforeach; ?>

</div>

<script>
$(document).ready(function() {
    $('#modulo').on('input', function() {
        $('#aula').prop('disabled', $(this).val().length > 0);
        $('#moduloaula').prop('disabled', $(this).val().length > 0);
        $('#tipo').prop('disabled', $(this).val().length > 0);
        $('#btn-aula').prop('disabled', $(this).val().length > 0);
    });

    $('#aula').on('input', function() {
        $('#modulo').prop('disabled', $(this).val().length > 0);
        $('#btn-modulo').prop('disabled', $(this).val().length > 0);
    });

    $(function () {
      $(".aula_sortable").sortable({
          items : ':not(.active)'
        });
      $(".aula_sortable").sortable({
        update: function (event, ui) {
          var ordem = new Array();
          var id_modulo = $(".aula_sortable li.all-scroll").attr("data-modulo");
          var id_curso = $(".aula_sortable li.all-scroll").attr("data-curso");

          $('.aula_sortable li.all-scroll').each(function() {
            ordem.push($(this).attr("data-id"));
            $("#loading").show();
          });
        $.ajax({
          url: "<?php echo BASE; ?>admin/cursos/update_ordem_aula",
          method: "POST",
          data: {
            id_aula: ordem, 
            id_modulo: id_modulo,
            id_curso: id_curso
          },
          success: function(data) {
            console.log("Ordem gravada com sucesso!");
            console.log("successo id_modulo: " + id_modulo);
            console.log("successo id_curso: " + id_curso);
            $("#loading").hide();
          }   
        })
      }
    });
  });
});
</script>