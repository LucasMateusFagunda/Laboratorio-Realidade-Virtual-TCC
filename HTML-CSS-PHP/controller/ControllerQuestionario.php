<?php
require_once("../model/Questionario.php");
class QuestionarioController{

    private $cadastro;
    private $lista;

    public function __construct() {
        $this->cadastro = new CadastroQuestionario();
        $this->lista = new Banco();
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
    }

    public function listarQuestionario() {
        $row = $this->lista->getQuestionario();
        foreach ($row as $value) {
            echo "<option value='".$value['titulo']."'>";
        }
    }

    public function listarQuestionarioTurma($string) {
        
        $row = $this->lista->getTurmaQuestionario($string);
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
                    <form action='deletar' method='post'>
                    <button class='deleteButton' name='deletarTitulo' value='".$value['turma']."'>Deletar</button>
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
}

if(isset($_POST['cadastrarPergunta'])) {
    $questionario = new QuestionarioController;
    $questionario->incluir();
}

?>