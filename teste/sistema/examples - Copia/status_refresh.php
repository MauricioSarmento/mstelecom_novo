<?php
require_once '../login/protect.php';
require_once 'conexao/conect.php';
require 'api/routeros_api.class.php';
require_once'pag2.php';
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


}
$ARRAY = $API->comm("/ppp/secret/print");
$count = 1;
$count2 = 1;
$pl8 = 1;
$pl10 = 1;
$pl15 = 1;
$pl20 = 1;
$pl30 = 1;
$pl50 = 1;
foreach ($ARRAY as $regtable) {
	if($regtable['profile'] == 'Bloqueio'){$Bloqueados = $count ++;}	
	if($regtable['profile'] == 'Bloqueio2'){$Bloqueados = $count ++;}
	if($regtable['profile'] == 'Liberado'){$Liberados = $count2 ++;}
	if($regtable['profile'] == '8M'){$p8 = $pl8 ++;}
	if($regtable['profile'] == '10M'){$p10 = $pl10 ++;}
	if($regtable['profile'] == '15M'){$p15 = $pl15 ++;}
	if($regtable['profile'] == '20M'){$p20 = $pl20 ++;}
	if($regtable['profile'] == '30M'){$p30 = $pl30 ++;}
	if($regtable['profile'] == '50M'){$p50 = $pl50 ++;}
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

			

echo $painel = '
  <!--- //auto refresh -->
              <div class="container-fluid">
          <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-4">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">Cadastrados</i>
                  
				  </div>

                  <p class="card-category"></p>
                  <h3 class="card-title">' .$cliente_cadastrado .'                    
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
                  <h3 class="card-title">' . $cliente_conectado . '
				 </h3>
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
                  <h3 class="card-title">'. $max .'</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                   <a href="#"> <h5>RECORD:' . $hora . '<h5></a>
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
                  <h3 class="card-title">' . $lin .' </h3>
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
                  <h3 class="card-title">'. $Bloqueados . '</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
				  <i class="material-icons text-danger">warning</i>
                    <a href="#"><h5>BLOQUEADOS</h5></a>
                  </div>
                </div>
              </div>
			  </div>
			<div class="col-lg-2 col-md-4 col-sm-4">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">L</i>
                  
				  </div>

                  <p class="card-category"></p>
                  <h3 class="card-title">'. $Liberados .'
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="#"><h5>LIBERADOS</h5></a>
                  </div>
                </div>
              </div>
            </div>
			<div class="container-fluid">
          <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-4">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">P</i>
                  	  </div>
                  <p class="card-category"></p>
                  <h3 class="card-title">' .$p8 .'                    
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="clientes.php"><h5>8 MEGAS</h5></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">P</i>
                  </div>
                  <p class="card-category"></p>
                  <h3 class="card-title">' . $p10 . '
				 </h3>
                </div>
               <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="ativos.php"><h5>10 MEGAS</h5></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">P</i>
                  </div>
                  <p class="card-category"></p>
                  <h3 class="card-title">' . $p15 . '
				 </h3>
                </div>
               <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="ativos.php"><h5>15 MEGAS</h5></a>
                  </div>
                </div>
              </div>
            </div>
			
			<div class="col-lg-2 col-md-4 col-sm-4">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">P</i>
                  </div>
                  <p class="card-category"></p>
                  <h3 class="card-title">' . $p20 . '
				 </h3>
                </div>
               <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="ativos.php"><h5>20 MEGAS</h5></a>
                  </div>
                </div>
              </div>
            </div>
			
			
			<div class="col-lg-2 col-md-4 col-sm-4">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">P</i>
                  </div>
                  <p class="card-category"></p>
                  <h3 class="card-title">' . $p30 . '
				 </h3>
                </div>
               <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="ativos.php"><h5>30 MEGAS</h5></a>
                  </div>
                </div>
              </div>
            </div>
			
			<div class="col-lg-2 col-md-4 col-sm-4">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">P</i>
                  </div>
                  <p class="card-category"></p>
                  <h3 class="card-title">' . $p50 . '
				 </h3>
                </div>
               <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="ativos.php"><h5>50 MEGAS</h5></a>
                  </div>
                </div>
              </div>
            </div>
			
          </div>
		  
		</div>';
		
		
		
		
		
		if ($API->connect("$servidor_mikrotik","$login_servidor_mikrotik","$senha_servidor_mikrotik")) {
/* enviando comando pro microtik */
$ARRAY = $API->comm("/system/resource/print");
$first = $ARRAY['0'];
$memperc = ($first['free-memory']/$first['total-memory']);
$hddperc = ($first['free-hdd-space']/$first['total-hdd-space']);
$mem = ($memperc*100);
$hdd = ($hddperc*100);
echo "<table width=550 border=1 align=center>";
echo "<tr><td>Mikrotik e versão:</td><td>" . $first['platform'] . " - " . $first['board-name'] . " - "  . $first['version'] . " - " . $first['architecture-name'] . "</td></tr><br />";
echo "<tr><td>Modelo de Processador:</td><td>" . $first['cpu'] . " at " . $first['cpu-frequency'] . " Mhz with " . $first['cpu-count'] . " core(s) "  . "</td></tr><br />";
echo "<tr><td>Tempo online:</td><td>" . $first['uptime'] . " (hh/mm/ss)" . "</td></tr><br />";
echo "<tr><td>Uso de processador:</td><td>" . $first['cpu-load'] . " %" . "</td></tr><br />";
echo "</table>";
}

echo '<center><table><tr><td><div>';
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
echo '</div></td><tr></table>';








if ($API->connect("$servidor_mikrotik","$login_servidor_mikrotik","$senha_servidor_mikrotik")) {
$API->write('/interface/monitor-traffic',false);
$API->write('=interface=ether1',false);
$API->write('=once');
$ARRAY = $API->read();
if(count($ARRAY)>0){  
				$rx = number_format($ARRAY[0]["rx-bits-per-second"]/1024,1);
				$tx = number_format($ARRAY[0]["tx-bits-per-second"]/1024,1);
				$rows['name'] = 'Tx';
				$rows['data'][] = $tx;
				$rows2['name'] = 'Rx';
				$rows2['data'][] = $rx;
			}else{  
				echo $ARRAY['!trap'][0]['message'];	 
			} 
	}else{
		echo "<font color='#ff0000'>La conexion ha fallado. Verifique si el Api esta activo.</font>";
	}
	$API->disconnect();

	$result = array();
	array_push($result,$rows);
	array_push($result,$rows2);
	print json_encode($result, JSON_NUMERIC_CHECK);
		echo'</center>';
		?>
		