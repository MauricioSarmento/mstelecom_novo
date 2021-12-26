<?php
if(!isset($_GET["id"]))
$_GET["id"]= null;
	$n1=$_GET["id"];
	
?>

<form name="login" method="post" action="">
<input type="hidden" name="get" value="nada" /> 

<table border="0" align="center" cellpadding="2" cellspacing="2" >
<tr>LIBERAR INTERNET?
<br>
<td>SIM: <input type="radio" name="nome3" value="Sim" />
	NÃO: <input type="radio" name="nome3" value="nao" />
	</td>
<td colspan="2">
<input type="submit" name="entrar" value="OK"/>

</td>
</tr>
</table>
</form>
	
<?php
/////////////////////////
/////////////////////////
/////////////////////////
if(isset($_POST["nome3"])){
$nn=$_POST["nome3"];
if($nn == "Sim"){$n = $n1;
if(!isset($n))
$n = null;
//$API->debug = true;
if(isset($_POST["nome3"])){
//////teste para mudar profile
if(!isset($n))
$n = null;
$arrID=$API->comm("/ppp/secret/getall", 
array(
".proplist"=> ".id",
"?name" => $n,
));
if(!isset($p))
$p=$plano;
if(!isset($arrID[0]))
$arrID[0] = null;
$API->comm("/ppp/secret/set",
array(
".id" => $arrID[0][".id"],
"profile"  => "Liberado",

)
);
$API->write('/interface/pppoe-server/print
?user='."$n".'
.id=.id');
$find = $API->read();
//Remove ID encontrado
foreach ($find as $find):
$API->write('/interface/pppoe-server/remove', false);
$API->write('=.id='.$find['.id']);
$API->read();
endforeach;
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(!isset($id))
$id=null;
$sql="SELECT * FROM db_clientes where id_cliente = $id_servidor and usuario = '$n'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
 $id_servidor=$vreg[0];
$id=$vreg[1];
$nome=$vreg[2];
};
if(!isset($id))
$id = null;
//$sql="UPDATE db_clientes SET status_cliente = '3' WHERE id = $id";
//$res=mysqli_query($con,$sql);
$user = $_SESSION['$vreg[2]'];
$user1 = $_SESSION['$vreg[2]'];
$username1 = $_SESSION['$vreg[1]'];
$sql="SELECT * FROM clientes where usuario = '$user1'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$useruser = $vreg[1];
}
$sql="SELECT * FROM clientes where usuario = '$useruser'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$id_servserv = $vreg[5];
}
		  $sql="SELECT * FROM db_clientes where id_cliente = $id_servserv and usuario = '$n'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
    $id_admin=$vreg[0];
	$id=$vreg[1];
	$nome=$vreg[2];
	$usuario=$vreg[3];
	$email=$vreg[4];
	$tel=$vreg[5];
	$instalaçao=$vreg[6];
	$endereço=$vreg[7];
	$numero=$vreg[8];
	$complemento=$vreg[9];
	$apelido=$vreg[10];
	$plano=$vreg[11];
$ven=$vreg[12];
$valor=$vreg[14];
}
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
$data_hora = date('d-m-y H:i:s');
	$res=mysqli_query($con,"insert into historico values
(NULL, '$nome','$n', '$id_servserv',NOW(),'Liberação de Internet', '$user' ,'$endereço' ,'$complemento','$plano','$tel','$data_hora', '$numero', '$ven','$valor','$apelido' );");

;}}}
////////////////
?>