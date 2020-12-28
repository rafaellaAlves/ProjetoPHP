<header>
    <?php
    include '../../resources/link/LinkFormulario.php';
    ?>
    <script type="text/javascript" src="../js/checkbox.js"></script>
    <title>ControlAR-Painel de Controle</title>

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
                <h3><i class="fa fa-rss"></i> Painel de Controle</h3><br>
                <form action="../../resources/config/Painel.php" method="POST" id="form-operar">
                    <div class="form-group">
                    <label for="perfil">Operar por:</label>
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input"  onclick="checagem(this.id)"id="customCheck" value="1" name="painel[]">
                        <label class="custom-control-label" for="customCheck">Ambiente</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="customCheck2" onclick="checagem(this.id)" value="0" name="painel[]">
                        <label class="custom-control-label" for="customCheck2">Equipamento</label>
                    </div>
                </div>
                <br>
                <div class="form-group-button col-12" style="text-align: left;">
                    <button type="submit" id="botoes" name="proximo" value="proximo" class="btn btn-success"><i class="fa fa-share" aria-hidden="true"></i> Próximo</button>
                    <a id="botoes" href="TelaPrincipal.php"  class="btn btn-danger"><i class="fa fa-reply" aria-hidden="true"></i> Cancelar</a>
                </div>
                </form>
                <div class="line"></div>
                <div class="jumbotron">                    
                    <p>Você está na Página de Painel de Controle do ControlAR!</p>
                    <p>Para realizar um controle/operação como primeiro passo selecione se deseja controlar por 'Equipamentos' ou 'Ambientes'. Em seguida será redirecionado para a página de controle final.</p>                    
                </div>
            </div>
        </div>
    </div>
    
    </body>
<?php
        include './Footer.php';
        ?>