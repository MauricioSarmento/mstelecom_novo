<?php
$host = "localhost";
$usuario = "root";
$senha = "88255925";
$db = "sistema_ms_impactonet";
$mysqli = new mysqli($host, $usuario, $senha, $db);
if($mysqli->connect_errno)
echo "Falha na conexão: (".$mysqli->connect_errno.") ".$mysqli->connect_error;
$con = mysqli_connect("localhost","root","88255925");
mysqli_select_db($con,"sistema_ms_impactonet");
?>