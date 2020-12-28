<header>
    <?php
    include '../../resources/link/LinkTelas.php';
    ?>
    <title>ControlAR-Página de Equipamentos</title>
    <?php
    $sql3 = "SELECT E.EQP_ID, E.EQP_NOME,M.MOD_NOME,A.AMB_NOME FROM EQUIPAMENTOS E, MODELO M, AMBIENTE A WHERE E.MOD_ID=M.MOD_ID AND E.AMB_ID=A.AMB_ID";
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
                        <h4>Equipamentos Registrados</h4>  
                    </div>
                    <div class="form-group col-md-6">
                        <a href="IncluirEquipamento.php" title='Add Record' data-toggle='tooltip' class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar Equipamento</a>

                    </div>
                </div>                  
                <table id="tabela-equipamentos" class="table table-responsive-lg table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Código</th>
                            <th>Nome do Equipamento</th>
                            <th>Nome do Modelo</th>
                            <th>Nome do Ambiente</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($dados = mysqli_fetch_assoc($query3)) {
                            $id = $dados ['EQP_ID'];
                            $descricao = $dados ['EQP_NOME'];
                            $modelo = $dados ['MOD_NOME'];
                            $ambiente = $dados ['AMB_NOME'];
                            ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $descricao; ?></td>
                                <td><?php echo $modelo; ?></td>
                                <td><?php echo $ambiente; ?></td>
                                <td>
                                    <a href="#modal-view-equipamento?id='<?php echo $id ?>'" title='Visualizar' data-toggle="modal" data-target="#modal-view-modelo"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <?php echo"    " ?>
                                    <a href="AlterarEquipamento.php?id='<?php echo $id; ?>'" title='Alterar' data-toggle='tooltip'><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <?php echo"    " ?>
                                    <a href="../../resources/config/ExcluirEquipamento.php?id='<?php echo $id; ?>'" title='Excluir' data-confirm='Deseja excluir o item selecionado?'><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <div class="line"></div>
                <div class="jumbotron">                    
                    <p>Você está na Página de Equipamentos Registrados no ControlAR!</p>
                    <p>Esta página apresenta uma visão geral de todos os equipamentos de condicionadores de ar cadastrados no sistema. Ao lado de cada registro da tabela é possível visualizar ações de manutenção que podem ser realizadas aos equipamentos cadastrados. O ícone <i class="fa fa-eye"></i> apresenta mais detalhes sobre o equipamento, 
                        o ícone <i class="fa fa-pencil"></i> realiza atualizações sobre o equipamento, e o ícone <i class="fa fa-trash"></i> exclui o equipamento caso ele não possua outros registros dependentes.</p>
                </div>
            </div>
        </div>
    </div>
    <?php include '../../resources/link/LinkTabela.php'; ?>
    <script>
        $(document).ready(function () {
            $('#tabela-equipamentos').DataTable();
        });

    </script>
</body>
<?php
        include './Footer.php';
        ?>
