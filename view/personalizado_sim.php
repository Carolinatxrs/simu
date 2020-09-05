<?php
	require"../bd/VerefSession.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Simulado Personalizado</title>
        <link rel="shortcut icon" href="../templates/images/fav/fav.ico" type="image/x-icon">
        <link rel="stylesheet" href="../templates/menu/css/bootstrap.min.css" media="screen" >
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="../templates/menu/css/animate-css/animate.min.css" media="screen" >
		<link rel="stylesheet" href="../templates/menu/css/lobipanel/lobipanel.min.css" media="screen" >
		<link rel="stylesheet" href="../templates/menu/css/prism/prism.css" media="screen" >
		<link rel="stylesheet" href="../templates/menu/css/select2/select2.min.css" >
		<link rel="stylesheet" href="../templates/menu/css/main.css" media="screen" >
		<script src="../templates/menu/js/modernizr/modernizr.min.js"></script>
	</head>
	<body class="top-navbar-fixed">
		<div class="main-wrapper">
			<?php include('bar_top.php');?>
			<div class="content-wrapper">
				<div class="content-container">
					<?php include('bar_left.php');?>  
					<div class="main-page">
						<div class="container-fluid">
							<div class="row page-title-div">
								<div class="col-md-6">
									<h2 class="title">Simulado</h2>
								</div>
							</div>
							<div class="row breadcrumb-div">
								<div class="col-md-6">
									<ul class="breadcrumb">
										<li><a href="menu_user.php"><i class="fa fa-home"></i>Início</a></li>
										<li>Simulados</li>
										<li class="active">Personalizado</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-12">
									<div class="panel">
										<div class="panel-heading">
											<div class="panel-title">
												<h5>Realizar Simulado Personalizado</h5>
											</div>
										</div>
										<div class="panel-body">
											<?php 
												require_once ('../bd/Conexao.php');
												$con = new Conexao();

												if(isset($_SESSION['msger'])){
													echo $_SESSION['msger'];
													unset($_SESSION['msger']);
												}
											?>
											<div class="container">
												<div class="row">
													<form class="form-horizontal" action="../action/run_personalizado.php" method="POST" enctype="multipart/form-data" autocomplete="off">
														<div class="form-group">
															<label for="default" class="col-md-2 control-label">Exame</label>
															<div class="col-sm-6">
																<select id="exame_q" class="form-control" name="exame_q" required autofocus>
																	<option value="">Selecione o exame</option>
																	<option value="Enade">Enade</option>
																	<option value="Poscomp">Poscomp</option>
																</select>
															</div>
														</div>

														<div class="form-group">
															<label for="default" class="col-sm-2 control-label">Categoria</label>
															<div class="col-sm-6">
																<select id="cat_q" class="form-control" name="cat_q" required autofocus>
																	<option value="">Selecione a categoria</option>
																	<option value="Álgebra Linear">Álgebra Linear</option>
																	<option value="Algoritmos e Estrutura de Dados">Algoritmos e Estrutura de Dados</option>
																	<option value="Análise Combinatória">Análise Combinatória</option>
																	<option value="Análise de Algoritmos">Análise de Algoritmos</option>
																	<option value="Arquitetura de Computadores e Sistemas Operacionais">Arquitetura de Computadores e Sistemas Operacionais</option>
																	<option value="Arquitetura Empresarial e da Informação">Arquitetura Empresarial e da Informação</option>
																	<option value="Automação Industrial e Controle de Processos">Automação Industrial e Controle de Processos</option>
																	<option value="Banco de Dados">Banco de Dados</option>
																	<option value="Cálculo Diferencial e Integral">Cálculo Diferencial e Integral</option>
																	<option value="Ciências do Ambiente e Tecnologia dos Materiais">Ciências do Ambiente e Tecnologia dos Materiais</option>
																	<option value="Circuitos e Sistemas Digitais">Circuitos e Sistemas Digitais</option>
																	<option value="Compiladores,  Autômatos  e Linguagens Formais">Compiladores,  Autômatos  e Linguagens Formais</option>
																	<option value="Computação Gráfica e Processamento de Imagem">Computação Gráfica e Processamento de Imagem</option>
																	<option value="Eletricidade Aplicada e Expressão Gráfica">Eletricidade Aplicada e Expressão Gráfica</option>
																	<option value="Engenharia de Software e Interação Homem-Computador">Engenharia de Software e Interação Homem-Computador</option>
																	<option value="Ética, Computador e Sociedade">Ética, Computador e Sociedade</option>
																	<option value="Geometria Analítica">Geometria Analítica</option>
																	<option value="Gerência de Projetos">Gerência de Projetos</option>
																	<option value="Gestão de Conhecimento, Processos e Negócios">Gestão de Conhecimento, Processos e Negócios</option>
																	<option value="Inteligência Artificial">Inteligência Artificial</option>
																	<option value="Linguagens de Programação">Linguagens de Programação</option>
																	<option value="Lógica e Matemática Discreta">Lógica e Matemática Discreta</option>
																	<option value="Organização de Arquivos e Dados">Organização de Arquivos e Dados</option>
																	<option value="Probabilidade e Estatística">Probabilidade e Estatística</option>
																	<option value="Redes de Computadores e Sistemas Distribuídos">Redes de Computadores e Sistemas Distribuídos</option>
																	<option value="Segurança e Auditoria de Sistemas">Segurança e Auditoria de Sistemas</option>
																	<option value="Técnicas de Programação">Técnicas de Programação</option>
																	<option value="Teoria dos Grafos">Teoria dos Grafos</option>
																</select>
															</div>
														</div>

														<div class="form-group">
															<label for="default" class="col-sm-2 control-label">Quantidade</label>
															<div class="col-sm-6">
																<input type="number" id="total" min="1" class="form-control" name="qtd_q" placeholder="Digite a quantidade de questões" required autofocus>
																<span id="spanOculto" class="help-block">Ainda não temos questões de acordo com suas especificações.</span>
															</div>
														</div>

														<div class="form-group">
															<div class="col-sm-offset-2 col-sm-6">
																<button type="submit" class="btn btn-success btn-lg">Enviar</button>
																<button type="reset" class="btn btn-danger btn-lg">Limpar</button>
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Rodapé -->
		<!-- Footer -->
		<?php include('footer.php');?> 
		<!-- Footer -->
		<script src="../templates/menu/js/jquery/jquery-2.2.4.min.js"></script>
		<script src="../templates/menu/js/bootstrap/bootstrap.min.js"></script>
		<script src="../templates/menu/js/pace/pace.min.js"></script>
		<script src="../templates/menu/js/lobipanel/lobipanel.min.js"></script>
		<script src="../templates/menu/js/iscroll/iscroll.js"></script>
		<script src="../templates/menu/js/prism/prism.js"></script>
		<script src="../templates/menu/js/select2/select2.min.js"></script>
		<script src="../templates/menu/js/main.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#spanOculto').hide();
				$(":input").blur(function() {
					var exame_q = $('#exame_q').val();
					var cat_q = $('#cat_q').val();
					
					$.ajax({
						url:'../bd/Ajax.php',
						method: 'GET',
						dataType: 'html',
						data: {
							'exame_q':  exame_q,
							'cat_q': cat_q,
						},
						success: function(result){
							var x = document.getElementById("total").max = JSON.parse(result);

							if(x < 1){
								$('#spanOculto').show();
							}else{
								$('#spanOculto').hide();
							}
						}
					});
				});
			});
		</script>
	</body>
</html>