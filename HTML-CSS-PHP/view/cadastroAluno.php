<?php
require_once("../controller/ControllerAluno.php");
require_once("../controller/ControllerTurma.php");
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
    <?php include("menu.php"); ?>
    <div class="box">
        <h1>Cadastrar Alunos</h1>
        <form method="POST" action="../controller/ControllerAluno.php" name="aluno">
            <div>
                <select name="turma" id="turma">
                    <?php
                    $turma = new TurmaController();
                    $turma->listarTurma();
                    ?>
                </select> <br>
                <input type="text" name="nome" placeholder="Nome do aluno" required autofocus> <br>
                <input type="text" name="matricula" placeholder="Matrícula" required>
            </div>
            <div>
                <button type="submit" name="cadastrarAluno" value="cadastrar">Cadastrar</button>
            </div>
        </form>
    </div>
</body>

</html>