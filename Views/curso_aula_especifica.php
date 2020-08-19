<div class="container-fluid mt-3">
<?php require 'inc/aside.php'; ?>  
  <div class="col-sm-8">
  <h3><?php echo $aula_info['titulo_pagina']; ?></h3>
	<?php echo $aula_info['pagina']; ?><br />
  <style type="text/css">
    	<?php echo $aula_info['estilo']; ?>
  </style>
    <script>
    	<?php echo $aula_info['script']; ?>
  </script>
	<?php if($aula_info['assistido'] == '1'): ?>
      <button class="btn btn-success mt-3" disabled>Aula concluída</button>
	<?php else: ?>
		<button class="btn btn-outline-success mt-3" onclick="marcarAssistido(this)" 
		data-id="<?php echo $aula_info['id']; ?>">Marcar como assistido</button>
  <?php endif; ?>
  <button id="load_marcar_concluido" type="button" class="btn btn-info mt-3" disabled><i class="fa fa-refresh fa-spin fa-fw"></i> 
  Marcando... </button>
  </div>
</div>

</div>
