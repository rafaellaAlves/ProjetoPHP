<header>
    <?php
    include '../../resources/link/LinkTelas.php';?>
    <title>ControlAR-Página de Dispositivos</title>
    <?php

    $sql = "SELECT C.CDV_ID, C.CDV_NOME, C.CDV_STATUS, C.AMB_ID, A.AMB_NOME FROM CONTROL_DEVICE C, AMBIENTE A WHERE A.AMB_ID = C.AMB_ID";
    $query = mysqli_query($con, $sql);
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
                        <h4>Dispositivos Registrados</h4>  
                    </div>
                    <div class="form-group col-md-6">
                        <a href="IncluirDispositivo.php" title='Add Record' data-toggle='tooltip' class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar Dispositivo</a>

                    </div>
                </div> 
                 <table id="tabela-dispositivos" class=" table table-responsive-lg table-striped table-bordered">
                    <thead class="thead-dark">
                                <tr>
                                    <th>Código</th>
                                    <th>Nome do Dispositivo</th>
                                    <th>Status</th>
                                    <th>Nome do Ambiente</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($dados = mysqli_fetch_assoc($query)) {
                                    $id = $dados ['CDV_ID'];
                                    $dispositivo = $dados ['CDV_NOME'];
                                    $status = $dados ['CDV_STATUS'];
                                    $ambiente = $dados ['AMB_NOME'];
                                    ?>
                                    <tr>
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $dispositivo; ?></td>
                                        <td><?php if($status == 1){
                                            echo 'Ativo';
                                        }else{
                                            echo'Inativo';
                                        }?></td>
                                        <td><?php echo $ambiente; ?></td>
                                        <td>
                                            <a href="#modal-view-dispositivo?id='<?php echo $id ?>'" title='Visualizar' data-toggle="modal" data-target="#modal-view-modelo"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <?php echo"    " ?>
                                            <a href="AlterarDispositivo.php?id='<?php echo $id; ?>'" title='Alterar' data-toggle='tooltip'><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <?php echo"    " ?>
                                            <a href="../../resources/config/ExcluirDispositivo?id='<?php echo $id; ?>'" title='Excluir' data-confirm='Deseja excluir o item selecionado?'><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                <div class="line"></div>
                <div class="jumbotron">                    
                    <p>Você está na Página de Dispositivos de controle Registrados no ControlAR!</p>
                    <p>Esta página apresenta uma visão geral de todos os dispositivos de controle de condicionadores de ar cadastrados no sistema. Ao lado de cada registro da tabela é possível visualizar ações de manutenção que podem ser realizadas aos dispositivos cadastrados. O ícone <i class="fa fa-eye"></i> apresenta mais detalhes sobre o dispositivo, 
                        o ícone <i class="fa fa-pencil"></i> realiza atualizações sobre o dispositivo, e o ícone <i class="fa fa-trash"></i> exclui o dispositivo caso ele não possua outros registros dependentes.</p>
                </div>
            </div>
        </div>
    </div>
    <?php
    include '../../resources/link/LinkTabela.php';?>
    <script>
                                    $(document).ready(function () {
                                        $('#tabela-dispositivos').DataTable();
                                    });

    </script>
</body>
<?php
        include './Footer.php';
        ?>

