<?php
require_once '../login/protect.php';
$n1 = $_SESSION['nome_user'];
require_once 'conexao/conect.php';
require 'api/routeros_api.class.php';
### CLIENTES ONLINE ###
$API = new RouterosAPI();
$API->debug = false;
/* Fazendo conexão com microtik */
if ($API->connect("$servidor_mikrotik","$login_servidor_mikrotik","$senha_servidor_mikrotik")) {
	$ARRAY = $API->comm("/ppp/secret/print", array(
"count-only"=> "",
));$cliente_cadastrado = $ARRAY;
$ARRAY = $API->comm("/ppp/active/print", array(
"count-only"=> "",
));$cliente_conectado = $ARRAY;

$ARRAY = $API->comm("/ppp/active/print");
foreach ($ARRAY as $regtable) {
if($regtable['name'] == $n1 ){$usuarioo = $regtable['name'];}else{}
if($regtable['name'] == $n1 ){$ipp = $regtable['address'];}else{}
if($regtable['name'] == $n1 ){$macr = $regtable['caller-id'];}else{}
if($regtable['name'] == $n1 ){$uptime = $regtable['uptime'];}else{}
}
if($usuarioo == $n1 ){$status22 = "<font color='black'><strong><h2>STATUS: <font color='gree'>On". "-" . $uptime . "</strong></font></h2>"; if($_SESSION['status'] == 1){$ref = 2;}}else{$status22 = "<font color='black'><strong>STATUS= <font color='red'>Desconectado</strong></font></h2>"; $ref = 1;};
///////////////////////////////////////////////////////////////////
///////////////FIM DO SCRIPT///////////////////////////////////////
///////////////////////////////////////////////////////////////////
echo $status22;	

if($ref == 1){
	session_start();
	$_SESSION['status']=$ref;
}
	if($ref == 2){
		$_SESSION['status']=$ref;
	}
		
		if($_SESSION['status'] == 2){
			$_SESSION['status']='online';
echo '
<script type="text/javascript"> 
var urlAtual = window.location.href;
window.location.href=urlAtual;
</script>';}
$user1 = $_SESSION['$vreg[2]'];
}

?>