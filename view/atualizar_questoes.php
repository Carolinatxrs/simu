<?php
	require"../bd/VerefAdSession.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Atualizar Questões</title>
        <link rel="shortcut icon" href="../templates/images/fav/fav.ico" type="image/x-icon">
        <link rel="stylesheet" href="../templates/menu/css/bootstrap.min.css" media="screen" >
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="../templates/menu/css/animate-css/animate.min.css" media="screen" >
		<link rel="stylesheet" href="../templates/menu/css/lobipanel/lobipanel.min.css" media="screen" >
		<link rel="stylesheet" href="../templates/menu/css/prism/prism.css" media="screen" >
		<link rel="stylesheet" href="../templates/menu/css/select2/select2.min.css" >
		<link rel="stylesheet" href="../templates/menu/css/main.css" media="screen" >
		<script src="../templates/menu/js/modernizr/modernizr.min.js"></script>
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
										<li>Listar</li>
										<li class="active">Atualizar</li>
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
												<h5>Atualizar Questões</h5>
											</div>
										</div>
										<div class="panel-body">
											<?php 
												require_once ('../bd/Conexao.php');
												$con = new Conexao();

												function decrypt($string, $key){
													return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($string), MCRYPT_MODE_ECB));
												}
												$id_q = $_GET['idq'];
											?>
											<div class="container">
												<div class="row">
													<form class="form-horizontal" action="../action/edi_questao.php?idq=<?php echo $id_q; ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
														<?php 
														$sql_q = "SELECT * FROM questao WHERE id_q = '$id_q'";
														$result_q = mysqli_query($con->conexao(),$sql_q);
														while($sql_q = mysqli_fetch_array($result_q)){
															$exame_q = $sql["exame_q"];
														 ?>
														<div class="form-group">
															<label for="default" class="col-md-2 control-label">Exame</label>
															<div class="col-sm-6">
																<input type="text" class="form-control" value="<?php echo $sql_q['exame_q'];?>" name="exame_q" readonly>
															</div>
														</div>

														<div class="form-group">
															<label for="default" class="col-sm-2 control-label">Área</label>
															<div  class="col-sm-6">
																<input type="text" class="form-control" value="<?php echo $sql_q['area_q'];?>" name="area_q" readonly>
															</div>
														</div>

														<div class="form-group">
															<label for="default" class="col-md-2 control-label">Categoria</label>
															<div class="col-sm-6">
																<input type="text" class="form-control" value="<?php echo $sql_q['cat_q'];?>" name="cat_q" readonly>
															</div>
														</div>

														<div class="form-group">
															<label for="default" class="col-sm-2 control-label">Ano</label>
															<div class="col-sm-6">
																<input type="text" class="form-control" value="<?php echo $sql_q['ano_q'];?>" name="ano_q" readonly>
															</div>
														</div>

														<div class="form-group">
															<label for="latex sr-only" class="col-sm-2 control-label">Questão</label>
															<div class="col-sm-6">
																<textarea class="form-control" cols="10" id="latex" name="perg_q" rows="10" placeholder="Digite a questão" required><?php echo decrypt($sql_q['perg_q'], md5("sfsdf434")); ?></textarea>
															</div>
														</div>
														<?php
														} 
														$sql_op = "SELECT * FROM opcoes WHERE questao_id_q = '$id_q' AND ordem_op = '1'";
														$result_op = mysqli_query($con->conexao(),$sql_op);
														while($sql_op = mysqli_fetch_array($result_op)){
														?>
														<div class="form-group">
															<label for="latex sr-only" class="col-sm-2 control-label">Opção a</label>
															<div class="col-sm-6">
																<textarea class="form-control" cols="10" id="editor2" name="op_op[]" rows="10" placeholder="Digite a opção a" required autofocus><?php echo decrypt($sql_op['op_op'], md5("sfsdf434")); ?></textarea>
															</div>
														</div>
														<?php } 
														$sql_op = "SELECT * FROM opcoes WHERE questao_id_q = '$id_q' AND ordem_op = '2'";
														$result_op = mysqli_query($con->conexao(),$sql_op);
														while($sql_op = mysqli_fetch_array($result_op)){
														?>
														<div class="form-group">
															<label for="latex sr-only" class="col-sm-2 control-label">Opção b</label>
															<div class="col-sm-6">
																<textarea class="form-control" cols="10" id="editor3" name="op_op[]" rows="10" placeholder="Digite a opção b" required autofocus><?php echo decrypt($sql_op['op_op'], md5("sfsdf434")); ?></textarea>
															</div>
														</div>
														<?php } 
														$sql_op = "SELECT * FROM opcoes WHERE questao_id_q = '$id_q' AND ordem_op = '3'";
														$result_op = mysqli_query($con->conexao(),$sql_op);
														while($sql_op = mysqli_fetch_array($result_op)){
														?>
														<div class="form-group">
															<label for="latex sr-only" class="col-sm-2 control-label">Opção c</label>
															<div class="col-sm-6">
																<textarea class="form-control" cols="10" id="editor4" name="op_op[]" rows="10" placeholder="Digite a opção c" required autofocus><?php echo decrypt($sql_op['op_op'], md5("sfsdf434")); ?></textarea>
															</div>
														</div>
														<?php } 
														$sql_op = "SELECT * FROM opcoes WHERE questao_id_q = '$id_q' AND ordem_op = '4'";
														$result_op = mysqli_query($con->conexao(),$sql_op);
														while($sql_op = mysqli_fetch_array($result_op)){
														?>
														<div class="form-group">
															<label for="latex sr-only" class="col-sm-2 control-label">Opção d</label>
															<div class="col-sm-6">
																<textarea class="form-control" cols="10" id="editor5" name="op_op[]" rows="10" placeholder="Digite a opção d" required autofocus><?php echo decrypt($sql_op['op_op'], md5("sfsdf434")); ?></textarea>
															</div>
														</div>
														<?php }
														$sql_op = "SELECT * FROM opcoes WHERE questao_id_q = '$id_q' AND ordem_op = '5'";
														$result_op = mysqli_query($con->conexao(),$sql_op);
														while($sql_op = mysqli_fetch_array($result_op)){
														 ?>
														<div class="form-group">
															<label for="latex sr-only" class="col-sm-2 control-label">Opção e</label>
															<div class="col-sm-6">
																<textarea class="form-control" cols="10" id="editor6" name="op_op[]" rows="10" placeholder="Digite a opção e" required autofocus><?php echo decrypt($sql_op['op_op'], md5("sfsdf434")); ?></textarea>
															</div>
														</div>
														<?php } 
														$sql_res = "SELECT resposta.`opcoes_id_op`, opcoes.`ordem_op` FROM resposta INNER JOIN opcoes on resposta.`opcoes_id_op` = opcoes.`id_op` WHERE resposta.`questao_id_q` = '$id_q'";

														$result_res = mysqli_query($con->conexao(),$sql_res);
														$sql_res = mysqli_fetch_array($result_res);
															$ordem_op = $sql_res["ordem_op"];
															switch($ordem_op){	
																case '1':
																$ordem_op = "Opção a";
																break;
																case '2':
																$ordem_op = "Opção b";
																break;
																case '3':
																$ordem_op = "Opção c";
																break;
																case '4':
																$ordem_op = "Opção d";
																break;
																case '5':
																$ordem_op = "Opção e";
																break;
																default:
																$ordem_op = "Opção a";
															}
														?>
													
														<div class="form-group">
															<label for="default" class="col-md-2 control-label">Resposta correta</label>
															<div class="col-sm-6">
																<input type="text" class="form-control" value="<?php echo $ordem_op;?>" name="res" readonly>
															</div>
														</div>

														<div class="form-group">
															<div class="col-sm-offset-2 col-sm-6">
																<button type="submit" class="btn btn-success btn-lg">Salvar</button>
																<a class="btn btn-warning btn-lg" href="listar_questoes.php" role="button">Cancelar</a>
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