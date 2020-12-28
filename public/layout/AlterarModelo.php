<header>
    <?php
    include '../../resources/link/LinkFormulario.php';

    if($_GET['id'] == NULL){
        echo"<script language='javascript' type='text/javascript'>alert('Escolha um registro antes de realizar esta operação!!');window.location.href='TelaModelos.php';</script>";
        die();
    }else{
    $id = $_GET["id"];

    $sql = "SELECT M.MOD_ID, M.MOD_NOME, MA.MCA_NOME, M.MCA_ID FROM MODELO M, MARCA MA WHERE M.MCA_ID = MA.MCA_ID AND M.MOD_ID = $id ";
    
    $res = mysqli_query($con, $sql);
    
    if($resultado = mysqli_fetch_assoc($res)){
        $nome = $resultado['MOD_NOME'];
        $marcaid = $resultado['MCA_ID'];
        $marcanome = $resultado['MCA_NOME'];
    }}
    ?>
    <title>ControlAR-Alteração de Modelo</title>

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
                <h4><i class="fa fa-plus-circle"></i> Alterar Modelo</h4>
                <form action="../../resources/config/Modelo.php" method="POST" id="form-modelo">
                    <div class="form-row">
                        <input type="hidden" name="id" class="form-control" readonly value="<?php echo $id ?>"/>
                        <div class="form-group col-md-6">
                            <label for="modelo">Modelo</label>
                            <input type="text" class="form-control" name="modelo" id="modelo"placeholder="Modelo do CA" value="<?php echo $nome ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Marcas</label><br>
                            <select class="custom-select" name="marca">
                                <option value="<?php echo $marcaid ?>" selected> <?php echo $marcanome ?></option>
                                <?php
                                $result = "SELECT * FROM MARCA";
                                $resultr = mysqli_query($con, $result);
                                while ($row = mysqli_fetch_assoc($resultr)) {
                                    ?>
                                    <option value="<?php echo $row['MCA_ID']; ?>"><?php echo $row['MCA_NOME']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>                
                    <br>
                    <div class="form-group-button col-12">
                         <button type="submit" name="alterar" value="alterar" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Alterar</button>
                        <button type="reset" class="btn btn-danger"><i class="fa fa-close" aria-hidden="true"></i> Limpar</button>
                        <a href="TelaModelos.php"  class="btn btn-info"><i class="fa fa-reply" aria-hidden="true"></i> Voltar</a>
                    </div>
                </form>
                <div class="line"></div>
                <div class="jumbotron">                    
                    <p>Você está na Página de Alteração de Modelo do ControlAR!</p>
                    <p>Para alterar o modelo modifique as infomações a cima que desejar, caso não desejar realizar modificações, para retornar a lista de dispositivos clique na opção <i class="fa fa-reply"></i> Voltar.</p>                    
                </div>
            </div>
        </div>
    </div>
    <?php include '../../resources/link/LinkValidacao.php';?>
    <script type="text/javascript" src="../js/ValidacaoModelo.js"></script>
</body>
<?php
    include './Footer.php';
?>