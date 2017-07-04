<?php

    if(isset($_REQUEST["cadastro"]) && $_REQUEST["cadastro"] == true) {
        if(validarCampoObrigatorios()) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            cadastroUsuario();
        }
    }

    function validarCampoObrigatorios()
    {
        if(isset($_POST["nome"]) && $_POST["nome"] != null && isset($_POST["sexo"]) && $_POST["sexo"] != null 
        && isset($_POST["rua"]) && $_POST["rua"] != null && isset($_POST["bairro"]) && $_POST["bairro"] != null 
        && isset($_POST["numero"]) && $_POST["numero"] != null && isset($_POST["cep"]) && $_POST["cep"] != null
        && isset($_POST["telefone"]) && $_POST["telefone"] != null && isset($_POST["nickname"]) && $_POST["nickname"] != null
        && isset($_POST["senha"]) && $_POST["senha"] != null)
        {
            return true;
        }
        return false;
    }

    /**
    * Estabelecendo conexão com o banco de dados
    */
    function cadastroUsuario() {
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
        $sql = "insert into USUARIO (sexo, rua, bairro, cep, numero, telefone, nome, senha, `nickname`) values(?,?,?,?,?,?,?,?,?)";

        $stmt = $connection->prepare($sql);
        $stmt->bindParam(1, $_POST["sexo"]);
        $stmt->bindParam(2, $_POST["rua"]);
        $stmt->bindParam(3, $_POST["bairro"]);
        $stmt->bindParam(4, $_POST["cep"]);
        $stmt->bindParam(5, $_POST["numero"]);
        $stmt->bindParam(6, $_POST["telefone"]);
        $stmt->bindParam(7, $_POST["nome"]);
        $stmt->bindParam(8, $_POST["senha"]);
        $stmt->bindParam(9, $_POST["nickname"]);
        
        $stmt->execute();

        if($stmt->errorCode() != "00000")
        {
            echo 'Erro: ' . $stmt->errorCode();
        }
        else{
            header('Location: login.php');
        }
        
    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuários</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php 
        include('navbar.php');
    ?>

    <div class="container-fluid">
        <div class="col-md-6 col-md-offset-3 painel-cadastro">
            <form action="?cadastro=true" method="POST" >
                <h2 class="text-center"> Cadastro de Usuários </h2>
                <div class="form-group col-md-12">
                    <label for="nome">Nome:</label>
                    <input name="nome" class="form-control" type="text" required>
                </div>

                <div class="form-group col-md-12">
                    <label>Gênero: </label>
                    <label class="radio-inline">
                        <input type="radio" name="sexo" value="M">Masculino
                    </label>

                    <label class="radio-inline">
                        <input type="radio" name="sexo" value="F">Feminino
                    </label>
                </div>

                <div class="form-group col-md-12">
                    <label for="rua">Rua:</label>
                    <input name="rua" class="form-control" type="text" required>
                </div>
                
                <div class="form-group col-md-12">
                    <label for="bairro">Bairro:</label>
                    <input name="bairro" class="form-control" type="text" required>
                </div>
                
                <div class="form-group col-md-12">
                    <label for="numero">Número:</label>
                    <input name="numero" class="form-control" type="text" required>
                </div>
                
                <div class="form-group col-md-12">
                    <label for="cep">CEP:</label>
                    <input name="cep" class="form-control" type="text" required>
                </div>

                <div class="form-group col-md-12">
                    <label for="telefone">Telefone:</label>
                    <input name="telefone" class="form-control" type="text" required>
                </div>

                <div class="form-group col-md-12">
                    <label for="nickname">Usuário:</label>
                    <input name="nickname" class="form-control" type="text" required>
                </div>

                <div class="form-group col-md-12">
                    <label for="senha">Senha:</label>
                    <input name="senha" class="form-control" type="password" required>
                </div>

                <div class="form-group col-md-12">
                    <input type="submit" class="btn btn-large btn-block btn-success" value="Cadastrar"></button>
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