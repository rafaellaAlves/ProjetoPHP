<header>
    <?php
    include '../../resources/link/LinkTelas.php';

    $id = $_GET['id'];
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
                <h4><i class="fa fa-folder-open"></i> Registros e Atualizações</h4>
                <?php
                date_default_timezone_set('America/Sao_Paulo');
                $hora = date('Y-m-d H:i:s');

                $sql = "SELECT LOG_HORA, LOG_MSG FROM LOGS WHERE USU_ID_ALT = $id ORDER BY LOG_HORA DESC";

                $res = mysqli_query($con, $sql);

                while ($resultado = mysqli_fetch_assoc($res)) {
                    $horadata = $resultado['LOG_HORA'];
                    $mensagemlog = $resultado['LOG_MSG'];
                    if ($resultado > 0) {
                        ?>
                        <div class="alert alert-info" role="alert">
                        <?php echo $horadata; ?>: <?php echo $mensagemlog; ?>
                        </div>
    <?php
                }elseif($resultado == 0){
                    echo 'ALALALAL';
                }
                }?>
                <div class="form-group-button col-12" style="text-align: right;">
                    <a href="TelaRegistros.php"  class="btn btn-info"><i class="fa fa-reply" aria-hidden="true"></i> Voltar</a>
                    </div>
                    </div>
                    <div class = "line"></div>
                    <div class = "jumbotron">

                        <p>Voceê está na página de registros do ControlAR!</p>
                        <p>Aqui é possível visualizar as últimas atualizações de atividades realizadas no sistema pelo usuário que você selecionou. Caso deseje escolher outro usuário selecione o botão 'Voltar'.</p>
                    </div>
                </div>
            </div>
        </body>
        <?php
        include './Footer.php';
        ?>

