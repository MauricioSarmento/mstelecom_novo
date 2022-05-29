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
echo $valor=$vreg[14];
}
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    
<form name="login" method="post" action="">
<input type="hidden" name="get" value="nada" /> 

<table border="0" align="center" cellpadding="2" cellspacing="2" >
<tr>INFORMAR PAGAMENTO!
<br>
<br>
<br>
<td>SIM: <input type="radio" name="nome" value="Sim" />
	NÃO: <input type="radio" name="nome" value="nao" /><br>
	Valor: <input type="text" size="4" class="form-control" name="valor" value="<?php echo $valor;  ?>" onkeypress="$(this).mask('#.##0,00', {reverse: true});" />
	Atraso: <input type="checkbox"  name="atraso" value="Sim" />
	</td>
<td colspan="2"><br>
<input type="submit"  name="entrar" value="OK"/>

</td>
</tr>
</table>
</form>
	
<?php
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
$comment= $plano ."-".$ven;
$data = date("d");
if($data == 01){$data = 1 ;};
# menor ou igual
if($data >= $ven -1){$comment= $plano ."-".$ven."-p"; };
if($data >= $ven +2){$comment= $plano ."-".$ven."-p"; };
if($data == 01){$comment= $plano ."-".$ven."-p";};
if(isset($_POST["nome"])){
$nn=$_POST["nome"];
if($nn == "Sim"){
	if(isset($_POST["valor"])){
	$valor=$_POST["valor"];}
if(!isset($n))
$n = null;
########################### mudar profile
if(!isset($n))
$n = null;
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
"profile"  => $plano,
"comment"  => $comment,
)
);
$API->write('/interface/pppoe-server/print
?user='."$n".'
.id=.id');
$find = $API->read();
//Remove ID encontrado
foreach ($find as $find):
$API->write('/interface/pppoe-server/remove', false);
$API->write('=.id='.$find['.id']);
$API->read();
endforeach;
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$res=mysqli_query($con,$sql);
########################################## Historico
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
$data_hora = date('d-m-y H:i:s');
//////////// PAGAMENTO SOCIEDADE
$sql="UPDATE pagamento_sociedade SET status = '2' where status = '1' and usuario = '$n'";
$res2=mysqli_query($con,$sql);

$res=mysqli_query($con,"insert into historico values
(null, '$nome','$n', '$id_servserv',NOW(),'Pagamento', '$user' ,'$endereco' ,'$complemento','$plano','$tel',
'$data_hora','$numero', '$complemento','$valor','$id_cliente','$bairro','$cpf','$email' );");
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
$ano = date ("y");
$sql="SELECT * FROM mensalidade where id_clientes = $id and ano = $ano" ;
$res=mysqli_query($con,$sql);
$lin=mysqli_num_rows($res);
if($lin == 1 ){
$mes2 = date('M');
if(isset($_POST["atraso"]))
$atraso=$_POST["atraso"];
if(!isset($atraso))
$atraso = null;
if(date("m") == 12){$mes2 = 'Dez';}
if($atraso == "Sim"){
	
$res2=mysqli_query($con,$sql);
$data = date("d");
if($data >= $ven +1 and $data <= $ven +6){$sql="UPDATE `db_clientes` SET `status_cliente` = '2' WHERE `db_clientes`.`id` = $id;";
$res2=mysqli_query($con,$sql);}else{
$sql="UPDATE `db_clientes` SET `status_cliente` = '3' WHERE `db_clientes`.`id` = $id;";
$res2=mysqli_query($con,$sql);
}
	
}else{
	echo $comment;
$sql="UPDATE `mensalidade` SET `$mes2` = '2' WHERE `mensalidade`.`id_clientes` = '$id' and ano = $ano";
$res2=mysqli_query($con,$sql);
$data = date("d");
if($data >= $ven +1 and $data <= $ven +6){$sql="UPDATE `db_clientes` SET `status_cliente` = '2' WHERE `db_clientes`.`id` = $id;";
$res2=mysqli_query($con,$sql);}else{
}
}}else{
$res=mysqli_query($con,"INSERT INTO `mensalidade` (`id`, `id_clientes`, `usuario`, `Jan`, `Feb`,
`Mar`, `Apr`, `May`, `Jun`, `Jul`, `Aug`, `Sep`, `Oct`, `Nov`, `Dez`, `ano`) VALUES 
(NULL, '$id','$user','$jan', $fev, '$mar','$abr', '$mai', '$jun', '$jul','$ago','$set','$out','$nov', '$dez', '$ano')");
}
$sql="delete FROM liberar where cliente = '$n'"; // EXCLUI O USUARIO DA TABELA LIBERADOS
$res=mysqli_query($con,$sql);
}
///////////////////// TABELA PAGAMENTOS \\\\\\\\\\\\\\\\\\\\
$id_servidor= $_SESSION['$id_servidor'];
$sql="SELECT * FROM db_clientes where id_cliente = $id_servidor and usuario = '$n1'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$id=$vreg[1];
$nome_cliente=$vreg[3];
$ven=$vreg[12];
$valor=$vreg[14];

}
$data_dia = date('d');
$data_m = date('m');
$data_y = date('y');
$sql="SELECT * FROM pagamentos where id_cliente = $id and data_mes = '$data_m' and data_ano = '$data_y' ";
$res=mysqli_query($con,$sql);
$lin=mysqli_num_rows($res);
if($lin == 1 ){

}else{
	if(isset($pagamentooo))
		$data_m = $data_m - 1;
		$data_m = str_pad($data_m , 2 , '0' , STR_PAD_LEFT);
	if(isset($pagamentooo))
	$ven = $ven . ' - Atrasado';
$data_hora = date('d-m-y H:i:s');
if(isset($_POST["valor"]))
$valor=$_POST["valor"];
if(!isset($valor))
$valor = null;
$sql="SELECT * FROM sociedade where id_cliente = $id";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
	$sociedade=$vreg[3];
	}
	if(!isset($sociedade))
$sociedade = 'Mauricio';
$res=mysqli_query($con,"insert into pagamentos values
(NULL, '$id_servidor' , '$id', '$nome_cliente' , '$data_dia', '$data_m' , '$data_y' , '$valor' , '$ven' , '$data_hora' , '$sociedade');");	
}
}//////////////////////////////
///////////////////////////////
///////////////////////////////
///////////////////////////////
///////////////////////////////
///////////////////////////////


?>