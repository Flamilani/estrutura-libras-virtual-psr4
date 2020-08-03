<div class="container mt-3">
<h3><a data-toggle="tooltip" title="Voltar para Aulas" class="btn btn-primary" 
href="<?= BASE; ?>admin/cursos/aulas/<?php echo $aula['id_curso']; ?>" role="button">
<i class="fa fa-arrow-left" aria-hidden="true"></i>
</a>
Editar: <?php echo $aula['nome_aula']; ?> </h3> <hr>

<?php if (isset($_SESSION['alerta_editar_aula']) && !empty($_SESSION['alerta_editar_aula'])) {
  echo $_SESSION['alerta_editar_aula'];
 unset($_SESSION['alerta_editar_aula']);
 } ?>

<form method="POST" enctype="multipart/form-data" autocomplete="off">

  <div class="form-group">
    <label for="aula">Tema de Aula</label>
    <input type="text" class="form-control" name="nome" value="<?php echo $aula['nome_aula']; ?>" required>
  </div>
  <div class="form-group">
    <label for="descricao">Descrição</label>
    <textarea class="form-control" name="descricao" id="descricao" rows="3"><?php echo $aula['descricao']; ?></textarea> 
  </div>
  <div class="form-row">
      <div class="form-group col-md-4">
<label for="tipo">Tipo de Mídia</label>
	<select class="form-control" name="midia" id="midia">
    <option value="">Sem Mídia</option>
        <option <?php echo $aula['midia'] == 'video_youtube' ? 'selected' : ''; ?> value="video_youtube" name="video_youtube">Vídeo (YouTube)</option>
        <option <?php echo $aula['midia'] == 'video_vimeo' ? 'selected' : ''; ?> value="video_vimeo" name="video_vimeo">Vídeo (Vimeo)</option>
        <option <?php echo $aula['midia'] == 'video_mp4' ? 'selected' : ''; ?> value="video_mp4" name="video_mp4">Vídeo (mp4)</option>
        <option <?php echo $aula['midia'] == 'imagem' ? 'selected' : ''; ?> value="imagem" name="imagem">Imagem</option>	
			<option <?php echo $aula['midia'] == 'arquivo' ? 'selected' : ''; ?> value="arquivo" name="arquivo">PDF</option>
			<option <?php echo $aula['midia'] == 'gif' ? 'selected' : ''; ?> value="gif" name="gif">GIF</option>	
	</select>
</div> 
<div class="form-group col-md-4">
<label for="tipo">Atividade</label>
	<select class="form-control" name="atividade" id="atividade">
        <option <?php echo $aula['atividade'] == '0' ? 'selected' : ''; ?> value="0" name="atividade">Não</option>
			<option <?php echo $aula['atividade'] == '1' ? 'selected' : ''; ?> value="1" name="atividade">Sim</option>
		</select>
</div>  
</div>
  <div class="form-group video_youtube opcao">
<label for="video">URL do Vídeo (YouTube)</label>
 <input type="text" class="form-control" name="url_video" placeholder="https://youtu.be/codigo" value="<?php echo $aula['url_video']; ?>" />
<?php if(!empty($aula['url_video'])): ?> 
    <iframe class="embed-responsive-item mt-3" src="<?php echo $aula['url_video']; ?>" frameborder="0" allowfullscreen></iframe>
    <?php endif; ?> 
    </div>
    <div class="form-group video_vimeo opcao">
<label for="url_vimeo">URL do Vídeo (Vimeo)</label>
 <input type="text" class="form-control" name="url_vimeo" placeholder="https://vimeo.com/codigo" value="<?php echo $aula['url_vimeo']; ?>" />
<?php if(!empty($aula['url_video'])): ?> 
    <iframe class="embed-responsive-item mt-3" src="<?php echo $aula['url_vimeo']; ?>" frameborder="0" allowfullscreen></iframe>
    <?php endif; ?> 
    </div>
    <div class="form-group col-md-4 video_mp4 opcao">
<label for="video">Arquivo de Vídeo (mp4)</label>
 <input type="file" class="form-control" name="video_mp4" />
<?php if(!empty($aula['video_mp4'])): ?> 

    <video class="mt-3" controls>
  <source src="<?php echo BASE .'assets/uploads/videos/'. $aula['video_mp4']; ?>" type="video/mp4">
  <source src="movie.ogg" type="video/ogg">
