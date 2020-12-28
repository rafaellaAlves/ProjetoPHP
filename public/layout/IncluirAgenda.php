<header>
    <?php
    include '../../resources/link/LinkFormulario.php';
    ?>

    <link href="../bootstrap/css/bootstrap.min_1.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <script type="text/javascript" src="../js/checkbox.js"></script>
    <title>ControlAR-Cadastro de Agenda</title>

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
                <h4><i class="fa fa-calendar-plus-o"></i> Cadastro de Agenda</h4>
                <form action="../../resources/config/Usuario.php" method="POST" id="form-agenda">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="nome">Nome Agenda</label>
                            <input type="text" class="form-control" name="agenda" id="agenda" placeholder="Nome da agenda" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="date">Minutos:</label><br>
                            <select class="custom-select" name="minuto" >
                                <option selected>Selecione...</option>
                                <option value="0">00</option>                              
                                <option value="1">01</option>                              
                                <option value="2">02</option>                              
                                <option value="3">03</option>                              
                                <option value="4">04</option>                              
                                <option value="5">05</option>                              
                                <option value="6">06</option>                              
                                <option value="7">07</option>                              
                                <option value="1">08</option>                              
                                <option value="2">09</option>                              
                                <option value="3">10</option>                              
                                <option value="4">11</option>                              
                                <option value="5">12</option>                              
                                <option value="6">13</option>                              
                                <option value="7">14</option>                              
                                <option value="3">15</option>                              
                                <option value="4">16</option>                              
                                <option value="5">17</option>                              
                                <option value="6">18</option>                              
                                <option value="7">19</option>                              
                                <option value="3">20</option>                              
                                <option value="4">21</option>                              
                                <option value="5">22</option>                              
                                <option value="6">23</option>                              
                                <option value="7">24</option>                              
                                <option value="4">25</option>                              
                                <option value="5">26</option>                              
                                <option value="6">27</option>                              
                                <option value="7">28</option>                              
                                <option value="6">29</option>                              
                                <option value="7">30</option>                              
                                <option value="6">31</option>                          
                                <option value="1">31</option>                              
                                <option value="2">32</option>                              
                                <option value="3">33</option>                              
                                <option value="4">34</option>                              
                                <option value="5">35</option>                              
                                <option value="6">36</option>                              
                                <option value="7">37</option>                              
                                <option value="1">38</option>                              
                                <option value="2">39</option>                              
                                <option value="3">40</option>                              
                                <option value="4">41</option>                              
                                <option value="5">42</option>                              
                                <option value="6">43</option>                              
                                <option value="7">44</option>                              
                                <option value="3">45</option>                              
                                <option value="4">46</option>                              
                                <option value="5">47</option>                              
                                <option value="6">48</option>                              
                                <option value="7">49</option>                              
                                <option value="3">50</option>                              
                                <option value="4">51</option>                              
                                <option value="5">52</option>                              
                                <option value="6">53</option>                              
                                <option value="7">54</option>                              
                                <option value="4">55</option>                              
                                <option value="5">56</option>                              
                                <option value="6">57</option>                              
                                <option value="7">58</option>                              
                                <option value="6">59</option>                         
                            </select>    
                        </div>
                        <div class="form-group col-md-6">
                            <label>Horas:</label><br>
                            <select class="custom-select" name="hora" >
                                <option selected>Selecione...</option>
                                <option value="0">00</option>                              
                                <option value="1">01</option>                              
                                <option value="2">02</option>                              
                                <option value="3">03</option>                              
                                <option value="4">04</option>                              
                                <option value="5">05</option>                              
                                <option value="6">06</option>                              
                                <option value="7">07</option>                              
                                <option value="1">08</option>                              
                                <option value="2">09</option>                              
                                <option value="3">10</option>                              
                                <option value="4">11</option>                              
                                <option value="5">12</option>                              
                                <option value="6">13</option>                              
                                <option value="7">14</option>                              
                                <option value="3">15</option>                              
                                <option value="4">16</option>                              
                                <option value="5">17</option>                              
                                <option value="6">18</option>                              
                                <option value="7">19</option>                              
                                <option value="3">20</option>                              
                                <option value="4">21</option>                              
                                <option value="5">22</option>                              
                                <option value="6">23</option>                              

                            </select>    
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Dias do Mês:</label><br>
                            <select class="custom-select" name="dia" >
                                <option selected>Selecione...</option>
                                <option value="*">Todos os dias</option>
                                <option value="1">01</option>                              
                                <option value="2">02</option>                              
                                <option value="3">03</option>                              
                                <option value="4">04</option>                              
                                <option value="5">05</option>                              
                                <option value="6">06</option>                              
                                <option value="7">07</option>                              
                                <option value="1">08</option>                              
                                <option value="2">09</option>                              
                                <option value="3">10</option>                              
                                <option value="4">11</option>                              
                                <option value="5">12</option>                              
                                <option value="6">13</option>                              
                                <option value="7">14</option>                              
                                <option value="3">15</option>                              
                                <option value="4">16</option>                              
                                <option value="5">17</option>                              
                                <option value="6">18</option>                              
                                <option value="7">19</option>                              
                                <option value="3">20</option>                              
                                <option value="4">21</option>                              
                                <option value="5">22</option>                              
                                <option value="6">23</option>                              
                                <option value="7">24</option>                              
                                <option value="4">25</option>                              
                                <option value="5">26</option>                              
                                <option value="6">27</option>                              
                                <option value="7">28</option>                              
                                <option value="6">29</option>                              
                                <option value="7">30</option>                              
                                <option value="6">31</option>                          
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Meses do Ano:</label><br>
                            <select class="custom-select" name="mes">
                                <option selected>Selecione...</option>
                                <option value="*">Todos os meses</option>
                                <option value="1">Janeiro</option>                              
                                <option value="2">Fevereiro</option>                              
                                <option value="3">Março</option>                              
                                <option value="4">Abril</option>                              
                                <option value="5">Maio</option>                              
                                <option value="6">Junho</option>                              
                                <option value="7">Julho</option>                              
                                <option value="3">Agosto</option>                              
                                <option value="4">Setembro</option>                              
                                <option value="5">Outubro</option>                              
                                <option value="6">Novembro</option>                              
                                <option value="7">Dezembro</option>                              
                            </select>
                        </div>
                    </div>    
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label>Dias da Semana:</label><br>
                            <select class="custom-select" name="semana" >
                                <option selected>Selecione...</option>
                                <option value="*">Todos os dias</option>
                                <option value="1">Domingo</option>                              
                                <option value="2">Segunda</option>                              
                                <option value="3">Terça</option>                              
                                <option value="4">Quarta</option>                              
                                <option value="5">Quinta</option>                              
                                <option value="6">Sexta</option>                              
                                <option value="7">Sábado</option>                              
                            </select>

                        </div>
                    
                        <div class="form-group col-md-6">
                            <label>Comando executado pela agenda:</label><br>
                            <select class="custom-select" name="comando" >
                                <option selected>Selecione..</option>
                                <?php
                                $result = "SELECT * FROM COMANDO";
                                $resultr = mysqli_query($con, $result);
                                while ($row = mysqli_fetch_assoc($resultr)) {
                                    ?>
                                    <option value="<?php echo $row['CMD_ID']; ?>"><?php echo $row['CMD_TITULO']; ?></option>
                                <?php } ?>                     
                            </select>
                        </div>
                    </div>    
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label>Ambiente:</label><br>
                            <select class="custom-select" name="ambiente" >
                                <option selected>Selecione..</option>
                                <?php
                                $result = "SELECT * FROM AMBIENTE WHERE AMB_ACEITAEQPS = 1";
                                $resultr = mysqli_query($con, $result);
                                while ($row = mysqli_fetch_assoc($resultr)) {
                                    ?>
                                    <option value="<?php echo $row['AMB_ID']; ?>"><?php echo $row['AMB_NOME']; ?></option>
                                <?php } ?>                     
                            </select>

                        </div>
                   
                    </div>    
                    <br>
                    <div class="form-group-button col-12">
                        <button type="submit" naid="botoes" name="adicionar" value="adicionar" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Cadastrar</button>
                        <button type="reset" id="botoes"  class="btn btn-danger"><i class="fa fa-close" aria-hidden="true"></i> Limpar</button>
                        <a id="botoes" href="TelaAgenda.php"  class="btn btn-info"><i class="fa fa-reply" aria-hidden="true"></i> Voltar</a>
                    </div>
            </div>
            </form>
            <div class="line"></div>
            <div class="jumbotron">                    
                <p>Você está na Página de Cadastro de Agenda do ControlAR!</p>
                <p>Para cadastro de agenda digite as seguintes informações: Nome da agenda; Selecione uma hora/data de início desta agenda; Selecione uma hora/data de término desta agenda; Selecione o ambiente em que esta agenda irá operar; Selecione o comando que esta agênda irá realizar.</p>                    
            </div>
        </div>
    </div>
