<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once("../model/banco.php");
class Perguntas {
    private $lista;

    public function __construct() {
        $this->lista = new Banco();
    }

    public function listarPerguntas($titulo, $turma) {
        
        $row = $this->lista->getPerguntas($titulo, $turma);
        if($row != null) {
            foreach ($row as $value) {
                echo "
                    <tr>

                        <th>
                            ".$value['Pergunta']."
                        </th>

                        <th>
                            ".$value['alt1_r']."
                        </th>

                        <th>
                            ".$value['alt2']."
                        </th>

                        <th>
                            ".$value['alt3']."
                        </th>

                        <th>
                            ".$value['alt4']."
                        </th>

                        <th>
                        <form action='../controller/ControllerPerguntas.php' method='post'>
                            <button class='deleteButton' name='deletarPergunta' value='".$value['Pergunta']."'>Deletar</button>
                        </form>
                        </th>

                    </tr>
                ";
            }
        } else {
            echo "
                <tr>
                    <th>
                    Este Questionário não possui perguntas
                    </th>

                    <th></th>
                    <th></th>
                </tr>
            ";
        }
    }

    public function deletar() {
        $banco = new Banco();
        $banco->delPergunta($_POST['deletarPergunta']);
        header("location: ../view/inicio.php");
    }

}

if(isset($_POST['deletarPergunta'])) {
    $deletarPergunta = new Perguntas();
    $deletarPergunta->deletar();
}

?>