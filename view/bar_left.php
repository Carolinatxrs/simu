<div class="left-sidebar bg-black-300 box-shadow ">
    <div class="sidebar-content">
        <div class="user-info">
            <?php require_once ('../bd/Conexao.php');
            $con = new Conexao();

            $sql = "SELECT * FROM usuario WHERE cpf_user = '$_SESSION[cpf_user]'";

            $result = mysqli_query($con->conexao(),$sql) or die(mysqli_error());
            while($sql = mysqli_fetch_array($result)){
                $foto_user = $sql["foto_user"];
                $loc_user = $sql["loc_user"];
                $nome_user = $sql["nome_user"];
                if ($foto_user == NULL && $loc_user == NULL) {
                    $foto_user = "image-user.png";
                    $loc_user = "../templates/images/";
                }
                echo "<a href='atualizar_user.php' title='Atualizar Perfil'><img src='".$loc_user.$foto_user."' class='img-circle' width='100px'></a>";
            }
            ?>
            <h6 class="title"> <?php echo "$nome_user"; ?></h6>
            <small class="info">Estudante</small> 
        </div>    
        <div class="sidebar-nav">
            <ul class="side-nav color-gray">
                <li class="nav-header">
                    <span class="">Menu</span>
                </li>
                <li>
                    <a href="menu_user.php"><i class="fa fa-home"></i> <span>Início</span> </a>
                </li>
                <li>
                    <a href="sobre.php"><i class="fa fa-question-circle"></i> <span>Sobre</span> </a>
                </li>
                <li class="has-children">
                    <a href="#"><i class="fa fa-user"></i> <span>Perfil</span> <i class="fa fa-angle-right arrow"></i></a>
                    <ul class="child-nav">
                        <li><a href="atualizar_user.php"><i class="fa fa-edit"></i> <span>Atualizar Dados</span></a></li>
                        <li><a href="../action/rem_user.php?s=0" onclick="return confirm('Tem certeza que deseja remover sua conta?')"><i class="fa fa-trash"></i> <span>Remover Conta</span></a></li>
                    </ul>
                </li>
                <li class="has-children">
                    <a href="#"><i class="fa fa-check"></i> <span>Simulados</span> <i class="fa fa-angle-right arrow"></i></a>
                    <ul class="child-nav">
                        <li><a href="padrao_sim.php"><i class="fa fa-list-ul"></i> <span>Padrão</span></a></li>
                        <li><a href="personalizado_sim.php"><i class="fa fa-tasks"></i> <span>Personalizado</span></a></li>
                    </ul>
                </li>
                <li class="has-children">
                    <a href="#"><i class="fa fa-download"></i> <span>Provas</span> <i class="fa fa-angle-right arrow"></i></a>
                    <ul class="child-nav"> 
                        <li><a href="enade_provas.php"><i class="fa fa-angle-right"></i> <span>Enade</span></a></li>
                        <li><a href="poscomp_provas.php"><i class="fa fa-angle-right"></i> <span>Poscomp</span></a></li>
                    </ul>
                </li>
                <li class="">
                    <a href="ranking.php?rk=0"><i class="fa fa-bullhorn"></i> <span>Ranking</span></a>
                </li>
                <li class="">
                    <a href="historico_user"><i class="fa fa-book"></i> <span>Histórico</span></a>
                </li>
            </ul>
        </div>
            <!-- /.sidebar-nav -->
    </div>
        <!-- /.sidebar-content -->
</div>