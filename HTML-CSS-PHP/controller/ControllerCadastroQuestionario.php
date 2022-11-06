<?php
require_once("../model/cadastroQuestionario.php");
class cadastroQuestionarioController{

    private $cadastro;

    public function __construct() {
        $this->cadastro = new CadastroQuestionario();
        $this->incluir();
    }

    private function incluir() {
        $this->cadastro->setTurma($_POST['turma']);
        $this->cadastro->SetPergunta($_POST['pergunta']);
        $this->cadastro->setAlt1($_POST['alt1']);
        $this->cadastro->setAlt2($_POST['alt2']);
        $this->cadastro->setAlt3($_POST['alt3']);
        $this->cadastro->setAlt4($_POST['alt4']);
        $this->cadastro->incluir();
    }

}

new cadastroQuestionarioController();
?>