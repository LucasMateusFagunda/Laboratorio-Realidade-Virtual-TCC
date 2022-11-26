<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once("../controller/ControllerAluno.php");
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
        <h1>Alunos</h1>
        <form method="POST" action="../controller/ControllerAluno.php" name="aluno">
            <div><table cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <th class="tituloTabela">Turma</th>
                    <th class="tituloTabela">Nome</th>
                    <th class="tituloTabela">Matricula</th>
                    <th class="tituloTabela"></th>
                </tr>
                <?php
                    $aluno = new AlunoController();
                    $aluno->listarAlunos();
                ?>
            </table>
                
            </div>
        </form>
    </div>
</body>

</html>