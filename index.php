<?php 
/**
 * Created by Carolina Teixeira
 */
      session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login - Usuários</title>
            <link rel="shortcut icon" href="templates/images/fav/fav.ico" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="templates/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="templates/css/main2.css"><!--formata a tabela-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
		<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
		<script type="text/javascript" src="templates/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				var $seuCampoCpf = $("#cpf");
				var $seuCampoCpfadd = $("#cpfadd");
				$seuCampoCpf.mask('000.000.000-00', {reverse: true});
				$seuCampoCpfadd.mask('000.000.000-00', {reverse: true});
			});
		</script>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
                  <a class="navbar-brand" href="index.php">SEEP | Comp<br>
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
                                          <a class="dropdown-item" href="index.php">Estudante</a>
                                          <a class="dropdown-item" href="view/login_admin.php">Administrador</a>
                                    </div>
                              </li>
                        </ul>
                  </div>
            </nav>
            <div class="container-login100">
                  <div class="wrap-login100">
                        <form class="register-form" action="action/cad_usuario.php" method="post" autocomplete="off">
                              <div class="login100-form-title" style="background-image: url(templates/images/bg-01.jpg);">
                                    <span class="login100-form-title-1">
                                          Cadastro de usuário
                                    </span>
                              </div>
                              <div class="corpo">
                                    <div class="row">
                                          <div class="col-md-12">
                                                <div class="form-group">
                                                      <label class="label-input100">Nome</label>
                                                      <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                  <span class="input-group-text"><i class="fa fa-user-plus" aria-hidden="true"></i></span>
                                                            </div>
                                                            <input type="text" name="nome_user" class="form-control" pattern=".{3,}" title="3 ou mais caracteres." required="">
                                                      </div>
                                                      <div class="help-block with-errors text-danger"></div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="row">
                                          <div class="col-md-12">
                                                <div class="form-group">
                                                      <label class="label-input100">Sobrenome</label>
                                                      <div class="input-group">
                                                            <input type="text"  name="sobrenome_user" maxlength="50" class="form-control" pattern=".{2,}" title="2 ou mais caracteres." required="">
                                                      </div>
                                                      <div class="help-block with-errors text-danger"></div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="row">
                                          <div class="col-md-8">
                                                <div class="form-group">
                                                      <label class="label-input100">Data de Nascimento</label>
                                                      <div class="input-group">
                                                            <input type="date" name="dt_nasc_user" class="form-control" required="">
                                                      </div>
                                                </div>
                                          </div>
                                          <div class="col-md-4">
      						      <div class="form-group">
      							     <label class="label-input100">Sexo</label>
      							     <div class="input-group">
      							           <select class="form-control" name="sexo_user" id="sexo">
                                                                  <option value="F">F</option>
                                                                  <option value="M">M</option>
                                                            </select>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="row">
                                          <div class="col-md-12">
                                                <div class="form-group">
                                                      <label class="label-input100">Instituição</label>
                                                      <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                  <span class="input-group-text"><i class="fa fa-university" aria-hidden="true"></i></span>
                                                            </div>
                                                            <input type="text" name="inst_user" maxlength="10" class="form-control" placeholder="Digite a sigla da Instituição" required="">
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="row">
                                          <div class="col-md-9">
                                                <div class="form-group">
                                                      <label class="label-input100">Cidade</label>
                                                      <div class="input-group">
                                                            <input type="text" name="city_user" maxlength="50" class="form-control" required="">
                                                      </div>
                                                </div>
                                          </div>
                                          <div class="col-md-3">
                                                <div class="form-group">
                                                      <label class="label-input100">UF</label>
                                                      <div class="input-group">
                                                            <input type="text" name="uf_user" maxlength="2" class="form-control" required="">
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="row">
                                          <div class="col-md-12">
                                                <div class="form-group">
                                                      <label class="label-input100">CPF</label>
                                                      <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                  <span class="input-group-text"><i class="fa fa-id-badge" aria-hidden="true"></i></span>
                                                            </div>
                                                            <input type="text" name="cpf_user" class="form-control" pattern=".{14,}" title="preencha os 11 caracteres." id="cpfadd" required="">
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
                                                            <input type="password" name="senha_user" maxlength="6" class="form-control" pattern=".{6,}" title="preencha os 6 caracteres." placeholder="Digite apenas 6 caracteres" required="">
                                                      </div>
                                                      <div class="help-block with-errors text-danger"></div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="container-login100-form-btn">
                                          <button class="btn btn-lg btn-success btn-block btn-signin" type="submit">Cadastrar</button>
                                    </div>
                                    <p class="message1">
                                          <p class="message">
                                                <i class="fa fa-arrow-left t fa-fw"></i> Já é Cadastrado? <a href="#">Voltar</a><br>
                                          </p>
                                    </p>
      				</div>
      			</form> 

      			<!-- fim do form -->
      			
      			<form class="form-signin" method="post" action="bd/ValLogin.php" name="formlogin" autocomplete="off">
      				<div class="login100-form-title" style="background-image: url(templates/images/bg-01.jpg);">
      					<span class="login100-form-title-1">
      						Login
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
                                                      <label class="label-input100">Senha</label>
                                                      <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                  <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                                            </div>
                                                            <input type="password" name="senha_user" maxlength="6" class="form-control" pattern=".{6,}" title="preencha os 6 caracteres." placeholder="Digite sua senha" required="">
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
      					<p class="message1">
      						<i class="fa fa-unlock fa-fw"></i> Esqueceu a senha? <a href="view/redefinir_senha.php">Redefinir</a><br>
      					</p>
      					<p class="message">
      						<i class="fa fa-user-plus fa-fw"></i> Ainda não é Cadastrado? <a href="#">Cadastre-se</a>
      					</p>
      				</div>
      			</form>
      		</div>
      	</div>
            <script type="text/javascript" src="templates/bootstrap/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="templates/js/login.js"></script>
	</body>
</html>