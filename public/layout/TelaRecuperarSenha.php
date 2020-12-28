<?php
include '../../resources/config/Conexao.php';

function Is_email($user) {
    if (filter_var($user, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

if (isset($_POST[enviar])) {

    $email = $_POST['email'];
    $novasenha = substr(md5(time()), 0, 6);
    $novasenhacrip = md5(md5($novasenha));
    $check = Is_email($email);
    $msgtitle = "Recuperação de Senha";
    $message = "Esta é sua nova senha: $novasenhacrip";


    if ($check == true) {
        if (mail($email, $msgtitle, $message)) {
            $sql1 = "SELECT * FROM USUARIO WHERE USU_EMAIL = '$email'";
            $query = mysqli_query($con, $sql1);
            if (mysqli_num_rows($query != 1)) {
                echo"<script language='javascript' type='text/javascript'>alert('Este E-mail não esta cadastrado no sistema!');window.location.href='../../public/layout/TelaLogin.php';</script>";
                die();
            } else {
                $sq2 = "UPDATE USUARIO SET USU_SENHA = $novasenhacrip WHERE USU_EMAIL = $email";
                $query2 = mysqli_query($con, $sql2);
                if (mysqli_num_rows($query) != 1) {
                    echo"<script language='javascript' type='text/javascript'>alert('Erro, não foi possível recuperar senha!');window.location.href='../../public/layout/TelaLogin.php';</script>";
                    die();
                }
            }
            echo"<script language='javascript' type='text/javascript'>alert('Sua nova senha foi enviada, verifique sua caixa de  E-mail.');window.location.href='../../public/layout/TelaLogin.php';</script>";
            die();
        } else {
            echo"<script language='javascript' type='text/javascript'>alert('Error, function mail()!');window.location.href='../../public/layout/TelaLogin.php';</script>";
            die();
        }
    } else {
        echo"<script language='javascript' type='text/javascript'>alert('E-mail inválido. Preencha novamente!');window.location.href='../../public/layout/TelaLogin.php';</script>";
        die();
    }
}
?>

<header>
    <title>ControlAR-Recuperar Senha</title>
    <?php include '../../resources/link/LinkLogin.php'; ?>
</header>
<div class="main">


    <div class="container">
        <center>
            <div class="middle">
                <div id="login">
                    <h3 style="color: white"><i class="fa fa-lock"></i> Recuperar Senha!</h3>
                    <form action="" method="POST">

                        <fieldset class="clearfix">

                            <p ><span class="fa fa-user"></span><input name="email" type="email"  Placeholder="E-mail" required></p> <!-- JS because of IE support; better: placeholder="Username" -->

                            <div>
                                <span style="width:100%; text-align:right;  display: inline-block;"><input type="submit" name="enviar" value="Enviar"></span>
                            </div>

                        </fieldset>
                        <div class="clearfix"></div>
                    </form>

                    <div class="clearfix"></div>

                </div> <!-- end login -->
                <div class="logo">
                    <img  id="slogan" src="../img/Slogan_ControlAR-semFundo23.png" alt="">
                    <div class="clearfix"></div>
                </div>

            </div>
        </center>
    </div>

</div>
<?php include './Footer.php'; ?>
