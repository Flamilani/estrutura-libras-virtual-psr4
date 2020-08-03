<div id="accordion">
    <div class="card">
      <button class="btn btn-link btn-ajustes" data-toggle="collapse" data-target="#<?php echo url_amigavel($video['video_descricao']); ?>" aria-expanded="true" aria-controls="<?php echo url_amigavel($video['video_descricao']); ?>">
    <div class="card-header" id="head-<?php echo url_amigavel($video['video_descricao']); ?>">
      <h5 class="mb-0">        
         <?php echo $video['video_descricao']; ?>
      </h5>
    </div>
        </button>
    <div id="<?php echo url_amigavel($video['video_descricao']); ?>" class="collapse show" aria-labelledby="head-<?php echo url_amigavel($video['video_descricao']); ?>" data-parent="#accordion">
      <div class="card-body">
  <div class="embed-responsive embed-responsive-16by9">
    <?php if(isset($video['video_tipo']) && $video['video_tipo'] == 'youtube'):  ?>
  <iframe class="embed-responsive-item" src="<?php echo (isset($video['video_url']) && $video['video_url'] !== null ? $video['video_url'] : ''); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  <?php elseif(isset($video['video_tipo']) && $video['video_tipo'] == 'video_html'):  ?>
  <video class="embed-responsive-item" controls>
  <source src="<?php echo base_url('assets/uploads/' . $video['video_url']); ?>" type="video/mp4">
Your browser does not support the video tag.
</video>
  <?php endif; ?>
  </div>
      </div>
    </div>
  </div>
  <?php $lista_videos = $this->db->query("SELECT * FROM mais_videos where aula_id = '{$video['aula_id']}' ORDER BY mais_video_ordem"); ?>
   <?php foreach ($lista_videos->result() as $vs): ?>
  <div class="card">

        <button class="btn btn-link btn-ajustes" data-toggle="collapse" data-target="#<?php echo url_amigavel($vs->video_descricao); ?>" aria-expanded="true" aria-controls="<?php echo url_amigavel($vs->video_descricao); ?>">
    <div class="card-header" id="head-<?php echo url_amigavel($vs->video_descricao); ?>">
  <h5 class="mb-0">
         <?php echo $vs->video_descricao; ?>
       
      </h5>
    </div>
 </button>
    <div id="<?php echo url_amigavel($vs->video_descricao); ?>" class="collapse" aria-labelledby="head-<?php echo url_amigavel($vs->video_descricao); ?>" data-parent="#accordion">
      <div class="card-body">
       <div class="embed-responsive embed-responsive-16by9">
    <?php if(isset($vs->video_tipo) && $vs->video_tipo == 'youtube'):  ?>
  <iframe class="embed-responsive-item" src="<?php echo (isset($video->video_url) && $video->video_url !== null ? $video->video_url : ''); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  <?php elseif(isset($vs->video_tipo) && $vs->video_tipo == 'video_html'):  ?>
  <video class="embed-responsive-item" controls>
  <source src="<?php echo base_url('assets/uploads/' . $vs->video_url); ?>" type="video/mp4">
Your browser does not support the video tag.
</video>
  <?php endif; ?>
  </div>
      </div>
    </div>
  </div>
    <?php endforeach; ?> 
</div>
