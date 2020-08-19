<h3><a data-toggle="tooltip" title="Voltar para Cursos" href="<?= BASE; ?>cursos" class="btn btn-primary">
  <i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a> Curso <?php echo $curso->getNome(); ?></h3> 
 <?php echo $curso->getDescricao(); ?><br/>	

 <div class="row">
  <div class="col-sm-4 zindex"> 
  <div class="text-center mb-2">Seu progresso ( <?php echo $aulas_assistidas.' / '.$total_aulas; ?> aulas )</div>
  <div class="progress mb-3">
  <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo number_format((($aulas_assistidas/$total_aulas)*100)); ?>%;" aria-valuenow="<?php echo number_format((($aulas_assistidas/$total_aulas)*100)); ?>" aria-valuemin="0" aria-valuemax="100">
  <?php echo number_format((($aulas_assistidas/$total_aulas) * 100)) .'%'; ?>
  </div>
</div>
  <?php foreach($modulos as $modulo): ?>
    <div class="list-group mb-3">
 <!--  <a href="<?php echo BASE; ?>cursos/modulo/<?php echo $modulo['id']; ?>" class="list-group-item list-group-item-action active">
  </a> -->
  <li style="cursor: pointer;" class="list-group-item active modulo-<?php echo $modulo['id']; ?>"><?php echo $modulo['nome']; ?></li>
  <script>
  $(document).ready(function() {
    $(".modulo-<?php echo $modulo['id']; ?>").click(function(){
        $(".aula-<?php echo $modulo['id']; ?>").slideToggle();
      });
});
</script>
  <?php foreach($modulo['aulas'] as $aula): ?>
    <script>
  $(document).ready(function() {
    <?php if(isset($aula['id']) && $aula['id'] == $this->getLastUrl()): ?>
        $(".aula-<?php echo $modulo['id']; ?>").show();
    <?php endif; ?>
});
</script>
  <a href="<?php echo BASE; ?>cursos/aula/<?php echo $aula['id']; ?>" class="list-group-item list-group-item-action 
  <?php echo (isset($aula['id']) && $aula['id'] == $this->getLastUrl()) ? 'item-active disabled' : ''; ?> aula-<?php echo $modulo['id']; ?>">
  <?php if($aula['tipo'] == 'aula'): ?>
  <?php echo $aula['nome_aula']; ?> 
  <?php else: ?>
    <?php echo $aula['nome']; ?> 
    <?php endif; ?>
				<?php if($aula['assistido'] === true): ?>
                    <i data-toggle="tooltip" title="Aula Concluída" class="fa fa-check-circle-o fa-2x pull-right text-success" aria-hidden="true"></i>
                <?php else: ?>
                    <i data-toggle="tooltip" title="Dependente" class="fa fa-check-circle-o fa-2x pull-right text-gray" aria-hidden="true"></i>
		<?php endif; ?>
  </a>
  <?php endforeach; ?>
</div>
	<?php endforeach; ?>
  </div>