<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include_once("menu.php") ?>
    <div>
        <form method="post" action="../controller/ControllerCadastroTurma.php" id="form" name="form">
            <div>
                <input type="text" id="nome" name="nome" placeholder="Nome da turma" required autofocus>
            </div>
            <div>
                <button type="submit" id="cadastrarTurma">Cadastrar</button>
            </div>
        </form>
    </div>
</body>
</html>