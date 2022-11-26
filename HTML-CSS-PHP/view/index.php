<?php 
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    require_once("../controller/ControllerLogin.php")
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
    <div class="box">
        <?php
            $loginController->clearLogin();

            if(isset($_POST["souAluno"])) {
                require_once("loginAluno.php");
            } else {
                require_once("loginProfessor.php");
            }
        ?>
    </div>
</body>

</html>