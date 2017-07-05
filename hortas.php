<?php
// Validando se usuário está logado
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(!isset($_SESSION["usuario"])) {
        header('Location: login.php');
        exit();
    }

    $listaHortas = buscarHortas();

    /**
    * Método que busca as hortas cadastradas no sistema
    */
    function buscarHortas() {
        try
        {
            $connection = new PDO("mysql:host=localhost;dbname=maphort", "root", "");
            $connection->exec("set names utf8"); // Permite o armazenamento/buscar de informações com caracteres especiais
        }
        catch(PDOException $e)
        {
            echo 'Falha de conexão' . $e->getMessage();
            exit();
        }

        // buscando pelo usuário que está tentando logar
        $sql = "select * from HORTA";

        $stmt = $connection->prepare($sql);
        $listaHortasEncontradas = array();
        if($stmt->execute())
        {
            while($horta = $stmt->fetch( PDO::FETCH_OBJ ))
            {
                if($horta != null) {
                    array_push($listaHortasEncontradas, $horta);
                }
            }
            return $listaHortasEncontradas;
        }
        else
        {
            echo 'Usuário não encontrado';
        }
    }

    function exibirHortas($lista)
    {
        foreach ($lista as $key => $value) {
            echo    '<div class="col-sm-6 col-md-4">' .
                        '<div class="thumbnail">' .
                            '<img src="imagens/horta-borges-03.jpg" alt="...">' .
                            '<div class="caption">' .
                                '<h3>' . $value->nome . '</h3>' .
                                '<label>Categoria: </label> ' . $value->categoria . '</br>' .
                                '<label>Tamanho: </label> ' . $value->tamanho . '</br>' .
                                '<label>Telefone: </label> (31) ' . $value->telefone . '</br>' .
                            '</div>' .
                        '</div>' .
                    '</div>';
        }
    }
?>

<!Doctype html>

<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Maphort</title>
</head>

<body>

    <!--Menu-->
    <?php
        include('navbar.php');
    ?>
    <!--/Menu-->
    <div class="jumbotron imagem-inicial">
        <div class="container">
            <div class="jumbotron">
                <div class="container">
                <div class="col-md-12 text-center">
                    <h2>Hortas</h2>
                </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container conteudo-principal">

        <?php
            exibirHortas(buscarHortas());
        ?>

    </div>

</body>

</html>