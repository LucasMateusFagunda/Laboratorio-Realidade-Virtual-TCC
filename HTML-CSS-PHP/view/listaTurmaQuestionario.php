<?php
    require_once("menu.php");
    require_once("../controller/ControllerQuestionario.php");
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
        <h1>Questionario</h1>
        <hr>
        <div  style="max-height: 500px; overflow-y: auto; overflow-x: auto">
            <table cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <th class="tituloTabela">Inserir nome depois</th>
                    <th class="tituloTabela"></th>
                    <th class="tituloTabela"></th>
                </tr>
                <?php $listar = new QuestionarioController();
                    $listar->listarQuestionarioTurma($_POST['visualizarTurma']);
                ?>
            </table>
        </div>
    </div>
</body>
</html>