<?php
if(!isset($_GET["id"]))
$_GET["id"]= null;
	$n=$_GET["id"];
	$id_servidor= $_SESSION['$id_servidor'];
$sql="SELECT * FROM db_clientes where id_cliente = $id_servidor and usuario = '$n'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$id=$vreg[1];
$ven=$vreg[12];
$valor=$vreg[14];
}
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    
<form name="login" method="post" action="">
<input type="hidden" name="get" value="nada" /> 

<table border="0" align="center" cellpadding="2" cellspacing="2" >
<tr>
<td>
INFORMAR PAGAMENTO!
</td>
</tr>
<tr>
<td>SIM: <input type="radio" name="pagamento" value="Sim" />
	NÃO: <input type="radio" name="pagamento" value="nao" />
</td>
</tr>
<tr>
<td>
	FORMA DE PAGAMENTO:
</td>
<td>
<select name="forma" id="select">
<option>Em mãos</option>
<option>Pix</option>
<option>Transferencia</option>
<option>Boleto</option>
<option>Cartão</option>
<option>Adiar para proximo mes</option>
</td>
</tr>
<tr>
<td><font color='black'><strong>Descrição:</strong></font>
</td>
<td>
<textarea type="text" class="form-control" name="descricaopag" rows="5" cols="32"></textarea>
</td>
</tr>
<tr>
<td>
Valor: 
</td>
<td>
<input type="text" size="4" class="form-control" name="valor" value="<?php echo $valor;  ?>" onkeypress="$(this).mask('#.##0,00', {reverse: true});" />
</td>
</tr>
<tr>
<td colspan="2"><br>
<input type="submit"  name="entrar" value="OK"/>

</td>
</tr>
</table>
</form>
	
<?php
if(isset($_POST["pagamento"])){
$nn=$_POST["pagamento"];
if($nn == "Sim"){
	if(isset($_POST["forma"])){
	$forma=$_POST["forma"];}
		if(isset($_POST["valor"])){
	$valor=$_POST["valor"];}
	if(isset($_POST["descricaopag"])){
	$obs=$_POST["descricaopag"];}
$user = $_SESSION['$vreg[2]'];
$id_servidor= $_SESSION['$id_servidor'];
$sql="SELECT * FROM db_clientes where id_cliente = $id_servidor and usuario = '$n'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
    $id_admin=$vreg[0];
	$id=$vreg[1];
	$nome=$vreg[2];
	$usuario=$vreg[3];
	$email=$vreg[4];
	$tel=$vreg[5];
	$instalaçao=$vreg[6];
	$endereço=$vreg[7];
	$numero=$vreg[8];
	$complemento=$vreg[9];
	$bairro=$vreg[10];
    $plano=$vreg[11];
    $ven=$vreg[12];
    $valor=$vreg[14];
}
$data_hora = date('d-m-y H:i:s');
//////////// ADICIONANDO PAGAMENTO AO HISTORICO
$res=mysqli_query($con,"insert into historico values
(null, '$nome','$n', '$id_servidor',NOW(),'Pagamento Sociedade', '$user' ,'$endereco' ,'$complemento','$plano','$tel',
'$data_hora','$numero', '$complemento','$valor','$id_cliente','$bairro','$cpf','$email' );");
//////////// ADICIONANDO NA TABELA PAGAMENTO_SOCIEDADE
$res=mysqli_query($con,"insert into pagamento_sociedade values
(null, '$nome' , '$usuario', '$forma' , '$data_hora', '$user' , '$obs' , '1');");
/////////// LIBERANDO CLIENTE
$arrID=$API->comm("/ppp/secret/getall", 
array(
".proplist"=> ".id",
"?name" => $n,
));
if(!isset($p))
$p=$plano;
if(!isset($arrID[0]))
$arrID[0] = null;
$API->comm("/ppp/secret/set",
array(
".id" => $arrID[0][".id"],
"profile"  => "Liberado",
)
);
$API->write('/interface/pppoe-server/print
?user='."$n".'
.id=.id');
$find = $API->read();
///////// DESCONECTANDO CLIENTE
foreach ($find as $find):
$API->write('/interface/pppoe-server/remove', false);
$API->write('=.id='.$find['.id']);
$API->read();
endforeach;
///////// ADICIONANDO NA TABELA LIBERAR POR 1 DIA
$dd = date('d');
$res=mysqli_query($con,"insert into liberar values
(NULL, '$n','1', '$dd');");
}}
?>