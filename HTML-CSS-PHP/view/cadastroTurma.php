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
        <form method="POST" action="../controller/ControllerTurma.php" id="form" name="form">
            <div>
                <h1>Cadastrar Turma</h1>
            </div>
            <div>
                <input type="text" id="nome" name="nome" placeholder="Nome da turma" required autofocus>
            </div>
            <div>
                <button type="submit" name="cadastrarTurma" id="cadastrarTurma">Cadastrar</button>
            </div>
        </form>
    </div>
</body>
</html>