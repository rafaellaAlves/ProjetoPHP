<header>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <script src="../js/jquery-3.3.1.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../css/menus.css" type="text/css">
    <?php
    require '../../resources/config/Conexao.php';

    function categoryTree($parent_id = 0, $sub_mask = '') {
        global $con;
        $sql = "SELECT * FROM AMBIENTE WHERE AMB_PAI_ID = $parent_id ORDER BY AMB_PAI_ID";

        $query = mysqli_query($con, $sql);

        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                echo '             
                        <li>
                            <a href="TelaArvore.php?id=' . $row['AMB_ID'] . '" style="padding: 10px;
                            font-size: 0.6em;
                            display: block;" title="Selecione um ambiente">' . $sub_mask . '  <i class="fa fa-chevron-right" style="padding: 4px;"> </i>' . $row['AMB_NOME'] . '</a>
                        </li>
                       ';
                categoryTree($row['AMB_ID'], $sub_mask . '<i class="hidden"  style="margin-left: 20px; "></i>');
            }
        }
    }
    ?>

</header>
<body>
    <nav id="sidebar">
        <div class="sidebar-header">
            <img src="../img/Slogan_ControlAR-semFundo234.png">
        </div>


        <ul class="list-unstyled components">
<!--                    <p>Dummy Heading</p>-->
            <li class="active">
                <?php if ($_SESSION['perfil'] == 1) { ?>
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-plus" aria-hidden="true"></i> Cadastros</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    
                        <li>
                            <a href="TelaUsuarios.php"><i class="fa fa-user-circle"></i> Usuários</a>
                        </li>
                        <li>
                            <a href="TelaAmbientes.php"><i class="fa fa-sitemap"></i> Ambientes</a>
                        </li> 
                        <li>
                            <a href="TelaDispositivos.php"><i class="fa fa-rss"></i> Dispositivos</a>
                        </li>                            
                        <li>
                            <a href="TelaComandos.php"><i class="fa fa-rss"></i> Comandos</a>
                        </li>                             
                        <li>
                            <a href="TelaEquipamentos.php"><i class="fa fa-snowflake-o"></i> Equipamentos</a>
                        </li>                            
                        <li>
                            <a href="TelaMarcas.php"><i class="fa fa-plus"></i> Marcas</a>
                        </li>                            
                        <li>
                            <a href="TelaModelos.php"><i class="fa fa-plus"></i> Modelos</a>
                        </li> 
                    </ul> 
                <?php } ?>
                </li>

                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-cogs" aria-hidden="true"></i> Operações</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        
                        <li>
                            <a href="TelaPainel.php"><i class="fa fa-rss" aria-hidden="true"></i> Painel de Controle</a>
                        </li>
                        <li>
                            <a href="TelaAgenda.php"><i class="fa fa-calendar-o" aria-hidden="true"></i> Agenda de Controle</a>
                        </li>
                        
                    </ul> 
                </li>
                <?php if ($_SESSION['perfil'] == 1) { ?>
                <li>
                    <a href="TelaRegistros.php"  aria-expanded="false" ><i class="fa fa-folder-open" aria-hidden="true"></i> Registros de Atualizações</a>
                </li>
                <?php } ?>
                <li>
                    <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-sitemap" aria-hidden="true"></i> Controle de Ambientes</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu2">
                        <?php
                        echo categoryTree();
                        ?>
                </ul> 
            </li>

        </ul>
    </nav>
</body>