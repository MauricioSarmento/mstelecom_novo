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
/* enviando comando pro microtik */
if(!isset($n))
$n = 0;
$ARRAY = $API->comm("/ppp/active/print", array(
"count-only"=> "",
));$cliente_conectado = $ARRAY;
$ARRAY = $API->comm("/ppp/active/print");
echo '
   <div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header card-header-primary">
                  <h4 class="card-title mt-0"> Clientes</h4>
                  <p class="card-category"> Todos os clientes online no momento</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class="">
<tr>
<th scope="col"><center>NOME</center></th>
<th scope="col"><center>USUARIO</center></th>
<th scope="col"><center>IP DE CONEXÃO</center></th>
<th scope="col"><center>TEMPO</center></th>
<th scope="col"><center>STATUS</center></th>
</tr>
</thead>';
$mes = array("defalt,jan,fev,mar,abr,mai,jun,jul,ago,set,out,nov,dez");
$mes[0]='defalt';
$mes['01']='Janeiro';
$mes['02']='Fevereiro';
$mes['03']='Março';
$mes['04']='Abril';
$mes['05']='Maio';
$mes['06']='Junho';
$mes['07']='Julho';
$mes['08']='Agosto';
$mes['09']='Setembro';
$mes[10]='Outubro';
$mes[11]='Novembro';
$mes[12]='Dezembro';
function cmp($a, $b) {
return $a['name'] > $b['name'];}
usort($ARRAY, 'cmp');
$regular = 1;
$atraso = 2;
$pago = 3;
$dat = date("m");
$mensalidade = $mes[$dat];
foreach ($ARRAY as $regtable) {
$n = $regtable['name'];	
echo "<tbody>";	
echo 	"<tr>";
echo "<td><a href='acao.php?id=$n' class='form-control' target='_blank'>";
$sql="SELECT * FROM db_clientes where id_cliente = '$IP' and usuario = '$n'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
echo "<table border='0' width='300'>". $u = $vreg[2] . "</table>";	
$contato = $vreg[5];
$inst = $vreg[6];	
$val = $vreg[13];
$ven = $vreg[12];
$plano = $vreg[11];};
if(!isset($ven))
$ven = null;
if(!isset($st))
$st = null;
if(!isset($val))
$val = "3";
if($val == 1){$st = "<font color='red'><center><center><button type='button' class='btn btn-danger'>$mensalidade </button></center></font>";};
if($val == 2){$st = "<font color='blue'> <center><center><button type='button' class='btn btn-primary'>$mensalidade</button></center></font>";};
if($val == 3){$st = "<font color='#00CC00'> <center><button type='button' class='btn btn-success'>$mensalidade</button></center></font>";};
//echo $regtable['name'];
echo "</a></td>";
echo "<td><a href='acao.php?id=$n' class='form-control'><table border='0' width='170'>".$n."</table></a></td>";
echo "<td><a href='acao.php?id=$n' class='form-control'><table border='0' width='140'>".$regtable['address']."</table></a></td>";
echo "<td><a href='acao.php?id=$n' class='form-control'><table border='0' width='140'>".$regtable['uptime']."</table></a></td>";
echo "<td><a href='acao.php?id=$n'>".$st."</a></td>";
echo "</tr>";
echo "</tbody>";}		
echo "</table>";
echo "</td>";
}
?>
