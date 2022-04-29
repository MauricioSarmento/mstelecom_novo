<?php
require_once 'login/protect.php';
require_once'conexao.php';
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script type="text/javascript">
function validaCampo()
{
if(document.login.nome.value=="")
{
alert("Insira o nome completo.");
return false;
}
else
if(document.login.cpf.value=="")
{
alert("Insira o CPF do cliente, se não tiver coloque '000000000000'.");
return false;
}
else
if(document.login.endereco.value=="")
{
alert("Insira o endereço.");
return false;
}
else
if(document.login.contato.value=="")
{
alert("Insira o Numero de contato do cliente.");
return false;
}
else
if(document.login.usuario.value=="")
{
alert("Insira o nome de usuario.");
return false;
}
else
if(document.login.valor.value=="")
{
alert("Insira o valor do contrato.");
return false;
}
else
return true;
}
</script>
<form action="" method="post" name="login" id="login" class="login" onSubmit="return validaCampo(); return false;">
<input type="hidden" name="get" value="nada" /> 
<table border="1" align="center" cellpadding="2" cellspacing="2" bgcolor="gray">
<tr>
<td>Nome completo:<font color='red'>*</font>
</td>
<td>
<input type="text" name="nome" class="form-control" size="30" maxlength="95"  onchange="carregatexto(this.value)" />
</td>
</tr>
<tr>
<td>CPF:<font color='red'>*</font>
</td>
<td>
<input type="text" name="cpf" class="form-control" onkeypress="$(this).mask('000.000.000-00');" size="30" maxlength="18"  onchange="carregatexto(this.value)" />
</td>
</tr>
<tr>
<td>bairro:
</td><td>
<input type="text" name="bairro" class="form-control" size="30" maxlength="98"  onchange="carregatexto(this.value)" />
</td>
</tr>
<tr>
<td>E-mail:
</td><td>
<input type="text" name="email" class="form-control" size="30" maxlength="98"  onchange="carregatexto(this.value)" />
</td>
</tr>
<tr>
<td>Endereço:<font color='red'>*</font>
</td><td>
<input type="text" name="endereco" class="form-control" size="30" maxlength="198"  onchange="carregatexto(this.value)" />
</td></tr>
<tr>
<td>
Casa / Ed / Numero:<font color='red'>*</font>
</td><td>
<input type="text" name="numero" class="form-control" size="30" maxlength="28"  onchange="carregatexto(this.value)" />
</td>
</tr>
<tr>
<td>complemento:
</td><td>
<input type="text" name="complemento" class="form-control" size="30" maxlength="98"  onchange="carregatexto(this.value)" />
</td>
</tr>
<tr>
<td>Numero de contato:<font color='red'>*</font>
</td><td>
<input type="text" name="contato" class="form-control" size="30" maxlength="48"  onchange="carregatexto(this.value)" />
</td>
</tr>
<tr>
<td>Data:
</td><td>
<input type="txt" class="form-control" name="data" size="20" maxlength="35" value="<?php echo date("d/m/Y"); ?>" onchange="carregatexto(this.value)" />
</td>
</tr>
<tr>
<td>Usuario:<font color='red'>*</font>
</td><td>
<input type="text" class="form-control" name="usuario" size="30" maxlength="48"  onchange="carregatexto(this.value)" />
</td>
</tr>
<tr>
<td>Senha:<font color='red'>*</font>
</td><td>
<input type="password" class="form-control" name="senha" size="30" maxlength="25" value="123456" />
</td>
</tr>
<tr>
<td>Plano:
</td><td>
<select name="profile" class="form-control" id="select">
<option>Selecione</option>
<?php
require 'api/routeros_api.class.php';
require_once 'conexao/conect.php';
$API = new RouterosAPI();
$API->debug = false;
$API = new RouterosAPI();
if ($API->connect("$servidor_mikrotik","$login_servidor_mikrotik","$senha_servidor_mikrotik")) {
$ARRAY = $API->comm("/ppp/profile/print");
foreach ($ARRAY as $regtable) {
echo "<option>";
echo $regtable['name'];
echo "</option>";}}
?> 
</select><br>
</td>
</tr>
<tr>
<td>Vecimento:<font color='red'>*</font>
</td>
<td>
<select name="comentario" class="form-control" id="select">
<option>05</option>
<option>10</option>
<option>15</option>
<option>20</option>
<option>25</option></select>
</td>
</tr>
<tr>
<td>Valor do contrato R$:<font color='red'>*</font>
</td>
<td>
<input type="text" class="form-control" onkeypress="$(this).mask('#.##0,00', {reverse: true});" name="valor" size="30" maxlength="19"  onchange="carregatexto(this.value)"  />
</td>
</tr>
<tr>
<td>Roteador:
</td>
<td>SIM: <input type="radio"  name="roteador" value="sim" />
NÃO: <input type="radio"  name="roteador" value="nao" />
</td>
</tr>
<tr>
<td>Parcelas do Roteador:
</td>
<td>
<select name="roteador2" class="form-control" id="select">
<option>Não</option>
<option>Comodato</option>
<option>Já possui</option>
<option>A vista Dinheiro</option>
<option>A vista Debito</option>
<option>Cartão 1x</option>
<option>Cartão 2x</option>
<option>Cartão 3x</option>
<option>Mensalidade 1x</option>
<option>Mensalidade 2x</option>
<option>Mensalidade 3x</option>
</select>
</td>
</tr>
<td>Valor do roteador R$:<font color='red'>*</font>
</td>
<td>
<input type="text" class="form-control" onkeypress="$(this).mask('#.##0,00', {reverse: true});" name="roteador3" size="30" maxlength="25"  onchange="carregatexto(this.value)" />
</td>
</tr>
<td>Gestor remoto:
</td>
<td>
<select name="roteador4" class="form-control" id="select">
<option>Selecione</option>
<option>Sim</option>
<option>Não</option>
</select>
</td>
</tr>
<tr>
<td colspan="2">
<input type="submit" class="form-control" name="entrar" value="Cadastrar" />
</td>
</tr>
</table>
</form>  
<br />
<?php
if(isset($_POST["usuario"])){
$n=$_POST["usuario"];
if(isset($_POST["roteador"])){
$roteador=$_POST["roteador"];}
if(isset($_POST["roteador2"])){
$roteador2=$_POST["roteador2"];}
if(isset($_POST["roteador3"])){
$roteador3=$_POST["roteador3"];}
if(isset($_POST["roteador4"])){
$remoto=$_POST["roteador4"];}
if(isset($_POST["valor"])){
$valor=$_POST["valor"];}
if(isset($_POST["senha"])){
$s=$_POST["senha"];}
if(isset($_POST["profile"])){
$p=$_POST["profile"];}
if(isset($_POST["profileh"])){
$p2=$_POST["profileh"];}
if(isset($_POST["comentario"])){
$c=$_POST["comentario"];}
if(isset($_POST["cpf"])){
$cpf=$_POST["cpf"];}
if(!isset($n))
$n = null;
if(!isset($p))
$p = null;
$profile = $p;
if(!isset($c))
$c = null;
$comentario = $c;
if(!isset($p2))
$p2 = null;
$com= $p."-".$c;
$com2= $p2."-".$c;
if ($p !== "default"){
if ($API->connect("$servidor_mikrotik","$login_servidor_mikrotik","$senha_servidor_mikrotik")) {
$ARRAY = $API->comm("/ppp/secret/print", array(
"count-only"=> "",   ));
$num = $ARRAY;
$ARRAY = $API->comm("/ppp/secret/print");
if(!isset($s))
$s = null;
$API->comm("/ppp/secret/add", array(
"name"     => $n,
"password" => $s,
"profile" => $p,  
"comment" => $com, 
"service" => "pppoe",)) ;} ////////
$ARRAY = $API->comm("/ppp/secret/print", array(
"count-only"=> "",
)); $num2 = $ARRAY;
if(!isset($num2))
$num2 = null;
if(!isset($num))
$num = $num2;
/// VERIFICANDO SE O CLIENTE FOI CRIADO NA RB.
if($num !== $num2 ){
echo " <center> <font color='#00CC00'>Usuario criado com sucesso na RB!</font> </center> ";
///////////////////////////////////////////////////////////////////////////////////////////
if(!isset($nome))
$nome = null;
if(isset($_POST["nome"])){
$nome=$_POST["nome"];}
if(!isset($endereco))
$endereco = null;
if(isset($_POST["endereco"])){
$endereco=$_POST["endereco"];}
if(!isset($contato))
$contato = null;
if(isset($_POST["complemento"])){
$complemento=$_POST["complemento"];}
if(!isset($complemento))
$complemento = null;
if(isset($_POST["contato"])){
$contato=$_POST["contato"];}
if(isset($_POST["usuario"])){
$n=$_POST["usuario"];}
$vencimento = $c;
$plano = $p;
if(isset($_POST["email"])){
$email=$_POST["email"];}
if(isset($_POST["data"])){
$instalacao=$_POST["data"];}
if(isset($_POST["numero"])){
$numero=$_POST["numero"];}
if(isset($_POST["bairro"])){
$bairro=$_POST["bairro"];}
if(isset($_POST["email"])){
$email=$_POST["email"];}
$data="3";		
$serv = $_SESSION['$id_servidor'];
$sql="SELECT * FROM db_clientes where usuario = '$n' and id_cliente = $serv";
$res=mysqli_query($con,$sql);
$lin=mysqli_num_rows($res);
if($lin == 1 ){
	echo "<font color='red'>Nome de usuario já existe!</font>";
}else{
if(!isset($email))
$email = "Não informado";
if(!isset($contato))
$contato = "Não informado";
if(!isset($endereco))
$endereco = "Não informado";
if(!isset($numero))
$numero = "Não informado";
if(!isset($complemento))
$complemento = "Não informado";
if(!isset($bairro))
$bairro = "Não informado";
if(!isset($valor))
$valor = "Não informado";
if(!isset($cpf))
$cpf = "Não informado";
$res=mysqli_query($con,"insert into db_clientes values
('$serv', default, '$nome','$n', '$email', '$contato', '$instalacao','$endereco',
'$numero','$complemento','$bairro', '$plano', '$c', '$data', '$valor', '$cpf'  );");
$sql="SELECT * FROM db_clientes where nome = '$nome'";
$res= mysqli_query($con,$sql);
$lin=mysqli_num_rows($res);
while($vreg=mysqli_fetch_row($res)){
$id=$vreg[1];}
if($lin == 1 ){
echo "<center><font color='#00CC00'> Usuario adicionado no banco de dados com sucesso!</font> ";
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$mes2 = array("defalt,jan,fev,mar,abr,mai,jun,jul,ago,set,out,nov,dez");
$mes2[0]='defalt';
$mes2['01']='Janeiro';
$mes2['02']='Fevereiro';
$mes2['03']='Março';
$mes2['04']='Abril';
$mes2['05']='Maio';
$mes2['06']='Junho';
$mes2['07']='Julho';
$mes2['08']='Agosto';
$mes2['09']='Setembro';
$mes2[10]='Outubro';
$mes2[11]='Novembro';
$mes2[12]='Dezembro';
$mes = array("defalt,jan,fev,mar,abr,mai,jun,jul,ago,set,out,nov,dez");
$jan = $mes["01"]='janeiro';
$fev=$mes["02"]='fevereiro';
$mar=$mes["03"]='março';
$abr=$mes["04"]='abril';
$mai=$mes["05"]='maio';
$jun=$mes["06"]='junho';
$jul=$mes["07"]='julho';
$ago=$mes["08"]='agosto';
$set=$mes["09"]='setembro';
$out=$mes["10"]='outubro';
$nov=$mes["11"]='novembro';
$dez=$mes["12"]='dezembro';
$dat = date("m");
$ano = date("y");
if(date("m") == 1 ){$jan = 2;}else{$jan="1";};
if(date("m") == 2 ){$fev = 2;}else{$fev="1";};
if(date("m") == 3 ){$mar = 2;}else{$mar="1";};
if(date("m") == 4 ){$abr = 2;}else{$abr="1";};
if(date("m") == 5 ){$mai = 2;}else{$mai="1";};
if(date("m") == 6 ){$jun = 2;}else{$jun="1";};
if(date("m") == 7 ){$jul = 2;}else{$jul="1";};
if(date("m") == 8 ){$ago = 2;}else{$ago="1";};
if(date("m") == 9 ){$set = 2;}else{$set="1";};
if(date("m") == 10 ){$out = 2;}else{$out="1";};
if(date("m") == 11 ){$nov = 2;}else{$nov="1";};
if(date("m") == 12 ){$dez = 2;}else{$dez="1";};
if(!isset($id))
$id = null;
if(!isset($u))
$u = null;
if(!isset($jan))
$jan = null;
if(!isset($fev))
$fev = null;
if(!isset($mar))
$mar = null;
if(!isset($abr))
$abr = null;
if(!isset($mai))
$mai = null;
if(!isset($jun))
$jun = null;
if(!isset($jul))
$jul = null;
if(!isset($ago))
$ago = null;
if(!isset($set))
$set = null;
if(!isset($out))
$out = null;
if(!isset($nov))
$nov = null;
if(!isset($dez))
$dez = null;
if(!isset($ano))
$ano = null;
$res=mysqli_query($con,"INSERT INTO `mensalidade` (`id`, `id_clientes`, `usuario`, `Jan`, `Feb`,
`Mar`, `Apr`, `May`, `Jun`, `Jul`, `Aug`, `Sep`, `Oct`, `Nov`, `Dez`, `ano`) VALUES 
(NULL, '$id','$user','$jan', $fev, '$mar','$abr', '$mai', '$jun', '$jul','$ago','$set','$out','$nov', '$dez', '$ano')");

///////////////////////////////////////////////////////////////////////////////////////////
$user = $_SESSION['$vreg[2]'];
$username1 = $_SESSION['$vreg[1]'];
$sql="SELECT * FROM clientes where usuario = '$user'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$useruser = $vreg[1];
}
$sql="SELECT * FROM clientes where usuario = '$useruser'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$id_servserv = $vreg[7];
}
///////////////////////////////////////////////////////////////////////////////////////////
$d = date("d/m/Y");
$res=mysqli_query($con,"insert into roteador values
(NULL, '$serv', '$n', '$roteador2', '$roteador3', '$d', '$remoto' , '00:00:00:00:00:00');");
/////////
/////////
/////////
/////////
$res=mysqli_query($con,"insert into historico values
(default, '$nome','$n', '$id_servserv',NOW(),'Cliente Novo', '$user' ,'$endereco' ,'$complemento','$plano','$contato',
'$instalacao','$numero', '$c','$valor','$bairro' );");	

///////////////////////////////////////////////////////////////////////////////////////////
$sql="SELECT * FROM mensalidade where id_clientes = $id and ano = $ano ";
$res=mysqli_query($con,$sql);
$lin=mysqli_num_rows($res);
if($lin == 1 ){
while($vreg=mysqli_fetch_row($res)){
	$jan=$vreg[3];
    $fev=$vreg[4];
	$mar=$vreg[5];
	$abr=$vreg[6];
	$mai=$vreg[7];
	$jun=$vreg[8];
	$jul=$vreg[9];
	$ago=$vreg[10];
	$set=$vreg[11];
	$out=$vreg[12];
	$nov=$vreg[13];
	$dez=$vreg[14];
	$data=$vreg[15];
}
if(date("m") == 1 ){$mensalidade2 = $jan;}
if(date("m") == 2 ){$mensalidade2 = $fev;}
if(date("m") == 3 ){$mensalidade2 = $mar;}
if(date("m") == 4 ){$mensalidade2 = $abr;}
if(date("m") == 5 ){$mensalidade2 = $mai;}
if(date("m") == 6 ){$mensalidade2 = $jun;}
if(date("m") == 7 ){$mensalidade2 = $jul;}
if(date("m") == 8 ){$mensalidade2 = $ago;}
if(date("m") == 9 ){$mensalidade2 = $set;}
if(date("m") == 10 ){$mensalidade2 = $out;}
if(date("m") == 11 ){$mensalidade2 = $nov;}
if(date("m") == 12 ){$mensalidade2 = $dez;}
if($mensalidade2 >= date("m")){;
if ($mensalidade2 == 1){
 $sql="UPDATE mensalidade SET $mes = '2' WHERE id_clientes = $id";
$res=mysqli_query($con,$sql);
}}}}else{echo "<center><font color='red'> Nome de usuario já existe no banco de dados! </font></center>";	
}}


}}}
mysqli_close($con);
?>
