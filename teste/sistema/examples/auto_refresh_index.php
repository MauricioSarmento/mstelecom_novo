<?php
require_once '../login/protect.php';
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


}
#echo $userid = $_SESSION['$id_servidor'];
#echo $total_cliente_conectado = '<center><strong>CLIENTES CADASTRADOS:<font color= gree>' . $cliente_cadastrado . '</font></strong> ------<strong>  ONLINE:<font color= gree>' . $cliente_conectado . '</font></strong>';


# colocando a quantidade de clientes em max login
 $userid = $_SESSION['$id_servidor'];
$sql="SELECT * FROM conf where id_usuario = '$userid'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
  $max = $vreg[1];
  $max = $vreg[2];
  $max = $vreg[3];
  $hora = $vreg[4];

}
$data = date("d/m/Y");
if($max > 0){if($cliente_conectado > $max){
		$sql="UPDATE conf SET max_login = '$cliente_conectado' , hora = '$data' ";
$res=mysqli_query($con,$sql);
	}} else {
	
$res=mysqli_query($con,"insert into conf values
(default,'$userid', 'NULL','$cliente_conectado', '$data');");
}
# esta em auto_refresh_online ----->
# echo "MAXIMO DE CLIENTES CONECTADOS = " . $max . " --- " . $hora;
				  $user1 = $_SESSION['$vreg[2]'];
$sql="SELECT * FROM clientes where usuario = '$user1'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$user1 = $vreg[1];
}
$sql="SELECT * FROM clientes where usuario = '$user1' and nome = '$user1'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$id_servserv = $vreg[7];
}
$sql="SELECT * FROM chamado where id_serv = $id_servserv and status = '1' ";
$res=mysqli_query($con,$sql);
$lin=mysqli_num_rows($res);
 ?>
  <!--- //auto refresh -->
       <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-4">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">Cadastrados</i>
                  
				  </div>

                  <p class="card-category"></p>
                  <h3 class="card-title"><?php
				  echo $cliente_cadastrado;
				  ?>                    
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="clientes.php"><h5>CADASTRADOS</h5></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">Ativos</i>
                  </div>
                  <p class="card-category"></p>
                  <h3 class="card-title"><?php
				  echo $cliente_conectado;
				  ?>  </h3>
                </div>
               <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="ativos.php"><h5>ATIVOS</h5></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">Recorde</i>
                  </div>
                  <p class="card-category"></p>
                  <h3 class="card-title"><?php echo $max; ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                   <a href="#"><h5>RECORD:<?php echo $hora;?></h5></a>
                  </div>
                </div>
				
              </div>
			  
	        </div>
			
			<div class="col-lg-2 col-md-4 col-sm-4">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">Chamados</i>
                  </div>
                  <p class="card-category"></p>
                  <h3 class="card-title"><?php echo $lin; ?> </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
				  <i class="material-icons text-danger">warning</i>
                    <a href="chamados.php"><h5>CHAMADOS</h5></a>
                  </div>
                </div>
				
              </div>
			  
	        </div>
			
			
			<div class="col-lg-2 col-md-4 col-sm-4">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">Bloqueados</i>
                  </div>
                  <p class="card-category"></p>
                  <h3 class="card-title"><?php echo $Bloqueados; ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
				  <i class="material-icons text-danger">warning</i>
                    <a href="bloqueados.php"><h5>BLOQUEADOS</h5></a>
                  </div>
                </div>
              </div>
			  </div>
			<div class="col-lg-2 col-md-4 col-sm-4">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">Liberados</i>
                  
				  </div>

                  <p class="card-category"></p>
                  <h3 class="card-title"><?php
				  echo $Liberados;
				  ?>                    
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="liberados.php"><h5>LIBERADOS</H5></a>
</div>
</div>
</div>
</div>
</div>
</div>
		
		<?php echo '<center><table><tr><td><div>';
$ip = $servidor_mikrotik;//ip do Mikrotik
$login = $login_servidor_mikrotik;//login do Mikrotik
$senha = $senha_servidor_mikrotik;//senha do Mikrotik
$portwww = "8099";//porta WWW do Mikrotik
$inteface = "ether1";//Interface para principal do Mikrotik
	echo "<h3>Grafico Diario media de 5 min</h3>";
	echo "<img src=\"http://$ip:$portwww/graphs/iface/$inteface/daily.gif\"";	
	echo '</div></td><td>';
	
	echo '<div>';
	$ip = $servidor_mikrotik;//ip do Mikrotik
