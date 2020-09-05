<?php
/**
 * Created by Carolina Teixeira
 */
	class Conexao{

		private $host = 'localhost';

		private $user = 'root';

		private $password = '';

		private $database = 'simu';

		public function conexao() {

			$con = mysqli_connect($this->host,$this->user,$this->password) or die("Erro ao conectar ao servidor: ".mysqli_error());
			mysqli_select_db($con,$this->database) or die("Erro ao selecionar base de dados: ".mysqli_error());
			mysqli_set_charset($con,"utf8");

			return $con;

		}
	}
?>