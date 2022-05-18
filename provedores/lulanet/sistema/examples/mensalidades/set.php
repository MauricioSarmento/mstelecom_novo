


<form name="login" method="post" action="">
<input type="hidden" name="get" value="nada" /> 

<table border="0" align="center" cellpadding="2" cellspacing="2" >
<tr>
<td>Nome:
</td>
<td>
<input type="text" name="nome2" size="30" maxlength="25" value="
Sep
" onchange="carregatexto(this.value)" />
</td>
</tr>
<td colspan="2">
<br><br>
<input type="submit" name="entrar" value="Pagar"/>

</td>
</tr>
</table>
</form>
<?php
$user1 = $_SESSION['$vreg[2]'];
$sql="SELECT * FROM clientes where usuario = '$user1'";
$res= mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$priv=$vreg[6];
$id_serv=$vreg[7];}
if($priv == 3 or $priv == 1 ) { 
if(!isset($_GET["id"]))
$_GET["id"]= null;
	$n1=$_GET["id"]; 
if(!isset($mes2))
	$mes2 = null;
$ano = date ("y");
 if(isset($_POST["nome2"])){
	 $mes2=$_POST["nome2"];
	 	 if(isset($_SESSION['ano2']))
$ano=$_SESSION['ano2']; 
if(!isset($_SESSION['ano2']))
 $ano = date ("y");
	 	$sql="SELECT * FROM mensalidade where id_clientes = $id and ano = '$ano'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
echo $id2=$vreg[0];}
	 $res=mysqli_query($con,"UPDATE `mensalidade` SET `$mes2` = '2' WHERE `mensalidade`.`id` = $id2; ");
	$res=mysqli_query($con,$sql);
echo $mes2 . "<br>" . $id . "<br>";
echo '
<script type="text/javascript"> 
	var urlAtual = window.location.href;
window.location.href=urlAtual;
				</script>

';
};}
?>