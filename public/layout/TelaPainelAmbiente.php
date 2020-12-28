<header>
    <?php 
    include '../../resources/link/LinkFormulario.php';?>
    <title>ControlAR-Painel de Controle - Ambientes</title>
    <?php
    $id = $_GET['id'];
    ?>
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
                <h4><i class="fa fa-rss"></i> Painel de Controle</h4>
                <h6>Ambientes</h6><br>
                <form action="../../resources/config/Painel.php" method="POST" id="form-operar-ambiente">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Selecione o Ambiente:</label><br>
                        <select class="custom-select" name="ambiente" id="ambiente" required>
                            
                                <?php
                                if ($id != null) {
                                    $result1 = "SELECT * FROM AMBIENTE WHERE AMB_ID=$id";
                                    $resultr1 = mysqli_query($con, $result1);
                                    while ($row = mysqli_fetch_assoc($resultr1)) {
                                        ?>

                                        <option selected value="<?php echo $id ?>"><?php echo $row['AMB_NOME']; ?></option>
                                        <?php } ?>
                                        <?php } else{ ?>
                                        <option selected>Selecione..</option>
                                        <?php
                                        $result1 = "SELECT * FROM AMBIENTE WHERE AMB_ACEITAEQPS=1";
                                        $resultr1 = mysqli_query($con, $result1);
                                        while ($row = mysqli_fetch_assoc($resultr1)) {
                                            ?>
                                            <option value="<?php echo $row['AMB_ID']; ?>"><?php echo $row['AMB_NOME']; ?></option>
                                        <?php } ?>
        <?php } ?>


                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Selecione o Comando:</label><br>
                        <select class="custom-select" name="comando">
                            <option selected>Selecione..</option>
                            <?php
                            $result = "SELECT * FROM COMANDO";
$resultr = mysqli_query($con, $result);
while ($row = mysqli_fetch_assoc($resultr)) {
                                ?>
                                <option value="<?php echo $row['EQP_ID']; ?>"><?php echo $row['EQP_NOME']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group-button col-12">
                    <button type="submit" naid="botoes" name="executarAmb" value="executarAmb" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Executar</button>
                    <button type="reset" id="botoes"  class="btn btn-primary"><i class="fa fa-close" aria-hidden="true"></i> Limpar</button>
                    <a id="botoes" href="TelaPainel.php"  class="btn btn-danger"><i class="fa fa-reply" aria-hidden="true"></i> Cancelar</a>
                </div>
                </form>
                <div class="line"></div>
                <div class="jumbotron">                    
                    <p>Você está na Página de Painel de Controle por Ambientes do ControlAR!</p>
                    <p>Para finalizar controle/operação selecione o 'Ambiente' que deseja controlar e em seguida, selecione o comando que deseja enviar ao 'Ambiente'.</p>                    
                </div>
            </div>
        </div>
    </div>
    <?php include '../../resources/link/LinkValidacao.php';
    ?>
    </body>
<?php
        include './Footer.php';
        ?>