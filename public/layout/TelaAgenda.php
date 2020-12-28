<header>
    <?php 
    include '../../resources/link/LinkTelas.php';?>
    <title>ControlAR-Página de Agendas</title>
    <?php


    $sql3 = "SELECT A.AGD_TITULO, AM.AMB_NOME, A.AGD_DATAHORA FROM AMBIENTE AM, AGENDA A WHERE A.AMB_ID=AM.AMB_ID";
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
                        <h4>Agendas Registradas</h4>  
                    </div>
                    <div class="form-group col-md-6">
                        <a href="IncluirAgenda.php" title='Add Record' data-toggle='tooltip' class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar Agenda</a>

                    </div>
                </div> 
                 <table id="tabela-agendas" class="table table-responsive-lg table-striped table-bordered">
                     <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Titulo</th>
                                    <th>Ambiente</th>
                                    <th>Data/Hora</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($dados = mysqli_fetch_assoc($query3)) {
                                    $id = $dados ['AGD_ID'];
                                    $titulo = $dados ['AGD_TITULO'];                                    
                                    $ambiente = $dados ['AMB_NOME'];
                                    $datahora = $dados ['AGD_DATAHORA'];
                                    ?>
                                    <tr>
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $titulo; ?></td>
                                        <td><?php echo $ambiente; ?></td>
                                        <td><?php echo $datahora;?></td>
                                        <td>
                                            <a href="#modal-view-ambiente?id='<?php echo $id ?>'" title='View Record' data-toggle="modal" data-target="#modal-view-modelo"><span class='glyphicon glyphicon-eye-open'></span></a>
                                            <?php echo"    " ?>
                                            <a href="../../resources/config/ExcluirAgenda.php?id='<?php echo $id; ?>'" title='Excluir' data-confirm='Deseja excluir o item selecionado?'><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                <div class="line"></div>
                <div class="jumbotron">                    
                    <p>Você está na Página de Programação de Agendas do ControlAR!</p>
                    <p>Esta página apresenta uma visão geral de todos as agendas cadastradas no sistema. Ao lado de cada registro da tabela é possível visualizar ações de manutenção que podem ser realizadas nas agendas cadastradas. O ícone <i class="fa fa-eye"></i> apresenta mais detalhes sobre a agenda, 
                        o ícone <i class="fa fa-pencil"></i> realiza atualizações sobre a agenda, e o ícone <i class="fa fa-trash"></i> exclui a agenda caso ela não possua outros registros dependentes.</p>
                </div>
            </div>
        </div>
    </div>
    <?php
    include '../../resources/link/LinkTabela.php';?>
    <script>
                                    $(document).ready(function () {
                                        $('#tabela-agendas').DataTable();
                                    });

    </script>
</body>
<?php
        include './Footer.php';
        ?>
