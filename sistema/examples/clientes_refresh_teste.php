<br>
<!----------------INICIO DE CODIGO PHP--------------------->
<?php
echo '
<div class="table-responsive">
<table class="table table-hover" width="800">
<thead class="">
<tr>
<td><center>NOME</center></td>
<td><center>USUARIO</center></td>
<td><center>PLANO</center></td>
<td><center>VENCIMENTO</center></td>
<td><center>ULTIMA CONEXÃO</center></td>
<td><center>TEMPO</center></td>
<td><center>ONLINE</center></td>
<td><center>STATUS</center></td>
</tr>
';

require_once '../login/protect.php';
require_once '../login/conect.php';
require 'api/routeros_api.class.php';
### CLIENTES ONLINE ###
$API = new RouterosAPI();
$API->debug = false;
/* Fazendo conexão com microtik */
if ($API->connect("$servidor_mikrotik","$login_servidor_mikrotik","$senha_servidor_mikrotik")) {
	$ARRAY = $API->comm("/ppp/secret/print", array(
"count-only"=> "",
));$cliente_cadastrado = $ARRAY;
$ARRAY = $API->comm("/ppp/secret/print");
$count = 1;
$count2 = 1;
foreach ($ARRAY as $regtable) {
	if($regtable['profile'] == 'Bloqueio'){$Bloqueados = $count ++;}	
	if($regtable['profile'] == 'Bloqueio2'){$Bloqueados = $count ++;}
	if($regtable['profile'] == 'Liberado'){$Liberados = $count2 ++;}
}
$ARRAY = $API->comm("/ppp/active/print", array(
"count-only"=> "",
));$cliente_conectado = $ARRAY;



$ARRAY = $API->comm("/ppp/active/print");
$ARRAY2 = $API->comm("/ppp/secret/print");
}
$sql="SELECT * FROM db_clientes ORDER BY usuario";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
	$user = $vreg[3];
	$plano = $vreg[11];
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo "<tr><td><a href='acao.php?id=$user' target='_blank'><center>";
foreach ($ARRAY2 as $regtable)
{
 if($regtable['profile'] == 'Bloqueio' and $user == $regtable['name']){echo '<font color=red>' . $vreg[2] . '</font>';}
 if($regtable['profile'] == 'Bloqueio2' and $user == $regtable['name']){echo '<font color=red>' . $vreg[2] . '</font>';}
 if($regtable['profile'] == 'Liberado' and $user == $regtable['name']){echo '<font color=orange>' . $vreg[2] . '</font>';}
 if($regtable['profile'] == $plano and $user == $regtable['name']){echo '<font color=black>' . $vreg[2] . '</font>';}
}
echo "</center></td>";
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo "<td><a href='acao.php?id=$user' target='_blank'><center>"; 
  foreach ($ARRAY2 as $regtable)
{
 if($regtable['profile'] == 'Bloqueio' and $user == $regtable['name']){echo '<font color=red>' . $vreg[3] . '</font>';}
 if($regtable['profile'] == 'Bloqueio2' and $user == $regtable['name']){echo '<font color=red>' . $vreg[3] . '</font>';}
 if($regtable['profile'] == 'Liberado' and $user == $regtable['name']){echo '<font color=orange>' . $vreg[3] . '</font>';}
 if($regtable['profile'] == $plano and $user == $regtable['name']){echo '<font color=black>' . $vreg[3] . '</font>';}
}
echo "</center></td>";
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo "<td><a href='acao.php?id=$user' target='_blank'><center>";
  foreach ($ARRAY2 as $regtable)
{
 if($regtable['profile'] == 'Bloqueio' and $user == $regtable['name']){echo '<font color=red>' . $vreg[11] . '</font>';}
 if($regtable['profile'] == 'Bloqueio2' and $user == $regtable['name']){echo '<font color=red>' . $vreg[11] . '</font>';}
 if($regtable['profile'] == 'Liberado' and $user == $regtable['name']){echo '<font color=orange>' . $vreg[11] . '</font>';}
 if($regtable['profile'] == $plano and $user == $regtable['name']){echo '<font color=black>' . $vreg[11] . '</font>';}
}
echo "</center></td>";
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo "<td><a href='acao.php?id=$user' target='_blank'><center>" . $vreg[12] . "</center></td>";
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo "<td><a href='acao.php?id=$user' target='_blank'><center>";
  foreach ($ARRAY2 as $regtable)
{
 if($user == $regtable['name']){echo $regtable['last-logged-out'];}
}
echo "</center></td>";
echo '<td>';
foreach ($ARRAY as $regtable)
{
if($user == $regtable['name']){echo $regtable['uptime'];}
}
echo '</td>';
echo '<td>';
foreach ($ARRAY as $regtable)
{
if($user == $regtable['name']){echo '<font color=gree>Online</font>';}
}
echo '</td>';
echo '<td><center>';
if($vreg[13] == '3'){echo'Pago';}
if($vreg[13] == '2'){echo'Pago';}
if($vreg[13] == '1'){echo'Atrasado';}
echo '</center></td>';
echo '<td>';
echo '</tr>';
}
?>
</thead>
</table>