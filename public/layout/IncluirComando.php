<header>
    <?php
    include '../../resources/link/LinkFormulario.php';
    ?>
    <title>ControlAR-Cadastro de Comando</title>
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
                <h4><i class="fa fa-rss"></i> Cadastro de Comando</h4><br>
                <form action="../../resources/config/Comando.php" method="POST" id="form-comando">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Titulo</label>
                            <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Nome do Comando" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Dispositivo conectado</label>
                            <select class="custom-select" name="dispositivo">
                                <option selected>Selecione..</option>
                                <?php
                                $result = "SELECT * FROM CONTROL_DEVICE";
                                $resultr = mysqli_query($con, $result);
                                while ($row = mysqli_fetch_assoc($resultr)) {
                                    ?>
                                    <option value="<?php echo $row['CDV_ID']; ?>"><?php echo $row['CDV_NOME']; ?></option>
                                <?php } ?>
                            </select>
                        </div> 

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Descrição do comando</label>                            
                            <textarea id="descricao" name="descricao"class="md-textarea form-control" rows="3" required></textarea>                                
                        </div>
                    </div>
                    <br>
                    <div class="form-group-button col-12">
                        <button type="submit" id="botoes" name="adicionar" value="adicionar" class="btn btn-success"><i class="fa fa-share" aria-hidden="true"></i> Próximo</button>
                        <button type="reset" id="botoes"  class="btn btn-danger"><i class="fa fa-close" aria-hidden="true"></i> Limpar</button>
                        <a id="botoes" href="TelaComandos.php"  class="btn btn-info"><i class="fa fa-reply" aria-hidden="true"></i> Voltar</a>
                    </div>
                </form>

                <div class="line"></div>
                <div class="jumbotron">                    
                    <p>Você está na Página de Cadastro de Comando do ControlAR!</p>
                    <p>Para cadastro de comando digite as seguintes informações: Título para o comando a ser cadastrado; Selecione o dispositivo que irá aprender o comando desejado; Breve descrição do comando a ser aprendido, ou seja, descreva o estado completo do controle remoto.</p>                   
                    <p>Assim que as informações forem inseridas, clique no botão 'Próximo' para que seja possivel proceguir com o cadastro.</p>                    
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
