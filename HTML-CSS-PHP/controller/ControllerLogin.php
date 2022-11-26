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
            echo "chau";
        }
    }

    public function loginAluno() {
        $this->login->setNomeAluno($_POST["nome"]);
        $this->login->setMatricula($_POST["matricula"]);
        $this->login->setStatus("aluno");
        $row = $this->banco->checkLoginAluno($_SESSION["nomeAluno"], $_SESSION["matricula"]);
        foreach($row as $value) {
            $this->login->setIdAluno($value["idaluno"]);
            $this->login->setNomeAluno($value["nome"]);
            $this->login->setMatricula($value["matricula"]);
            $this->login->setIdProfessor($value["professor_idprofessor"]);
            $this->login->setIdTurma($value["turma_idturma"]);
        }

        if($row != null) {
            header("location: ../view/inicio.php");
        } else {
            echo "chau";
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
} else if (isset($_POST["aluno"])) {
    $loginController->loginAluno();
}

?>