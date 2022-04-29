<?php
require_once '../login/protect.php';
require_once 'conexao/conect.php';
require_once"painel.php";
#header("Refresh: 20");
if(!isset($_GET["id"]))
$_GET["id"]= null;
$n1=$_GET["id"];
$user = $_SESSION['$vreg[2]'];
$username1 = $_SESSION['$vreg[1]'];
$sql="SELECT * FROM clientes where usuario = '$user'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$useruser = $vreg[1];
}
$sql="SELECT * FROM clientes where usuario = '$useruser'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$id_servserv = $vreg[7];
}
	
?>
<form name="login" method="post" action="">
<input type="hidden" name="get" value="nada" /> 

<table border="0" align="center" cellpadding="2" cellspacing="2" >
<tr>
<br>
<td>SIM: <input type="radio" name="excluir" value="Sim" />
	NÃO: <input type="radio" name="excluir" value="nao" />

<td colspan="2">

<input type="submit" name="entrar" value="OK"/>

</td>
</tr>
</table>
</form>
   
     <?php
$API = new RouterosAPI();
$API->debug = false;
/* Fazendo conexão com microtik */
if ($API->connect("$servidor_mikrotik","$login_servidor_mikrotik","$senha_servidor_mikrotik")) {
	$ARRAY = $API->comm("/ppp/secret/print", array(
"count-only"=> "",
   ));
   $num = $ARRAY;
$ARRAY = $API->comm("/ppp/secret/print");
//teste para mudar profile
if(!isset($n1))
$n1 = null;
if(isset($_POST["excluir"])){
if($_POST["excluir"] == "Sim"){
$arrID=$API->comm("/ppp/secret/getall", 
array(
".proplist"=> ".id",
"?name" => $n1,
));
//if(!isset($arrID[0]))
//$arrID[0] = "";
$API->comm("/ppp/secret/remove",
array(
".id" => $arrID[0][".id"],
));

$API->write('/interface/pppoe-server/print
?user='."$n1".'
.id=.id');
$find = $API->read();
//Remove ID encontrado
foreach ($find as $find):
$API->write('/interface/pppoe-server/remove', false);
$API->write('=.id='.$find['.id']);
$API->read();
endforeach;

$user = $_SESSION['$vreg[2]'];
$sql="SELECT * FROM clientes where usuario = '$user'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$serv=$vreg[5];};
$sql="SELECT * FROM db_clientes where nome = '$n1'";
$res= mysqli_query($con,$sql);
$lin=mysqli_num_rows($res);
while($vreg=mysqli_fetch_row($res)){
$id=$vreg[1];}
if($lin == 1 ){
echo "<center><font color= 'red'>Este Cliente não estava cadastrado no banco de Dados!</font></center>";
}else{
/////////////////////////////////////
$id_servidor= $_SESSION['$id_servidor'];
$sql="SELECT * FROM db_clientes where id_cliente = $id_servidor and usuario = '$n1'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
echo $id_admin=$vreg[0];
$id=$vreg[1];
$nome=$vreg[2];
$usuario=$vreg[3];
$email=$vreg[4];
$tel=$vreg[5];
$instalaçao=$vreg[6];
$endereço=$vreg[7];
$numero=$vreg[8];
$complemento=$vreg[9];
$bairro=$vreg[10];
$plano=$vreg[11];
$ven=$vreg[12];
$valor=$vreg[14];
$bairro=$vreg[10];
$cpf=$vreg[15];
#$res=mysqli_query($con,"DELETE FROM `mensalidade` WHERE `id_clientes` = $id");
}
#$res=mysqli_query($con,"DELETE FROM `mensalidade` WHERE `id_clientes` = $id");
if(!isset($usuario)) $usuario = "Não informado"; 
if(!isset($nome)) $nome = "Não informado";
if(!isset($valor)) $valor = "Não informado";		
if(!isset($cpf)) $cpf = "Não informado";		
if(!isset($instalaçao)) $instalaçao = "Não informado";	
if(!isset($endereço)) $endereço = "Não informado";	
if(!isset($numero)) $numero = "Não informado";
if(!isset($complemento)) $complemento = "Não informado";
if(!isset($plano)) $plano = "Não informado";	
if(!isset($ven)) $ven = "Não informado";
if(!isset($tel)) $tel = "Não informado";
if(!isset($bairro)) $bairro="Não informado";



$data_hora = date('d-m-y H:i:s');
$res=mysqli_query($con,"insert into historico values
(default, '$nome','$usuario', '$id_servserv',NOW(),'Cliente Excluido', '$user' ,'$endereço' ,'$complemento','$plano','$tel',
'$data_hora','$numero', '$ven','$valor','$id','$bairro','$cpf','$email' );");
echo "<center><font color='#00CC00'>Cliente Excluido com sucesso do banco de Dados!</font></center>";
header("Refresh: 3; url = http://mstelecom.org/sistema/examples/acao4.php?id=$n1'");
}
/* EXCLUINDO CLIENTE DO BANCO */
$sql="delete FROM db_clientes where id_cliente = $id_servidor and usuario = '$n1'";
$res=mysqli_query($con,$sql);
}}
$ARRAY = $API->comm("/ppp/secret/print", array(
"count-only"=> "",
)); $num2 = $ARRAY;
if(!isset($num2))
$num2 = null;
if(!isset($num))
$num = $num2;
if($num !== $num2 ){
echo " <center> <font color='#00CC00'>Cliente Excluido com sucesso da RB!</font> </center> ";
header("Refresh: 3; url = index.php?id=$n1'");
}
};
?>