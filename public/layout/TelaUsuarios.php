<header>
    <?php include '../../resources/link/LinkTelas.php'; ?>
    <title>ControlAR-Página de Usuários</title>
    <?php
    $sql3 = "SELECT USU_ID, USU_NOME, USU_EMAIL, USU_LOGIN, USU_PERFIL FROM USUARIO ORDER BY USU_NOME";
    $query3 = mysqli_query($con, $sql3);
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
                <div class="row">
                    <div class="form-group col-md-6">
                        <h4>Usuários Registrados</h4>  
                    </div>
                    <div class="form-group col-md-6">
                        <a  href="IncluirUsuario.php" title='Add Record' data-toggle='tooltip' class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar Usuário</a>
                    </div>
                </div>                                    
                <table id="tabela-usuario" class="table table-responsive-sm table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th >Código</th>
                            <th >Nome do Usuário</th>
                            <th >E-mail</th>
                            <th >Perfil do Usuário</th>
                            <th >Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($query3)) { ?>
                            <tr>
                                <td><?php echo $row['USU_ID']; ?></td>
                                <td><?php echo $row['USU_NOME']; ?></td>
                                <td><?php echo $row['USU_EMAIL']; ?></td>
                                <td> 
                                    <?php
                                    if ($row['USU_PERFIL'] == 1) {
                                        echo 'Administrador';
                                    } else {
                                        echo 'Operador';
                                        ?>
                                    <?php } ?>
                                <td>
                                    <button type="button" class="btn btn-light" data-toggle="modal" data-target="#myModal<?php echo $row['USU_ID']; ?>"><i class="fa fa-eye" aria-hidden="true"></i></button>
    <?php echo"    " ?>
                                    <a href="AlterarUsuario.php?id='<?php echo $row['USU_ID']; ?>'" title='Alterar' data-toggle='tooltip'><i class="fa fa-pencil" aria-hidden="true"></i></a>
    <?php echo"    " ?>
                                    <a href="../../resources/config/ExcluirUsuario.php?id='<?php echo $row['USU_ID']; ?>'"title='Excluir' data-confirm='Deseja excluir o item selecionado?'><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            <!-- Inicio Modal -->
                        <div class="modal fade" id="myModal<?php echo $row['USU_ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title text-center" id="myModalLabel">Visualizar Usuário</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        
                                    </div>
                                    <div class="modal-body">
                                        <label>Código: </label>
                                        <p><?php echo $row['USU_ID']; ?></p>
                                        <label>Nome do Usuário: </label>
                                        <p><?php echo $row['USU_NOME']; ?></p>
                                        <label>E-mail do Usuário: </label>
                                        <p><?php echo $row['USU_EMAIL']; ?></p>
                                        <label>Login: </label>
                                        <p><?php echo $row['USU_LOGIN']; ?></p>
                                        <label>Perfil do usuário: </label>
                                        
                                    <?php
                                    if ($row['USU_PERFIL'] == 1) {
                                        echo 'Administrador';
                                    } else {
                                        echo 'Operador';
                                        ?>
                                    <?php } ?>
                                
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fim Modal -->
<?php } ?>
                    </tbody>

                </table> 
                <div class="line"></div>
                <div class="jumbotron">                    
                    <p>Você está na Página de Usuários Registrados no ControlAR!</p>
                    <p>Esta página apresenta uma visão geral de todos os usuários cadastrados no sistema. Ao lado de cada registro da tabela é possível visualizar ações de manutenção que podem ser realizadas aos usuário cadastrados. O ícone <i class="fa fa-eye"></i> apresenta mais detalhes sobre o usuário, 
                        o ícone <i class="fa fa-pencil"></i> realiza atualizações sobre o usuário, e o ícone <i class="fa fa-trash"></i> exclui o usuário caso ele não possua outros registros dependentes.</p>
                </div>
            </div>
        </div>
    </div>
<?php include '../../resources/link/LinkTabela.php'; ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#tabela-usuario').DataTable();

        });
    </script>
</body>
<?php
include './Footer.php';
?>



