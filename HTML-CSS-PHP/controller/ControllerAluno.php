<?php
require_once("../model/aluno.php");

class AlunoController {
    private $aluno;
    private $banco;

    public function __construct()
    {
        $this->aluno = new Aluno();
        $this->banco = new Banco();
    }

    public function incluir() {
        $this->aluno->setNome($_POST['nome']);
        $this->aluno->setMatricula($_POST['matricula']);
        $this->aluno->setTurma($_POST['turma']);
        $this->aluno->incluir();
        header("location: ../view/cadastroAluno");
    }

    public function listarAlunos() {
        $row = $this->banco->getAluno();
        if($row) {
            foreach ($row as $value) {
                echo "
                    <tr>
                    <th>".$value['nomeTurma']."</th>

                    <th>
                    <p> ".$value['nome']."</p>
                    </th>

                    <th>
                    <p>".$value['matricula']."</p>
                    </th>

                    <th>
                    <form action='../controller/ControllerAluno.php' method='post'>
                    <button class='deleteButton' name='deletarAluno' value='".$value['idaluno']."'>Deletar</button>
                    </form>
                    </th>
                    </tr>
                ";
            }
        } else {
            echo "
                <tr>
                    <th>
                    Não possui turmas
                    </th>

                    <th></th>
                    <th></th>
                </tr>
            ";
        }
    }

    public function deletar(){
        $this->banco->delAluno($_POST['deletarAluno']);
        header("location: ../view/visualizarAluno");
    }

}

$aluno = new AlunoController();

if(isset($_POST['cadastrarAluno'])) {
    $aluno->incluir();
} else if(isset($_POST['deletarAluno'])) {
    $aluno->deletar();
}

?>