<?php
	require_once ('../bd/Conexao.php');
	session_start();
		$cpf_user =  $_SESSION["cpf_user"];
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>login</title>
		<link rel="shortcut icon" href="../templates/images/fav/fav.ico" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="../templates/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../templates/css/main2.css"><!--formata a tabela-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
		<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	</head>
	<body>
		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100">
				<form class="form-signin" method="post" action="../action/edi_senha.php" name="formlogin" autocomplete="off">
					<div class="login100-form-title" style="background-image: url(../templates/images/bg-01.jpg);">
						<span class="login100-form-title-1">
							Redefinir Nova Senha
						</span>
					</div>
					<?php 
						if(isset($_SESSION['msger'])){
							echo $_SESSION['msger'];
							unset($_SESSION['msger']);
						}
					?>
					<div class="corpo">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="label-input100">CPF do Usuário</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fa fa-id-badge" aria-hidden="true"></i></span>
									</div>
									<input type="text" name="cpf_user" class="form-control" value="<?php echo $cpf_user; ?>" readonly>
								</div>
								<div class="help-block with-errors text-danger"></div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="label-input100">Nova Senha</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
									</div>
									<input type="password" name="senha_user" maxlength="6" class="form-control" pattern=".{6,}" title="preencha os 6 caracteres." placeholder="Digite sua nova senha" required="">
								</div>
								<div class="help-block with-errors text-danger"></div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="label-input100">Confirmar Senha</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
									</div>
									<input type="password" name="conf_senha_user" maxlength="6" class="form-control" pattern=".{6,}" title="preencha os 6 caracteres." required="">
								</div>
								<div class="help-block with-errors text-danger"></div>
							</div>
						</div>
					</div>
					<div class="container-login100-form-btn">
						<button class="btn btn-lg btn-success btn-block btn-signin" type="submit">
							Enviar
						</button>
					</div>
					<p class="message1">
						<i class="fa fa-arrow-left t fa-fw"></i> Retornar ao login? <a href="../index.php">Voltar</a><br>
					</p>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../templates/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>