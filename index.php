<?php
session_start();
require_once ("classes/DAO/usuarioDAO.php");

$usuarioDAO = new usuarioDAO();

if (isset($_POST['btnSubmit'])) {

    if ($usuarioDAO->login($_POST['txtEmail'], $_POST['txtPassword'])) {

        $_SESSION['logado'] = '1';
		$_SESSION['nome'] = $usuarioDAO->RetornaNome($_POST['txtEmail']);
	  
	  header ("Location: painel.php");
    } else {
        ?>
        <script type="text/javascript">
            alert("Usuário ou senha inválido.");
        </script>
        <?php
    }
}

if (isset($_GET['erro'])) {
    switch ($_GET['erro']) {
        case "1":
            ?>
            <script type="text/javascript">
                alert("Você não tem permissão para acessar o painel.");
            </script>
            <?php
            break;
        case "2":
            ?>
            <script type="text/javascript">
                alert("Você saiu do painel.");
            </script>
            <?php
            break;
    }
}

if ($_SESSION['logado'] == 1) {
   header ("Location: painel.php");
}
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
	  <li class="nav-item">
		<a class="nav-link" href="cadastro.php">Cadastre-se</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" href="exampleModal" data-toggle="modal" data-target="#exampleModal">Login</a>
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
	<!-- MODAL LOGIN-->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <!-- FORMULARIO MODAL LOGIN -->
	    <form  method="post" name="frmLogin">
		  <div class="form-group">
			<label for="exampleInputEmail1">Email</label>
			<input type="email" name="txtEmail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="@email.com" autocomplete="off">
		  </div>
		  <div class="form-group">
			<label for="exampleInputPassword1">Senha</label>
			<input type="password" name="txtPassword" class="form-control" id="exampleInputPassword1" placeholder="********" autocomplete="off">
		  </div>
		  <div class="form-group form-check">
			<input type="checkbox" class="form-check-input" id="exampleCheck1">
			<label class="form-check-label" for="exampleCheck1">Check me out</label>
		  </div>
		  <button type="submit" name="btnSubmit"  class="btn btn-primary">Enviar</button>
		  <a href="cadastro.php">Cadastrar-se</a> |  <a href="recuperarSenha.php">Recuperar Senha</a>
		</form>
		<!-- FIM FORM -->
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