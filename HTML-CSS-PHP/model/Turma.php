<?php
require_once("banco.php");

Class CadastroTurma extends Banco {
    
    private $nome;

    public function setNome($string) {
        $this->nome = $string;
    }

    public function getNome() {
        return $this->nome;
    }

    public function incluir() {
        return $this->setTurma($this->getNome());
    }

}

?>