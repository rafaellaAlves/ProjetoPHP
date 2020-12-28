<header>
    <?php
    include '../../resources/link/LinkFormulario.php';
    ?>
    <script type="text/javascript" src="../js/checkbox.js"></script>
    <title>ControlAR-Cadastro de Usuário</title>
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
                <h4><i class="fa fa-user-circle-o"></i> Cadastro de Usuário</h4><br>
                <form action="../../resources/config/Usuario.php" method="POST" id="form-usuario" style="margin-right: 3px;">
                    <div class="form-row">
                        <div class="form-group col-md-6" id="nome">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome"placeholder="Nome Completo" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="login">Login</label>
                            <input type="text" class="form-control" name="login" id="login" placeholder="Nome de Usuário" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="senha">Senha</label>
                            <input type="password" class="form-control" name="senha" id="senha" placeholder="6 a 10 dígitos" required>
                        </div>
                    </div>                    
                    <div class="form-group">
                        <label for="perfil">Perfil do usuário</label>
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input"onclick="checagem(this.id)"id="customCheck" value="1" name="perfil[]">
                            <label class="custom-control-label" for="customCheck">Administrador</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="customCheck2" onclick="checagem(this.id)" value="0" name="perfil[]">
                            <label class="custom-control-label" for="customCheck2">Operador</label>
                        </div>
                    </div>
                    <br>
                    <div class="form-group-button col-12">
                        <button type="submit" name="adicionar" value="adicionar" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Cadastrar</button>
                        <button type="reset"  class="btn btn-danger"><i class="fa fa-close" aria-hidden="true"></i> Limpar</button>
                        <a href='TelaUsuarios.php' data-confirm='Isto irá desfazer todas as alterações. Deseja voltar a tela de registros?' class="btn btn-info"><i class="fa fa-reply" aria-hidden="true"></i> Voltar</a>
                    </div>
                </form>
                <div class="line"></div>
                <div class="jumbotron">                    
                    <p>Você está na Página de Cadastro de Usuário do ControlAR!</p>
                    <p>Para cadastro de usuário digite as seguintes informações: Nome completo do usuário; Nome de usuário ficticio; E-mail do usuário; Senha de no mínimo 6 caracteres, incluindo letras(maiúsculas e minúsculas) e números; Informe se é um usuário 'Administrador' ou 'Operador' do sistema;</p>                    
                </div>
            </div>
        </div>
    </div>
    <?php
    include '../../resources/link/LinkValidacao.php';
    ?>
    <script type="text/javascript" src="../js/ValidacaoUsuario.js"></script>
</body>
<?php
    include './Footer.php';
    ?>