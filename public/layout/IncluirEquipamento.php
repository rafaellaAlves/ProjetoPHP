<header>
    <?php
    include '../../resources/link/LinkFormulario.php';
    ?>
    <title>ControlAR-Cadastro de Equipamento</title>
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
                <h4><i class="fa fa-snowflake-o"></i> Cadastro de Equipamento</h4><br>
                <form action="../../resources/config/Equipamento.php" method="POST" id="form-equipamento">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="nome">Equipamento</label>
                            <input type="text" class="form-control" name="equipamento" id="equipamento" placeholder="Descrição do CA" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label>Modelo do Equipamento</label><br>
                            <select class="custom-select" name="modelo">
                                <option selected>Selecione..</option>
                                <?php
                                $result = "SELECT * FROM MODELO";
                                $resultr = mysqli_query($con, $result);
                                while ($row = mysqli_fetch_assoc($resultr)) {
                                    ?>
                                    <option value="<?php echo $row['MOD_ID']; ?>"><?php echo $row['MOD_NOME']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-1">
                            <label for="add" class="sr-only">addModelo</label>
                            <button id="adicionar" title="Adicionar Modelo"type="button" data-toggle="modal"  class="btn btn-light" data-target="#modal-modelo"><i class="fa fa-plus" aria-hidden="true"></i></button>
                        </div>
                        <div class="form-group col-md-5">
                            <label>Ambiente do Equipamento</label><br>
                            <select class="custom-select" name="ambiente">
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
                                <div class="form-group col-md-1">
                                    <label for="add" class="sr-only">addAmbiente</label>
                                    <button id="adicionar" title="Adicionar Ambiente"type="button" data-toggle="modal"  class="btn btn-light" data-target="#modal-ambiente"><i class="fa fa-plus" aria-hidden="true"></i> </button>
                                </div>
                            </div>       
                            <br>
                            <div class="form-group-button col-12">
                                <button type="submit"  name="adicionar" value="adicionar" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Cadastrar</button>
                                <button type="reset" class="btn btn-danger"><i class="fa fa-close" aria-hidden="true"></i> Limpar</button>
                                <a href="TelaEquipamentos.php"  class="btn btn-info"><i class="fa fa-reply" aria-hidden="true"></i> Voltar</a>
                            </div>
                        </form>
                        <div class="line"></div>
                        <div class="jumbotron">                    
                            <p>Você está na Página de Cadastro de Equipamentos do ControlAR!</p>
                            <p>Para cadastro de equipamento digite as seguintes informações: Nome padrão para o equipamento; Selecione o modelo deste equipamento; Selecione o ambiente em que este equipamento pertence. Caso o modelo e/ou ambiente do condicionador de ar desejados não estejam na caixa de seleção, click no botão  <i class="fa fa-plus"></i>  para adicionar uma nova marca e/ou ambiente.</p>                                   
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
        <link rel="stylesheet" href="../../public/css/modal.css" type="text/css">
        <div class="modal fade" id="modal-modelo">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus-circle"></i> Cadastrar Modelo</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
                    </div>
                    <div class="modal-body">
                        <form id="form-modelo-modal" name="feedback">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nome do modelo:</label>
                                    <input type="text" name="nome" class="form-control" placeholder="Digite o Modelo" required autofocus />
                                </div>
                                <div class="col-md-6">
                                    <label>Marca do modelo:</label><br>
                                    <select class="custom-select" name="marca">
                                        <option selected>Selecione..</option>
                                        <?php
                                        $result1 = "SELECT * FROM MARCA";
                                        $resultr1 = mysqli_query($con, $result1);
                                        while ($row = mysqli_fetch_assoc($resultr1)) {
                                            ?>
                                            <option value="<?php echo $row['MCA_ID']; ?>"><?php echo $row['MCA_NOME']; ?></option>
        <?php } ?>
                                    </select>
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
        <script type="text/javascript" src="../js/checkbox.js"></script>
        <div class="modal fade" id="modal-ambiente">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus-circle"></i> Cadastrar Ambiente</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
                    </div>
                    <div class="modal-body">
                        <form id="form-ambiente-modal" name="feedback">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nome do ambiente:</label>
                                    <input type="text" name="ambiente" class="form-control" placeholder="Digite o ambiente" required autofocus />
                                </div>
                                <div class="col-md-6">
                                    <label>Ambiente Superior(Caso possuir)</label><br>
                                    <select class="custom-select" name="ambientepai" >
                                        <option selected>Selecione..</option>
                                        <?php
                                        $result = "SELECT * FROM AMBIENTE";
                                        $resultr = mysqli_query($con, $result);
                                        if ($resultr > 0) {
                                            while ($row = mysqli_fetch_assoc($resultr)) {
                                                ?>
                                                <option value="<?php echo $row['AMB_ID']; ?>"><?php echo $row['AMB_NOME']; ?></option>
                                            <?php
                                            }
                                        }
                                            else
                                        ?>
                                <option value="0">Não possui</option> 

                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="aceita">Aceita Equipamentos de Condicionadores de Ar?</label>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" onclick="checagem(this.id)" id="customCheck" value="1" name="aceita[]">
                                    <label class="custom-control-label" for="customCheck">Sim</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2" onclick="checagem(this.id)" value="0" name="aceita[]">
                                    <label class="custom-control-label" for="customCheck2">Não</label>
                                </div>
                            </div>
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
                url: "ModeloModal.php",
                data: $('#form-modelo-modal').serialize(),
                success: function (r) {
                    if (r === true) {
                        $("#form-modelo-modal")[0].reset();
                        $("#feedback-modal").modal('hide');
                        $("#form-equipamento").html(data);
                    }
                }
            });
        });
        $("button#submit2").click(function () {
            $.ajax({
                type: "POST",
                url: "AmbienteModal.php",
                data: $('#form-ambiente-modal').serialize(),
                success: function (r) {
                    if (r === true) {
                        $("#form-ambiente-modal")[0].reset();
                        $("#feedback-modal").modal('hide');
                        $("#form-equipamento").html(data);
                    }
                }
            });
        });
    });
</script>
