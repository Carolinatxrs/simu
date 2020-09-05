<?php
	require"../bd/VerefAdSession.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Usuários</title>
        <link rel="shortcut icon" href="../templates/images/fav/fav.ico" type="image/x-icon">
        <link rel="stylesheet" href="../templates/menu/css/bootstrap.min.css" media="screen">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../templates/menu/css/animate-css/animate.min.css" media="screen">
		<link rel="stylesheet" href="../templates/menu/css/lobipanel/lobipanel.min.css" media="screen">
		<link rel="stylesheet" href="../templates/menu/css/prism/prism.css" media="screen" >
		<link rel="stylesheet" href="https://code.jquery.com/jquery-3.3.1.js">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs-3.3.7/dt-1.10.18/b-1.5.6/datatables.min.css">
		<link rel="stylesheet" href="../templates/menu/css/select2/select2.min.css">
		<link rel="stylesheet" href="../templates/menu/css/main.css" media="screen">
		<script src="../templates/menu/js/modernizr/modernizr.min.js"></script>
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
									<h2 class="title">Usuários</h2>
								</div>
							</div>
							<div class="row breadcrumb-div">
								<div class="col-md-6">
									<ul class="breadcrumb">
										<li><a href="menu_admin.php"><i class="fa fa-home"></i>Início</a></li>
										<li class="active">Usuários</li>
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
												<h5>Lista de Usuários</h5>
											</div>
										</div>
										<div class="panel-body">
											<?php 
											if(isset($_SESSION['msger'])){
												echo $_SESSION['msger'];
												unset($_SESSION['msger']);
											}
											if(isset($_SESSION['msg'])){
												echo $_SESSION['msg'];
												unset($_SESSION['msg']);
											}
											?>
											<div class="table-responsive">
												<table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
													<thead>
														<tr>
															<th>#</th>
															<th>Nome</th>
															<th>Sobrenome</th>
															<th>Sexo</th>
															<th>Instituto</th>
															<th>Cidade</th>
															<th>UF</th>
															<th>Ação</th>
														</tr>
													</thead>
													<tfoot>
														<tr>
															<th>#</th>
															<th>Nome</th>
															<th>Sobrenome</th>
															<th>Sexo</th>
															<th>Instituto</th>
															<th>Cidade</th>
															<th>UF</th>
															<th>Ação</th>
														</tr>
													</tfoot>
													<tbody>
														<?php 
														require_once ('../bd/Conexao.php');
														$con = new Conexao();
														$cont=0;
														$sql_users = "SELECT * FROM usuario ORDER BY nome_user ASC";

														$result_users = mysqli_query($con->conexao(),$sql_users);
														while($row_users = mysqli_fetch_array($result_users)){
															?>
														<tr>
															<td> <?php echo $cont+=1; ?></td>
															<td> <?php echo $row_users['nome_user']; ?></td>
															<td> <?php echo $row_users['sobrenome_user']; ?></td>
															<td> <?php echo $row_users['sexo_user']; ?></td>
															<td> <?php echo $row_users['instituto_user']; ?></td>
															<td> <?php echo $row_users['cidade_user']; ?></td>
															<td> <?php echo $row_users['uf_user']; ?></td>
															<td>
																<a href="../action/rem_user.php?idu=<?php echo $row_users['cpf_user']; ?>&s=1&p=<?php echo $row_users['senha_user']; ?>" onclick="return confirm('Tem certeza que deseja remover este usuário?')" class="badge badge-danger"><i class="fa fa-trash" title="Remover Usuário"></i></a>
															</td>
														</tr>
														<?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>	<!-- /.col-md-12 -->
							</div>
						</div>
					</div>
				</div>	<!-- /.content-container -->
			</div>
		</div>	<!-- main-wrapper -->
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
		<script src="https://cdn.datatables.net/v/bs-3.3.7/dt-1.10.18/b-1.5.6/datatables.min.js"></script>
		<script>
			$(function($) {
				$('#example').DataTable({
					"language": {
						"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
					}
				});

				$('#example2').DataTable( {
					"scrollY":        "30px",
					"scrollCollapse": true,
					"paging":         false
				} );

				$('#example3').DataTable();
			});
		</script>
		<script src="../templates/menu/js/select2/select2.min.js"></script>
		<script src="../templates/menu/js/main.js"></script>
	</body>
</html>