$login = $login_servidor_mikrotik;//login do Mikrotik
$senha = $senha_servidor_mikrotik;//senha do Mikrotik
$portwww = "8099";//porta WWW do Mikrotik
$inteface = "ether1";//Interface para principal do Mikrotik
	echo "<h3>Grafico semanal media de 30 min</h3>";
	echo "<img src=\"http://$ip:$portwww/graphs/iface/$inteface/weekly.gif\"";	
echo '</div></td><tr></table></center>';
?>
		<!--- ATUALIZAÇÕES -->
	
			 <div class="col-md-12">
              <div class="card card-plain">
                <div class="card-header card-header-primary">
                  <h4 class="card-title mt-0"> Alterações</h4>
                  <p class="card-category"> Ultimas alterações feitas</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class="">

<th scope="col">USUARIO</th>
<th scope="col">PLANO</th>
<th scope="col">CONTATO</th>
<th scope="col">DATA</th>
<th scope="col">ALTERAÇÃO</th>
<th scope="col">USUARIO</th>
</tr>
</thead>
<?php
$sql="SELECT * FROM historico ORDER BY data DESC limit 15";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
	$n = $vreg[1];	
    $usuario=$vreg[2];
	$data=$vreg[4];
	$oq=$vreg[5];
	$quem=$vreg[6];
		$end=$vreg[7];
			$compl=$vreg[8];
				$plano=$vreg[9];
					$contato=$vreg[10];
						$inst=$vreg[11];
	

echo "<td>";


if($oq=="Cliente Excluido"){echo "<a href='acao4.php?id=$usuario'><font color=red size=3>";}else{if($oq=="Pagamento"){echo "<a href='acao.php?id=$usuario'><font color=blue size=3>";}else{if($oq=="Bloqueio"){echo "<a href='acao.php?id=$usuario'><font color=black size=3>";}else{echo "<a href='acao.php?id=$usuario'><font color=#04B404 size=3>";}} } echo $usuario . " </a></td>";
echo "<td >"; if($oq=="Cliente Excluido"){echo "<a href='acao4.php?id=$usuario'><font color=red size=3>";}else{if($oq=="Pagamento"){echo "<a href='acao.php?id=$usuario'><font color=blue size=3>";}else{if($oq=="Bloqueio"){echo "<a href='acao.php?id=$usuario'><font color=black size=3>";}else{echo "<a href='acao.php?id=$usuario'><font color=#04B404 size=3>";} }} echo $plano." </a></td>";
echo "<td >"; if($oq=="Cliente Excluido"){echo "<a href='acao4.php?id=$usuario'><font color=red size=3>";}else{if($oq=="Pagamento"){echo "<a href='acao.php?id=$usuario'><font color=blue size=3>";}else{if($oq=="Bloqueio"){echo "<a href='acao.php?id=$usuario'><font color=black size=3>";}else{echo "<a href='acao.php?id=$usuario'><font color=#04B404 size=3>";} }} echo $contato ."</a></td>";
echo "<td >"; if($oq=="Cliente Excluido"){echo "<a href='acao4.php?id=$usuario'><font color=red size=3>";}else{if($oq=="Pagamento"){echo "<a href='acao.php?id=$usuario'><font color=blue size=3>";}else{if($oq=="Bloqueio"){echo "<a href='acao.php?id=$usuario'><font color=black size=3>";}else{echo "<a href='acao.php?id=$usuario'><font color=#04B404 size=3>";} }} echo $inst ."</a></td>";
echo "<td >"; if($oq=="Cliente Excluido"){echo "<a href='acao4.php?id=$usuario'><font color=red size=3>";}else{if($oq=="Pagamento"){echo "<a href='acao.php?id=$usuario'><font color=blue size=3>";}else{if($oq=="Bloqueio"){echo "<a href='acao.php?id=$usuario'><font color=black size=3>";}else{echo "<a href='acao.php?id=$usuario'><font color=#04B404 size=3>";} }} echo $oq ."</a></td>";
echo "<td >"; if($oq=="Cliente Excluido"){echo "<a href='acao4.php?id=$usuario'><font color=red size=3>";}else{if($oq=="Pagamento"){echo "<a href='acao.php?id=$usuario'><font color=blue size=3>";}else{if($oq=="Bloqueio"){echo "<a href='acao.php?id=$usuario'><font color=black size=3>";}else{echo "<a href='acao.php?id=$usuario'><font color=#04B404 size=3>";} }} echo $quem ."</a></td></font>";


	echo "</td>";
echo "</tr>";	
}

?>
  </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>