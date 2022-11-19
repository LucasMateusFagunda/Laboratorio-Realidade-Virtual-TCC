<?php
require_once("../model/Turma.php");
class TurmaController{

    private $cadastro;
    private $banco;

    public function __construct() {
        $this->cadastro = new CadastroTurma();
        $this->banco = new Banco();
    }

    public function incluir() {
        $this->cadastro->setNome($_POST['nome']);
        $this->cadastro->incluir();
        header("location: ../view/cadastroTurma.php");
    }

    public function listarTurma() {
        
        $row = $this->banco->getTurma();
        foreach ($row as $value) {
            echo "<option value='".$value['nomeTurma']."'>".$value['nomeTurma']."</option>";
        }
    }

    public function listarTabelaTurma() {
        $row = $this->banco->getTurma();
        if($row) {
            foreach ($row as $value) {
                echo "
                    <tr>
                    <th>".$value['nomeTurma']."</th>

                    <th>
                    <form action='listaTurmaQuestionario.php' method='post'>
                    <button class='viewButton' name='visualizarTurma' value='".$value['nomeTurma']."'>Visualizar</button>
                    </form>
                    </th>

                    <th>
                    <form action='../controller/ControllerTurma.php' method='post'>
                    <button class='deleteButton' name='deletarTurma' value='".$value['nomeTurma']."'>Deletar</button>
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

    public function deletar() {
        $this->banco->delTurma($_POST['deletarTurma']);
        header("location: ../view/index.php");
    }

}

$turma = new TurmaController();

if(isset($_POST['cadastrarTurma'])) {
    $turma->incluir();
} else if (isset($_POST['deletarTurma'])) {
    $turma->deletar();
}

?>