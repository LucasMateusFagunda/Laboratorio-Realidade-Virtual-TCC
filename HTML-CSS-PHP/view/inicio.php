<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once("../controller/ControllerTurma.php");
require_once("../controller/ControllerQuestionario.php")
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
        <?php
        if ($_SESSION['status'] == 'professor') {
            echo "
            <h1>Turmas</h1>
            <hr>
            <div  style='max-height: 500px; overflow-y: auto; overflow-x: hidden'>
                <table cellspacing='0' cellpadding='0' width='100%'>
                    <tr>
                        <th class='tituloTabela'>Turma</th>
                        <th class='tituloTabela'></th>
                        <th class='tituloTabela'></th>
                    </tr>
            ";
                
                $turma = new TurmaController();
                $turma->listarTabelaTurma();
        } else if($_SESSION['status'] == 'aluno') {
            echo "
                <h1>Questionários</h1>
                <hr>
                <div  style='max-height: 500px; overflow-y: auto; overflow-x: hidden'>
                    <table cellspacing='0' cellpadding='0' width='100%'>
                        <tr>
                        <th class='tituloTabela'>Questionários</th>
                        <th class='tituloTabela'></th>
                        </tr>
            ";
                $questionario = new QuestionarioController;
                $questionario->listaQuestionarioPorAluno();

        }
        ?>
            </table>
        </div>
    </div>
</body>

</html>