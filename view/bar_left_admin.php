<div class="left-sidebar bg-black-300 box-shadow">
    <div class="sidebar-content">
        <div class="user-info">
            <?php require_once ('../bd/Conexao.php');
            $con = new Conexao();

            $sql = "SELECT * FROM admin WHERE login_admin = '$_SESSION[login_admin]'";

            $result = mysqli_query($con->conexao(),$sql) or die(mysqli_error());
            while($sql = mysqli_fetch_array($result)){
                $foto_admin = $sql["foto_admin"];
                $loc_admin = $sql["loc_admin"];
                echo "<a href='atualizar_admin.php' title='Atualizar Perfil'><img src='".$loc_admin.$foto_admin."' class='img-circle' width='100px'></a>";
            }
            ?>
            <h6 class="title"><?php echo "$_SESSION[login_admin]"; ?></h6>
            <small class="info">Administrador</small>
        </div>
        <div class="sidebar-nav">
            <ul class="side-nav color-gray">
                <li class="nav-header">
                    <span class="">Menu</span>
                </li>
                <li>
                    <a href="menu_admin.php"><i class="fa fa-home"></i> <span>Início</span> </a>
                </li>
                <li>
                    <a href="novo_admin.php"><i class="fa fa-user-plus"></i> <span>Novo Administrador</span></a>
                </li>
                <li class="has-children">
                    <a href="#"><i class="fa fa-user"></i> <span>Perfil</span> <i class="fa fa-angle-right arrow"></i></a>
                    <ul class="child-nav">
                        <li><a href="atualizar_admin.php"><i class="fa fa-edit"></i> <span>Atualizar Dados</span></a></li>
                        <li><a href="../action/rem_admin.php" onclick="return confirm('Tem certeza que deseja remover sua conta?')"><i class="fa fa-trash"></i> <span>Remover Administrador</span></a></li>
                    </ul>
                </li>
                <li class="">
                    <a href="listar_usuarios.php"><i class="fa fa-users"></i> <span>Usuários</span></a>
                </li>
                <li class="has-children">
                    <a href="#"><i class="fa fa-tasks"></i> <span>Questões</span> <i class="fa fa-angle-right arrow"></i></a>
                    <ul class="child-nav">
                        <li><a href="listar_questoes.php"><i class="fa fa-list-ul"></i> <span>Listar</span></a></li>
                        <li><a href="cadastrar_questoes.php"><i class="fa fa-plus"></i> <span>Cadastrar</span></a></li>
                    </ul>
                </li>
                <li class="has-children">
                    <a href="#"><i class="fa fa-file"></i> <span>Provas</span> <i class="fa fa-angle-right arrow"></i></a>
                    <ul class="child-nav"> 
                        <li><a href="provas.php"><i class="fa fa-list-ul"></i> <span>Listar</span></a></li>
                        <li><a href="cadastrar_provas.php"><i class="fa fa-plus"></i> <span>Cadastrar</span></a></li>
                    </ul>
                </li>
                <li class="">
                    <a href="ranking.php?rk=1"><i class="fa fa-bullhorn"></i> <span>Ranking</span></a>
                </li>
                <li class="">
                    <a href="estatistica_admin.php"><i class="fa fa-info-circle"></i> <span>Estatísticas de Uso</span></a>
                </li>
            </ul>
        </div>
            <!-- /.sidebar-nav -->
    </div>
        <!-- /.sidebar-content -->
</div>