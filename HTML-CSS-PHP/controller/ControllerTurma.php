<?php
require_once("../model/Turma.php");
class TurmaController{

    private $cadastro;
    private $lista;

    public function __construct() {
        $this->cadastro = new CadastroTurma();
        $this->lista = new Banco();
    }

    public function incluir() {
        $this->cadastro->setNome($_POST['nome']);
        $this->cadastro->incluir();
    }

    public function listarTurma() {
        
        $row = $this->lista->getTurma();
        foreach ($row as $value) {
            echo "<option value='".$value['turma']."'>".$value['turma']."</option>";
        }
    }

    public function listarTabelaTurma() {
        $row = $this->lista->getTurma();
        if($row != null) {
            foreach ($row as $value) {
                echo "
                    <tr>
                    <th>".$value['turma']."</th>

                    <th>
                    <form action='listaTurmaQuestionario.php' method='post'>
                    <button class='viewButton' name='visualizarTurma' value='".$value['turma']."'>Visualizar</button>
                    </form>
                    </th>

                    <th>
                    <form action='deletar' method='post'>
                    <button class='deleteButton' name='deletarTurma' value='".$value['turma']."'>Deletar</button>
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
}

if(isset($_POST['cadastrarTurma'])) {
    $turma = new TurmaController();
    $turma->incluir();
}

?>