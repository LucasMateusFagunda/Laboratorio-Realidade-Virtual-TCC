<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once("../controller/ControllerTurma.php");
require_once("../controller/ControllerQuestionario.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/menu.css">
</head>

<body>
    <?php include_once("menu.php") ?>
    <div class="box">
        <form method="post" action="../controller/ControllerQuestionario.php" name="questionario">
            <div>

                <h1>Cadastrar Questionário</h1>

                <select name="turma" id="turma">
                    <?php
                    $turma = new TurmaController();
                    $turma->listarTurma();
                    ?>
                </select> <br>

                <input type="text" name="questionarioOption" list="questionarioOption" placeholder="Digite o questionario" required autofocus>
                <datalist id="questionarioOption">
                    <?php
                    $questionario = new QuestionarioController();
                    $questionario->listarQuestionario();
                    ?>
                </datalist> <br>

                <input type="text" id="pergunta" name="pergunta" placeholder="Pergunta" required> <br>
                <input type="text" id="alt1" name="alt1" placeholder="Alternativa 1" required> <br>
                <input type="text" id="alt2" name="alt2" placeholder="Alternativa 2" required> <br>
                <input type="text" id="alt3" name="alt3" placeholder="Alternativa 3" required> <br>
                <input type="text" id="alt4" name="alt4" placeholder="Alternativa 4" required> <br>
            </div>
            <div>
                <button type="submit" name="cadastrarPergunta" value="cadastrar">Cadastrar</button>
            </div>
        </form>
    </div>
</body>

</html>