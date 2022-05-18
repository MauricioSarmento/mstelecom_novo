<?php
require_once '../login/protect.php';
$user = $_SESSION['$vreg[2]'];
$pass = $_SESSION['$vreg[3]'];
 $serv = $_SESSION['numIpp'];

/* puxando arquivos de API e conexao */
require 'api/routeros_api.class.php';
require_once '../login/conect.php';
$API = new RouterosAPI();
$API->debug = false;
/* Fazendo conexão com microtik */
if ($API->connect("$servidor_mikrotik","$login_servidor_mikrotik","$senha_servidor_mikrotik")) {
$ARRAY = $API->comm("/ppp/secret/print");
echo "</br>";
echo "</br>";
$user1 = $_SESSION['$vreg[2]'];
$sql="SELECT * FROM clientes where usuario = '$user1'";
$res= mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$priv=$vreg[6];
$id_serv=$vreg[7];}
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
function cmp($a, $b)
{
return $a['name'] > $b['name'];
}
usort($ARRAY, 'cmp');
if(!isset($ven))
foreach ($ARRAY as $regtable)
{
$n = $regtable['name'];	
echo "<tbody>";	
echo "<tr>";
echo "<td><a href='acao.php?id=$n'><font color=#04B404 size=3>";
$sql="SELECT * FROM db_clientes where id_cliente = '$IP' and usuario = '$n'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res))
{
$id2=$vreg[1];
if($regtable['profile'] == 'Bloqueio2' or $regtable['profile'] == 'Bloqueio'){
echo "<a href='acao.php?id=$n' class='form-control' target='_blank'>";
echo "<center><font color='red' ><table border='0' width='300'>" .$u = $vreg[2] . "</table></font></center>";
}else{
///////////////////////// SE O PERFIL FOR LIBERADO EXIBIR O NOME EM AMARELO ////////////
if($regtable['profile'] == 'Liberado'){echo "<a href='acao.php?id=$n' class='form-control'> <center>";
echo "<font color='orange'><table border='0' width='300'>" .$u = $vreg[2] . "</table></font></center>";
}else{
///////////////////////// SE O PERFIL FOR NORMAL EXIBIR O NOME AZUL ////////////////////
echo "<a href='acao.php?id=$n' class='form-control' target='_blank'> ";
echo "<table border='0' width='300'><center>".$u = $vreg[2]."</table></center>";
}
}
////////////////////////////////////////////////////////////////////////////////////////
$n1 = $vreg[3];	
$contato = $vreg[5];
$inst = $vreg[6];	
$val = $vreg[13];
$ven = $vreg[12];
$plano = $vreg[11];
};
$regular = 1;
$atraso = 2;
$pago = 3;
$dat = date("m");
$mensalidade = $mes[$dat];
$carne = "<font color='#00CC00'> <center><button type='button' class='btn btn-warning'>Gerar</button></center></font>";
$excluir = "<font color='#00CC00'> <center><button type='button' class='btn btn-danger'>Apagar</button></center></font>";
if(!isset($ven))
$ven = null;
if(!isset($st))
$st = null;
if(!isset($val))
$val = "3";
//////////////// BOTÕES ///////////////////////////
if($val == 1){$st = "<font color='red'><center><center><button type='button' class='btn btn-danger'>$mensalidade </button></center></font>";};
if($val == 2){$st = "<font color='blue'> <center><center><button type='button' class='btn btn-primary'>$mensalidade</button></center></font>";
$comment= $plano ."-".$ven;
if($regtable['profile'] != $plano){
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
}
}
if($val == 3){$st = "<font color='#00CC00'> <center><button type='button' class='btn btn-success'>$mensalidade</button></center></font>";};
///////////////////////////////////////////////////
echo "</a></font></td>";
echo "<td>";
///////////////////////// SE O PERFIL FOR BLOQUEIO EXIBIR O NOME EM VERMELHO ///////////
if($regtable['profile'] == 'Bloqueio2' or $regtable['profile'] == 'Bloqueio'){
echo "<a href='acao.php?id=$n'class='form-control' target='_blank'>";
echo "<center><font color='red'><table border='0' width='200' >" .$n . "</table></font></center>";
}else{
///////////////////////// SE O PERFIL FOR LIBERADO EXIBIR O NOME EM AMARELO ////////////
if($regtable['profile'] == 'Liberado'){echo "<center><a href='acao.php?id=$n' class='form-control' target='_blank'>"; echo "<font color='orange'><table border='0' width='200'>" .$n . "</table></font></center>";}
else
///////////////////////// SE O PERFIL FOR NORMAL EXIBIR O NOME AZUL ////////////////////
{echo "<a href='acao.php?id=$n' class='form-control' target='_blank'>"; echo "<table border='0' width='200'><center>".$n."</table></center>";
}
}
echo "</a></td>";
echo "<td>";
///////////////////////// SE O PERFIL FOR BLOQUEIO EXIBIR O NOME EM VERMELHO ///////////
if($regtable['profile'] == 'Bloqueio2' or $regtable['profile'] == 'Bloqueio'){
echo "<a href='acao.php?id=$n' class='form-control' target='_blank'>";
echo "<center><font color='red'><table border='0' width='160'>" .$regtable['last-logged-out'] . "</table></font></center>";
}else{

///////////////////////// SE O PERFIL FOR LIBERADO EXIBIR O NOME EM AMARELO ////////////
if($regtable['profile'] == 'Liberado'){echo "<a href='acao.php?id=$n' class='form-control' target='_blank'>";
echo "<center><font color='orange'><table border='0' width='160'>" .$regtable['last-logged-out'] . "</table></font></center>";
}else{
///////////////////////// SE O PERFIL FOR NORMAL EXIBIR O NOME AZUL ////////////////////
echo "<a href='acao.php?id=$n' class='form-control' target='_blank'>";
echo "<table border='0' width='160'><center>".$regtable['last-logged-out']."</table></center>";
}
}
echo "</a></td>";
echo "<td>";
///////////////////////// SE O PERFIL FOR BLOQUEIO EXIBIR O NOME EM VERMELHO ///////////
if($regtable['profile'] == 'Bloqueio2' or $regtable['profile'] == 'Bloqueio'){
echo "<a href='acao.php?id=$n' class='form-control' target='_blank'>";
echo "<font color='red'><table border='0' width='15'>" .$ven . "</table></font>";
}else{
///////////////////////// SE O PERFIL FOR LIBERADO EXIBIR O NOME EM AMARELO ////////////
if($regtable['profile'] == 'Liberado'){echo "<a href='acao.php?id=$n' class='form-control' target='_blank'>";
echo "<font color='orange'><table border='0' width='15'>" .$ven . "</table></font>";
}else{
///////////////////////// SE O PERFIL FOR NORMAL EXIBIR O NOME AZUL ////////////////////
echo "<a href='acao.php?id=$n' class='form-control' target='_blank'>";
echo "<table border='0' width='15'><center>".$ven."</table></center>";
}
}
echo "</a></td>";
echo 		"<td><a href='acao.php?id=$n' target='_blank'>".$st."</a></td>";
echo "</td>";
echo 	"</tr>";
echo "</tbody>"; 
}
echo "</table>";
echo "</td></div>";
}
echo "</div>";
}
?>