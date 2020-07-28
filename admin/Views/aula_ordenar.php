<div class="container mt-3">
<h3><a data-toggle="tooltip" title="Voltar para Cursos" class="btn btn-primary" href="<?= BASE; ?>admin/cursos" role="button">
<i class="fa fa-arrow-left" aria-hidden="true"></i>
</a>
 Aulas do Curso: <?php echo $curso['nome']; ?> </h3> <hr>

 <div id="loading" class="alert alert-info text-center" role="alert">
<i class="fa fa-refresh fa-spin fa-2x fa-fw"></i> 
<span>Carregando...</span>
</div>
<?php foreach($modulos as $modulo): ?>
	<ul class="aula_sortable list-group mb-3">
  <li class="list-group-item active">
  <?php echo $modulo['nome']; ?>
  <a data-toggle="tooltip" title="Deletar Módulo" onclick="return confirmDelete()" class="btn btn-danger pull-right" 
  href="<?php echo BASE; ?>admin/cursos/deletar_modulo/<?php echo $modulo['id']; ?>">
  <i class="fa fa-trash" aria-hidden="true"></i></a>
  <a data-toggle="tooltip" title="Editar Módulo" class="btn btn-secondary pull-right mr-3" href="<?php echo BASE; ?>admin/cursos/editar_modulo/<?php echo $modulo['id']; ?>">
  <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
  </li>
  <?php foreach($modulo['aulas'] as $aula): ?>
  <li data-curso="<?php echo $aula['id_curso']; ?>" data-modulo="<?php echo $aula['id_modulo']; ?>" data-id="<?php echo $aula['id']; ?>" class="list-group-item all-scroll">
	<?php echo $aula['nome']; ?> 
	<a data-toggle="tooltip" title="Deletar Aula" onclick="return confirmDelete()" class="btn btn-danger pull-right" href="<?php echo BASE; ?>admin/cursos/deletar_aula/<?php echo $aula['id']; ?>">
	<i class="fa fa-trash" aria-hidden="true"></i></a>
	<a data-toggle="tooltip" title="Editar <?php echo $this->aulaTooltip($aula['tipo']); ?>" 
  class="btn btn-<?php echo $this->aulaColor($aula['tipo']); ?> pull-right mr-3" href="<?php echo BASE; ?>admin/cursos/editar_aula/<?php echo $aula['id']; ?>">
  <?php echo $this->aulaButton($aula['tipo']); ?>
  </a>
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
          var modulo = new Array();
          var curso = new Array();
          $('.aula_sortable li.all-scroll').each(function() {
            ordem.push($(this).attr("data-id"));
            modulo.push($(this).attr("data-modulo"));
            curso.push($(this).attr("data-curso"));
            $("#loading").show();
          });
        $.ajax({
          url: "<?php echo BASE; ?>admin/cursos/aulas/update_ordem_aula",
          method: "POST",
          data: {
            id_aula: ordem, 
            id_modulo: modulo,
            id_curso: curso
          },
          success: function(data) {
            console.log("Ordem gravada com sucesso!");
            $("#loading").hide();
          }   
        })
      }
    });
  });
});
</script>