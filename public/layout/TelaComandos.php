<header>
    <?php 
    include '../../resources/link/LinkTelas.php';?>
    <title>ControlAR-Página de Comandos</title>
    <?php
    
    $sql3 = "SELECT * FROM COMANDO";
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
                        <h4>Comandos Registrados</h4>  
                    </div>
                    <div class="form-group col-md-6">
                        <a href="IncluirComando.php" title='Add Record' data-toggle='tooltip' class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar Comando</a>

                    </div>
                </div> 
                 <table id="tabela-comandos" class=" table table-striped table-bordered">
                     <thead class="thead-dark">
                                <tr>
                                    <th>Código</th>
                                    <th>Titulo do Comando</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($dados = mysqli_fetch_assoc($query3)) {
                                    $id = $dados ['CMD_ID'];
                                    $titulo = $dados ['CMD_TITULO'];
                                    ?>
                                    <tr>
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $titulo; ?></td>
                                        <td>
                                            <a href="#modal-view-dispositivo?id='<?php echo $id ?>'" title='Visualizar' data-toggle="modal" data-target="#modal-view-modelo"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <?php echo"    " ?>
                                            <a href="AlterarComando.php?id='<?php echo $id; ?>'" title='Alterar' data-toggle='tooltip'><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <?php echo"    " ?>
                                            <a href="../../resources/config/ExcluirComando?id='<?php echo $id; ?>'" title='Excluir' data-confirm='Deseja excluir o item selecionado?'><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                <div class="line"></div>
                <div class="jumbotron">                    
                    <p>Você está na Página de Comandos Registrados no ControlAR!</p>
                    <p>Esta página apresenta uma visão geral de todos dos comandos dos condicionadores de ar cadastradas no sistema. Ao lado de cada registro da tabela é possível visualizar ações de manutenção que podem ser realizadas aos comandos cadastrados. O ícone <i class="fa fa-eye"></i> apresenta mais detalhes sobre o comando, 
                        o ícone <i class="fa fa-pencil"></i> realiza atualizações sobre o comando, e o ícone <i class="fa fa-trash"></i> exclui o comando caso ele não possua outros registros dependentes.</p>
                </div>
            </div>
        </div>
    </div>
    <?php
    include '../../resources/link/LinkTabela.php';?>
    <script>
                                    $(document).ready(function () {
                                        $('#tabela-comandos').DataTable();
                                    });

    </script>
</body>
<?php
        include './Footer.php';
        ?>