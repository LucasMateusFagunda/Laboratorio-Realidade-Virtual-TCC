<?php
require_once("../model/banco.php");
class listarPerguntas {
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
                        ".$value['pergunta']."
                    </th>

                    <th>
                    <form action='listaPerguntas.php' method='post'>
                    <button class='viewButton' name='visualizar' value='".$value['titulo']."'>Visualizar</button>
                    </form>
                    </th>

                    <th>
                    <form action='deletar' method='post'>
                    <button class='deleteButton' name='deletar' value='".$value['titulo']."'>Deletar</button>
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
}

?>