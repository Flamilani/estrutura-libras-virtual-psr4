<h3><a data-toggle="tooltip" title="Voltar para Cursos" href="<?= BASE; ?>cursos" class="btn btn-primary">
  <i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a> Curso <?php echo $curso->getNome(); ?></h3> 
 <?php echo $curso->getDescricao(); ?><br/>	

 <div class="row">
  <div class="col-sm-4 zindex"> 
  <div class="text-center mb-2">Seu progresso ( <?php echo $aulas_assistidas.' / '.$total_aulas; ?> aulas )</div>
  <div class="progress mb-3">
  <div class="progress-bar bar-success" role="progressbar" style="width: <?php echo (($aulas_assistidas/$total_aulas)*100); ?>%;" aria-valuenow="<?php echo (($aulas_assistidas/$total_aulas)*100); ?>" aria-valuemin="0" aria-valuemax="100">
  <?php echo $aulas_assistidas.' / '.$total_aulas.' ('. (($aulas_assistidas/$total_aulas)*100) .'%)'; ?>
  </div>
</div>
  <?php foreach($modulos as $modulo): ?>
    <div class="list-group mb-3">
  <a href="<?php echo BASE; ?>cursos/modulo/<?php echo $modulo['id']; ?>" class="list-group-item list-group-item-action active">
  <?php echo $modulo['nome']; ?>
  </a>
  <?php foreach($modulo['aulas'] as $aula): ?>
  <a href="<?php echo BASE; ?>cursos/aula/<?php echo $aula['id']; ?>" class="list-group-item list-group-item-action">
  <?php if($aula['tipo'] == 'aula'): ?>
  <?php echo $aula['nome_aula']; ?> 
  <?php else: ?>
    <?php echo $aula['nome']; ?> 
    <?php endif; ?>
				<?php if($aula['assistido'] === true): ?>
                    <i class="fa fa-check-circle-o fa-2x pull-right text-success" aria-hidden="true"></i>
                <?php else: ?>
                    <i class="fa fa-check-circle-o fa-2x pull-right text-gray" aria-hidden="true"></i>
		<?php endif; ?>
  </a>
  <?php endforeach; ?>
</div>
	<?php endforeach; ?>
  </div>