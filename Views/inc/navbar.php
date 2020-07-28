<nav class="navbar navbar-expand-lg bg-azul-claro">
<div class="container">
  <a class="navbar-brand text-dark" href="<?= BASE; ?>home">Painel do Aluno</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <img class="container d-flex justify-content-center logo-login" src="<?= BASE; ?>assets/imgs/logo_p.png" alt="Logo Libras Virtual">
    <span class="navbar-text">  
        <div class="dropdown text-light">
  <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   Meu Perfil
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="btn btn-danger btn-block" href="<?php echo BASE; ?>login/logout">Sair</a>
  </div>
</div>
    </span>
  </div>
  </div>
</nav>