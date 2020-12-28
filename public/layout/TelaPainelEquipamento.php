<header>
    <?php include '../../resources/link/LinkFormulario.php'; ?>
    <title>ControlAR-Painel de Controle - Equipamentos</title>
    <?php $id = $_GET['id'];
    $result = "SELECT * FROM EQUIPAMENTOS WHERE AMD_ID =$id";
    $resultr = mysqli_query($con, $result);
    if($result =! 1){
        echo"<script language='javascript' type='text/javascript'>alert('Este ambiente não possui nenhum equipamento cadastrado. Realize o cadastro para continuar com a operação.');window.location.href='../../public/layout/TelaLogin.php';</script>";
        die();
    }
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
                <h6>Equipamentos</h6><br>
                <form action="../../resources/config/Painel.php" method="POST" id="form-operar-ambiente">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Selecione o Equipamento:</label><br>
                            <select class="custom-select" name="equipamento" required>
                                <option selected>Selecione..</option>
                                    <?php if($id == null){
                                        $result = "SELECT * FROM EQUIPAMENTOS";
                                    $resultr = mysqli_query($con, $result);
                                    while ($row = mysqli_fetch_assoc($resultr)) {
                                        ?>
                                    <option  value="<?php echo $row['EQP_ID']; ?>"><?php echo $row['EQP_NOME']; ?></option>
                                    <?php }}else{
                                    
                                    
                                    $result = "SELECT * FROM EQUIPAMENTOS WHERE AMB_ID =$id";
                                    $resultr = mysqli_query($con, $result);
                                    while ($row = mysqli_fetch_assoc($resultr)) {
                                        ?>
                                    <option  value="<?php echo $row['EQP_ID']; ?>"><?php echo $row['EQP_NOME']; ?></option>
                                <?php }} ?>
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
                                    <option value="<?php echo $row['CMD_ID']; ?>"><?php echo $row['CMD_TITULO']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-group-button col-12">
                        <button type="submit" naid="botoes" name="executarEqp" value="executarEqp" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Executar</button>
                        <button type="reset" id="botoes"  class="btn btn-primary"><i class="fa fa-close" aria-hidden="true"></i> Limpar</button>
                        <a id="botoes" href="TelaPainel.php"  class="btn btn-danger"><i class="fa fa-reply" aria-hidden="true"></i> Cancelar</a>
                    </div>
                </form>
                <div class="line"></div>
                <div class="jumbotron">                    
                    <p>Você está na Página de Painel de Controle por Equipamentos do ControlAR!</p>
                    <p>Para finalizar controle/operação selecione o 'Equipamento' que deseja controlar e em seguida, selecione o comando que deseja enviar ao 'Equipamento'.</p>                    
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