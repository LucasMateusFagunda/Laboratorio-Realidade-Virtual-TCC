<?php
require_once("../model/banco.php");
class listarQuestionarioController {
    private $lista;

    public function __construct() {
        $this->lista = new Banco();
        $this->listarQuestionario();
    }

    private function listarQuestionario() {
        
        $row = $this->lista->getQuestionario();
        foreach ($row as $value) {
            echo "<option value='".$value['titulo']."'>";
        }
    }
}

?>