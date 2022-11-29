<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
};
require_once("../controller/ControllerAluno.php");
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
    <?php
        include("menu.php");
    ?>
    <div class="box">
        <h1>Associação de alunos</h1>
        <hr>

        <form method="POST" action="../controller/ControllerAluno" name="form">

        
        <select name="idaluno" id="aluno">
            <?php
            $aluno = new AlunoController;
            $aluno->listarAlunoLista();
            ?>
        </select> <br>

        <select name="idquestionario" id="questionario">
            <?php
            $questionario = new QuestionarioController;
            $questionario->listarQuestionarioLista();
            ?>
        </select> <br>

        <button type="submit" name="associar">Associar</button>

        </form>

        <div  style="max-height: 500px; overflow-y: auto; overflow-x: hidden">
            <table cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <th class="tituloTabela">Aluno</th>
                    <th class="tituloTabela">Questionário</th>
                    <th class="tituloTabela"></th>
                </tr>
                <?php
                    $aluno = new AlunoController;
                    $aluno->listarAssociacao();
                ?>
            </table>
        </div>

    </div>
</body>

</html>