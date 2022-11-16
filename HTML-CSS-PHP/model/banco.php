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
        
        public function setQuestionario($nomeQuestionario, $turma, $pergunta, $alt1, $alt2, $alt3, $alt4) {
            $result = $this->mysqli->query("select id from questionario where titulo = '$nomeQuestionario'");
            
            if(mysqli_num_rows($result) == 0) {
                $turmaID = $this->mysqli->query("SELECT id FROM turma WHERE turma = '$turma'");
                $row = mysqli_fetch_assoc($turmaID);
                
                $stmt = "INSERT INTO questionario VALUES(null, '$nomeQuestionario',".$row['id'].")";
                mysqli_query($this->mysqli, $stmt);
            }

            $nomeQuestionarioId = $this->mysqli->query("SELECT id FROM questionario WHERE titulo = '$nomeQuestionario'");
            $row = mysqli_fetch_assoc($nomeQuestionarioId);
                

            $stmt = "INSERT INTO perguntas VALUES (null,1, '$pergunta', '$alt1', '$alt2', '$alt3', '$alt4',  ".intval($row['id']).")";
            mysqli_query($this->mysqli, $stmt);

        }

        public function getTurma() {
            $array = array();
            $result = $this->mysqli->query("SELECT * FROM turma");
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $array[] = $row;
            }
            if($array) {
                return $array;
            } else {
                return;
            }
        }

        public function getQuestionario() {
            $result = $this->mysqli->query("SELECT * FROM questionario");
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $array[] = $row;
            }
            return $array;
        }

        public function getTurmaQuestionario($string) {
            $array = array();
            $turmaID = $this->mysqli->query("SELECT id FROM turma WHERE turma = '$string'");
            $turmaID = mysqli_fetch_assoc($turmaID);

            $result = $this->mysqli->query("SELECT * FROM turma as t inner join questionario as q on q.turma_id = ".$turmaID['id']." and t.id = " .$turmaID['id']." LEFT join perguntas as p on p.questionario_idquestionario = q.id group by titulo;");
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $array[] = $row;
            }
            if($array) {
                return $array;
            } else {
                return;
            }
        }

        public function getPerguntas($titulo, $turma) {
            $array = array();
            $turmaID = $this->mysqli->query("SELECT id FROM turma WHERE turma = '$turma'");
            $turmaID = mysqli_fetch_assoc($turmaID);

            $questionarioID = $this->mysqli->query("SELECT id FROM questionario WHERE titulo = '$titulo'");
            $questionarioID = mysqli_fetch_assoc($questionarioID);

            $result = $this->mysqli->query("SELECT * FROM turma AS t INNER JOIN questionario AS q ON q.turma_id = ".$turmaID['id']." AND t.id = ".$turmaID['id']." INNER JOIN perguntas AS p ON p.questionario_idquestionario = ".$questionarioID['id']." AND q.id = ".$questionarioID['id'].";");
            
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $array[] = $row;
            }
            if($array) {
                return $array;
            } else {
                return;
            }
        }

    }
