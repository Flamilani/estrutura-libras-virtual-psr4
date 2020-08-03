<div class="container mt-3">
<h3><a data-toggle="tooltip" title="Voltar para Cursos" class="btn btn-primary" href="<?= BASE; ?>admin/cursos" role="button">
<i class="fa fa-arrow-left" aria-hidden="true"></i>
</a>
 Aulas do Curso: <?php echo $curso['nome']; ?> </h3> <hr>

 <?php if (isset($_SESSION['alerta_add_modulo']) && !empty($_SESSION['alerta_add_modulo'])) {
  echo $_SESSION['alerta_add_modulo'];
 unset($_SESSION['alerta_add_modulo']);
 } ?>

<?php if (isset($_SESSION['alerta_add_aula']) && !empty($_SESSION['alerta_add_aula'])) {
  echo $_SESSION['alerta_add_aula'];
 unset($_SESSION['alerta_add_aula']);
 } ?>

 <?php if (isset($_SESSION['alerta_deletar_modulo']) && !empty($_SESSION['alerta_deletar_modulo'])) {
  echo $_SESSION['alerta_deletar_modulo'];
 unset($_SESSION['alerta_deletar_modulo']);
 } ?>

 <?php if (isset($_SESSION['alerta_deletar_aula']) && !empty($_SESSION['alerta_deletar_aula'])) {
  echo $_SESSION['alerta_deletar_aula'];
 unset($_SESSION['alerta_deletar_aula']);
 } ?>
 <h4>Adicionar Novo Módulo</h4> 
	<form method="POST" class="form-row" autocomplete="off">
  <div class="form-group col-md-6 mr-3 mb-2">
    <label for="modulo" class="sr-only">Módulo</label>
    <input type="text" class="form-control" name="modulo" placeholder="Nome de Módulo" required>
  </div>
  <input type="submit" class="btn btn-primary mb-2" id="btn-modulo" value="Adicionar Módulo" />
</form>  
<br />
<?php if(!empty($modulos)): ?>  
 <h4>Adicionar Nova Aula</h4>

<form method="POST" autocomplete="off">
<div class="form-row">
    <div class="form-group col-md-6">
    <label for="aula">Aula</label>
    <input type="text" class="form-control" name="aula" placeholder="Tema de Aula" required='required'>
    </div>
    <div class="form-group col-md-2">
    <label for="modulo">Módulo</label>
	<select class="form-control" name="moduloaula" id="moduloaula">
			<?php foreach($modulos as $modulo): ?>
			<option value="<?php echo $modulo['id']; ?>"><?php echo $modulo['nome']; ?></option>
			<?php endforeach; ?>
		</select>
    </div>
    <div class="form-group col-md-2">
    <label for="tipo">Tipo de Aula</label>
	<select class="form-control" name="tipo" id="tipo" required='required'>
			<option value="">Selecione</option>
			<option value="aula">Multimídia</option>
			<option value="poll">Questionário</option> 		
			<option value="especifica">Página HTML</option>
    </select>
    </div>
    <div class="form-group col-md-2">
        <input type="submit" class="btn btn-primary margin-btn" id="btn-aula" value="Adicionar Aula" />
    </div>
  </div>
  </form>  
  <?php endif; ?>
 <div id="loading" class="alert alert-info text-center" role="alert">
<i class="fa fa-refresh fa-spin fa-2x fa-fw"></i> 
<span>Carregando...</span>
</div>
<a class="btn btn-info mb-3" href="<?php echo BASE; ?>admin/cursos/ordenar_modulo/<?php echo $curso['id']; ?>">
  <i class="fa fa-arrows" aria-hidden="true"></i> Ordenar Módulos</a>
<?php foreach($modulos as $modulo): ?>
	<ul class="list-group mb-3">
  <li class="list-group-item active">
  <?php echo $modulo['nome']; ?> 
  <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">
  <i class="fa fa-plus-circle" aria-hidden="true"></i>
