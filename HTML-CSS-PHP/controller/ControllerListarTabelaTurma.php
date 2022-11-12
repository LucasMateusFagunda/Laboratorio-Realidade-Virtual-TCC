<?php
require_once("../model/banco.php");

class listarTabelaTurma {
    private $lista;

    public function __construct() {
        $this->lista = new Banco();
        $this->listarTabelaTurma();
    }

    private function listarTabelaTurma() {
        $row = $this->lista->getTurma();
        foreach ($row as $value) {
            echo "
                <tr>
                <th>".$value['turma']."</th>

                <th>
                <form action='listaTurmaQuestionario.php' method='post'>
                <button class='viewButton' name='visualizarTurma' value='".$value['turma']."'>Visualizar</button>
                </form>
                </th>

                <th>
                <form action='deletar' method='post'>
                <button class='deleteButton' name='deletarTurma' value='".$value['turma']."'>Deletar</button>
                </form>
                </th>
                </tr>
            ";
        }
    }

}
?>