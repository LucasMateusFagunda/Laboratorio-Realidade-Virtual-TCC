<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once("banco.php");

Class CadastroQuestionario extends Banco {
    
    private $turma;
    private $nomeQuestionario;
    private $pergunta;
    private $alt1;
    private $alt2;
    private $alt3;
    private $alt4;

    public function setTurma($string) {
        $this->turma = $string;
    }

    public function setNomeQuestionario($string) {
        $this->nomeQuestionario = $string;
    }

    public function setPergunta($string) {
        $this->pergunta = $string;
    }

    public function setAlt1($string) {
        $this->alt1 = $string;
    }

    public function setAlt2($string) {
        $this->alt2 = $string;
    }

    public function setAlt3($string) {
        $this->alt3 = $string;
    }

    public function setAlt4($string) {
        $this->alt4 = $string;
    }



    public function getTurma() {
        return $this->turma;
    }

    public function getNomeQuestionario() {
        return $this->nomeQuestionario;
    }

    public function getPergunta() {
        return $this->pergunta;
    }

    public function getAlt1() {
        return $this->alt1;
    }

    public function getAlt2() {
        return $this->alt2;
    }

    public function getAlt3() {
        return $this->alt3;
    }

    public function getAlt4() {
        return $this->alt4;
    }


    public function incluir() {
        return $this->setQuestionario($this->getNomeQuestionario(), $this->getTurma(), $this->getPergunta(), $this->getAlt1(), $this->getAlt2(), $this->getAlt3(), $this->getAlt4(),);
    }

}

?>