Your browser does not support the video tag.
</video>

    <?php endif; ?> 
    </div>
    <div class="form-group arquivo opcao">
<label for="arquivo">Inserir Arquivo (PDF)</label>
 <input type="file" class="form-control" name="pdf" />
 <?php if(!empty($aula['arquivo'])): ?> 
    <iframe src="<?php echo BASE .'assets/uploads/pdfs/'. $aula['arquivo']; ?>" style="width:100%; height:700px;" class="mt-3" frameborder="0"></iframe>
    <?php endif; ?>
    </div>
    <div class="form-group imagem opcao">
<label for="imagem">Inserir Imagem</label>
 <input type="file" class="form-control" name="imagem" />
 <?php if(!empty($aula['imagem'])): ?> 
    <img class="col-md-4 img-thumbnail mt-3" src="<?php echo BASE .'assets/uploads/images/'. $aula['imagem']; ?>" />
    <?php endif; ?> 
    </div>  
    <div class="form-group gif opcao col-md-4">
<label for="imagem">Inserir GIF</label>
 <input type="file" class="form-control" name="gif" />
 </div>  
    <div class="gif opcao mb-3">
 <?php if(!empty($aula['gif'])): ?> 
    <img class="gifplayer img-gif" src="<?php echo BASE .'assets/uploads/gifs/'. $aula['imagem_gif']; ?>" data-gif="<?php echo BASE .'assets/uploads/gifs/'. $aula['gif']; ?>" />
    <?php endif; ?> 
    </div>  
  <input type="submit" class="btn btn-success" id="btn-modulo" value="Atualizar Aula" />
</form>  
 </div>

 <script>
     $(document).ready(function () {

        CKEDITOR.replace('descricao');

        $("#midia").change(function () {
             
             $(this).find("option:selected").each(function () {
                
                 if ($(this).attr("value") === "video_youtube") {   
                    $(".video_vimeo").hide();  
                    $(".video_mp4").hide();  
                     $(".arquivo").hide(); 
                     $(".imagem").hide();     
                     $(".gif").hide();     
                     $(".opcao").not(".video_youtube").hide();
                     $(".video_youtube").show();
                 }
                 else if ($(this).attr("value") === "video_vimeo") { 
                    $(".video_youtube").hide();  
                    $(".video_mp4").hide();  
                    $(".arquivo").hide(); 
                     $(".imagem").hide(); 
                     $(".gif").hide(); 
                     $(".opcao").not(".video_vimeo").hide();
                     $(".video_vimeo").show();                
                 }
                 else if ($(this).attr("value") === "video_mp4") { 
                    $(".video_youtube").hide();  
                    $(".video_vimeo").hide();  
                    $(".arquivo").hide(); 
                     $(".imagem").hide(); 
                     $(".gif").hide(); 
                     $(".opcao").not(".video_mp4").hide();
                     $(".video_mp4").show();                
                 }
                 else if ($(this).attr("value") === "arquivo") { 
                    $(".video_youtube").hide();  
                    $(".video_vimeo").hide();  
                     $(".video_mp4").hide(); 
                     $(".imagem").hide(); 
                     $(".gif").hide(); 
                     $(".opcao").not(".arquivo").hide();
                     $(".arquivo").show();                
                 }
                 else if ($(this).attr("value") === "imagem") { 
                      $(".arquivo").hide(); 
                      $(".video_youtube").hide();  
                     $(".video_vimeo").hide();  
                     $(".video_mp4").hide();
                     $(".gif").hide();  
                      $(".opcao").not(".imagem").hide();
                     $(".imagem").show();                
                 }
                 else if ($(this).attr("value") === "gif") { 
                      $(".arquivo").hide(); 
                      $(".video_youtube").hide();  
                     $(".video_vimeo").hide();  
                     $(".video_mp4").hide(); 
                     $(".imagem").hide(); 
                      $(".opcao").not(".gif").hide();
                     $(".gif").show();                
                 }
                 else {
                    $(".video_youtube").hide();  
                    $(".video_vimeo").hide();  
                     $(".video_mp4").hide(); 
                    $(".arquivo").hide(); 
                      $(".video").hide();  
                     $(".imagem").hide();   
                     $(".gif").hide(); 
                 }
             });
         }).change();
    });
 </script>