<div class="container mt-3">
<h3><a data-toggle="tooltip" title="Voltar para Cursos" class="btn btn-primary" href="<?= BASE; ?>admin/cursos" role="button">
<i class="fa fa-arrow-left" aria-hidden="true"></i>
</a> 
Editar Curso <?php echo $curso['nome']; ?></h3> <hr>

<?php if (isset($_SESSION['alerta_editar_curso']) && !empty($_SESSION['alerta_editar_curso'])) {
  echo $_SESSION['alerta_editar_curso'];
 unset($_SESSION['alerta_editar_curso']);
 } ?>
 
<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
    <label for="nome">Nome do Curso</label>
    <input type="text" class="form-control" name="nome" value="<?php echo $curso['nome']; ?>">
  </div>
	<div class="form-group">
    <label for="descricao">Descrição</label>
    <textarea name="descricao" class="form-control" rows="3"><?php echo $curso['descricao']; ?></textarea>
  </div>
    <div class="row">
  <div class="col-6">
  <div class="form-group">
<label for="aula">Imagem</label>
 <input type="file" class="form-control" name="imagem" />
    </div>
    </div>

  <div class="col-6">
  <?php if(!empty($aula['imagem'])): ?> 
    <iframe src="<?php echo BASE .'assets/uploads/'. $aula['imagem']; ?>" style="width:100%; height:700px;" frameborder="0"></iframe>
    <?php endif; ?>
  <div class="form-group">
<label for="aula">URL do Vídeo (YouTube)</label>
 <input type="text" class="form-control" name="url" value="<?php echo $curso['url']; ?>" />
    </div>
    <div class="form-group">
<?php if(!empty($curso['url'])): ?> 
    <iframe class="embed-responsive-item mt-3" src="<?php echo $curso['url']; ?>" frameborder="0" allowfullscreen></iframe>
    <?php endif; ?>
  </div>
</div>
</div>
<div class="form-group">
	<input class="btn btn-primary" type="submit" value="Atualizar" />
</form>

</div>