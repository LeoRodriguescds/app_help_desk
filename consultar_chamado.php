<?php require_once 'validarSessao.php';
?>

<?php 

  $chamados = [];

  //Vai ler o arquivo
  $arquivo = fopen('../../../../Leona/xampp/app_help_desk/arquivo.hd', 'r');

  while(!feof($arquivo)) { //Testa pelo fim-de-arquivo (eof) em um ponteiro de arquivo, eela retorna verdadeiro ou falso
    $registro = fgets($arquivo);
    $chamados[] = $registro;
  }

  //fechar o arquivo aberto
  fclose($arquivo);

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

  <nav class="navbar navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand ms-3" href="#">
          <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
          App Help Desk
        </a>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link link-light me-3" href="logoff.php">
                SAIR
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              
              <? foreach($chamados as $chamado) { ?>

              <?php 
              
                $chamado_dados = explode('-', $chamado);

                if($_SESSION['perfil_id'] == 2) {
                  if($_SESSION['id'] != $chamado_dados[0]) {
                    continue;
                  }
                }

                if(count($chamado_dados) < 3) {
                  continue;
                }
 
              ?>

              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"> <?=$chamado_dados[1]; ?> </h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $chamado_dados[2]; ?></h6>
                  <p class="card-text"><?= $chamado_dados[3]; ?></p>
                </div>
              </div>
            
            <? } ?>

              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>

</html>