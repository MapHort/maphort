<?php

    if(isset($_REQUEST["login"]) && $_REQUEST["login"] == true) {

        if($_POST["usuario"] && $_POST["senha"]) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            buscandoPeloUsuario();
        }
    }

    /**
    * Estabelecendo conexão com o banco de dados
    */
    function buscandoPeloUsuario() {
        try
        {
            $connection = new PDO("mysql:host=localhost;dbname=maphort", "root", "");
            $connection->exec("set names utf8"); // Permite o armazenamento de informações com caracteres especiais
        }
        catch(PDOException $e)
        {
            echo 'Falha de conexão' . $e->getMessage();
            exit();
        }

        // buscando pelo usuário que está tentando logar
        $sql = "select * from USUARIO where nickname=? and senha=?";

        $stmt = $connection->prepare($sql);
        $stmt->bindParam(1, $_POST["usuario"]);
        $stmt->bindParam(2, $_POST["senha"]);
        
        if($stmt->execute())
        {
            $usuario = $stmt->fetch( PDO::FETCH_OBJ );
            if($usuario != null) 
            {
                $_SESSION["usuario"] = $usuario->nickname;
                header("Location: hortas.php");
            }
            else{
                $_POST["erro"] = "Usuário ou Senha incorretos.";
            }
        }
        else
        {
            echo 'Usuário não encontrado';
        }
    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Área de Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php 
        include('navbar.php');
    ?>

    <div class="container-fluid">
        <div class="col-md-6 col-md-offset-3 painel-login">
            <form action="?login=true" method="POST" >
                <h2 class="text-center"> Área de Login </h2>
                <div class="form-group col-md-12">
                    <label for="usuario">Usuário:</label>
                    <input name="usuario" class="form-control" type="text" required>
                </div>

                <div class="form-group col-md-12">
                    <label for="senha">Senha:</label>
                    <input name="senha" class="form-control" type="password" required>
                </div>

                <div class="form-group col-md-12">
                    <input type="submit" class="btn btn-large btn-block btn-success" value="Entrar"></button>
                </div>
                
                <!--Botão de cadastrar-->
                <div class="form-group col-md-12">
                    <a href="cadastro-usuario.php">
                    <strong>Cadastre-se aqui!</strong>
                    </a>
                </div>

                <div class="col-md-12 text-center">   
                    <?php
                        if(isset($_POST["erro"])) {
                            echo '<span class="alert alert-danger col-md-12">' . $_POST["erro"] . '</span>';
                        }
                    ?>
                </div>
            
            </form>
        </div>
    </div>

</body>

</html>