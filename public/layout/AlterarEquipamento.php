<header>
    <?php
    include '../../resources/link/LinkFormulario.php';

    if($_GET['id'] == NULL){
        echo"<script language='javascript' type='text/javascript'>alert('Escolha um registro antes de realizar esta operação!!');window.location.href='TelaEquipamentos.php';</script>";
        die();
    }else{
    $id = $_GET["id"];

    $sql = "SELECT E.EQP_NOME, E.MOD_ID, M.MOD_NOME, E.AMB_ID, A.AMB_NOME FROM EQUIPAMENTOS E, MODELO M, AMBIENTE A WHERE E.MOD_ID = M.MOD_ID AND E.AMB_ID= A.AMB_ID AND E.EQP_ID = $id";
    $query = mysqli_query($con, $sql);

    if ($resultado = mysqli_fetch_assoc($query)) {
        $descricao = $resultado["EQP_NOME"];
        $modeloid = $resultado['MOD_ID'];
        $modelonome = $resultado['MOD_NOME'];
        $ambienteid = $resultado['AMB_ID'];
        $ambientenome = $resultado['AMB_NOME'];
    }}
    ?>
    <title>ControlAR-Alteração de Equipamento</title>

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
                <h4><i class="fa fa-snowflake-o"></i> Alterar Equipamento</h4><br>
                <form action="../../resources/config/Equipamento.php" method="POST" id="form-equipamento">
                    <div class="form-row">
                        <input type="hidden" name="id" class="form-control" readonly value="<?php echo $id ?>"/>
                        <div class="form-group col-md-12" id="nome">
                            <label>Equipamento:</label>
                            <input type="text" class="form-control" name="equipamento" id="equipamento" placeholder="Descrição do CA" value="<?php echo $descricao ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Modelo:</label><br>
                            <select class="custom-select" name="modelo">
                                <option value="<?php echo $modeloid; ?>" selected> <?php echo $modelonome ?></option>
                                <?php
                                $result = "SELECT * FROM MODELO";
                                $resultr = mysqli_query($con, $result);
                                while ($row = mysqli_fetch_assoc($resultr)) {
                                    ?>
                                    <option value="<?php echo $row['MOD_ID']; ?>"><?php echo $row['MOD_NOME']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Ambiente:</label><br>
                            <select class="custom-select" name="ambiente">
                                <option value="<?php echo $ambienteid; ?>" selected> <?php echo $ambientenome ?></option>
                                <?php
                                $result1 = "SELECT * FROM AMBIENTE WHERE AMB_ACEITAEQPS=1";
                                $resultr1 = mysqli_query($con, $result1);
                                while ($row = mysqli_fetch_assoc($resultr1)) {
                                    ?>
                                    <option value="<?php echo $row['AMB_ID']; ?>"><?php echo $row['AMB_NOME']; ?></option>
                                <?php } ?>
                            </select>
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
                    <p>Você está na Página de Alteração de Equipamento do ControlAR!</p>
                    <p>Para alterar o equipamento modifique as infomações a cima que desejar, caso não desejar realizar modificações, para retornar a lista de dispositivos clique na opção <i class="fa fa-reply"></i> Voltar.</p>                    
                </div>
            </div>
        </div>
    </div>
    <?php include '../../resources/link/LinkValidacao.php';
    ?>
    <script type="text/javascript" src="../js/ValidacaoEquipamento.js"></script>
</body>
<?php
include './Footer.php';
?>
