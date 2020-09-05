<?php 
      session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login - Admin</title>
    <link rel="shortcut icon" href="../templates/images/fav/fav.ico" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="../templates/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../templates/css/main2.css"><!--formata a tabela-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
        <a class="navbar-brand" href="login_admin.php">SEEP | Comp<br>
          <div class="titulo">
            Sistema de Exames do Enade e Poscomp
          </div>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-md-end" id="navbarsExample10">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Selecionar Seção
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="../index.php">Estudante</a>
                <a class="dropdown-item" href="login_admin.php">Administrador</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <div class="container-login100">
      	<div class="wrap-login100">
      		<form class="form-signin" method="post" action="../bd/ValAdLogin.php" name="formlogin" autocomplete="off">
      			<div class="login100-form-title" style="background-image: url(../templates/images/bg-01.jpg);">
      				<span class="login100-form-title-1">
      					Administração
      				</span>
      			</div>
            <?php 
              if(isset($_SESSION['msgc'])){
                echo $_SESSION['msgc'];
                unset($_SESSION['msgc']);
              }
              if(isset($_SESSION['msge'])){
                echo $_SESSION['msge'];
                unset($_SESSION['msge']);
              }
            ?>
      			<div class="corpo">
      				<div class="row">
      					<div class="col-md-12">
      						<div class="form-group">
      							<label class="label-input100">Login</label>
      							<div class="input-group">
      								<div class="input-group-prepend">
      									<span class="input-group-text"><i class="fa fa-id-badge" aria-hidden="true"></i></span>
      								</div>
      								<input type="text" name="login_admin" maxlength="11" class="form-control" placeholder="Digite seu login" required="">
      							</div>
      							<div class="help-block with-errors text-danger"></div>
      						</div>
      					</div>
      				</div>
      				<div class="row">
      					<div class="col-md-12">
      						<div class="form-group">
      							<label class="label-input100">Senha</label>
      							<div class="input-group">
      								<div class="input-group-prepend">
      									<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
      								</div>
      								<input type="password" name="senha_admin" maxlength="6" class="form-control" pattern=".{6,}" title="preencha os 6 caracteres." placeholder="Digite sua senha" required="">
      							</div>
      							<div class="help-block with-errors text-danger"></div>
      						</div>
      					</div>
      				</div>
      				<div class="container-login100-form-btn">
      					<button class="btn btn-lg btn-success btn-block btn-signin" type="submit">
      						Entrar
      					</button>
      				</div>
      			</div>
      		</form>
      	</div>
      </div>
      <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
      <script type="text/javascript" src="../templates/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>