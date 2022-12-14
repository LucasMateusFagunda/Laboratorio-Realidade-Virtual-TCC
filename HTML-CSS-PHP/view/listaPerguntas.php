<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    require_once("menu.php");
    require_once("../controller/ControllerPerguntas.php");
    require_once("../controller/ControllerQuestionario.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="box">
        <h1>Perguntas</h1>
        <hr>
        <div  style="max-height: 500px; overflow-y: auto; overflow-x: auto">
            <table cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <th class="tituloTabela">Pergunta</th>
                    <th class="tituloTabela">Alternativa 1</th>
                    <th class="tituloTabela">Alternativa 2</th>
                    <th class="tituloTabela">Alternativa 3</th>
                    <th class="tituloTabela">Alternativa 4</th>
                    <th class="tituloTabela"></th>
                </tr>
                <?php
                    $listar = new Perguntas();
                    if(isset($_POST['visualizarTitulo'])) {
                        $listar->listarPerguntas($_POST['visualizarTitulo'], $_POST['visualizarTurma']);
                    } else if(isset($_POST['visualisarQuestionario'])) {
                        $listar;
                    } else {
                        echo "
                            <tr>
                                <th>
                                Este Questionário não possui perguntas
                                </th>

                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                     ";
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>