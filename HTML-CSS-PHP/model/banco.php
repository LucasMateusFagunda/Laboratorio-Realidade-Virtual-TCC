<?php

    require_once("../init.php");

    class Banco{

        public function __construct() {
            $this->conexao();
        }

        private function conexao() {
            $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO);
        }

        public function setTurma($nome) {
            $stmt = "INSERT INTO turma VALUES (null, '$nome')";
            mysqli_query($this->mysqli, $stmt);
            
            
        }
        
        public function setQuestionario($turma, $pergunta, $alt1, $alt2, $alt3, $alt4) {
            $result = $this->mysqli->query("select id from turma where turma = '$turma'");
            

            $stmt = "INSERT INTO perguntas VALUES (null, 2, '$turma', '$pergunta', '$alt1', '$alt2', '$alt3', '$alt4', 1)";
            mysqli_query($this->mysqli, $stmt);

        }

        public function getTurma() {
            $result = $this->mysqli->query("SELECT * FROM turma");
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $array[] = $row;
            }
            return $array;
        }

        public function getQuestionario() {
            $result = $this->mysqli->query("SELECT * FROM questionario");
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $array[] = $row;
            }
            return $array;
        }

    }

?>