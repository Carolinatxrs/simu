<?php
	require"../bd/VerefAdSession.php";
	include('../bd/DadosGraf.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Estatística</title>
        <link rel="shortcut icon" href="../templates/images/fav/fav.ico" type="image/x-icon">
        <link rel="stylesheet" href="../templates/menu/css/bootstrap.min.css" media="screen" >
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="../templates/menu/css/animate-css/animate.min.css" media="screen" >
		<link rel="stylesheet" href="../templates/menu/css/lobipanel/lobipanel.min.css" media="screen" >
		<link rel="stylesheet" href="../templates/menu/css/prism/prism.css" media="screen" >
		<link rel="stylesheet" href="../templates/menu/css/main.css" media="screen" >
		<link rel="stylesheet" href="https://code.jquery.com/jquery-3.3.1.js">
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
								<div class="col-sm-6">
									<h2 class="title">Estatística de Uso</h2>
								</div>
							</div>
							<div class="row breadcrumb-div">
								<div class="col-md-6">
									<ul class="breadcrumb">
										<li><a href="menu_admin.php"><i class="fa fa-home"></i>Início</a></li>
										<li class="active">Estatística de Uso</li>
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
												<h5>Estatística de Uso do Sistema</h5>
											</div>
										</div>
										<div class="panel-body">
											<div class="container">
												<div class="row">
													<div class="table-responsive">
														<table class="columns">
															<tr>
																<td><div id="Users_chart_div"></div></td>
															</tr>
															<tr>
																<td><div id="Exames_chart_div"></div></td>
															</tr>
															<tr>
																<td><div id="Provas_chart_div"></div></td>
															</tr>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>	<!-- /.col-md-12 -->
							</div>
						</div>
					</div> <!-- main-page -->
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
		<script src="../templates/menu/js/main.js"></script>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
			google.charts.load('current', {'packages':['corechart']});

			google.charts.setOnLoadCallback(drawUsersChart);
			google.charts.setOnLoadCallback(drawExamesChart);
			google.charts.setOnLoadCallback(drawProvasChart);


			function drawUsersChart() {

        	var data = new google.visualization.DataTable();
       		data.addColumn('string', 'Perfil');
       		data.addColumn('number', 'Quantidade');
       		data.addRows([
        	['Estudante', <?php echo $users; ?>],
        	['Administrador', <?php echo $admin; ?>]
        	]);

        	var options = {
        		title:'Tipo de Usuários',
        		titleTextStyle: {fontSize: 18},
        		legend:{textStyle: {fontSize: 15}},
        		width:750,
        		height:500
        	};

        	var chart = new google.visualization.PieChart(document.getElementById('Users_chart_div'));
        	chart.draw(data, options);
        	}

        	 function drawExamesChart() {

        		var data = new google.visualization.DataTable();
        		data.addColumn('string', 'Exame');
        		data.addColumn('number', 'Quantidade');
        		data.addRows([
        			['Enade', <?php echo $enade; ?>],
        			['Poscomp', <?php echo $poscomp; ?>]
        			]);

        		var options = {
        			title:'Quantidade de Questões por Exame',
        			titleTextStyle: {fontSize: 18},
        			legend:{textStyle: {fontSize: 15}},
        			width:750,
        			height:500
        		};

        		var chart = new google.visualization.PieChart(document.getElementById('Exames_chart_div'));
        		chart.draw(data, options);
        	}
        	 function drawProvasChart() {

        		var data = new google.visualization.DataTable();
        		data.addColumn('string', 'Exame');
        		data.addColumn('number', 'Quantidade');
        		data.addRows([
        			['Enade', <?php echo $en; ?>],
        			['Poscomp', <?php echo $pos; ?>]
        			]);

        		var options = {
        			title:'Quantidade de Provas por Exame',
        			titleTextStyle: {fontSize: 18},
        			legend:{textStyle: {fontSize: 15}},
        			width:750,
        			height:500
        		};

        		var chart = new google.visualization.PieChart(document.getElementById('Provas_chart_div'));
        		chart.draw(data, options);
        	}
		</script>
	</body>
</html>