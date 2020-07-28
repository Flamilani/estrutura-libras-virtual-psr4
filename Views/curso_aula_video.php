<div class="container mt-3">
<?php require 'inc/aside.php'; ?>  
  <div class="col-sm-8">
  <h3><?php echo $aula_info['nome']; ?></h3>
	<iframe id="video" style="width:100%" frameborder="0" src="<?php echo $aula_info['url_video']; ?>"></iframe><br/>
	<?php echo $aula_info['descricao']; ?><br />
	<?php if($aula_info['assistido'] == '1'): ?>
		Esta aula já foi assistida!
	<?php else: ?>
		<button class="btn btn-outline-success mt-3 text-center" onclick="marcarAssistido(this)" data-id="<?php echo $aula_info['id_aula']; ?>">Marcar como assistido</button>
	<?php endif; ?>
	<hr/>
	<h4>Dúvidas? Envie sua pergunta!</h4>
	<form method="POST" class="form_duvida">
		<textarea class="form-control" name="duvida"></textarea>

		<input class="btn btn-primary mt-3" type="submit" value="Enviar Dúvida" />
	</form>
  </div>
</div>
</div>
