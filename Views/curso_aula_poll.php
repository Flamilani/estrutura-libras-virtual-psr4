<div class="container-fluid mt-3">
<?php require 'inc/aside.php'; ?>  
  <div class="col-sm-8">
  <h3><?php echo $aula_info['questao']; ?></h3>
<br />
  <div class="card">
  <h5 class="card-header">
  <?php echo $aula_info['pergunta']; ?>
  </h5>
  <div class="card-body"> 

	<form method="POST">
	<?php if( $aula_info['midia_opcao'] == 'texto'): ?> 
	<div class="form-check mb-3">
		<input style="cursor:pointer" class="form-check-input" type="radio" name="opcao" value="1" id="opcao1" />
		<label style="cursor:pointer" for="opcao1">A - <?php echo $aula_info['opcao1']; ?></label>
	</div>
	<div class="form-check mb-3" style="cursor:pointer">
		<input style="cursor:pointer" class="form-check-input" type="radio" name="opcao" value="2" id="opcao2" />
		<label style="cursor:pointer" for="opcao2">B - <?php echo $aula_info['opcao2']; ?></label>
    </div>
	<div class="form-check mb-3">
		<input style="cursor:pointer" class="form-check-input" type="radio" name="opcao" value="3" id="opcao3" />
		<label style="cursor:pointer" for="opcao3">C - <?php echo $aula_info['opcao3']; ?></label>
		</div>
	<div class="form-check mb-3">
		<input style="cursor:pointer" class="form-check-input" type="radio" name="opcao" value="4" id="opcao4" />
		<label style="cursor:pointer" for="opcao4">D - <?php echo $aula_info['opcao4']; ?></label>
    </div>
	<?php else: ?>
	
		<?php endif; ?>

		<?php if($aula_info['assistido'] == '1'): ?>
			Este questionário já foi respondido!
		<?php else: ?>
			<input class="btn btn-primary" type="submit" value="Enviar Resposta" />
		<?php endif; ?>
	</form>
	<?php
	if(isset($resposta)) {
		if($resposta === true) { ?>
		<div class="alert alert-success" role="alert">
			Resposta correta
		</div>
		<?php } else { ?>
		<div class="alert alert-danger" role="alert">
			Resposta errada
		</div>
	   <?php } 
	}
	?>
  </div>
</div>

  </div>
</div>
</div>
