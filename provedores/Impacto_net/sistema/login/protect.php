<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
include "conexao.php"; 
if(!isset($_SESSION['$num']))
$_SESSION['$num']= 1;

if(!isset($_SESSION['numLogin']))
$_SESSION['numLogin']= null;

$x= $_SESSION['$num'];
$y= $_SESSION['numLogin'];
if(!isset($x))
$x= 1;
if(!isset($y))
$y= 2;
if(!isset($vreg[1]))
$vreg[1]= null;

if($x == $y ){
			
}else{

echo "<center>VOCÊ NÃO FES O LOGIN, PAGINA BLOQUEADA <a href='../login/index.php'>CLIK AQUI</a></center>   ";

if(isset($_SESSION['numLogin'])){
	if(!isset($_GET["num1"]))
$_GET["num1"]= null;
	$n1=$_GET["num1"];
	$n2=$_SESSION["numLogin"];
	if($n1 != $n2) {
		
	echo "<a href='index.php'>Voltar</a>";
		

		exit;
	}
	}else{

		exit;
	

}
};






 



?>
