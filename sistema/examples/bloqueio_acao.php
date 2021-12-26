<p>
O PERFIL DO CLIENTE IRAR MUDAR PARA BLOQUEIO, BASTA SELECIONAR O NOME DO CLIENTE.
</p>
<table width="449">
CLIENTE A SER BLOQUEADO!<br>
</table>
<form name="login" method="post" action="" width='500'>
<input type="hidden" name="get" value="nada" /> 
<table border="0" align="center" cellpadding="2" cellspacing="2" >
<tr>
<td>
Usuario :
</td>
<td>
<input type="text" class="form-control" name="user" size="30" maxlength="35" value="<?php
if(!isset($_GET["id"]))
$_GET["id"]= null;
$n3=$_GET["id"];
 echo $n3;?>" onchange="carregatexto(this.value)" />
</td>
<td>
</tr> <td colspan="2">
<button type="submit" class="btn btn-primary pull-right">Bloquear</button>
</td>
</tr>
</form>  
</table>

<?php
if(isset($_POST["user"])){
echo $n=$_POST["user"];
$API = new RouterosAPI();
if ($API->connect("$servidor_mikrotik","$login_servidor_mikrotik","$senha_servidor_mikrotik")) {
$ARRAY = $API->comm("/ppp/secret/print");
$p = "Bloqueio2";
$arrID=$API->comm("/ppp/secret/getall", 
array(
".proplist"=> ".id",
"?name" => $n,
));
if(!isset($arrID[0]))
$arrID[0] = null;
$API->comm("/ppp/secret/set",
array(
".id" => $arrID[0][".id"],
"profile"  => $p,
)
);
$API->write('/interface/pppoe-server/print
?user='."$n".'
.id=.id');
$find = $API->read();
foreach ($find as $find):
$API->write('/interface/pppoe-server/remove', false);
$API->write('=.id='.$find['.id']);
$API->read();
endforeach;
$user = $_SESSION['$vreg[2]'];
$id_servidor= $_SESSION['$id_servidor'];
$sql="SELECT * FROM db_clientes where id_cliente = $id_servidor and usuario = '$n'";
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
$valor=$vreg[14];}


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
$sql="UPDATE `db_clientes` SET `status_cliente` = '1' WHERE `db_clientes`.`id` = $id;";
$res22=mysqli_query($con,$sql);
$data_hora = date('d-m-y H:i:s');
$res=mysqli_query($con,"insert into historico values
(default, '$nome','$n', '$id_servserv',NOW(),'Bloqueio', '$user' ,'$endereco' ,'$complemento','$plano','$contato',
'$data_hora','$numero', '$c','$valor','$id_cliente','$apelido','$cpf','$email' );");

echo 'Cliente bloqueado!';
}
};
?>