<?php
require_once("../model/banco.php");
class listarTurmaController {
    private $lista;

    public function __construct() {
        $this->lista = new Banco();
        $this->listarTurma();
    }

    private function listarTurma() {
        
        $row = $this->lista->getTurma();
        foreach ($row as $value) {
            echo "<option value='".$value['turma']."'>".$value['turma']."</option>";
        }
    }
}