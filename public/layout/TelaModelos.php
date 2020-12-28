<header>
    <?php 
    include '../../resources/link/LinkTelas.php';?>
    <title>ControlAR-Página de Modelos</title>
    
    <?php
    $sql3 = "SELECT M.MOD_ID, M.MOD_NOME, MA.MCA_NOME FROM MODELO M, MARCA MA WHERE M.MCA_ID = MA.MCA_ID";
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
                        <h4>Modelos Registrados</h4>  
                    </div>
                    <div class="form-group col-md-6">
                        <a href="IncluirModelo.php" title='Add Record' data-toggle='tooltip' class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar Modelo</a>

                    </div>
                </div>                    
                <table id="tabela-modelo" class=" table table-responsive-lg table-striped table-bordered" >
                    <thead class="thead-dark">
                                <tr>
                                    <th>Código</th>
                                    <th>Nome do Modelo</th>
                                    <th>Nome da Marca</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($dados = mysqli_fetch_assoc($query3)) {
                                    $id = $dados ['MOD_ID'];
                                    $nome = $dados ['MOD_NOME'];
                                    $nomemarca = $dados ['MCA_NOME'];
                                    ?>
                                    <tr>
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $nome; ?></td>
                                        <td><?php echo $nomemarca; ?></td>
                                        <td>
                                            <a href="#modal-view-modelo?id='<?php echo $id ?>'" title='Visualizar' data-toggle="modal" data-target="#modal-view-modelo"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <?php echo"    " ?>
                                            <a href="AlterarModelo.php?id='<?php echo $id; ?>'" title='Atualizar' data-toggle='tooltip'><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <?php echo"    " ?>
                                            <a href="../../resources/config/ExcluirModelo.php?id='<?php echo $id; ?>'" title='Excluir' data-confirm='Deseja excluir o item selecionado?'><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            <?php echo"    " ?>
                                            <a href="IncluirComando.php?id='<?php echo $id; ?>'" title='Adicionar Comando' ><i class="fa fa-plus" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                <div class="line"></div>
                <div class="jumbotron">                    
                    <p>Você está na Página de Modelo Registrados no ControlAR!</p>
                    <p>Esta página apresenta uma visão geral de todos os modelos de condicionadores de ar cadastrados no sistema. Ao lado de cada registro da tabela é possível visualizar ações de manutenção que podem ser realizadas aos equipamentos cadastrados. O ícone <i class="fa fa-eye"></i> apresenta mais detalhes sobre o modelo, 
                        o ícone <i class="fa fa-pencil"></i> realiza atualizações sobre o modelo, e o ícone <i class="fa fa-trash"></i> exclui o modelo caso ele não possua outros registros dependentes. Também é possivel cadastrar um comando referente a um modelo específico.</p>                 
                    <p>Para adicionar um novo comando click na opção de ação <i class="fa fa-plus"></i></p>
                </div>
            </div>
        </div>
    </div>
    <?php
    include '../../resources/link/LinkTabela.php';?>
    <script>
                                    $(document).ready(function () {
                                        $('#tabela-modelo').DataTable();
                                    });

    </script>
</body>
<?php
        include './Footer.php';
        ?>

<div class="modal fade" id="modal-view-modelo">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 600px; ">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Modelo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>  
            </div>
            <div class="modal-body">
                <table id="tabela-modelo" class=" table table-borderless-light">
                    <thead>
                        <tr>
                            <th scope="col" style="text-align: center;">ID</th>
                            <th scope="col" style="text-align: center;">Modelo</th>
                            <th scope="col" style="text-align: center;">ID Marca</th>
                            <th scope="col" style="text-align: center;">Marca</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $id1 = $_POST['id'];

                        $sql2 = "select m.mod_id, m.mod_nome, m.mca_id, ma.mca_nome from modelo m, marca ma where m.mca_id = ma.mca_id and mod_id = $id1 ";

                        $query2 = mysqli_query($con, $sql2);
                        while ($dados = mysqli_fetch_assoc($query2)) {
                            $id2 = $dados ['mod_id'];
                            $nome = $dados ['mod_nome'];
                            $idmarca = $dados['mca_id'];
                            $nomemarca = $dados ['mca_nome'];
                            ?>
                            <tr>
                                <td><?php echo utf8_encode($id2); ?></td>
                                <td><?php echo utf8_encode($nome); ?></td>
                                <td><?php echo utf8_encode($idmarca); ?></td>
                                <td><?php echo utf8_encode($nomemarca); ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




