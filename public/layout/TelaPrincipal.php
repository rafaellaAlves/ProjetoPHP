<header>
    <?php
    include '../../resources/link/LinkTelas.php';
    ?>
    <link rel="stylesheet" href="../css/principal.css" type="text/css"/>
    <title>ControlAR-Página Principal</title>
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
                <h4><i class="fa fa-repeat"></i> Últimas Atualizações</h4>
                <?php
                $id = $_SESSION['id'];
                date_default_timezone_set('America/Sao_Paulo');
                $hora = date('Y-m-d H:i:s');

                $sql = "SELECT LOG_HORA, LOG_MSG FROM LOGS WHERE USU_ID_ALT = $id ORDER BY LOG_HORA DESC LIMIT 7";

                $res = mysqli_query($con, $sql);

                while ($resultado = mysqli_fetch_assoc($res)) {
                    $horadata = $resultado['LOG_HORA'];
                    $mensagemlog = $resultado['LOG_MSG'];
                    if ($res != 1) {
                        ?>
                        <div class="alert alert-info" role="alert">
                            <p>Suas atividades realizadas no sistema aparecerão nesta area.</p>
                        </div>
                    <?php } else {
                        ?>

                        <div class="alert alert-info" role="alert">
        <?php echo $horadata; ?>: <?php echo $mensagemlog; ?>
                        </div>

                        <?php
                    }
                }
                ?>

            </div>
            <div class = "line"></div>
            <div class = "jumbotron">
                <h5 class = "display-10">Bem-Vindo, <?php echo $_SESSION['nome'];
                ?></h5><br>
                <p>Bem-vindo a Página Inicial do ControlAR!</p>
                <p>Aqui é possível visualizar as últimas atualizações de atividades realizadas no sistema pelo usuário logado. Para mais informações e detalhes, acesse o menu principal na opção 'Registros e Atualizações'. </p>
            </div>
        </div>
    </div>
</body>
<?php
        include './Footer.php';
        ?>