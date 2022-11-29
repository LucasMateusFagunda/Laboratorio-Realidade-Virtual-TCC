<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
    require_once("../init.php");

    class Banco{

        public function __construct() {
            $this->conexao();
        }

        private function conexao() {
            $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO);
        }

        public function setTurma($nome) {
            $stmt = "INSERT INTO turma VALUES (null, '$nome', ".$_SESSION['idProfessor'].")";
            mysqli_query($this->mysqli, $stmt);
            
            
        }
        
        public function setQuestionario($nomeQuestionario, $turma, $pergunta, $alt1, $alt2, $alt3, $alt4) {
            $result = $this->mysqli->query("SELECT idquestionario FROM questionario WHERE titulo = '$nomeQuestionario'");
            
            if(mysqli_num_rows($result) == 0) {
                $turmaID = $this->mysqli->query("SELECT idturma FROM turma WHERE nomeTurma = '$turma'");
                $row = mysqli_fetch_assoc($turmaID);
                
                $stmt = "INSERT INTO questionario VALUES(null, '$nomeQuestionario',".$row['idturma'].")";
                mysqli_query($this->mysqli, $stmt);
            }

            $nomeQuestionarioId = $this->mysqli->query("SELECT idquestionario FROM questionario WHERE titulo = '$nomeQuestionario'");
            $row = mysqli_fetch_assoc($nomeQuestionarioId);
                

            $stmt = "INSERT INTO pergunta VALUES (null, '$pergunta', '$alt1', '$alt2', '$alt3', '$alt4',  ".intval($row['idquestionario']).")";
            mysqli_query($this->mysqli, $stmt);

        }

        public function getTurma() {
            $array = array();
            $result = $this->mysqli->query("SELECT * FROM turma WHERE professor_idprofessor = ".$_SESSION['idProfessor']."");
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $array[] = $row;
            }
            if($array) {
                return $array;
            } else {
                return;
            }
        }

        public function delTurma($nomeTurma) {
            $stmt = "DELETE FROM turma WHERE nomeTurma = '$nomeTurma'";
            mysqli_query($this->mysqli, $stmt);
        }

        public function getQuestionario() {
            $result = $this->mysqli->query("SELECT * FROM questionario AS q INNER JOIN turma AS t ON q.turma_idturma = t.idturma INNER JOIN professor AS p ON t.professor_idprofessor = ".$_SESSION["idProfessor"].";");
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $array[] = $row;
            }
            return $array;
        }

        public function getTurmaQuestionario($string) {
            $array = array();
            $turmaID = $this->mysqli->query("SELECT idturma FROM turma WHERE nomeTurma = '$string'");
            $turmaID = mysqli_fetch_assoc($turmaID);

            $result = $this->mysqli->query("SELECT * FROM turma as t inner join questionario as q on q.turma_idturma = ".$turmaID['idturma']." and t.idturma = " .$turmaID['idturma']." LEFT join pergunta as p on p.questionario_idquestionario = q.idquestionario group by titulo;");

            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $array[] = $row;
            }
            if($array) {
                return $array;
            } else {
                return;
            }
        }

        public function delQuestionario($titulo) {

            $questionarioID = $this->mysqli->query("SELECT idquestionario FROM questionario WHERE titulo = '$titulo'");
            $questionarioID = mysqli_fetch_assoc($questionarioID);


            $stmt = "DELETE FROM pergunta WHERE questionario_idquestionario = ".$questionarioID['idquestionario']."";
            mysqli_query($this->mysqli, $stmt);
            $stmt = "DELETE FROM questionario where titulo = '$titulo'";
            mysqli_query($this->mysqli, $stmt);

        }

        public function getPerguntas($titulo, $turma) {
            $array = array();
            $turmaID = $this->mysqli->query("SELECT idturma FROM turma WHERE nomeTurma = '$turma'");
            $turmaID = mysqli_fetch_assoc($turmaID);

            $questionarioID = $this->mysqli->query("SELECT idquestionario FROM questionario WHERE titulo = '$titulo'");
            $questionarioID = mysqli_fetch_assoc($questionarioID);

            $result = $this->mysqli->query("SELECT * FROM turma AS t INNER JOIN questionario AS q ON q.turma_idturma = ".$turmaID['idturma']." AND t.idturma = ".$turmaID['idturma']." INNER JOIN pergunta AS p ON p.questionario_idquestionario = ".$questionarioID['idquestionario']." AND q.idquestionario = ".$questionarioID['idquestionario'].";");
            
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $array[] = $row;
            }
            if($array) {
                return $array;
            } else {
                return;
            }
        }

        public function delPergunta($nomePergunta) {
            $stmt = "DELETE FROM pergunta WHERE pergunta = '$nomePergunta';";
            mysqli_query($this->mysqli, $stmt);
        }

        public function setAluno($nome, $matricula, $turma) {
            $turmaID = $this->mysqli->query("SELECT idturma FROM turma WHERE nomeTurma = '$turma'");
            $turmaID = mysqli_fetch_assoc($turmaID);

            $stmt = "INSERT INTO aluno VALUES (null, '$nome', '$matricula', ".$_SESSION['idProfessor'].", ".$turmaID['idturma'].")";
            mysqli_query($this->mysqli, $stmt);
        }

        public function getAluno() {
            $array = array();
            $result = $this->mysqli->query("SELECT * FROM turma AS t INNER JOIN aluno AS a ON a.turma_idturma = t.idturma AND a.professor_idprofessor = ".$_SESSION["idProfessor"]." ORDER BY t.nomeTurma ASC;");
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $array[] = $row;
            }
            if($array) {
                return $array;
            } else {
                return;
            }
        }

        public function delAluno($idAluno) {
            $stmt = "DELETE FROM aluno_has_pergunta WHERE aluno_idaluno = $idAluno";
            mysqli_query($this->mysqli, $stmt);

            $stmt = "DELETE FROM aluno WHERE idaluno = $idAluno";
            mysqli_query($this->mysqli, $stmt);
        }

        public function checkLoginProfessor($email, $senha) {
            $array = array();
            $result = $this->mysqli->query("SELECT * FROM professor WHERE email = '$email' AND senha = '$senha'");
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $array[] = $row;
            }
            if($array) {
                return $array;
            } else {
                return;
            }
        }

        public function setAssociacao($alunoId, $questionarioID) {
            $perguntaID = $this->mysqli->query("SELECT idpergunta FROM pergunta AS p INNER JOIN questionario AS q ON p.questionario_idquestionario = $questionarioID;");
            $perguntaID = mysqli_fetch_assoc($perguntaID);

            $stmt = "INSERT INTO aluno_has_pergunta VALUES ($alunoId, ".$perguntaID['idpergunta'].")";
            mysqli_query($this->mysqli, $stmt);
        }

        public function getAssociacao() {
            $array = array();
            $result = $this->mysqli->query("SELECT a.idaluno, p.idpergunta, a.nome, q.titulo FROM aluno_has_pergunta AS ap INNER JOIN aluno AS a on ap.aluno_idaluno = a.idaluno AND a.professor_idprofessor = ".$_SESSION['idProfessor']." INNER JOIN pergunta AS p ON ap.pergunta_idpergunta = p.idpergunta INNER JOIN questionario AS q ON p.questionario_idquestionario = q.idquestionario;");
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $array[] = $row;
            }
            if($array) {
                return $array;
            } else {
                return;
            }
        }

        public function delAssociacao($idAluno, $idPergunta) {
            $stmt = "DELETE FROM aluno_has_pergunta WHERE aluno_idaluno = $idAluno and pergunta_idpergunta = $idPergunta";
            mysqli_query($this->mysqli, $stmt);
        }

        public function checkLoginAluno($nome, $matricula) {
            $array = array();
            $result = $this->mysqli->query("SELECT * FROM aluno WHERE nome = '$nome' AND matricula = '$matricula'");
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
