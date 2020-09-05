<?php  	
/**
 * Created by Carolina Teixeira
 */
	require_once ('Conexao.php');
	$con = new Conexao();
	$sql = "SELECT * from usuario";
	$resultado = mysqli_query($con->conexao(),$sql);
	$users = $resultado->num_rows;

	$sql1 = "SELECT * from admin";
	$resultado1 = mysqli_query($con->conexao(),$sql1);
	$admin = $resultado1->num_rows;

	$sql_ex = "SELECT * FROM questao";
	$result_ex = mysqli_query($con->conexao(),$sql_ex);
	$enade = 0;
	$poscomp = 0;
	while($sql_ex = mysqli_fetch_array($result_ex)){
		if ($sql_ex['exame_q'] == "Enade"){
			$enade++;
		} else {
			$poscomp++;
		}
	}

	$sql_pv = "SELECT * FROM prova";
	$result_pv = mysqli_query($con->conexao(),$sql_pv);
	$en = 0;
	$pos = 0;
	while($sql_pv = mysqli_fetch_array($result_pv)){
		if ($sql_pv['exame_p'] == "Enade"){
			$en++;
		} else {
			$pos++;
		}
	}
?>