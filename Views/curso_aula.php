<div class="container-fluid mt-3">
<?php require 'inc/aside.php'; ?>  
  <div class="col-sm-8">
  <h3> <?php echo $aula_info['atividade'] == '1' ? '<b class="text-primary">Atividade</b>' : ''; ?> <?php echo $aula_info['nome_aula']; ?></h3>
  
  <?php if(!empty($aula_info['url_video'] && $aula_info['midia'] == 'video_youtube')): ?> 
  <div class="embed-responsive embed-responsive-16by9">
   <iframe class="embed-responsive-item" src="<?php echo $aula_info['url_video']; ?>" frameborder="0" allowfullscreen></iframe>
   </div>
   <?php endif; ?>

   <?php if(!empty($aula_info['url_video'] && $aula_info['midia'] == 'video_vimeo')): ?> 
  <div class="embed-responsive embed-responsive-16by9">
   <iframe class="embed-responsive-item" src="<?php echo $aula_info['url_vimeo']; ?>" frameborder="0" allowfullscreen></iframe>
   </div>
   <?php endif; ?>

   <?php if(!empty($aula_info['video_mp4'] && $aula_info['midia'] == 'video_mp4')): ?> 
  <div class="embed-responsive embed-responsive-16by9">
  <video class="embed-responsive-item" controls>
  <source src="<?php echo BASE .'assets/uploads/videos/'. $aula_info['video_mp4']; ?>" type="video/mp4">
  <source src="movie.ogg" type="video/ogg">
Your browser does not support the video tag.
</video>
   </div>
   <?php endif; ?>

    <?php if(!empty($aula_info['arquivo'] && $aula_info['midia'] == 'arquivo')): ?> 
    <iframe src="<?php echo BASE .'assets/uploads/pdfs/'. $aula_info['arquivo']; ?>" style="width:100%; height:700px;" class="mt-3" frameborder="0"></iframe>
    <?php endif; ?>

    <?php if(!empty($aula_info['imagem'] && $aula_info['midia'] == 'imagem')): ?> 
    <img class="img-fluid mt-3" src="<?php echo BASE .'assets/uploads/images/'. $aula_info['imagem']; ?>" />
    <?php endif; ?>

    <?php if(!empty($aula_info['gif'] && $aula_info['midia'] == 'gif')): ?> 
      <img class="gifplayer img-gif" src="<?php echo BASE .'assets/uploads/gifs/'. $aula_info['imagem_gif']; ?>" data-gif="<?php echo BASE .'assets/uploads/gifs/'. $aula_info['gif']; ?>" />
    <?php endif; ?>
    <?php if($aula_info['assistido'] == '1'): ?>
		<h4><span class="badge badge-success mt-2">Aula concluída</span></h4>
	<?php else: ?>
		<button class="btn btn-outline-success mt-3 d-flex justify-content-center" onclick="marcarAssistido(this)" 
		data-id="<?php echo $aula_info['id']; ?>">Marcar como assistido</button>
  <?php endif; ?>
  <h5 class="mt-3">Caso tiver dúvida, pode enviar sua pergunta aqui.</h5>
	<form method="POST" class="form_duvida">
		<textarea class="form-control" name="duvida"></textarea>

		<input class="btn btn-primary mt-3" type="submit" value="Enviar Dúvida" />
	</form>
    <?php if($aula_info['atividade'] == 1): ?> 
    <?php if (isset($_SESSION['alerta_atividade_salva']) && !empty($_SESSION['alerta_atividade_salva'])) {
  echo $_SESSION['alerta_atividade_salva'];
 unset($_SESSION['alerta_atividade_salva']);
 } ?>
 <?php if(empty($atividade['url_video_aluno'])): ?> 
<form method="POST" autocomplete="off">
<div class="form-group mt-3">
<label for="aula">Envie sua atividade em Vídeo (YouTube)</label>
 <input type="text" class="form-control" name="url_video_aluno" placeholder="https://youtu.be/codigo" />
    </div>
	<input class="btn btn-success" type="submit" value="Salvar vídeo" />
</form>
<?php endif; ?>
<?php if(!empty($atividade['url_video_aluno'])): ?> 
	<div class="card mt-3">
  <h5 class="card-header text-white bg-info">Sua atividade foi enviada para ser avaliada</h5>
  <div class="card-body">
  <div class="embed-responsive embed-responsive-16by9 mt-3">
   <iframe class="embed-responsive-item" src="<?php echo $atividade['url_video_aluno']; ?>" frameborder="0" allowfullscreen></iframe>
   </div>
  </div>
</div>
   <?php endif; ?>
   <?php if(!empty($atividade['avaliacao'])): ?> 
	<div class="card mt-3">
  <h5 class="card-header text-white bg-success">Sua avaliação: <?php echo $atividade['avaliacao']; ?></h5>
  <div class="card-body">
  <?php if(!empty($atividade['url_video_observacao'])): ?> 
  <div class="embed-responsive embed-responsive-16by9 mt-3">
   <iframe class="embed-responsive-item" src="<?php echo $atividade['url_video_observacao']; ?>" frameborder="0" allowfullscreen></iframe>
   </div>
   <?php endif; ?>
   <p class="mt-3">
   <?php echo $atividade['observacao']; ?>
   </p>
  </div>
</div>
   <?php endif; ?>
 <?php endif; ?>
  </div>
</div>
</div>
