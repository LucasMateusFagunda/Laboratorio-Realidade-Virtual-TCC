<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once("banco.php");

class Login extends Banco {
    
    

    


    public function setIdProfessor($idProfessor) {
        $_SESSION["idProfessor"] = $idProfessor;
    }

    

    public function setNomeProfessor($nomeProfessor) {
        $_SESSION["nomeProfessor"] = $nomeProfessor;
    }

    

    public function setEmail($email) {
        $_SESSION["email"] = $email;
    }

    

    public function setSenha($senha) {
        $_SESSION["senha"] = $senha;
    }

    




    public function setIdAluno($idAluno) {
        $_SESSION["idAluno"] = $idAluno;
    }

    

    public function setNomeAluno($nomeAluno) {
        $_SESSION["nomeAluno"] = $nomeAluno;
    }

    

    public function setMatricula($matricula) {
        $_SESSION["matricula"] = $matricula;
    }

    

    public function setIdProfessorAluno($idProfessorAluno) {
        $_SESSION["idProfessorAluno"] = $idProfessorAluno;
    }

    

    public function setIdTurma($idTurma) {
        $_SESSION["idTurma"] = $idTurma;
    }

    

    public function setStatus($status) {
        $_SESSION["status"] = $status;
    }

    

}

?>