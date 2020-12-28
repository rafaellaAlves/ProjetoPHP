<header>
    <?php
    include '../../resources/link/LinkFormulario.php';

    if($_GET['id'] == NULL){
        echo"<script language='javascript' type='text/javascript'>alert('Escolha um registro antes de realizar esta operação!!');window.location.href='TelaComando.php';</script>";
        die();
    }else{
    $id = $_GET["id"];

    $sql = "SELECT CM.CMD_TITULO, CM.CMD_DESCRICAO, M.MOD_NOME FROM  C, AMBIENTE A WHERE C.AMB_ID = A.AMB_ID AND CDV_ID = $id";
    $res = mysqli_query($con, $sql);

    if ($resultado = mysqli_fetch_assoc($res)) {
        $nome = $resultado['CDV_NOME'];
        $ambienteid = $resultado['AMB_ID'];
        $ipv4 = $resultado['CDV_IPV4'];
        $ipv6 = $resultado['CDV_IPV6'];
        $ambientenome = $resultado['AMB_NOME'];
    }}
    ?>
    <title>ControlAR-Alteração de Comando</title>
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
                        <div class="form-group col-md-12">
                            <label>Titulo</label>
                            <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Nome do Comando" value="<?php echo $id ?> "required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Modelo referente ao comando</label>
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
                            <label>Comando refente ao código capturado</label>
                            <select class="custom-select" name="comando" disabled="true">                               
                                <option value="<?php echo $idComando ?>"><?php echo $titulo; ?></option>
                                <?php
                                $result = "SELECT * FROM MODELO";
                                $resultr = mysqli_query($con, $result);
                                while ($row = mysqli_fetch_assoc($resultr)) {
                                    ?>
                                    <option value="<?php echo $row['MOD_ID']; ?>"><?php echo $row['MOD_NOME']; ?></option>
                                <?php } ?>
                            </select>
                        </div>  
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Descrição do comando</label>                            
                            <textarea id="descricao" name="descricao"class="md-textarea form-control" rows="3" value="<?php echo $nome ?>" required></textarea>                                
                        </div>                                   
                        <div class="form-group col-md-6">
                            <label>Código do Comando capturado</label>                            
                            <textarea id="codigo" name="codigo"class="md-textarea form-control" rows="3" required disabled="true" ><?php echo $cmdCapturado ?></textarea>                                
                        </div>
                    </div>
                    <br>
                    <div class="form-group-button col-12">
                        <button type="submit"  name="alterar" value="alterar" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Alterar</button>
                        <button type="reset"  class="btn btn-danger"><i class="fa fa-close" aria-hidden="true"></i> Limpar</button>
                        <a href="TelaComandos.php"  class="btn btn-info"><i class="fa fa-reply" aria-hidden="true"></i> Voltar</a>
                    </div>
                </form>
                <div class="line"></div>
                <div class="jumbotron">                    
                    <p>Você está na Página de Alteração de Comando do ControlAR!</p>
                    <p>Para alterar o dispositivo modifique as infomações a cima que desejar, caso não desejar realizar modificações, para retornar a lista de dispositivos clique na opção <i class="fa fa-reply"></i> Voltar.</p>                    
                </div>
            </div>
        </div>
    </div>
    <?php include '../../resources/link/LinkValidacao.php'; ?>
    <script type="text/javascript" src="../js/ValidacaoComando.js"></script>
</body>
<?php
include './Footer.php';
?>