</div>
<script src="../bootstrap/js/bootstrap.min_1.js"></script>
<script src="../bootstrap/js/bootstrap-datetimepicker.min.js"></script>
<script src="../bootstrap/js/bootstrap-datepicker.pt-BR.min_1.js"></script>
<?php include '../../resources/link/LinkValidacao.php'; ?>
<script>
    $(function () {
        $('.data_formato').datetimepicker({
            weekStart: 1,
            todayBtn: 1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0,
            showMeridian: 1,
            language: "pt-BR",
            //startDate: '+0d'
        });

        $("#form-agenda").validate({
            // FAZ A VALIDAÇÃO EM TEMPO REAL"
            onkeyup: function (element) {
                this.element(element);
            },
            onfocusout: function (element) {
                this.element(element);
            },
            rules: {
                agenda: {
                    required: true,
                    minlength: 3,
                    maxlength: 30
                },
                mensagem: {
                    rangelength: [50, 1050],
                }
            },
            messages: {
                agenda: {
                    required: "A agenda não pode ficar vazia",
                    minlength: "Mínimo de caracteres permitidos 3",
                    maxlength: "Maxímo de caracteres permitidos 30"
                },
                mensagem: {
                    required: "D",
                    minlength: "Mínimo de caracteres permitidos 50",
                    maxlength: "Maxímo de caracteres permitidos 1050"
                },
            }
        });
    });
</script>
</body>
<?php
include './Footer.php';
?>
