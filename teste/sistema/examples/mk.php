<?php
require 'api/routeros_api.class.php';
require_once 'conexao/conect.php';
$API = new RouterosAPI();
$API->debug = false;
/* Fazendo conexão com microtik */
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
echo '</div></td><tr></table></center>';








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
?>