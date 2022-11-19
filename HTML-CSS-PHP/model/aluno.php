<?php
    require_once("banco.php");

    class Aluno extends Banco {
        private $nome;
        private $matricula;
        private $turma;

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setMatricula($matricula) {
            $this->matricula = $matricula;
        }

        public function getMatricula() {
            return $this->matricula;
        }

        public function setTurma($turma) {
            $this->turma = $turma;
        }

        public function getTurma() {
            return $this->turma;
        }
 
        public function incluir() {
            return $this->setAluno($this->getNome(), $this->getMatricula(), $this->getTurma());
        }
    }

?>