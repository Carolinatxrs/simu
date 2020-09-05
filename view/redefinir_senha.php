<?php 
      session_start();
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
		<script type="text/javascript" src="../templates/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				var $seuCampoCpf = $("#cpf");

				$seuCampoCpf.mask('000.000.000-00', {reverse: true});
			});
		</script>
	</head>
	<body>
		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100">
				<form class="form-signin" method="post" action="../action/bus_red_senha.php" name="formlogin" autocomplete="off">
					<div class="login100-form-title" style="background-image: url(../templates/images/bg-01.jpg);">
						<span class="login100-form-title-1">
							Redefinir Senha
						</span>
					</div>
					<?php 
						if(isset($_SESSION['msge'])){
							echo $_SESSION['msge'];
							unset($_SESSION['msge']);
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
									<input type="text" name="cpf_user" class="form-control" pattern=".{14,}" title="preencha os 11 caracteres." placeholder="Digite seu CPF" id="cpf" required="">
								</div>
								<div class="help-block with-errors text-danger"></div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="label-input100">Data de Nascimento</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
									</div>
									<input type="date" name="dt_nasc_user" class="form-control" required="">
								</div>
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