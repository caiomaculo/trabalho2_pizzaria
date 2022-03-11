<?php
session_start();

if ($_SESSION['logado'] != 1) {
    ?>
    <script type="text/javascript">
        document.location.href = "index.php?erro=1";
    </script>
    <?php
} else {
    ?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <!--ICONE-->
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico">
    <!-- FONTE -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <title>Pizza Delivery - C410</title>
  </head>
  <body>
    <!--MENU -->
    <div id="menu">
     <ul class="nav justify-content-center">
      <img src="images/6034iconepizza.ico" class="nav-item justify-content-left" />
      <li class="nav-item">
        <a class="nav-link active" href="index.php">Home</a>
      </li>
      <li class="nav-item" class="fas fa-user-circle"><a class="nav-link" href="#">Olá, <?=$_SESSION["nome"];?><img src="images/2404img_181369.ico"/></a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="?acao=sair">Sair<img src="images/2428Users-Exit-icon.ico"/></a>
      </li>
     </ul>
    </div>
    <!-- IMAGEM PRINCIPAL -->
    <div id="imgprincipal">
        <img src="images/Principal1.png"/>
    </div>

    <!-- SLIDE -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="images/slide1.png" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="images/slide2.png" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="images/slide3.png" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <!-- SITE ELEMENTOS -->
    <div id="elementos">
    <div class="row">
      <div class="col-sm-6">
        <div class="card">
          <img class="card-img" src="images/mussarela1.png" alt="Card image">
          <div class="card-body">
            <h5 class="card-title">Mussarela</h5>
            <p class="card-text">Tamanhos: Grande● Medio ● Pequeno</p>
            <a href="#" class="btn btn-primary">PEDIR</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card">
          <img class="card-img" src="images/portuguesa1.png" alt="Card image">
          <div class="card-body">
            <h5 class="card-title">Portuguesa</h5>
            <p class="card-text">Tamanhos: Grande● Medio ● Pequeno</p>
            <a href="#" class="btn btn-primary">PEDIR</a>
          </div>
        </div>
      </div>
    </div>
    </div>
      </div>
    </div>
  </div>
</div>
<div class="rodape">
<ul>
<li>    
<img src="images/1936iconepizza.ico"><p>© 2018 Copyright C410NTC LTDA.</p></img>
</li>
</ul>
</div>
    
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>

    <?php
}

if (isset($_GET["acao"])) {

    if ($_GET["acao"] == "sair") {
        $_SESSION['logado'] = 0;
        ?>
        <script type="text/javascript">
            document.location.href = "index.php?erro=2";
        </script>
        <?php
    }
}
?>