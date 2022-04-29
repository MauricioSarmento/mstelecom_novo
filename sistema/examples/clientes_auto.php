<?php
echo date("M");
require_once 'conexao/conect.php';
require 'api/routeros_api.class.php';
$sql="SELECT * FROM clientes where usuario = 'Mauricio'";
$res= mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$login_servidor_mikrotik=$vreg[2];
$senha_servidor_mikrotik=$vreg[3];}
$servidor_mikrotik= '172.16.0.3';
$API = new RouterosAPI();
$API->debug = false;
/* Fazendo conexão com microtik */
if ($API->connect("$servidor_mikrotik","$login_servidor_mikrotik","$senha_servidor_mikrotik")) {
$ARRAY = $API->comm("/ppp/secret/print");
echo '<div class="col-md-12">
              <div class="card card-plain">
                <div class="card-header card-header-primary">
                  <h4 class="card-title mt-0"> Clientes</h4>
                  <p class="card-category"> Todos os clientes cadastrados</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class="">
<tr>
<th scope="col" > <center>NOME DO CLIENTE </center></th>
<th scope="col"> <center>NOME DO USUARIO </center></th>
<th scope="col"> <center>ULTIMO LOGIN </center></th>
<th scope="col"> <center>VENC </center></th>
<th scope="col"> <center>STATUS </center></th>

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
echo "<td><a href='acao.php?id=$n'><font color=#04B404 size=3>";
$sql="SELECT * FROM db_clientes where id_cliente = '133' and usuario = '$n'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$id2=$vreg[1];
if($regtable['profile'] == 'Bloqueio2'){echo "<a href='acao.php?id=$n' class='form-control' target='_blank'>"; echo "<center><font color='red' ><table border='0' width='300'>" .$u = $vreg[2] . "</table></font></center>";
}else{

///////////////////////// SE O PERFIL FOR BLOQUEIO EXIBIR O NOME EM VERMELHO ///////////
if($regtable['profile'] == 'Bloqueio'){
echo "<a href='acao.php?id=$n' class='form-control' target='_blank'> <center>"; echo "<font color='red'><table border='0' width='300'>" .$u = $vreg[2] . "</table></font></center>";}
else
///////////////////////// SE O PERFIL FOR LIBERADO EXIBIR O NOME EM AMARELO ////////////
{if($regtable['profile'] == 'Liberado'){echo "<a href='acao.php?id=$n' class='form-control'> <center>"; echo "<font color='orange'><table border='0' width='300'>" .$u = $vreg[2] . "</table></font></center>";}
else
///////////////////////// SE O PERFIL FOR NORMAL EXIBIR O NOME AZUL ////////////////////
{echo "<a href='acao.php?id=$n' class='form-control' target='_blank'> "; echo "<table border='0' width='300'><center>".$u = $vreg[2]."</table></center>";}}
};
////////////////////////////////////////////////////////////////////////////////////////
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

if($regtable['profile'] != $plano){
////////SE ALGUEM MUDAR O PROFILE DO CLIENTE QUE ESTA OK, ELE MUDA DE VOLTA
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
}};
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

if($val == 3){$st = "<font color='#00CC00'> <center><button type='button' class='btn btn-success'>$mensalidade</button></center></font>";};
///////////////////////////////////////////////////
//echo $regtable['name'];
echo "</a></font></td>";
echo "<td>";
///////////////////////// SE O PERFIL FOR BLOQUEIO EXIBIR O NOME EM VERMELHO ///////////
if($regtable['profile'] == 'Bloqueio2'){
echo "<a href='acao.php?id=$n'class='form-control' target='_blank'>"; echo "<center><font color='red'><table border='0' width='200' >" .$n . "</table></font></center>";}
else{
if($regtable['profile'] == 'Bloqueio'){
echo "<a href='acao.php?id=$n'class='form-control' target='_blank'>"; echo "<center><font color='red'><table border='0' width='200'>" .$n . "</table></font></center>";}
else
///////////////////////// SE O PERFIL FOR LIBERADO EXIBIR O NOME EM AMARELO ////////////
{if($regtable['profile'] == 'Liberado'){echo "<center><a href='acao.php?id=$n' class='form-control' target='_blank'>"; echo "<font color='orange'><table border='0' width='200'>" .$n . "</table></font></center>";}
else
///////////////////////// SE O PERFIL FOR NORMAL EXIBIR O NOME AZUL ////////////////////
{echo "<a href='acao.php?id=$n' class='form-control' target='_blank'>"; echo "<table border='0' width='200'><center>".$n."</table></center>";}};
}

echo "</a></td>";
echo "<td>";
///////////////////////// SE O PERFIL FOR BLOQUEIO EXIBIR O NOME EM VERMELHO ///////////
if($regtable['profile'] == 'Bloqueio2'){
echo "<a href='acao.php?id=$n' class='form-control' target='_blank'>"; echo "<center><font color='red'><table border='0' width='160'>" .$regtable['last-logged-out'] . "</table></font></center>";}
else{
if($regtable['profile'] == 'Bloqueio'){
echo "<a href='acao.php?id=$n' class='form-control' target='_blank'>"; echo "<center><font color='red'><table border='0' width='160'>" .$regtable['last-logged-out'] . "</table></font></center>";}
else
///////////////////////// SE O PERFIL FOR LIBERADO EXIBIR O NOME EM AMARELO ////////////
{if($regtable['profile'] == 'Liberado'){echo "<a href='acao.php?id=$n' class='form-control' target='_blank'>"; echo "<center><font color='orange'><table border='0' width='160'>" .$regtable['last-logged-out'] . "</table></font></center>";}
else
///////////////////////// SE O PERFIL FOR NORMAL EXIBIR O NOME AZUL ////////////////////
{echo "<a href='acao.php?id=$n' class='form-control' target='_blank'>"; echo "<table border='0' width='160'><center>".$regtable['last-logged-out']."</table></center>";}};
////////////////////////////////////////////////////////////////////////////////////////
}echo "</a></td>";
echo "<td>";
///////////////////////// SE O PERFIL FOR BLOQUEIO EXIBIR O NOME EM VERMELHO ///////////
if($regtable['profile'] == 'Bloqueio2'){
echo "<a href='acao.php?id=$n' class='form-control' target='_blank'>"; echo "<font color='red'><table border='0' width='15'>" .$ven . "</table></font>";
}else{
	if($regtable['profile'] == 'Bloqueio'){
echo "<a href='acao.php?id=$n' class='form-control' target='_blank'>"; echo "<font color='red'><table border='0' width='15'>" .$ven . "</table></font>";}
else
///////////////////////// SE O PERFIL FOR LIBERADO EXIBIR O NOME EM AMARELO ////////////
{if($regtable['profile'] == 'Liberado'){echo "<a href='acao.php?id=$n' class='form-control' target='_blank'>"; echo "<font color='orange'><table border='0' width='15'>" .$ven . "</table></font>";}
else
///////////////////////// SE O PERFIL FOR NORMAL EXIBIR O NOME AZUL ////////////////////
{echo "<a href='acao.php?id=$n' class='form-control' target='_blank'>"; echo "<table border='0' width='15'><center>".$ven."</table></center>";}};
}////////////////////////////////////////////////////////////////////////////////////////
echo "</a></td>";
echo 		"<td><a href='acao.php?id=$n' target='_blank'>".$st."</a></td>";

echo "</td>";
echo 	"</tr>";
echo "</tbody>"; }
echo "</table>";
echo "</td></div>";

}
echo "</div>";


?>