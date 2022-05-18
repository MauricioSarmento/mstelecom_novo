<?php
if(!isset($usuario))
$usuario = null;
if(!isset($_SESSION['$vreg[2]']))
$_SESSION['$vreg[2]'] = null;
$usuario = $_SESSION['$vreg[2]'];
if(!isset($senha))
$senha = null;
if(!isset($_SESSION['$vreg[3]']))
$_SESSION['$vreg[3]'] = null;
$senha = $_SESSION['$vreg[3]'];
if(!isset($servidor_mikrotik))
$servidor_mikrotik = null;
if(!isset($_SESSION['numIpp']))
$_SESSION['numIpp'] = null;
$con = mysqli_connect("localhost","root","88255925");
mysqli_select_db($con,"inovanet");
$sql="select * from clientes where usuario = '$usuario' and senha = '$senha'";
$res=mysqli_query($con,$sql);
$linha=mysqli_affected_rows($con);
if($linha > 0) {
$sql="select * from clientes where usuario = '$usuario' and senha = '$senha'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
    $IP=$vreg[5];
	$u=$vreg[2];
	$s=$vreg[3];
}}
	if(!isset($IP))
	$IP = null;
	if(!isset($u))
	$u = null;
	if(!isset($senha_servidor_mikrotik))
	$s = null;
$servidor_mikrotik= $_SESSION['numIpp'];
$login_servidor_mikrotik= $usuario;
$senha_servidor_mikrotik= $senha;

?>