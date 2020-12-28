<header>
    <?php
    include '../../resources/link/LinkFormulario.php';

    if ($_GET['id'] == NULL) {
        echo"<script language='javascript' type='text/javascript'>alert('Não é possível realizar esta operação!!');window.location.href='TelaComandos.php';</script>";
        die();
    } else {
        $idDispositivo = $_GET['id'];
    }
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
                    <h4><i class="fa fa-rss"></i> Gravar Código</h4>
                    <br>
                    <form id="form-recebCodigo" action="../../resources/config/Comando_IR.php" method="POST">
                        <div class="form-group">                                
                            <div class="form-row">                                                  
                                <div class="form-group col-md-6">
                                    <label>Modelo referente ao comando</label>
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
                                <div class="form-group col-md-6">
                                    <label>Comando refente ao código capturado</label>
                                    <select class="custom-select" name="comando">
                                        <option selected>Selecione..</option>  
                                        <?php
                                        $sql = "SELECT * FROM COMANDO";
                                        $res = mysqli_query($con, $sql);
                                        while ($row = mysqli_fetch_assoc($res)) {
                                            ?>
                                            <option value="<?php echo $row['CMD_ID']; ?>"><?php echo $row['CMD_TITULO']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>  
                            </div> 
                            <div class="form-group col-md-6">
                                <label>Código do Comando capturado</label>                            
                                <textarea id="codigo" name="codigo"class="md-textarea form-control" rows="3" required disabled="true" ><?php echo $cmdCapturado ?></textarea>                                

                                <form action="RecebeCodigo.php" method="GET">
                                    <input style="margin-top: 10px;" type="submit" name="capturar" value="Capturar Código" class="btn btn-dark">
                                </form>

                                <?php
                                if (isset($_GET["capturar"])) {
                                    include "../../resources/config/CapturarCodigo.php?id='$idDispositivo'";
                                }
                                ?>
                            </div>

                        </div>

                        <br/>
                        <div class="form-group-button">
                            <button type="submit"  name="adicionar" value="adicionar" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Gravar</button>
                            <button type="reset" class="btn btn-danger"><i class="fa fa-close" aria-hidden="true"></i> Limpar</button>
                            <a href="TelaComandos.php"  class="btn btn-info"><i class="fa fa-reply" aria-hidden="true"></i> Voltar</a>
                        </div>
                </div>
                </form>
                <div class="line"></div>
                <div class="jumbotron">                    
                    <p>Você está na Página de Cadastro de Comando do ControlAR!</p>
                    <p>Para cadastro de comando digite as seguintes informações: Breve título para o comando a ser cadastrado; Descrição do comando a ser aprendido, ou seja, descreva o estado completo do controle remoto.</p>                   
                    <p>Assim que as informações forem inseridas, clique no botão 'Capturar' para que seja possivel capturar o comando desejado e concluir o cadastro.</p>                    
                </div>
            </div>
        </div>
    </div>
    <?php
    include '../../resources/link/LinkValidacao.php';
    ?>


    </body>
    <?php
    include './Footer.php';
    ?>