</button>
  <a data-toggle="tooltip" title="Deletar Módulo" onclick="return confirmDelete()" class="btn btn-danger pull-right"
  href="<?php echo BASE; ?>admin/cursos/deletar_modulo/<?php echo $modulo['id']; ?>">
  <i class="fa fa-trash" aria-hidden="true"></i></a>
  <a data-toggle="tooltip" title="Editar Módulo" class="btn btn-secondary pull-right mr-3" href="<?php echo BASE; ?>admin/cursos/editar_modulo/<?php echo $modulo['id']; ?>">
  <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
  <?php if(isset($modulo['aulas']) && !empty($modulo['aulas'])): ?>
    <a data-toggle="tooltip" title="Ordenar Aulas" class="btn btn-info pull-right mr-3" href="<?php echo BASE; ?>admin/cursos/ordenar_aula/<?php echo $modulo['id']; ?>">
  <i class="fa fa-arrows" aria-hidden="true"></i></a>
  <?php endif; ?>
  </li>

  <?php foreach($modulo['aulas'] as $aula): ?>
  <li class="list-group-item list-group-item-primary">
  <?php if($aula['tipo'] == 'aula'): ?>
  <?php echo $aula['nome_aula']; ?> 
  <?php else: ?>
    <?php echo $aula['nome']; ?> 
    <?php endif; ?>
	<a data-toggle="tooltip" title="Deletar Aula" onclick="return confirmDelete()" class="btn btn-danger pull-right" href="<?php echo BASE; ?>admin/cursos/deletar_aula/<?php echo $aula['id']; ?>">
	<i class="fa fa-trash" aria-hidden="true"></i></a>

  <?php if($aula['tipo'] == 'aula'): ?>
	<a data-toggle="tooltip" title="Editar <?php echo $this->aulaTooltip($aula['tipo']); ?>" 
  class="btn btn-<?php echo $this->aulaColor($aula['tipo']); ?> pull-right mr-3" href="<?php echo BASE; ?>admin/cursos/editar_curso_aula/<?php echo $aula['id']; ?>">
  <?php echo $this->aulaButton($aula['tipo']); ?></a>
  <?php else: ?>
  <a data-toggle="tooltip" title="Editar <?php echo $this->aulaTooltip($aula['tipo']); ?>" 
  class="btn btn-<?php echo $this->aulaColor($aula['tipo']); ?> pull-right mr-3" href="<?php echo BASE; ?>admin/cursos/editar_aula/<?php echo $aula['id']; ?>">
  <?php echo $this->aulaButton($aula['tipo']); ?></a>
  <?php endif; ?>

	</li>	
	<?php endforeach; ?>
	</ul>
<?php endforeach; ?>

</div>


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" autocomplete="off">
<div data-modulo="<?php echo $modulo['id']; ?>">
    <div class="form-group">
    <label for="aula">Aula</label>
    <input type="text" class="form-control" name="aula" id="aula" placeholder="Tema de Aula" required='required'>
    </div>
    <div class="form-group">
    <label for="tipo">Tipo de Aula</label>
	<select class="form-control" name="tipo" id="tipo" required='required'>
			<option value="">Selecione</option>
			<option value="aula">Multimídia</option>
			<option value="poll">Questionário</option> 		
			<option value="especifica">Página HTML</option>
    </select>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary margin-btn" id="btn-aula" value="Adicionar Aula" />
    </div>
  </div>
  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
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

    $(document).on('click', '.adicionar_aula', function() {
            var current_element = $(this);
            var id_modulo = $(current_element).attr('data-modulo');
            var name = $("#name").val();
                $('input[value="classname"]').val;
            var email = $("#email").val();
            $.ajax({
                type: "POST",
                url: "<?php echo BASE; ?>admin/cursos/add_aula",
                data: {
                  id_aula: ordem, 
                  id_modulo: id_modulo,
                  id_curso: id_curso
                },
                success: function (data) {
                    location.reload();
                }});
        
    });
});
</script>