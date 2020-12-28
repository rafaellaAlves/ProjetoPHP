
<header>
    <title>CONTROLAR: Sistema para Controle de Condicionadores de Ar</title>
    <?php include '../../resources/link/LinkLogin.php';?>
</header>
<div class="main">


    <div class="container">
        <center>
            <div class="middle">
                <div id="login">

                    <form action="../../resources/config/AutenticacaoLogin.php" method="POST">

                        <fieldset class="clearfix">

                            <p ><span class="fa fa-user"></span><input name="username" type="text"  Placeholder="E-mail/Username" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
                            <p><span class="fa fa-lock"></span><input name="senha" type="password"  Placeholder="Senha" required></p> <!-- JS because of IE support; better: placeholder="Password" -->

                            <div>
                                <span style="width:48%; text-align:left;  display: inline-block;"><a  href="TelaRecuperarSenha.php">Esqueceu sua Senha?</a></span>
                                <span style="width:50%; text-align:right;  display: inline-block;"><input type="submit" value="Entrar"></span>
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
<?php
        include './Footer.php';
        ?>