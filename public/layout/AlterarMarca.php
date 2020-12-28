<header>
    <?php
    include '../../resources/link/LinkFormulario.php';

    if($_GET['id'] == NULL){
        echo"<script language='javascript' type='text/javascript'>alert('Escolha um registro antes de realizar esta operação!!');window.location.href='TelaMarcas.php';</script>";
        die();
    }else{
    $id = $_GET["id"];

    $sql = "SELECT * FROM MARCA WHERE MCA_ID = $id";
    $res = mysqli_query($con, $sql);

     if ($resultado = mysqli_fetch_assoc($res)) {
        $nome = $resultado["MCA_NOME"];
    }}
    ?>
    <title>ControlAR-Alteração de Marca</title>

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
                <h4><i class="fa fa-plus-circle"></i> Alterar Marca</h4>
                <form action="../../resources/config/Marca.php" method="POST" id="form-marca">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="hidden" name="id" class="form-control" readonly value="<?php echo $id ?>"/>
                            <label for="marca">Marca</label>
                            <input type="text" class="form-control" name="marca" placeholder="Marca do CA" value="<?php echo $nome ?>" required>
                        </div>                        
                    </div> 
                    <br>
                    <div class="form-group-button col-12">
                        <button type="submit" name="alterar" value="alterar" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Alterar</button>
                        <button type="reset" class="btn btn-danger"><i class="fa fa-close" aria-hidden="true"></i> Limpar</button>
                        <a href="TelaMarcas.php"  class="btn btn-info"><i class="fa fa-reply" aria-hidden="true"></i> Voltar</a>
                    </div>
                </form>
                <div class="line"></div>
                <div class="jumbotron">                    
                    <p>Você está na Página de Alteração de Marca do ControlAR!</p>
                    <p>Para alterar a marca modifique as infomações a cima que desejar, caso não desejar realizar modificações, para retornar a lista de dispositivos clique na opção <i class="fa fa-reply"></i> Voltar.</p>                    
                </div>
            </div>
        </div>
    </div>
    <?php include '../../resources/link/LinkValidacao.php'; ?>
    <script type="text/javascript" src="../js/ValidacaoMarca.js"></script>
</body>
<?php
        include './Footer.php';
        ?>