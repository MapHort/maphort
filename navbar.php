<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // usuário irá sair do sistema
    function sair() {
        unset($_SESSION["usuario"]);
        header('Location: index.php');
    }

    function mostrarBotaoSair()
    {
        if(isset($_SESSION["usuario"])) {
            return '<li><a href="?sair=true">Sair</a></li>';
        }
        return '';
    }

    function mostrarInformacoesUsuario()
    {
        if(isset($_SESSION["usuario"])) {
            return '<span>Bem vindo, <strong> ' . $_SESSION["usuario"] . '</strong>!<span>';
        }
    }

    if(isset($_GET['sair']) && $_GET['sair'] == true) {
        sair();
    }

?>

<!--Menu-->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="#" class="navbar-brand" style="border-right:2px solid #ccc;">
                <span>MAPHORT</span>
            </a>
            <div class="pull-left" style="padding:15px;">
                <?php echo mostrarInformacoesUsuario(); ?>
            </div>
        </div>
        <div class="collapse navbar-collapse navbar-right" id="menu-principal">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="sobre.php">Sobre</a></li>
                <li><a href="hortas.php">Hortas</a></li>
                <?php
                    echo mostrarBotaoSair();                    
                ?>
            </ul>
        </div>
    </div>
</nav>
<!--/Menu-->