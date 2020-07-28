<div class="container mt-3">
<h3><a data-toggle="tooltip" title="Voltar para Aulas" class="btn btn-primary" href="<?= BASE; ?>admin/cursos/aulas/<?php echo $aula['id_curso']; ?>" role="button">
<i class="fa fa-arrow-left" aria-hidden="true"></i>
</a>
 Página de <?php echo $aula['titulo_pagina']; ?> </h3> <hr>

 <?php if (isset($_SESSION['alerta_editar_pagina']) && !empty($_SESSION['alerta_editar_pagina'])) {
  echo $_SESSION['alerta_editar_pagina'];
 unset($_SESSION['alerta_editar_pagina']);
 } ?>

<form method="POST">

    <div class="form-group">
    <label for="aula">Título</label>
    <input type="text" class="form-control" name="titulo_pagina" value="<?php echo $aula['titulo_pagina']; ?>">
    </div>
<div class="form-group">
    <label for="duracao">Página em HTML</label>
    <textarea name="pagina" class="form-control" rows="3"><?php echo $aula['pagina']; ?></textarea>
  </div>
  <div class="form-group">
    <label for="duracao">Estilo em CSS</label>
    <textarea name="estilo" class="form-control" rows="3"><?php echo $aula['estilo']; ?></textarea>
  </div>
  <div class="form-group">
    <label for="duracao">Script em JS</label>
    <textarea name="script" class="form-control" rows="3"><?php echo $aula['script']; ?></textarea>
  </div>
<div class="form-group">
<?php if(!empty($aula['pagina'])): ?> 
    <?php echo $aula['pagina']; ?>
    <?php echo $aula['estilo']; ?>
    <?php echo $aula['script']; ?>
    <?php endif; ?>
    </div>
	<input class="btn btn-success" type="submit" value="Salvar" />

</form>
</div>