<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once("../model/login.php");

class LoginController {
    private $login;
    private $banco;

    public function __construct()
    {
        $this->login = new Login();
        $this->banco = new Banco();
    }

    public function loginProfessor() {
        $this->login->setEmail($_POST["email"]);
        $this->login->setSenha($_POST["senha"]);
        $this->login->setStatus("professor");
        $row = $this->banco->checkLoginProfessor($_SESSION["email"], $_SESSION["senha"]);

        foreach($row as $value) {
            $this->login->setIdProfessor($value["idprofessor"]);
            $this->login->setNomeProfessor($value["nome"]);
            $this->login->setEmail($value["email"]);
            $this->login->setSenha($value["senha"]);
        }

        if($row != null) {
            header("location: ../view/inicio.php");
        } else {
            header("location: ../view/index.php");
        }
    }


    public function clearLogin() {
        $this->login->setIdProfessor(null);
        $this->login->setNomeProfessor(null);
        $this->login->setEmail(null);
        $this->login->setSenha(null);

        $this->login->setIdAluno(null);
        $this->login->setNomeAluno(null);
        $this->login->setMatricula(null);
        $this->login->setIdProfessor(null);
        $this->login->setIdTurma(null);

        $this->login->setStatus(null);
    }

}

$loginController = new LoginController();

if(isset($_POST["professor"])) {
    $loginController->loginProfessor();
}

?>