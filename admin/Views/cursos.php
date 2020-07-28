<div class="container mt-3">
<h3><a class="btn btn-primary" href="<?= BASE; ?>admin" role="button"><i class="fa fa-home fa-3" aria-hidden="true"></i></a> Cursos</h3> <hr>

<button id="flip" class="btn btn-primary mb-3">Adicionar Curso</button>
<div id="panel">  
    <form method="POST">
    <div class="form-group">
            <label class="card-title">Título</label>
               <input type='text' name="titulo" id="titulo" class="form-control" />
        </div>
</div>
<div id="loading" class="alert alert-info text-center" role="alert">
<i class="fa fa-refresh fa-spin fa-2x fa-fw"></i> 
<span>Carregando...</span>
</div>
<table class="table table-striped bg-white">
  <thead>
    <tr>
      <th scope="col">Título</th>
      <th class="text-center" scope="col">Imagem</th>
      <th class="text-center" scope="col">Qtd. Aulas</th>
      <th class="text-center" scope="col">Qtd. Alunos</th>
      <th class="text-center" scope="col">Ações</th>
    </tr>
  </thead>
  <tbody id="page_ordem">
  <?php foreach($cursos as $curso): ?>
    <tr id="<?php echo $curso['id']; ?>" class="all-scroll">
      <td><?php echo $curso['nome']; ?></td>
      <td class="text-center">
      <?php if(!empty($curso['imagem'])): ?>
      <img class="img-fluid" src="<?php echo BASE; ?>assets/imgs/<?php echo $curso['imagem']; ?>" />
      <?php else: ?>
        <h4><span class="badge badge-info">Sem Imagem</span></h4>
      <?php endif; ?>
      </td>
      <td class="text-center"><a href="<?php echo BASE; ?>admin/cursos/aulas/<?php echo $curso['id']; ?>" class="btn btn-success">Aulas <span class="badge badge-light"><?php echo $curso['qtalunos']; ?></span></a></td>
      <td class="text-center"><a href="<?php echo BASE; ?>admin/cursos/alunos/<?php echo $curso['id']; ?>" class="btn btn-primary">Alunos <span class="badge badge-light"><?php echo $curso['qtalunos']; ?></span></a></td>
      <td class="text-center">
		<a data-toggle="tooltip" title="Editar" class="btn btn-info" href="<?php echo BASE; ?>admin/cursos/editar/<?php echo $curso['id']; ?>">
		<i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
		<a onclick="return confirmDelete()" data-toggle="tooltip" title="Deletar" class="btn btn-danger" href="<?php echo BASE; ?>admin/cursos/deletar/<?php echo $curso['id']; ?>">
		<i class="fa fa-trash" aria-hidden="true"></i></a>
		</td>
    </tr>
	<?php endforeach; ?>
  </tbody>
</table>
</div>

<script>
$(document).ready(function() {
    $(function () {
      $("#page_ordem").sortable({
        update: function (event, ui) {
          var ordenar = new Array();
          $('#page_ordem tr').each(function() {
            ordenar.push($(this).attr("id"));
            $("#loading").show();
          });
        $.ajax({
          url: "<?php echo BASE; ?>admin/cursos/update_ordem_curso",
          method: "POST",
          data: {ordem:ordenar},
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