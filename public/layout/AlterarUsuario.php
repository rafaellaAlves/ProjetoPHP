<header>
    <?php
    include '../../resources/link/LinkFormulario.php';
    
    if($_GET['id'] == NULL){
        echo"<script language='javascript' type='text/javascript'>alert('Escolha um registro antes de realizar esta operação!!');window.location.href='TelaUsuarios.php';</script>";
        die();
    }else{
    $id = $_GET["id"];

    $sql = "SELECT * FROM USUARIO WHERE USU_ID = $id";
    $query = mysqli_query($con, $sql);

    if ($row = mysqli_fetch_assoc($query)) {
        $nomeusu = $row['USU_NOME'];
        $loginusu = $row['USU_LOGIN'];
        $emailusu = $row['USU_EMAIL'];
        $senhausu = $row['USU_SENHA'];
        $perfilusu = $row['USU_PERFIL'];
    }
    }
    ?>
    <script type="text/javascript" src="../js/checkbox.js"></script>
    <title>ControlAR-Alteração de Usuário</title>
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
                <h4><i class="fa fa-user-circle-o"></i> Alterar Usuário</h4><br>
                <form action="../../resources/config/Usuario.php" method="POST" id="form-usuario">
                    <div class="form-row">
                        <input type="hidden" name="id" class="form-control" readonly value="<?php echo $id ?>"/>
                        <div class="form-group col-md-6" id="nome">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome"placeholder="Nome Completo"  value="<?php echo $nomeusu ?> "required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="login">Login</label>
                            <input type="text" class="form-control" name="login" id="login" placeholder="Nome de Usuário" value="<?php echo $loginusu ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $emailusu ?>"required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="senha">Senha</label>
                            <input type="password" class="form-control" name="senha" id="senha"  value="<?php echo $senhausu ?> " disabled >
                        </div>
                    </div>                    
                    <div class="form-group">
                        <label for="perfil">Perfil do usuário</label>
                        <?php if($perfilusu == 1){?>
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input"onclick="checagem(this.id)"id="customCheck" checked="true" value="1" name="perfil[]">
                            <label class="custom-control-label" for="customCheck">Administrador</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="customCheck2" onclick="checagem(this.id)" value="0" name="perfil[]">
                            <label class="custom-control-label" for="customCheck2">Operador</label>
                        </div>
                        <?php }else{?>
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input"onclick="checagem(this.id)"id="customCheck" value="1" name="perfil[]">
                            <label class="custom-control-label" for="customCheck">Administrador</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="customCheck2" onclick="checagem(this.id)" checked="true" value="0" name="perfil[]">
                            <label class="custom-control-label" for="customCheck2">Operador</label>
                        </div>
                        <?php }?>
                    </div>
                    <br>
                    <div class="form-group-button col-12">
                        <button type="submit"  name="alterar" value="alterar" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Alterar</button>
                        <button type="reset" class="btn btn-danger"><i class="fa fa-close" aria-hidden="true"></i> Limpar</button>
                        <a href='TelaUsuarios.php' class="btn btn-info" title='Excluir' data-confirm='Deseja excluir o item selecionado?'><i class="fa fa-reply" aria-hidden="true"></i> Voltar</a>
                    </div>
                </form>
                <div class="line"></div>
                <div class="jumbotron">                    
                    <p>Você está na Página de Alteração de Usuário do ControlAR!</p>
                    <p>Para alterar o usuário modifique as infomações a cima que desejar, caso não desejar realizar modificações, para retornar a lista de dispositivos clique na opção <i class="fa fa-reply"></i> Voltar.</p>                    
                </div>
            </div>
        </div>
    </div>
<?php
    include '../../resources/link/LinkValidacao.php';
    ?>
    <script language="JavaScript">
    $(document).ready(function () {
        $('a[data-confirm]').click(function (ev) {
            var href = $(this).attr('href');
            if (!$('#confirm-delete').length) {
                $('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header bg-secundary text-white">EXCLUIR ITEM<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Deseja excluir o item selecionado?</div><div class="modal-footer"><button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataComfirmOK">Excluir</a></div></div></div></div>');
            }
            $('#dataComfirmOK').attr('href', href);
            $('#confirm-delete').modal({show: true});
            return false;

        });
    });
    </script>
    
</body>
<?php
    include './Footer.php';
    ?>

