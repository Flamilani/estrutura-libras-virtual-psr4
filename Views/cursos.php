<div class="container mt-3">
<h3><a class="btn btn-primary" href="<?= BASE; ?>" role="button"><i class="fa fa-home fa-3" aria-hidden="true"></i></a> 
Meus Cursos</h3> <hr>

  <div class="row">
  <?php foreach($cursos as $curso): ?>
  <div class="col-sm">
    <div class="card mb-3 text-center">
    <div class="card-body">
    <a href="<?php echo BASE; ?>cursos/entrar/<?php echo $curso['id_curso']; ?>">
  <img class="card-img-top icone" src="<?= BASE; ?>assets/icons/elearning.png" alt="<?php echo $curso['nome']; ?>">
  </a>

  <div class="progress mb-3">
  <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
</div>
 <b class="titulo-curso"><?php echo $curso['nome']; ?></b>
    <a href="<?php echo BASE; ?>cursos/entrar/<?php echo $curso['id_curso']; ?>" class="btn btn-primary">Entrar</a>
  </div>
</div>
    </div>
    <?php endforeach; ?>   
 
  </div>
</div>

