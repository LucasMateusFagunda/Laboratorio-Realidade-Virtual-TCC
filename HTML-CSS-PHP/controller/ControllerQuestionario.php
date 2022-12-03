<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once("../model/Questionario.php");
class QuestionarioController{

    private $cadastro;
    private $banco;

    public function __construct() {
        $this->cadastro = new CadastroQuestionario();
        $this->banco = new Banco();
    }

    public function incluir() {
        $this->cadastro->setTurma($_POST['turma']);
        $this->cadastro->setNomeQuestionario($_POST['questionarioOption']);
        $this->cadastro->SetPergunta($_POST['pergunta']);
        $this->cadastro->setAlt1($_POST['alt1']);
        $this->cadastro->setAlt2($_POST['alt2']);
        $this->cadastro->setAlt3($_POST['alt3']);
        $this->cadastro->setAlt4($_POST['alt4']);
        $this->cadastro->incluir();
        header("location: ../view/cadastroQuestionario.php");
    }

    public function listarQuestionario() {
        $row = $this->banco->getQuestionario();
        foreach ($row as $value) {
            echo "<option value='".$value['titulo']."'>";
        }
    }

    Public function listarQuestionarioLista() {
        $row = $this->banco->getQuestionario();
        if ($row) {
            foreach ($row as $value) {
                echo "<option value='".$value['idquestionario']."'>".$value['titulo']."</option>";
                echo $value['titulo'];
            }
        } else {
            echo "<option>Não possui questionario</option>";
        }
    }

    public function listarQuestionarioTurma($string) {
        
        $row = $this->banco->getTurmaQuestionario($string);
        if($row != null) {
            foreach ($row as $value) {
                echo "
                    <tr>
                    <th>
                        ".$value['titulo']."
                    </th>

                    <th>
                    <form action='listaPerguntas.php' method='post'>
                    <button class='viewButton' name='visualizarTitulo' value='".$value['titulo']."'>Visualizar</button>
                    <input type='hidden' name='visualizarTurma' value='$string'>
                    </form>
                    </th>

                    <th>
                    <form action='../controller/ControllerQuestionario.php' method='post'>
                    <button class='deleteButton' name='deletarQuestionario' value='".$value['titulo']."'>Deletar</button>
                    </form>
                    </th>

                    </tr>
                ";
            }
        } else {
            echo "
                <tr>
                    <th>
                    Não possui Questionários
                    </th>

                    <th></th>
                    <th></th>
                </tr
            ";
        }
    }

    public function listaQuestionarioPorAluno() {
        $row = $this->banco->getQuestionarioByIdAluno();
        if($row != null) {
            foreach ($row as $value) {
                echo "
                    <tr>
                    <th>
                        ".$value['titulo']."
                    </th>

                    <th>
                    <form action='listaPerguntas.php' method='post'>
                    <button class='viewButton' name='visualizarQuestionario' value='".$value['idquestionario']."'>Visualizar</button>
                    </form>
                    </th>
                ";
            }
        } else {
            echo "
                <tr>
                    <th>
                    Não possui Questionários
                    </th>

                    <th></th>
                    <th></th>
                </tr
            ";
        }
    }

    public function deletar(){
        $this->banco->delQuestionario($_POST['deletarQuestionario']);
        header("location: ../view/inicio.php");
    }

}

$questionario = new QuestionarioController;

if(isset($_POST['cadastrarPergunta'])) {
    $questionario->incluir();
}  else if (isset($_POST['deletarQuestionario'])) {
    $questionario->deletar();
}

?>