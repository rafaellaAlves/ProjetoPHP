<header>
    <?php
    include '../../resources/link/LinkFormulario.php';

    if($_GET['id'] == NULL){
        echo"<script language='javascript' type='text/javascript'>alert('Escolha um registro antes de realizar esta operação!!');window.location.href='TelaAmbientes.php';</script>";
        die();
    }else{
    $id = $_GET["id"];
    
    $sql = "SELECT A.AMB_NOME, A.AMB_ID, AM.AMB_NOME, AM.AMB_ID, A.AMB_ACEITAEQPS FROM AMBIENTE A, AMBIENTE AM WHERE A.AMB_PAI_ID = AM.AMB_ID AND A.AMB_ID = $id";
    
    $res = mysqli_query($con, $sql);
    
    if($resultado = mysqli_fetch_assoc($res)){
        $nomefilho = $resultado['AMB_NOME'];
        $idfilho = $resultado['AMB_ID'];
        $nomepai =$resultado['AMB_NOME'];
        $idpai = $resultado['AMB_ID'];
        $aceita = $resultado['AMB_ACEITAEQPS'];
    }}
    
    ?>
   <script type="text/javascript" src="../js/checkbox.js"></script>
    <title>ControlAR-Alteração de Ambiente</title>
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
                <h4><i class="fa fa-sitemap"></i> Alterar Ambiente</h4><br>
                <form action="../../resources/config/Ambiente.php" method="POST" id="form-ambiente">
                    <div class="row">
                        <input type="hidden" name="id" class="form-control" readonly value="<?php echo $id ?>"/>
                        <div class="form-group col-md-12">
                            <label>Ambiente</label>
                            <input type="text" class="form-control" name="ambiente" id="ambiente"placeholder="Nome do Ambiente" value="<?php echo $nomefilho ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label>Ambiente Superior</label><br>
                            <select class="custom-select" name="ambientepai">
                                <option value="<?php echo $idpai ?>" selected> <?php echo $nomepai ?></option>
                                <?php
                                $result = "SELECT * FROM AMBIENTE";
                                $resultr = mysqli_query($con, $result);
                                while ($row = mysqli_fetch_assoc($resultr)) {
                                    ?>
                                    <option value="<?php echo $row['AMB_ID']; ?>"><?php echo $row['AMB_NOME']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-5">
                            <div class="form-group">
                                <label for="aceita">Aceita Equipamentos de CA?</label>
                                <?phpif($aceita == 1){?>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" onclick="checagem(this.id)" checked="true" id="customCheck" value="1" name="aceita[]">
                                    <label class="custom-control-label" for="customCheck">Sim</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2" onclick="checagem(this.id)" value="0" name="aceita[]">
                                    <label class="custom-control-label" for="customCheck2">Não</label>
                                </div>
                                <?php}else{?>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" onclick="checagem(this.id)"  id="customCheck" value="1" name="aceita[]">
                                    <label class="custom-control-label" for="customCheck">Sim</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2" checked="true" onclick="checagem(this.id)" value="0" name="aceita[]">
                                    <label class="custom-control-label" for="customCheck2">Não</label>
                                </div>
                                 <?php}?>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group-button col-12">
                       <button type="submit"  name="alterar" value="alterar" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Alterar</button>
                        <button type="reset"  class="btn btn-danger"><i class="fa fa-close" aria-hidden="true"></i> Limpar</button>
                        <a href="TelaAmbientes.php"  class="btn btn-info"><i class="fa fa-reply" aria-hidden="true"></i> Voltar</a>
                    </div>
                </form>
                <div class="line"></div>
                <div class="jumbotron">                    
                    <p>Você está na Página de Alteração de Ambiente do ControlAR!</p>
                    <p>Para alterar o ambiente modifique as infomações a cima que desejar, caso não desejar realizar modificações, para retornar a lista de ambiente clique na opção <i class="fa fa-reply"></i> Voltar.</p>                    
                </div>
            </div>
        </div>
    </div>
   <?php include '../../resources/link/LinkValidacao.php'; ?>
    <script type="text/javascript" src="../js/ValidacaoAmbiente.js"></script>
</body>
<?php
include './Footer.php';
?>
