<header>
    <?php
    include '../../resources/link/LinkFormulario.php';
    ?>    
    <script type="text/javascript" src="../js/checkbox.js"></script>
    <title>ControlAR-Cadastro de Ambiente</title>
    <?php
    if ($_GET['id'] != null) {
        $id = $_GET['id'];
        $result = "SELECT AMB_NOME FROM AMBIENTE WHERE AMB_ID = $id";
        $resultr = mysqli_query($con, $result);
        while ($row = mysqli_fetch_assoc($resultr)) {
            $nome = $row['AMB_NOME'];
        }
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
                <h4><i class="fa fa-sitemap"></i> Cadastro de Ambiente</h4><br>
                <form action="../../resources/config/Ambiente.php" method="POST" id="form-ambiente">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Ambiente</label>
                            <input type="text" class="form-control" name="ambiente" id="ambiente"placeholder="Nome do Ambiente" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label>Ambiente Superior(Caso possuir)</label><br>
                            <select class="custom-select" name="ambientepai" >

                                <?php if ($id != null) { ?>
                                    <option selected value="<?php echo $id; ?>"><?php echo $nome; ?></option>

                                    <?php
                                    } else{
                                    $result = "SELECT * FROM AMBIENTE";
                                    $resultr = mysqli_query($con, $result);
                                    if ($resultr > 0) {
                                    ?>
                                    <option selected>Selecione...</option>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($resultr)) {
                                        ?>
                                        <option value="<?php echo $row['AMB_ID']; ?>"><?php echo $row['AMB_NOME']; ?></option>
                                    <?php } ?>
                                    <?php } else{ ?>
                                    <option value="0">Não possui</option>
    <?php } ?>
    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-1"></div>
                            <div class="form-group col-md-5">
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
                        <br>
                        <div class="form-group-button col-12">
                            <button type="submit" name="adicionar" value="adicionar" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Cadastrar</button>
                            <button type="reset" class="btn btn-danger"><i class="fa fa-close" aria-hidden="true"></i> Limpar</button>
                            <a  href="TelaAmbientes.php"  class="btn btn-info"><i class="fa fa-reply" aria-hidden="true"></i> Voltar</a>
                        </div>
                    </form>
                    <div class="line"></div>
                    <div class="jumbotron">                    
                        <p>Você está na Página de Cadastro de Ambiente do ControlAR!</p>
                        <p>Para cadastro de ambiente digite as seguintes informações: Nome do ambiente; Selecione um ambiente superior ao qual ele pertence(caso pertença); Selecione "Sim" caso o ambiente cadastrado aceite equipamentos de condicionadores de ar, caso não, selecione "Não".</p>                    
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