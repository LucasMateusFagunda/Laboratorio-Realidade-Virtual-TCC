<?php
    require_once("../controller/ControllerListarTurma.php");
    require_once("../controller/ControllerListarQuestionario.php");
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
        <form method="post" action="../controller/ControllerCadastroQuestionario.php" id="form" name="form">
            <div>

                <select name="turma" id="turma">
                    <?php new listarTurmaController(); ?>
                </select> <br>

                <input type="text" name="questionarioOption" list="questionarioOption" placeholder="Digite o questionario" required autofocus>
                <datalist id="questionarioOption">
                    <?php new listarQuestionarioController(); ?>
                </datalist> <br>

                <input type="text" id="pergunta" name="pergunta" placeholder="Pergunta" required> <br>
                <input type="text" id="alt1" name="alt1" placeholder="Alternativa 1" required> <br>
                <input type="text" id="alt2" name="alt2" placeholder="Alternativa 2" required> <br>
                <input type="text" id="alt3" name="alt3" placeholder="Alternativa 3" required> <br>
                <input type="text" id="alt4" name="alt4" placeholder="Alternativa 4" required> <br>
            </div>
            <div>
                <button type="submit" id="cadastrarPergunta">Cadastrar</button>
            </div>
        </form>
    </div>
</body>
</html>