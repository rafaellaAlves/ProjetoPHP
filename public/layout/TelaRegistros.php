<header>
    
    <?php include '../../resources/link/LinkFormulario.php'; ?>
    <title>ControlAR-Página Principal</title>
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
                <h4><i class="fa fa-folder-open"></i> Registros e Atualizações</h4><br>
                <div class="form-row">
                    
                    <div class="form-group col-md-12" style="text-align: center;">
                        <form action="../../resources/config/UsuRegistro" method="POST" id="form-modelo">                            
                            <div class="form-group col-md-12">
                                <label >Selecione um ambiente:</label><br>
                                <select class="custom-select" name="usuario">
                                    <option selected>Selecione..</option>
                                    <?php
                                    $result = "SELECT * FROM AMBIENTE WHERE AMB_ACEITAEQPS = 1";
                                    $resultr = mysqli_query($con, $result);
                                    while ($row = mysqli_fetch_assoc($resultr)) {
                                        ?>
                                        <option value="<?php echo $row['USU_ID']; ?>"><?php echo $row['USU_NOME']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                           
                            <br>
                            <div class="form-group-button col-12">
                                <button type="submit" name="proximo" value="proximo" class="btn btn-success"><i class="fa fa-share" aria-hidden="true"></i> Próximo</button>
                                <button type="reset"  class="btn btn-danger"><i class="fa fa-close" aria-hidden="true"></i> Cancelar</button>
                                </div>
                        </form>

                    </div>
                </div>
            </div>
            <br>
            <div class = "line"></div>
            <div class = "jumbotron" >
                <p>Você está na página de Registros do ControlAR!</p>
                <p>Para continuar, selecione o ambiente que deseja visualizar, e em seguida clique em 'Próximo'. Caso deseje voltar a tela inicial selecione 'Inicio' no menu superior.</p>
            </div>
        </div>
    </div>
</div>
</body>
<?php
include './Footer.php';
?>

