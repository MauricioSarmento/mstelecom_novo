<?php
require_once '../login/conect.php';
require 'api/routeros_api.class.php';
### CLIENTES ONLINE ###
$API = new RouterosAPI();
$API->debug = false;
/* Fazendo conexão com microtik */



$sql="SELECT * FROM clientes where priv ='1'";
$res= mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$id_user=$vreg[0];
$user=$vreg[2];
$senha=$vreg[3];
$id_serv=$vreg[5];
$serv=$vreg[7];
$sql="SELECT * FROM servidores where id_cliente = '$id_user' and id= '$serv'";
$res= mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$ip_serv=$vreg[3];

if ($API->connect("$ip_serv","$user","$senha")) {

$ARRAY = $API->comm("/ppp/secret/print");
function cmp($a, $b) {
return $a['name'] > $b['name'];}
usort($ARRAY, 'cmp');
foreach ($ARRAY as $regtable) {
	$n = $regtable['name'];	
$sql="SELECT * FROM db_clientes where id_cliente = '$id_serv' and usuario = '$n'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){	
$plano = $vreg[11];
$status = $vreg[13];
if($status != '1' ){
if($regtable['profile'] != $plano ){
if($regtable['profile'] != 'Liberado' ){
//echo $regtable['name'] . $regtable['profile'] . '<br>';
$n1 = $regtable['name'];
$comment= $plano ."-".$ven."-p";			
########################### mudar profile
$arrID=$API->comm("/ppp/secret/getall", 
array(
".proplist"=> ".id",
"?name" => $n1,
));
$API->comm("/ppp/secret/set",
array(
".id" => $arrID[0][".id"],
"profile"  => $plano,
"comment"  => $comment,
)
);
########################### remover
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

}
};

}
}
}
$API->disconnect();
}
}
}

$sql="SELECT * FROM db_clientes where id_cliente = '$id_serv' and usuario = 'casa'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
echo $star = $vreg[14];}
$star = $star + 01;
$sql="UPDATE `db_clientes` SET `valor_plano` = '$star' WHERE `db_clientes`.`usuario` = 'casa';";
$res2=mysqli_query($con,$sql);

?>