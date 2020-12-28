<header>
    <?php
    include '../../resources/link/LinkFormulario.php';
    $id = $_GET["id"];
    $sql = "SELECT AMB_NOME, AMB_ACEITAEQPS FROM AMBIENTE WHERE AMB_ID = $id";

    $res = mysqli_query($con, $sql);

    if ($resultado = mysqli_fetch_assoc($res)) {
        $nome = $resultado["AMB_NOME"];
        $ambaceita = $resultado["AMB_ACEITAEQPS"];
    }
    ?>
    <link rel="stylesheet" href="../css/arvore.css" type="text/css">
    <title>ControlAR-Ação por Ambientes</title>

</header> 
<body>
    <div class="wrapper">
        <?php
        include './MenuLateral.php';
        ?>
        <div class="content">
            <?php
            include './MenuHeader.php';
            ?>
            <div class="content" id="content-index">
                <h4><i class="fa fa-sitemap"></i> Ações por Ambiente</h4><br><br>

                <div class="form-row">
                    <div class="form-group col-md-12" style="text-align: center;">

                        <div class="form-group-button col-12">
                            <?php if ($ambaceita == 1) { ?>
                                <?php if ($_SESSION['perfil'] == 1) { ?>
                            <label >Selecione a ação que deseja realizar no ambiente '<?php echo $nome ?>':</label><br>
                            <a href="IncluirEquipamento.php?id='<?php echo $id; ?>'"  class="btn btn-light"><i class="fa fa-plus" aria-hidden="true"></i> Cadastrar Equipamento</a>
                            <a href="IncluirDispositivo.php?id='<?php echo $id; ?>'"  class="btn btn-light"><i class="fa fa-plus" aria-hidden="true"></i> Cadastrar Dispositivo</a>
                            <a href="TelaPainelAmbiente.php?id='<?php echo $id; ?>'"  class="btn btn-light"><i class="fa fa-cogs" aria-hidden="true"></i> Operar por Ambiente</a>
                            <a href="TelaPainelEquipamento.php?id='<?php echo $id; ?>'"  class="btn btn-light"><i class="fa fa-cogs" aria-hidden="true"></i> Operar Equipamentos</a>
                            <a href="AlterarAmbiente.php?id='<?php echo $id; ?>'"  class="btn btn-light"><i class="fa fa-pencil" aria-hidden="true"></i> Alterar Ambiente</a>
                                <?php } else { ?>
                                    <label >Selecione a ação que deseja realizar no ambiente '<?php echo $nome ?>':</label><br>
                                    <a href="TelaPainelAmbiente.php?id='<?php echo $id; ?>'"  class="btn btn-light"><i class="fa fa-cogs" aria-hidden="true"></i> Operar por Ambiente</a>
                                    <a href="TelaPainelEquipamento.php?id='<?php echo $id; ?>'"  class="btn btn-light"><i class="fa fa-cogs" aria-hidden="true"></i> Operar Equipamentos</a>
                                <?php } ?>
                            <?php } elseif ($ambaceita == 0) { ?>
                                <?php if ($_SESSION['perfil'] == 1) { ?>     
                                    <label >Selecione a ação que deseja realizar no ambiente '<?php echo $nome ?>':</label><br>
                                    <a href="IncluirAmbiente.php?id='<?php echo $id; ?>'"  class="btn btn-light"><i class="fa fa-plus" aria-hidden="true"></i> Cadastrar Ambiente</a>
                                    <a href="AlterarAmbiente.php?id='<?php echo $id; ?>'"  class="btn btn-light"><i class="fa fa-pencil" aria-hidden="true"></i> Alterar Ambiente</a>
                                <?php } else { ?>
                                    
                                    <div class="alert alert-info" role="alert">
                                        <?php echo "Este usuário não tem permissão para realizar ações no ambiente selecionado!"; ?>
                                    </div>
                                <?php } ?>
                                <?php } ?>
                            </div>

                        </div>
                    </div>
                </div>
                <br>
                </form>
                <div class="line"></div>
                <div class="jumbotron">                    
                    <p>Você está na Página de Ações por Ambiente do ControlAR!</p>
                    <p>Para realizar uma ação sob o ambiente selecionado, basta escolher uma das ações acima referentes ao ambiente que você selecionou. Em seguida você irá ser redirecionado para a página desejada.</p>                    
                </div>
            </div>
        </div>
    </div>
    <?php include '../../resources/link/LinkTabela.php'; ?>

    </body>
    <?php
    include './Footer.php';
    ?>