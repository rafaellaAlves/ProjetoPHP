<header>
    <?php include '../../resources/link/LinkFormulario.php'; ?>
    <title>ControlAR-Cadastro de Modelo</title>
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
            <div class="content" id="content-index"><br>
                <h4><i class="fa fa-plus-circle"></i> Cadastro de Modelo</h4><br>
                <form action="../../resources/config/Modelo.php" method="POST" id="form-modelo">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="modelo">Modelo do Condicionador de Ar</label>
                            <input type="text" class="form-control" name="modelo" id="modelo"placeholder="Nome do Modelo" required>
                        </div>
                        <div class="form-group col-md-5">
                            <label>Marca do Modelo</label><br>
                            <select class="custom-select" name="marca">
                                <option selected>Selecione..</option>
                                <?php
                                $result = "SELECT * FROM MARCA";
                                $resultr = mysqli_query($con, $result);
                                while ($row = mysqli_fetch_assoc($resultr)) {
                                    ?>
                                    <option value="<?php echo $row['MCA_ID']; ?>"><?php echo $row['MCA_NOME']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-1">
                            <label class="sr-only">addMarca</label>
                            <button title="Adicionar Marca"type="button" data-toggle="modal"  class="btn btn-light" data-target="#modal-marca" id="adicionar"><i class="fa fa-plus" aria-hidden="true"></i></button>
                        </div>
                    </div>                
                    <br>
                    <div class="form-group-button col-12">
                        <button type="submit" name="adicionar" value="adicionar" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Cadastrar</button>
                        <button type="reset"  class="btn btn-danger"><i class="fa fa-close" aria-hidden="true"></i> Limpar</button>
                        <a href="TelaModelos.php"  class="btn btn-info"><i class="fa fa-reply" aria-hidden="true"></i> Voltar</a>
                    </div>
                </form>
                <div class="line"></div>
                <div class="jumbotron">                    
                    <p>Você está na Página de Cadastro de Modelos do ControlAR!</p>
                    <p>Para cadastro de modelo digite as seguintes informações: Nome do modelo de condicionador de ar; Selecione a marca do referente modelo. Caso a marca do condicionador de ar desejada não esteja na caixa de seleção, click no botão  <i class="fa fa-plus"></i>  para adicionar uma nova marca.</p>                    
                </div>
            </div>
        </div>
    </div>
    <?php include '../../resources/link/LinkValidacao.php';
    ?>
    <script type="text/javascript" src="../js/ValidacaoModelo.js"></script>
</body>
<?php
include './Footer.php';
?>
<link rel="stylesheet" href="../../public/css/modal.css" type="text/css">
<div class="modal fade" id="modal-marca">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus-circle"></i> Cadastrar Marca</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
            </div>
            <div class="modal-body">
                <form id="form-marca-modal" name="feedback">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Nome da marca:</label>
                            <input type="text" name="nomemarca" class="form-control" placeholder="Digite o nome da Marca" required autofocus />
                        </div>
                    </div>
                    <br/>
                    <div class="form-group" id="modal-bnt">                        
                        <button id="submit" type="submit" value="Cadastrar" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Cadastrar</button>
                        <button type="button" data-dismiss="modal" class="btn btn-danger"><i class="fa fa-close" aria-hidden="true"></i> Cancelar</button>
                       </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("button#submit").click(function () {
            $.ajax({
                type: "POST",
                url: "../../resources/config/MarcaModal.php",
                data: $('#form-marca-modal').serialize(),
                success: function (r) {
                    if (r === true) {
                        $("#form-marca-modal")[0].reset();
                        $("#feedback-modal").modal('hide');
                        $("#form-modelo").html(data);
                    }
                }
            });
        });
    });
</script>