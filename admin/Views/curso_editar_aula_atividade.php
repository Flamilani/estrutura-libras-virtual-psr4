<div class="container mt-3">
<h3><a class="btn btn-success" href="<?= BASE; ?>admin/cursos" role="button">
<i class="fa fa-arrow-left" aria-hidden="true"></i>
</a>
 Atividade de <?php echo $aula['nome']; ?> </h3> <hr>

 <?php if (isset($_SESSION['alerta_editar_aula_atividade']) && !empty($_SESSION['alerta_editar_aula_atividade'])) {
  echo $_SESSION['alerta_editar_aula_atividade'];
 unset($_SESSION['alerta_editar_aula_atividade']);
 } ?>

 <?php if (isset($_SESSION['alerta_url_invalido']) && !empty($_SESSION['alerta_url_invalido'])) {
  echo $_SESSION['alerta_url_invalido'];
 unset($_SESSION['alerta_url_invalido']);
 } ?>
<form method="POST">
<div class="form-row">
    <div class="form-group col-md-10">
    <label for="aula">Parte</label>
    <input type="text" class="form-control" name="nome" value="<?php echo $aula['nome']; ?>">
    </div>
<div class="form-group col-md-2">
<label for="aula">Duração</label>
    <input type="text" class="form-control" name="duracao" value="<?php echo $aula['duracao']; ?>" />
</div>
</div>
<div class="form-group">
    <label for="duracao">Descrição da Atividade</label>
    <textarea name="descricao" class="form-control" rows="3"><?php echo $aula['descricao']; ?></textarea>
  </div>
  <div class="form-group">
<label for="aula">URL do Vídeo (YouTube)</label>
 <input type="text" class="form-control" name="url" value="<?php echo $aula['url']; ?>" />
    </div>
<div class="form-group">
<?php if(!empty($aula['url'])): ?> 
    <iframe class="embed-responsive-item mt-3" src="<?php echo $aula['url']; ?>" frameborder="0" allowfullscreen></iframe>
    <?php endif; ?>
    </div>
	<input class="btn btn-success" type="submit" value="Salvar" />

</form>
</div>