<div class="container mt-3">
<?php require 'inc/aside.php'; ?>  
  <div class="col-sm-8">
  <h3><?php echo $aula_info['nome']; ?></h3>
	<iframe id="video" style="width:100%" frameborder="0" src="<?php echo $aula_info['url_video']; ?>"></iframe><br/>
	<?php echo $aula_info['descricao']; ?><br />
	<?php if($aula_info['assistido'] == '1'): ?>
      <button class="btn btn-success mt-3" disabled>Aula concluída</button>
	<?php else: ?>
		<button class="btn btn-outline-success mt-3" onclick="marcarAssistido(this)" 
		data-id="<?php echo $aula_info['id']; ?>">Marcar como assistido</button>
  <?php endif; ?>
  <button id="load_marcar_concluido" type="button" class="btn btn-info mt-3" disabled><i class="fa fa-refresh fa-spin fa-fw"></i> 
  Marcando... </button>
	<hr/>
	<h4>Dúvidas? Envie sua pergunta!</h4>
	<form method="POST" class="form_duvida">
		<textarea class="form-control" name="duvida"></textarea>

		<input class="btn btn-primary mt-3" type="submit" value="Enviar Dúvida" />
	</form>
  </div>
</div>
</div>
