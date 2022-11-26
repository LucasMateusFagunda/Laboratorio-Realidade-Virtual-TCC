<h1>Login Aluno</h1>
<hr>
<form method="POST" action="../controller/ControllerLogin.php" name="form">
    <input type="text" name="nome" placeholder="Nome" autofocus required> <br>
    <input type="text" name="matricula" placeholder="Matrícula" required>
    <button type="submit" name="aluno">Login</button>
</form>
<form method="POST" action="../view/index.php" name="form">
    <button type="submit" name="souProfessor">Sou professor</button>
</form>