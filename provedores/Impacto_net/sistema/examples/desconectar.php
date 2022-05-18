<?php
require_once '../login/protect.php';
require_once '../login/conect.php';
require_once"painel.php";
#header("Refresh: 50");
if(!isset($_GET["id"]))
$_GET["id"]= null;
$n3=$_GET["id"];
?>
<center>
<p>
SELECIONE O CLIENTE E O DESCONECTE.
<br />
</p>
<form name="login" method="post" action="">
<input type="hidden" name="acao" value="nada" /> 
<table border="1" align="center" cellpadding="2" cellspacing="2" >
<tr>
<td>Usuario :
</td><td>
<input type="text" name="des"  maxlength="50" value="
<?php echo $n3; ?>" onchange="carregatexto(this.value)" />
</td>
</tr> <td colspan="2">
<input type="submit" name="entrar" value="Desconectar" />
</td>
</tr>
</table>
</form>  
<br> 
<?php
if(isset($_POST["des"])){
$n3=$_POST["des"];
$API = new RouterosAPI();
$API->debug = false;
if ($API->connect("$servidor_mikrotik","$login_servidor_mikrotik","$senha_servidor_mikrotik")) {
if(!isset($n3))
$n3 = 0;
$cliente_conectado = $ARRAY;
$API->write('/interface/pppoe-server/print
?user='."$n3".'
.id=.id');
$find = $API->read();
foreach ($find as $find):
$API->write('/interface/pppoe-server/remove', false);
$API->write('=.id='.$find['.id']);
$API->read();
endforeach;}
$ARRAY = $API->comm("/ppp/active/print", array(
"count-only"=> "",  ));
$n = $ARRAY;
echo 'Cliente Desconectado';
}
?>
