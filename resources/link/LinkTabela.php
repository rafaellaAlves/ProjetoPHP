<script src="../../public/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="../../public/bootstrap/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
<script src="../../public/js/Excluir.js" type="text/javascript"></script>
<script type="text/javascript">
    <?php $id1 = $_GET['id'];
                include '../../resources/config/Conexao.php';
            $sql = "SELECT USU_ID, USU_NOME, USU_EMAIL, USU_LOGIN, USU_PERFIL FROM USUARIO WHERE USU_ID = $id1";
            $query = mysqli_query($con, $sql);
            while ($dados = mysqli_fetch_assoc($query)) {
                            $idusuario = $dados ['USU_ID'];
                            $nomeusuario = $dados ['USU_NOME'];
                            $emailusuario = $dados ['USU_EMAIL'];
                            $loginusuario = $dados ['USU_LOGIN'];
                            $perfilusuario = $dados ['USU_PERFIL'];
            }
            ?>
    $(document).ready(function () {
        $('a[data-confirm2]').click(function (ev) {
            
            if (!$('#confirm-vizu').length) {
                $('body').append('<div class="modal fade" id="confirm-vizu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header bg-secundary text-white">Usuário<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><table id="tabela-usuario-modal" class=" table table-borderless-light">\n\
<thead><tr><th scope="col" style="text-align: center;">ID</th><th scope="col" style="text-align: center;">Nome</th><th scope="col" style="text-align: center;">Login</th>\n\
<th scope="col" style="text-align: center;">E-mail</th><th scope="col" style="text-align: center;">Perfil</th></tr>  </thead>\n\
<tbody> <tr> <td><?php echo $idusuario; ?></td><td><?php echo $nomeusuario; ?></td> <td><?php echo $loginusuario; ?></td> <td><?php echo $emailusuario; ?></td>\n\
<td>  </tr> </tbody></table></div><div class="modal-footer"><button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataComfirmOK">Excluir</a></div></div></div></div>'');
            }
            $
            $('#confirm-vizu').modal({show: true});
            return false;

        });
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
