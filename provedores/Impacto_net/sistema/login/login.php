<?php

include "conexao.php";

$usuario=$_POST['usuario'];
$senha=$_POST['senha'];



	
	$sql="select * from clientes where usuario = '$usuario' and senha = '$senha'";
$res=mysqli_query($con,$sql);
$linha=mysqli_affected_rows($con);

if($linha > 0) {
	
	$sql="select * from clientes where usuario = '$usuario' and senha = '$senha'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
	$id=$vreg[0];
    $n=$vreg[1];
	$u=$vreg[2];
	$s=$vreg[3];
	$IP=$vreg[5];
}
/*
$sql="SELECT * FROM clientes where usuario = '$u'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
    $IP=$vreg[5];
	
	echo $IP;
	
};  */
echo "<br><br>";

$sql="SELECT * FROM clientes where usuario = '$u'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
    $id_servidor=$vreg[5];
	
	echo $IP;
	
};
echo "<br><br>";


$sql="SELECT * FROM servidores where id = '$id_servidor'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
   
	$IP=$vreg[3];
	$nome_serv=$vreg[2];

	
}
	
	$num=rand(100000,999999);
		session_start();
	$_SESSION['numLogin']=$num;
	$_SESSION['numIpp']=$IP;
	$_SESSION['$vreg[0]']=$id;
		$_SESSION['$vreg[1]']=$n;
	$_SESSION['$vreg[2]']=$u;
	$_SESSION['$vreg[3]']=$s;
	$_SESSION['$num']=$num;
	$_SESSION['$id_servidor']=$id_servidor;
	$_SESSION['$nome_serv']=$nome_serv;




	header("Location:../examples/index.php?num1=$num");
}else{
	
  echo "<center>EERO de login, tente novamente!";
  echo "<a href='index.php'>Voltar</a></center>";
}

;





?>