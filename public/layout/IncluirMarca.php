<header>
    <?php
    include '../../resources/link/LinkFormulario.php';
    ?>
    
    <title>ControlAR-Cadastro Marca</title>
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
                <h3><i class="fa fa-plus-circle"></i> Cadastro de Marca</h3>
                <form action="../../resources/config/Marca.php" method="POST" id="form-marca">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="marca">Marca do Condiconador de Ar</label>
                            <input type="text" class="form-control" name="marca" placeholder="Nome da Marca" required>
                        </div>                        
                    </div> 
                    <br>
                    <div class="form-group-button col-12">
                        <button type="submit" name="adicionar" value="adicionar" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Cadastrar</button>
                        <button type="reset"  class="btn btn-danger"><i class="fa fa-close" aria-hidden="true"></i> Limpar</button>
                        <a href="TelaMarcas.php"  class="btn btn-info"><i class="fa fa-reply" aria-hidden="true"></i> Voltar</a>
                    </div>
                </form>
                <div class="line"></div>
                <div class="jumbotron">                    
                    <p>Você está na Página de Cadastro de Marca do ControlAR!</p>
                    <p>Para cadastro de marca digite as seguintes informações: Nome da marca do condicionador de ar. Para visualizar as marcas cadastradas novamente clique no botão voltar.</p>                                    
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
