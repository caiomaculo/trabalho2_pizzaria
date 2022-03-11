<?php
require_once ("classes/DAO/usuarioDAO.php");
require_once("classes/Entidade/usuario.php");

require_once ("classes/DAO/senhaDAO.php");
require_once("classes/Entidade/senha.php");


$usuarioDAO = new usuarioDAO();
$senhaDAO = new senhaDAO();

$usuario = new usuario();
$senha = new senha();

?>
<!doctype html>
<html lang="pt-br">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

 <link rel="stylesheet" href="css/style.css">

 <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico">
     <!-- FONTE -->
 <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
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
		<a class="nav-link" href="index.php" data-toggle="modal" data-target="#exampleModal">Login</a>
	  </li>
	 </ul>
	</div>

	<!-- FORMULARIO -->
 <div id=formcad>
	<form method="post" name="frmCadastro ">
	  <div class="form-group">
	  	<label for="exampleInputName1">Nome</label>
	    <input type="name" name="txtNome" class="form-control col-md-8" id="exampleInputName1" aria-describedby="NameHelp" placeholder="Nome" autocomplete="off">
	  </div>
      <div class="form-group">
	    <label for="exampleInputEmail1">Email</label>
	    <input type="email" name="txtEmail" class="form-control col-md-8" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="exemplo@email.com" autocomplete="off">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Senha</label>
	    <input type="password" onKeyUp="validarSenha('txtPass', 'txtPassAccept', 'resultadoCadastro');" name="txtPass" id="txtPass" class="form-control col-md-5"  placeholder="********" autocomplete="off">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword2">Confirmar senha</label>
	    <input type="password" class="form-control col-md-5" onKeyUp="validarSenha('txtPass', 'txtPassAccept', 'resultadoCadastro');" id="txtPassAccept" name="txtPassAccept" placeholder="********" autocomplete="off">
	  </div>
	  <div class="form-group">
	  	<label for="exampleInputSexo1">Sexo</label>
	  	<select name="slSexo" class="form-control col-md-2">
        <option value="m">Masculino</option>
        <option value="f">Feminino</option>
        </select>
	  </div>	  
	  <div class="form-group form-check">
	    <input type="checkbox" class="form-check-input" id="exampleCheck1">
	    <label class="form-check-label" for="exampleCheck1">Check me out</label>
	  </div>
	  <p id="resultadoCadastro" style="font-weight: bold;">&nbsp;</p>
	  <button type="submit" name="btnSubmit" value="Cadastrar" class="btn btn-primary">Enviar</button><a href="index.php">Voltar</a>
    </form>
   </div>
    <!--  FIM FORM   --> 


</body>
</html>
<?php
if (isset($_POST['btnSubmit'])) {
    $usuario->setUs_nome($_POST['txtNome']);
    $usuario->setUs_email($_POST['txtEmail']);
    $usuario->setUs_sexo($_POST['slSexo']);

    if (!$usuarioDAO->consultarEmail($_POST['txtEmail'])) {

        if ($usuarioDAO->cadastrar($usuario)) {

            $codigoUsuario = $usuarioDAO->consultarCodUsuario($_POST['txtEmail']);

            $senha->setSe_senha($_POST['txtPassAccept']);
            $senha->setUs_cod($codigoUsuario);

            if ($senhaDAO->cadastrar($senha)) {
                ?>
                <script type = "text/javascript">
                    document.getElementById("resultadoCadastro").innerHTML = "Cadastrado com sucesso.";
                    document.getElementById("resultadoCadastro").style.color = "green";</script>
                <?php
            } else {
                ?>
                <script type="text/javascript">
                    document.getElementById("resultadoCadastro").innerHTML = "Erro ao cadastrar.";
                    document.getElementById("resultadoCadastro").style.color = "white";</script>
                <?php
            }
        }
    } else {
        ?>
        <script type="text/javascript">
            document.getElementById("resultadoCadastro").innerHTML = "O E-mail informado já esta cadastrado.";
            document.getElementById("resultadoCadastro").style.color = "white";</script>
        <?php
    }
}
?>