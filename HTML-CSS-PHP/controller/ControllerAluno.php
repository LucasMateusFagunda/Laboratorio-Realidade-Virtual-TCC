<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
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
                    Não possui aluno
                    </th>

                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            ";
        }
    }

    public function listarAlunoLista() {
        $row = $this->banco->getAluno();
        if($row != null) {
            foreach ($row as $value) {
                echo "<option value='".$value['idaluno']."'>".$value['nome']."</option>";
            }
        } else {
            echo "<option>Não possui aluno</option>";
        }
    }

    public function associar() {
        $this->banco->setAssociacao($_POST["idaluno"], $_POST["idquestionario"]);
        header("location: ../view/associar.php");
    }

    public function listarAssociacao() {
        $row = $this->banco->getAssociacao();
        if($row != null) {
            foreach ($row as $value) {
                echo "
                    <tr>
                    <th>
                        ".$value['nome']."
                    </th>

                    <th>
                        ".$value['titulo']."
                    </th>

                    <th>
                    <form action='../controller/ControllerAluno.php' method='post'>
                        <input type='hidden' name='idaluno' value='".$value["idaluno"]."'>
                        <input type='hidden' name='idpergunta' value='".$value["idpergunta"]."'>
                        <button class='deleteButton' name='deletarAssociacao'>Deletar</button>
                    </form>
                    </th>

                    </tr>
                ";
            }
        } else {
            echo "
                <tr>
                    <th>
                    Não possui Associação
                    </th>
                    <th></th>
                    <th></th>
                </tr
            ";
        }
    }

    public function deletar(){
        $this->banco->delAluno($_POST['deletarAluno']);
        header("location: ../view/visualizarAluno");
    }

    public function deletarAssociacao() {
        $this->banco->delAssociacao($_POST['idaluno'], $_POST['idpergunta']);
        header("location: ../view/associar.php");
    }

}

$aluno = new AlunoController();

if(isset($_POST['cadastrarAluno'])) {
    $aluno->incluir();
} else if(isset($_POST['deletarAluno'])) {
    $aluno->deletar();
} else if(isset($_POST['associar'])) {
    $aluno->associar();
} else if(isset($_POST['deletarAssociacao'])) {
    $aluno->deletarAssociacao();
}

?>