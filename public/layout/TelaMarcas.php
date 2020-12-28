<header>
    <?php 
    include '../../resources/link/LinkTelas.php';?>
    <title>ControlAR-Página de Marcas</title>
    <?php

    $sql3 = "SELECT * FROM MARCA ORDER BY MCA_NOME";
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
                        <h4>Marcas Registradas</h4>  
                    </div>
                    <div class="form-group col-md-6">
                        <a href="IncluirMarca.php" title='Add Record' data-toggle='tooltip' class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar Marca</a>

                    </div>
                </div>               
                <table id="tabela-marca" class=" table table-responsive-lg table-striped table-bordered">
                    <thead class="thead-dark">
                                <tr>
                                    <th>Código</th>
                                    <th>Nome da Marca</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($dados = mysqli_fetch_assoc($query3)) {
                                    $id = $dados ['MCA_ID'];
                                    $marca = $dados ['MCA_NOME'];
                                    ?>
                                    <tr>
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo utf8_encode($marca); ?></td>
                                        <td>
                                            <a href="#modal-view-marca?id='<?php echo $id ?>'" title='Visualizar' data-toggle="modal" data-target="#modal-view-modelo"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <?php echo"    " ?>
                                            <a href="AlterarMarca.php?id='<?php echo $id; ?>'" title='Alterar' data-toggle='tooltip'><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <?php echo"    " ?>
                                            <a href="../../resources/config/ExcluirMarca.php?id='<?php echo $id; ?>'"title='Excluir' data-confirm='Deseja excluir o item selecionado?'><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                <div class="line"></div>
                <div class="jumbotron">                    
                    <p>Você está na Página de Marcas Registradas no ControlAR!</p>
                    <p>Esta página apresenta uma visão geral de todos as marcas  cadastradas no sistema. Ao lado de cada registro da tabela é possível visualizar ações de manutenção que podem ser realizadas as marcas cadastradas. O ícone <i class="fa fa-eye"></i> apresenta mais detalhes sobre a marca, 
                        o ícone <i class="fa fa-pencil"></i> realiza atualizações sobre a marca, e o ícone <i class="fa fa-trash"></i> exclui a marca caso ele não possua outros registros dependentes.</p>
                </div>
            </div>
        </div>
    </div>
    <?php
    include '../../resources/link/LinkTabela.php';?>
    <script>
                                    $(document).ready(function () {
                                        $('#tabela-marca').DataTable();
                                    });

    </script>
</body>
<?php
        include './Footer.php';
        ?>
