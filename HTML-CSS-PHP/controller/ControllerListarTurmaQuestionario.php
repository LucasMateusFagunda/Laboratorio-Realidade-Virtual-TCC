<?php
require_once("../model/banco.php");
class listarTabelaQuestionario {
    private $lista;

    public function __construct() {
        $this->lista = new Banco();
    }

    public function listarTurmaQuestionario($string) {
        
        $row = $this->lista->getTurmaQuestionario($string);
        foreach ($row as $value) {
            echo "
                <tr>
                <th>
                    ".$value['titulo']."
                </th>

                <th>
                <form action='listaPerguntas.php' method='post'>
                <button class='viewButton' name='visualizarTitulo' value='".$value['titulo']."'>Visualizar</button>
                <input type='hidden' name='visualizarTurma' value='$string'>
                </form>
                </th>

                <th>
                <form action='deletar' method='post'>
                <button class='deleteButton' name='deletarTitulo' value='".$value['turma']."'>Deletar</button>
                </form>
                </th>

                </tr>
            ";
        }
    }
}

?>