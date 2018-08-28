<?php

$banco = "localdb";
$usuario = "root";
$senha = "";
$hostname = "localhost";


$con = mysqli_connect($hostname, $usuario, $senha) or trigger_error(mysqli_error(),E_USER_ERROR); 

mysqli_select_db($con, $banco);

$resultado = mysqli_query($con, "SELECT * FROM funcionario");


?>
