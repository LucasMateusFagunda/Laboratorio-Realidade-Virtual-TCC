<?php
    $hostname = "localhost";
    $user = "root";
    $password = "";
    $database = "laboratorio";
    $con = mysqli_connect($hostname, $user, $password, $database);

    $id_login = $_POST["id_login"];
    $nota = $_POST["nota"];

    $insert = "insert into notas values (null, $id_login, $nota);";
    mysqli_query($con, $insert) or die("4");
?>