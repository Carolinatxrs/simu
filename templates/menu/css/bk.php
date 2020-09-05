<?php
												$nq = $_GET['n'];		//posição do array
												$total = $_GET['t'];	//total dequestões
												require_once ('../bd/Conexao.php');
												$con = new Conexao();

												$idq = $_SESSION['idqs']; //recebe o array dos id's
												$cont = 0;
												$cod = $idq[$nq];	// recebe o id da posição nq
												/*realiza a consulta de acordo com o id passado*/
												$sql_q = "SELECT * FROM questao WHERE id_q = '$cod'";
												$resultado_q = mysqli_query($con->conexao(),$sql_q);

												while($rowq=mysqli_fetch_array($resultado_q) ){
														$perg_img_q = $rowq['perg_img_q'];
														$loc_q = $rowq['loc_q'];
														$qid = $rowq['id_q']; //pega o id de cada questao
													$cont = $nq + 1; 
												 	echo "<p class='quest'>Questão".$cont.":</p>";
												 	echo "<p><img src='".$loc_q.$perg_img_q."' class='img-responsive' alt='questão'></p>";
												 }
											?>
											
											<?php echo '<form action="../action/run_padrao_start.php?n='.$nq.'&t='.$total.'" method="POST" class="form-horizontal">'; ?>
											<div class="table-responsive">
												<table class="table" cellspacing="0" width="100%">
													<?php 
														$sql_op = "SELECT * FROM opcoes WHERE questao_id_q = '$qid'";
														$resultado_op = mysqli_query($con->conexao(),$sql_op);
												 	while($row_op=mysqli_fetch_array($resultado_op) ){
														$op_img_op = $row_op['op_img_op'];
														$loc_op = $row_op['loc_op'];
														$opid = $row_op['id_op'];	
													?>
													<!-- <th> produtos </th> <th> Preço </th> -->
													<tr> 
														<td width="50"><?php echo '<input type="radio" name="ans" value="'.$opid.'" required autofocus>'; ?></td> 
														<td width="0"> <?php echo '<img src="'.$loc_op.$op_img_op.'" class="img-responsive">'; ?> </td> 
													</tr>
												<?php } ?>
												</table>
											</div>
											<?php 
													echo'<br><button type="submit" class="btn btn-primary">Enviar</button>
													</form>';
											?>