<header>
    <?php 
    include '../../resources/link/LinkTelas.php';?>
    <title>ControlAR-Página de Ambientes</title>
    <?php

    $sql3 = "SELECT AMB_ID, AMB_NOME, AMB_PAI_ID, AMB_STATUS FROM AMBIENTE ORDER BY AMB_NOME";
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
                        <h4>Ambientes Registrados</h4>  
                    </div>
                    <div class="form-group col-md-6">
                        <a href="IncluirAmbiente.php" title='Add Record' data-toggle='tooltip' class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar Ambiente</a>

                    </div>
                </div> 
                 <table id="tabela-ambientes" class="table table-responsive-lg table-striped table-bordered">
                     <thead class="thead-dark">
                                <tr>
                                    <th>Código</th>
                                    <th>Nome do Ambiente</th>
                                    <th>Status</th>
                                    <th>Ambiente Superior</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($dados = mysqli_fetch_assoc($query3)) {
                                    $id = $dados ['AMB_ID'];
                                    $ambiente = $dados ['AMB_NOME'];
                                    $status = $dados ['AMB_STATUS'];
                                    $ambiente2 = $dados ['AMB_PAI_ID'];
                                    ?>
                                    <tr>
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $ambiente;?></td>
                                        <td><?php if($status == 1){
                                            echo 'Ativo';
                                        }else{
                                            echo 'Inativo';
                                        }?>
                                        <td><?php
                                            $sql1 = "SELECT AMB_NOME FROM AMBIENTE WHERE AMB_ID = $ambiente2";
                                            $query2 = mysqli_query($con, $sql1);         
                                            $dados1 = mysqli_fetch_assoc($query2);
                                            $ambiente1 = $dados1['AMB_NOME'];
                                            if($ambiente1 == NULL){
                                                echo 'Não Possui';
                                            }else                                   
                                            echo  $ambiente1;                                   
                                     ?></td>
                                        <td>
                                            <a href="#modal-view-ambiente?id='<?php echo $id ?>'" title='Visualizar' data-toggle="modal" data-target="#modal-view-modelo"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <?php echo"    " ?>
                                            <a href="AlterarAmbiente.php?id='<?php echo $id ?>'" title='Alterar' data-toggle='tooltip'><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <?php echo"    " ?>
                                            <a href="../../resources/config/ExcluirAmbiente.php?id='<?php echo $id ?>'"  title='Excluir' data-confirm='Deseja excluir o item selecionado?'><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                <div class="line"></div>
                <div class="jumbotron">                    
                    <p>Você está na Página de Ambientes Registrados no ControlAR!</p>
                    <p>Esta página apresenta uma visão geral de todos os ambientes cadastrados no sistema. Ao lado de cada registro da tabela é possível visualizar ações de manutenção que podem ser realizadas aos ambientes cadastrados. O ícone <i class="fa fa-eye"></i> apresenta mais detalhes sobre o ambiente, 
                        o ícone <i class="fa fa-pencil"></i> realiza atualizações sobre o ambiente, e o ícone <i class="fa fa-trash"></i> exclui o ambiente caso ele não possua outros registros dependentes.</p>
                </div>
            </div>
        </div>
    </div>
    <?php
    include '../../resources/link/LinkTabela.php';?>
    <script>
                                    $(document).ready(function () {
                                        $('#tabela-ambientes').DataTable();
                                    });

    </script>
</body>
<?php
        include './Footer.php';
        ?>
