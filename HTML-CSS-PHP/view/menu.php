<div class="menu">
    <a class="menuButton" href="inicio.php" style="text-decoration: none;">Inicio</a>     
    <?php 
        if($_SESSION["status"] == "professor") {
            echo "
                <a class='menuButton' href='cadastroTurma.php' style='text-decoration: none;'>Cadastrar turma</a>
                <a class='menuButton' href='cadastroQuestionario' style='text-decoration: none;'>Criar questionário</a>
                <a class='menuButton' href='cadastroAluno.php' style='text-decoration: none;'>Cadastrar Alunos</a>
                <a class='menuButton' href='visualizarAluno.php' style='text-decoration: none;'>Visualizar Alunos</a> 
                <a class='menuButton' href='associar.php' style='text-decoration: none;'>Associar Alunos</a>
            ";
        }
    ?>   
     
    <a class="menuButton" href="index.php" style="text-decoration: none;">Sair</a>
    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" style="position: absolute; right: -10px;">.</a>
</div>
