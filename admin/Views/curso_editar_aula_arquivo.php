<div class="container mt-3">
<h3><a class="btn btn-success" href="<?= BASE; ?>admin/cursos" role="button">
<i class="fa fa-arrow-left" aria-hidden="true"></i>
</a>
 Arquivo de <?php echo $aula['arquivo']; ?> </h3> <hr>

 <?php if (isset($_SESSION['alerta_editar_arquivo_pdf']) && !empty($_SESSION['alerta_editar_arquivo_pdf'])) {
  echo $_SESSION['alerta_editar_arquivo_pdf'];
 unset($_SESSION['alerta_editar_arquivo_pdf']);
 } ?>

<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
    <label for="aula">Título de Arquivo</label>
    <input type="text" class="form-control" name="arquivo" value="<?php echo $aula['arquivo']; ?>">
    </div>
<div class="form-group">
    <label for="duracao">Descrição da Arquivo</label>
    <textarea name="descricao" class="form-control" rows="3"><?php echo $aula['descricao']; ?></textarea>
  </div>
  <div class="form-group">
<label for="aula">Inserir Arquivo (PDF)</label>
 <input type="file" class="form-control" name="pdf" />
    </div>
<div class="form-group">
<?php if(!empty($aula['pdf'])): ?> 
    <iframe src="<?php echo BASE .'assets/uploads/'. $aula['pdf']; ?>" style="width:100%; height:700px;" frameborder="0"></iframe>
    <?php endif; ?>
    </div>
	<input class="btn btn-success" type="submit" value="Salvar" />

</form>
</div>