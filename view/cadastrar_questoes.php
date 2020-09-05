<?php
	require"../bd/VerefAdSession.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cadastrar Questões</title>
        <link rel="shortcut icon" href="../templates/images/fav/fav.ico" type="image/x-icon">
        <link rel="stylesheet" href="../templates/menu/css/bootstrap.min.css" media="screen" >
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="../templates/menu/css/animate-css/animate.min.css" media="screen" >
		<link rel="stylesheet" href="../templates/menu/css/lobipanel/lobipanel.min.css" media="screen" >
		<link rel="stylesheet" href="../templates/menu/css/prism/prism.css" media="screen" >
		<link rel="stylesheet" href="../templates/menu/css/select2/select2.min.css" >
		<link rel="stylesheet" href="../templates/menu/css/main.css" media="screen" >
		<script src="../templates/menu/js/modernizr/modernizr.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script><!--especifico para input oculto -->
		<script src="../templates/js/ocultar.js"></script>
		<script type="text/javascript" src="../templates/ckeditor/ckeditor.js"></script>
	</head>
	<body class="top-navbar-fixed">
		<div class="main-wrapper">
			<?php include('bar_top_admin.php');?>
			<div class="content-wrapper">
				<div class="content-container">
					<?php include('bar_left_admin.php');?>  
					<div class="main-page">
						<div class="container-fluid">
							<div class="row page-title-div">
								<div class="col-md-6">
									<h2 class="title">Questões</h2>
								</div>
							</div>
							<div class="row breadcrumb-div">
								<div class="col-md-6">
									<ul class="breadcrumb">
										<li><a href="menu_admin.php"><i class="fa fa-home"></i>Início</a></li>
										<li>Questões</li>
										<li class="active">Cadastrar</li>
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
												<h5>Cadastrar Questões</h5>
											</div>
										</div>
										<div class="panel-body">
											<?php 
												require_once ('../bd/Conexao.php');
												$con = new Conexao();

												if(isset($_SESSION['msg'])){
													echo $_SESSION['msg'];
													unset($_SESSION['msg']);
												}
											?>
											<div class="container">
												<div class="row">
													<form class="form-horizontal" action="../action/cad_questao.php" method="POST" enctype="multipart/form-data" autocomplete="off">
														<div class="form-group">
															<label for="default" class="col-md-2 control-label">Exame</label>
															<div class="col-sm-6">
																<select id='exame' onchange="escolha()" class="form-control" name="exame_q" required autofocus>
																	<option value="">Selecione o exame</option>
																	<option value="Enade">Enade</option>
																	<option value="Poscomp">Poscomp</option>
																</select>
															</div>
														</div>

														<div class="form-group">
															<label for="default" class="col-sm-2 control-label">Área</label>
															<div  class="col-sm-6">
																<select id='area' disabled="true" class="form-control" name="area_q">
																	<option value="">Selecione uma área</option>
																</select>
															</div>
														</div>

														<div class="form-group">
															<label for="default" class="col-md-2 control-label">Categoria</label>
															<div class="col-sm-6">
																<select class="form-control" name="cat_q" required autofocus>
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
															<label for="default" class="col-sm-2 control-label">Ano</label>
															<div class="col-sm-6">
																<input type="text" class="form-control" name="ano_q" maxlength="4" pattern=".{4,}" title="preencha os 4 caracteres" placeholder="Digite o ano da questão" required autofocus>
															</div>
															<div class="help-block with-errors text-danger"></div>
														</div>

														<div class="form-group">
															<label for="latex sr-only" class="col-sm-2 control-label">Questão</label>
															<div class="col-sm-6">
																<textarea class="form-control" cols="10" id="latex" name="perg_q" rows="10" placeholder="Digite a questão" required></textarea>
															</div>
														</div>

														<div class="form-group">
															<label for="latex sr-only" class="col-sm-2 control-label">Opção a</label>
															<div class="col-sm-6">
																<textarea class="form-control" cols="10" id="editor2" name="op_op[]" rows="10" placeholder="Digite a opção a" required autofocus></textarea>
															</div>
														</div>
														<div class="form-group">
															<label for="latex sr-only" class="col-sm-2 control-label">Opção b</label>
															<div class="col-sm-6">
																<textarea class="form-control" cols="10" id="editor3" name="op_op[]" rows="10" placeholder="Digite a opção b" required autofocus></textarea>
															</div>
														</div>
														<div class="form-group">
															<label for="latex sr-only" class="col-sm-2 control-label">Opção c</label>
															<div class="col-sm-6">
																<textarea class="form-control" cols="10" id="editor4" name="op_op[]" rows="10" placeholder="Digite a opção c" required autofocus></textarea>
															</div>
														</div>
														<div class="form-group">
															<label for="latex sr-only" class="col-sm-2 control-label">Opção d</label>
															<div class="col-sm-6">
																<textarea class="form-control" cols="10" id="editor5" name="op_op[]" rows="10" placeholder="Digite a opção d" required autofocus></textarea>
															</div>
														</div>
														<div class="form-group">
															<label for="latex sr-only" class="col-sm-2 control-label">Opção e</label>
															<div class="col-sm-6">
																<textarea class="form-control" cols="10" id="editor6" name="op_op[]" rows="10" placeholder="Digite a opção e" required autofocus></textarea>
															</div>
														</div>

														<div class="form-group">
															<label for="default" class="col-md-2 control-label">Resposta correta</label>
															<div class="col-sm-6">
																<select id="mySelect" class="form-control" name="res" required autofocus>
																	<option value="">Selecione a resposta</option>
																	<option value="a">Opção a</option>
																	<option value="b">Opção b</option>
																	<option value="c">Opção c</option>
																	<option value="d">Opção d</option>
																	<option value="e">Opção e</option>
																</select>
															</div>
														</div>

														<div class="form-group">
															<div class="col-sm-offset-2 col-sm-6">
																<button type="submit" class="btn btn-success btn-lg">Cadastrar</button>
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
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML"></script>
		<script type="text/x-mathjax-config"> MathJax.Hub.Config({ tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]} }); 
		</script>
		<script type="text/javascript">
			var arr_area = {
				Enade: ["Ciência da Computação", "Engenharia de Computação", "Sistemas de Informação"],
				Poscomp: ["Fundamentos da Computação", "Matemática", "Tecnologia da Computação"]
			}

			function escolha() {
				var exame = document.querySelector("#exame");
				var area = document.querySelector("#area");

				area.disabled = false;

				area.innerHTML = "";

				switch (exame.value) {
					case "Enade":
					for (i in arr_area.Enade) {
						area.innerHTML += "<option>" + arr_area.Enade[i] + "</option>"
					};
					break;
					case "Poscomp":
					for (i in arr_area.Poscomp) {
						area.innerHTML += "<option>" + arr_area.Poscomp[i] + "</option>"
					};
					break;
					default:
					area.innerHTML += "<option>- Selecione uma área -</option>";
					area.disabled = true;
				}
			}
		</script>
		<script type="text/javascript">
			window.onload = function()  {
				CKEDITOR.replace( 'latex' );
				CKEDITOR.replace( 'editor2' );
				CKEDITOR.replace( 'editor3' );
				CKEDITOR.replace( 'editor4' );
				CKEDITOR.replace( 'editor5' );
				CKEDITOR.replace( 'editor6' );
				$("form").submit( function(e) { 
					var messageLength = CKEDITOR.instances['latex','editor2','editor3','editor4','editor5','editor6'].getData().replace(/<[^>]*>/gi, '').length; 

					if( !messageLength ) { 
						alert( 'Por favor, preencha todos os campos.' ); 
						e.preventDefault(); 
					} 
				 }); 
			};
		</script>
	</body>
</html>