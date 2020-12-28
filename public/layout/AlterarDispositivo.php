<header>
    <?php
    include '../../resources/link/LinkFormulario.php';

    if ($_GET['id'] == NULL) {
        echo"<script language='javascript' type='text/javascript'>alert('Escolha um registro antes de realizar esta operação!!');window.location.href='TelaDispositivos.php';</script>";
        die();
    } else {
        $id = $_GET["id"];

        $sql = "SELECT C.CDV_NOME, C.AMB_ID, C.CDV_IPV4, C.CDV_IPV6, A.AMB_NOME FROM CONTROL_DEVICE C, AMBIENTE A WHERE C.AMB_ID = A.AMB_ID AND CDV_ID = $id";
        $res = mysqli_query($con, $sql);

        if ($resultado = mysqli_fetch_assoc($res)) {
            $nome = $resultado['CDV_NOME'];
            $ambienteid = $resultado['AMB_ID'];
            $ipv4 = $resultado['CDV_IPV4'];
            $ipv6 = $resultado['CDV_IPV6'];
            $ambientenome = $resultado['AMB_NOME'];
        }
    }
    ?>
    <title>ControlAR-Alteração de Dispositivo</title>

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
                <h4><i class="fa fa-rss"></i> Alterar Dispositivo</h4><br>
                <form action="../../resources/config/Dispositivo.php" method="POST" id="form-dispositivo">
                    <div class="form-row">
                        <input type="hidden" name="id" class="form-control" readonly value="<?php echo $id ?>"/>
                        <div class="form-group col-md-6">
                            <label for="nome">DDispositivo de Controle</label>
                            <input type="text" class="form-control" name="dispositivo" id="dispositivo" placeholder="Nome do Dispositivo" value="<?php echo $nome ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Ambiente do Dispositivo</label><br>
                            <select class="custom-select" name="ambiente">
                                <option value="<?php echo $ambienteid ?>" selected> <?php echo $ambientenome ?></option>
                                <?php
                                $result = "SELECT * FROM AMBIENTE WHERE AMB_ACEITAEQPS = 1";
                                $resultr = mysqli_query($con, $result);
                                while ($row = mysqli_fetch_assoc($resultr)) {
                                    ?>
                                    <option value="<?php echo $row['AMB_ID']; ?>"><?php echo $row['AMB_NOME']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>IPV4</label>
                            <input type="text" class="form-control" name="ipv4" placeholder="..." value="<?php echo $ipv4 ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <?php if ($ipv6 == 1) { ?>
                                <label>IPV6</label>
                                <input type="text" class="form-control" name="ipv6" placeholder="...">
                            <?php } else { ?>
                                <label>IPV6</label>
                                <input type="text" class="form-control" name="ipv6" placeholder="..." value="<?php echo $ipv6 ?>">
                                <?php } ?>
                            </div>
                        </div>
                        <br>
                        <div class="form-group-button col-12">
                            <button type="submit"  name="alterar" value="alterar" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Alterar</button>
                            <button type="reset"  class="btn btn-danger"><i class="fa fa-close" aria-hidden="true"></i> Limpar</button>
                            <a href="TelaEquipamentos.php"  class="btn btn-info"><i class="fa fa-reply" aria-hidden="true"></i> Voltar</a>
                        </div>
                    </form>
                    <div class="line"></div>
                    <div class="jumbotron">                    
                        <p>Você está na Página de Alteração de Dispositivo do ControlAR!</p>
                        <p>Para alterar o dispositivo modifique as infomações a cima que desejar, caso não desejar realizar modificações, para retornar a lista de dispositivos clique na opção <i class="fa fa-reply"></i> Voltar.</p>                    
                    </div>
                </div>
            </div>
        </div>
        <?php include '../../resources/link/LinkValidacao.php'; ?>
        <script type="text/javascript" src="../js/ValidacaoDispositivo.js"></script>
    </body>
    <?php
    include './Footer.php';
    ?>