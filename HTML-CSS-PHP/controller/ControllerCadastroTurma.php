<?php
require_once("../model/cadastroTurma.php");
class cadastroTurmaController{

    private $cadastro;

    public function __construct() {
        $this->cadastro = new CadastroTurma();
        $this->incluir();
    }

    private function incluir() {
        $this->cadastro->setNome($_POST['nome']);
        $this->cadastro->incluir();
    }

}

new cadastroTurmaController();
?>