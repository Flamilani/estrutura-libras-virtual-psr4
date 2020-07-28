<div class="container mt-3">
<h3><a data-toggle="tooltip" title="Voltar para Aulas" class="btn btn-primary" href="<?= BASE; ?>admin/cursos/aulas/<?php echo $aula['id_curso']; ?>" role="button">
<i class="fa fa-arrow-left" aria-hidden="true"></i>
</a>
Questionário de <?php echo $aula['questao']; ?> </h3> <hr>

 <?php if (isset($_SESSION['alerta_editar_poll']) && !empty($_SESSION['alerta_editar_poll'])) {
  echo $_SESSION['alerta_editar_poll'];
 unset($_SESSION['alerta_editar_poll']);
 } ?>

<form method="POST" enctype="multipart/form-data" autocomplete="off">
<div class="form-group">
    <label for="titulo">Título</label>
    <input type="text" class="form-control" name="questao" value="<?php echo $aula['questao']; ?>">
  </div>
  <div class="form-row">
<div class="form-group col-md-10">
    <label for="pergunta">Pergunta</label>
    <input type="text" class="form-control" name="pergunta" value="<?php echo $aula['pergunta']; ?>">
  </div>
  <div class="form-group col-md-2">
    <label for="tipo">Tipo de Pergunta</label>
	<select class="form-control" name="midia_pergunta" id="midia_pergunta" required='required'>
			<option value=""<?php echo ($aula['midia_pergunta']=='')?'selected="selected"':''; ?>>Selecione</option>
		<option value="texto" <?php echo ($aula['midia_pergunta']=='texto')?'selected="selected"':''; ?>>Texto</option>
		<option value="video" <?php echo ($aula['midia_pergunta']=='video')?'selected="selected"':''; ?>>Vídeo</option>
		<option value="imagem" <?php echo ($aula['midia_pergunta']=='imagem')?'selected="selected"':''; ?>>Imagem</option>
		<option value="gif" <?php echo ($aula['midia_pergunta']=='gif')?'selected="selected"':''; ?>>GIF</option>
    </select>
    </div>
	</div>
	<div class="form-group col-md-2">
    <label for="tipo">Tipo de Opção</label>
	<select class="form-control" name="midia_opcao" id="midia_opcao" required='required'>
			<option value=""<?php echo ($aula['midia_opcao']=='')?'selected="selected"':''; ?>>Selecione</option>
		<option value="texto" <?php echo ($aula['midia_opcao']=='texto')?'selected="selected"':''; ?>>Texto</option>
		<option value="video" <?php echo ($aula['midia_opcao']=='video')?'selected="selected"':''; ?>>Vídeo</option>
		<option value="imagem" <?php echo ($aula['midia_opcao']=='imagem')?'selected="selected"':''; ?>>Imagem</option>
		<option value="gif" <?php echo ($aula['midia_opcao']=='gif')?'selected="selected"':''; ?>>GIF</option>
    </select>
    </div>
  <div class="form-group">
    <label for="opcao1">Opção 1</label>
    <input type="text" class="form-control" name="opcao1" value="<?php echo $aula['opcao1']; ?>">
  </div>
  <div class="form-group">
    <label for="opcao2">Opção 2</label>
    <input type="text" class="form-control" name="opcao2" value="<?php echo $aula['opcao2']; ?>">
  </div>
  <div class="form-group">
    <label for="opcao3">Opção 3</label>
    <input type="text" class="form-control" name="opcao3" value="<?php echo $aula['opcao3']; ?>">
  </div>
  <div class="form-group">
    <label for="opcao4">Opção 4</label>
    <input type="text" class="form-control" name="opcao4" value="<?php echo $aula['opcao4']; ?>">
  </div>
  <div class="form-group col-md-4">
    <label for="resposta">Resposta Correta</label>
    <select class="form-control" name="resposta">
		<option value="1" <?php echo ($aula['resposta']=='1')?'selected="selected"':''; ?>>Opção 1</option>
		<option value="2" <?php echo ($aula['resposta']=='2')?'selected="selected"':''; ?>>Opção 2</option>
		<option value="3" <?php echo ($aula['resposta']=='3')?'selected="selected"':''; ?>>Opção 3</option>
		<option value="4" <?php echo ($aula['resposta']=='4')?'selected="selected"':''; ?>>Opção 4</option>
    </select>
  </div>
	<input type="submit" class="btn btn-success" value="Salvar" />

</form>