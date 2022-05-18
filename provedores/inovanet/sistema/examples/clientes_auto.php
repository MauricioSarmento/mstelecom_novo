<?php
require_once '../login/conect.php';
require 'api/routeros_api.class.php';
$sql="SELECT * FROM clientes where usuario = 'Mauricio'";
$res= mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
echo $login_servidor_mikrotik=$vreg[2];
echo $senha_servidor_mikrotik=$vreg[3];
     $servidor_mikrotik=$vreg[7];
}
$sql="SELECT * FROM servidores where id = '$servidor_mikrotik'";
$res= mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
echo $servidor_mikrotik=$vreg[3];}
$API = new RouterosAPI();
$API->debug = false;
/* Fazendo conexão com microtik */
if ($API->connect("$servidor_mikrotik","$login_servidor_mikrotik","$senha_servidor_mikrotik")) {
$ARRAY = $API->comm("/ppp/secret/print");
echo '<div class="col-md-12">
<table>
<thead>
<tr>
<th scope="col"> <center>NOME DO USUARIO </center></th>
</tr>
</thead>';
function cmp($a, $b) {
return $a['name'] > $b['name'];}
usort($ARRAY, 'cmp');
if(!isset($ven))
foreach ($ARRAY as $regtable) {
$n = $regtable['name'];	
echo "<tbody>";	
echo 	"<tr>";
echo "<td>";
$sql="SELECT * FROM db_clientes where id_cliente = '133' and usuario = '$n'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$idc = $vreg[1];	
$n1 = $vreg[3];	
$contato = $vreg[5];
$inst = $vreg[6];	
$val = $vreg[13];
$ven = $vreg[12];
$plano = $vreg[11];};
$regular = 1;
$atraso = 2;
$pago = 3;
$dat = date("m");
$mensalidade = $mes[$dat];
if(!isset($ven))
$ven = null;
if(!isset($st))
$st = null;
if(!isset($val))
$val = "3";
if($val == 2){
$comment= $plano ."-".$ven;

if($regtable['profile'] != $plano){ // SE ALGUEM MUDAR O PROFILE DO CLIENTE QUE ESTA OK, ELE MUDA DE VOLTA
$arrID=$API->comm("/ppp/secret/getall", // COMANDO NO MICROTIK
array(  // RETORNO EM UMA LISTA
".proplist"=> ".id", // PEGANDO A ID
"?name" => $n1, // PEGANDO O NOME
));
$API->comm("/ppp/secret/set", // COMANDO MIKROTIK PARA MUDAR
array(
".id" => $arrID[0][".id"], // SELECIONANDO O ID ENCONTRADO
"profile"  => $plano, // MUDANDO PLANO
"comment"  => $comment, // MUDANDO COMENTARIO
)
);
}
};
// CORRINGINDO BLOQUEIO QUE ROLOU QUANDO EU ESTAVA PROGRAMANDO
//
//
//
//$ven2 = $ven + 4;
//if(date("d") <= $ven2 and date("d") >= $ven ){ echo '-----' . $ven;
//$arrID=$API->comm("/ppp/secret/getall", // COMANDO NO MICROTIK
//array(  // RETORNO EM UMA LISTA
//".proplist"=> ".id", // PEGANDO A ID
//"?name" => $n1, // PEGANDO O NOME
//));
//$API->comm("/ppp/secret/set", // COMANDO MIKROTIK PARA MUDAR
//array(
//".id" => $arrID[0][".id"], // SELECIONANDO O ID ENCONTRADO
//"profile"  => $plano, // MUDANDO PLANO
//"comment"  => $comment, // MUDANDO COMENTARIO
//)
//);
//}
//
//

////////CONTAGEM DOS DIAS DE LIBERAÇÃO DE INTERNET
$sql="SELECT * FROM liberar where cliente = '$n1'";
$res=mysqli_query($con,$sql);
$lin=mysqli_num_rows($res);
while($vreg=mysqli_fetch_row($res)){
$n2=$vreg[1]; // NOME DE USUARIO
$dias=$vreg[2]; // DIAS LIBERADOS
$dia_atual=$vreg[3]; // DIA ATUAL DE HOJE

if($n2 == $n1){
if($dia_atual == $dd){}else{  /// SE O DIA FOR DIFERENTE DO DIA QUE ESTA NA TABELA ELE ESECUTA ESTE ALGORITIMO
if($dias == 0){	// SE DIAS LIBERADOS CHEGAR A 0 EXECUTA O ALGORITIMO
$sql="delete FROM liberar where cliente = '$n1'"; // EXCLUI O USUARIO DA TABELA LIBERADOS
$res=mysqli_query($con,$sql);
// BLOQUEANDO O CLIENTE NOVAMENTE
$arrID=$API->comm("/ppp/secret/getall", 
array(
".proplist"=> ".id",
"?name" => $n1,
));
$API->comm("/ppp/secret/set",
array(
".id" => $arrID[0][".id"],
"profile"  => 'Bloqueio',
)
);
}else{
$dias2 = $dias -1; /// REMOVE 1 DIA DA TABELA DOS DIAS LIBERADOS
$sql="UPDATE liberar SET dias = '$dias2', dia_atual = '$dd' WHERE `cliente` = '$n1';";  /// MUDA O DIA QUE ESTA LA PARA ATUAL E REMOVE 1 DIA DOS LIBEREADOS
$res2=mysqli_query($con,$sql);		
}
}
}
}
    if($lin == 0){ echo '....';
////////PEGANDO A DATA E BLOQUEANDO OS CLIENTES COM 6 DIAS DE ATRASO
$dd = date('d');
if($val == 1 and $dd == $ven+6){ 
$comment= $plano ."-".$ven.'_Bloqueio';
$arrID=$API->comm("/ppp/secret/getall", 
array(
".proplist"=> ".id",
"?name" => $n1,
));
$API->comm("/ppp/secret/set",
array(
".id" => $arrID[0][".id"],
"profile"  => 'Bloqueio',
"comment"  => $comment,
)
);
}
////////BLOQUEANDO OS CLIENTRES COM VENCIMENTO NO DIA 25 TODO DIA 2
if($val == 1 and $ven == 25 and $dd == 02){ 
$comment= $plano ."-".$ven.'_Bloqueio';
$arrID=$API->comm("/ppp/secret/getall", 
array(
".proplist"=> ".id",
"?name" => $n1,
));
$API->comm("/ppp/secret/set",
array(
".id" => $arrID[0][".id"],
"profile"  => 'Bloqueio',
"comment"  => $comment,
)
);
}
	}
///////VERIFICANDO SE O MES ESTA PAGO E COLOCANDO O STATOS
$dm = date("M");
$dn = date("y");
$sql="SELECT $dm FROM `mensalidade` WHERE id_clientes = '$idc' and $dm = '2' and ano ='$dn'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$sql="UPDATE `db_clientes` SET `status_cliente` = '2' WHERE `usuario` = '$n1';";
$res2=mysqli_query($con,$sql);	
}
////////MUDANDO O STATOS PARA 1, CLIENTE FICA VERMELHO NO DIA DE VENCIMENTO
if($val == 2 and $ven == $dd ){ 
$sql="UPDATE `db_clientes` SET `status_cliente` = '1' WHERE `usuario` = '$n1';";
$res2=mysqli_query($con,$sql);
}
////////PEGANDO OS CLIENTES QUE PAGARAM DEPOIS DA DATA E COLOCANDO O STATUS COMO NORMAL
if($val == 3 and date('d') < $ven+1){ 
$sql="UPDATE `db_clientes` SET `status_cliente` = '2' WHERE `usuario` = '$n1';";
$res2=mysqli_query($con,$sql);
}
echo "</a></font></td>";
echo "<td>";
echo $n;
echo "</td>";
echo 	"</tr>";
echo "</tbody>"; }
echo "</table>";
echo "</td></div>";
}
echo "</div>";
?>