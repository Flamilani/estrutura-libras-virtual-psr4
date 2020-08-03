<div class="container mt-3">
<h3><a data-toggle="tooltip" title="Voltar para Aulas" class="btn btn-primary" 
href="<?= BASE; ?>admin/cursos/aulas/<?php echo $curso['id']; ?>" role="button">
<i class="fa fa-arrow-left" aria-hidden="true"></i>
</a>
 Ordenar Módulos do Curso: <?php echo $curso['nome']; ?> </h3> <hr>

 <div id="loading" class="alert alert-info text-center" role="alert">
<i class="fa fa-refresh fa-spin fa-2x fa-fw"></i> 
<span>Carregando...</span>
</div>
<ul class="aula_sortable list-group mb-3">
<?php foreach($modulos as $modulo): ?>
  <li data-curso="<?php echo $modulo['id_curso']; ?>" data-id="<?php echo $modulo['id']; ?>" class="list-group-item list-group-item-primary all-scroll">
  <?php echo $modulo['nome']; ?>  
  </li>
<?php endforeach; ?>
</ul>
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

        update: function (event, ui) {
          var ordem = new Array();       
          var id_curso = $(".aula_sortable li").attr("data-curso");

          $('.aula_sortable li').each(function() {
            ordem.push($(this).attr("data-id"));
            $("#loading").show();
          });
        $.ajax({
          url: "<?php echo BASE; ?>admin/cursos/update_ordem_modulo",
          method: "POST",
          data: {
            id_modulo: ordem,
            id_curso: id_curso
          },
          success: function(data) {
            console.log("Ordem gravada com sucesso!");
            console.log("successo id_curso: " + id_curso);
            $("#loading").hide();
          }   
        })
      }
    });
  });
});
</script>