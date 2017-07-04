<?php
// Validando se usuário está logado
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(!isset($_SESSION["usuario"])) {
        header('Location: login.php');
        exit();
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

    <div class="col-md-12 text-center texto-slogan">
        
    </div>

    <div class="container conteudo-principal">
        <div class="row">
            <div class="col-md-12 texto-introdutorio">
                <p>
                    O MapHort fornece todos os dados da horta a ser pesquisada, tal como Endereço, Plantas hortículas disponíveis, proprietário,
                    telefone e outros. Para receber informações de novas hortas na região, novas plantas hortículas disponíveis
                    e demais atualizações é necessário o cadastro em nosso site.
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="../imagens/horta-borges-03.jpg" alt="...">
                    <div class="caption">
                        <h3>Horta Comunitária do Borges</h3>
                        <p>...</p>
                        <p><a href="#" class="btn btn-sm btn-success" role="button">Leia mais...</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="../imagens/horta-borges-03.jpg" alt="...">
                    <div class="caption">
                        <h3>Horta Comunitária do Borges</h3>
                        <p>...</p>
                        <p><a href="#" class="btn btn-sm btn-success" role="button">Leia mais...</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="../imagens/horta-borges-03.jpg" alt="...">
                    <div class="caption">
                        <h3>Horta Comunitária do Borges</h3>
                        <p>...</p>
                        <p><a href="#" class="btn btn-sm btn-success" role="button">Leia mais...</a>
                    </div>
                </div>
            </div>

        </div>


    </div>

</body>

</html>