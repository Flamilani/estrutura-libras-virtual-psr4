<div class="container mt-3">
<h3>Bem vindo, <?php echo $_SESSION['nome']; ?></h3> <hr>

  <div class="row">

    <div class="col-sm">
    <div class="card mb-3">
  <img class="card-img-top icone" src="<?= BASE; ?>assets/icons/elearning.png" alt="Meus Cursos">
  <div class="card-body">
    <a href="<?= BASE; ?>cursos" class="btn btn-primary btn-block">Meus Cursos <span class="badge badge-light">4</span></a>
  </div>
</div>
    </div>

    <div class="col-sm">     
<div class="card mb-3">
   <img class="card-img-top icone" src="<?= BASE; ?>assets/icons/money.png" alt="Card image cap">
  <div class="card-body">
    <a href="#" class="btn btn-success btn-block">Meus Pagamentos <span class="badge badge-light">4</span></a>
  </div>
</div>
    </div>

<div class="col-sm">    
  <div class="card mb-3">  
    <img class="card-img-top icone" src="<?= BASE; ?>assets/icons/elearning.png" alt="Card image cap">
      <div class="card-body">
         <a href="#" class="btn btn-success btn-block">Meus Cadastros <span class="badge badge-light">4</span></a>
      </div>
  </div>
</div>

    </div>
  </div>
</div>

