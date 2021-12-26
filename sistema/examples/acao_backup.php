﻿<?php
require_once '../login/protect.php';
require_once 'conexao/conect.php';
require_once"painel.php";
#header("Refresh: 50");
?>

<html lang="pt">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   SERVIDOR
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        PAINEL PRINCIPAL
    -->
      <div class="logo"><a href="index.php" class="simple-text logo-normal">
          MSTELECOM
        </a></div>
      <?php echo $menu; ?>
    </div>
    <div class="main-panel">
      <!-- PESQUISA E NOTIFICAÇÕES -->
     
	 <?php echo $pesquisa;   ?>
	 
	 
	 
	 
	 
	 
      <!-- CAIXAS DE AVISOS  -->
	  
	  
	  
	  
	  <script>
			$(function(){
				//chama a função atualizaDados daqui à 1000ms (1s)
				window.setTimeout(atualizaDados, 2000);
				function atualizaDados() {
					//carrega o conteúdo do arquivo "auto_refresh.php" para dentro da div#total_cliente_conectado
					$("#total_cliente_conectado").load('clientes_refresh_painel.php');
					//para perpetuar a chamada da função sempre a cada 1s
					window.setTimeout(atualizaDados, 2000);
				}
			});
					</script>
	 <!--- //auto refresh -->
       <div class="content">
	   <div id="total_cliente_conectado" class="widget-int num-count">
	   <?php  
echo $painel;  ?>	
    </div>
		 <!--- //auto refresh -->
      <div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">INFORMAÇÕES DO CLIENTE</h4>
              <p class="card-category">Edite informações do cliente.</p>
            </div>
            <div class="card-body">
			
			
			
		<?php
$n1=$_GET["id"];
$user1 = $_SESSION['$vreg[2]'];
$sql="SELECT * FROM clientes where usuario = '$user1'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$id_servidor = $vreg[5];
}
$sql="SELECT * FROM db_clientes where id_cliente = $id_servidor and usuario = '$n1'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$id_admin=$vreg[0];
$id=$vreg[1];
$id_soc=$vreg[1];
$nome=$vreg[2];
$user2=$vreg[3];
$email=$vreg[4];
$tel=$vreg[5];
$instalaçao=$vreg[6];
$endereço=$vreg[7];
$numero=$vreg[8];
$complemento=$vreg[9];
$apelido=$vreg[10];
$plano=$vreg[11];
$ven=$vreg[12];
$statuss=$vreg[13];
$valor=$vreg[14];
$cpf=$vreg[15];}
$sql="SELECT * FROM sociedade where id_cliente = $id";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
	$id_cliente_sociedade=$vreg[1];
}

if(!isset($id_cliente_sociedade)) $id_cliente_sociedade= 'Não'; if($id_cliente_sociedade == $id){$id_cliente_sociedade = 'Sim';}; 
######################## Adicionando mensalidade se n]ao tiver #############################
$jan="1";
$fev="1";
$mar="1";
$abr="1";
$mai="1";
$jun="1";
$jul="1";
$ago="1";
$set="1";
$out="1";
$nov="1";
$dez="1";
$ano = date("y");
$sql="SELECT * FROM mensalidade where ano = '$ano' and id_clientes = '$id'";
$res46=mysqli_query($con,$sql);
$lin=mysqli_num_rows($res46);
if($lin == 1 ){
		
}else{
$res55=mysqli_query($con,"INSERT INTO `mensalidade` (`id`, `id_clientes`, `usuario`, `Jan`, `Feb`,
`Mar`, `Apr`, `May`, `Jun`, `Jul`, `Aug`, `Sep`, `Oct`, `Nov`, `Dez`, `ano`) VALUES 
(NULL, '$id','Admin','$jan', $fev, '$mar','$abr', '$mai', '$jun', '$jul','$ago','$set','$out','$nov', '$dez', '$ano')");
}
####################################################################
if(!isset($nome)) $nome = null;
if(!isset($user2)) $user2 = null; 
if(!isset($instalaçao)) $instalaçao = null;	
if(!isset($endereço)) $endereço = null;	
if(!isset($numero)) $numero = null;
if(!isset($complemento)) $complemento = null;
if(!isset($plano)) $plano = null;	
if(!isset($ven)) $ven = null;
if(!isset($email)) $email = null;
if(!isset($tel)) $tel = null;
if(!isset($apelido)) $apelido=null;
if(!isset($_SESSION['$n4'])) $_SESSION['$n4']=null;
if(!isset($user2)){$user2=$n1;}
if(!isset($user2)){include "editar.php";}else{  ?>
		
		
<!-------------------------------------------- INICIO DE TABELA MENU--------------------------------------------->
<table border="0" >
<td>
<!-------------------------------------------- Botão HISTORICO --------------------------------------------->
<?php 
echo "<a href='historico.php?id=$n1'>
<button type='button' class='btn btn-primary' >
HISTORICO
</button></a>";
?>
</td>
<?php
//////////////// VERIFICANDO SE O USUARIO É ADMINISTRADOR////////////////////
$user1 = $_SESSION['$vreg[2]'];
$sql="SELECT * FROM clientes where usuario = '$user1'";
$res= mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$priv=$vreg[6];
$id_serv=$vreg[7];}
if($priv == 3 or $priv == 1 ) { 
?>
<td>
<!-------------------------------------------- Botão PAGAMENTO --------------------------------------------->
<!-- Botão para acionar modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pagamento">
PAGAMENTO
</button>
<div class="modal fade" id="pagamento" tabindex="-1" role="dialog" aria-labelledby="pagamento" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h2 class="modal-title" id="pagamento">Deseja informar o pagamento?</h2>
<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body"><center>
<?php   
include "pagamentos.php";  ?></center>
</div>
</div>
</div>
</div>
</td> <?php }?>
<td>
<!-------------------------------------------- Botão LIBERAR INTERNET --------------------------------------------->
<!-- Botão para acionar modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#LIBERAR">
LIBERAR INTERNET
</button>
<!-- Modal -->
<div class="modal fade" id="LIBERAR" tabindex="-1" role="dialog" aria-labelledby="LIBERAR" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h2 class="modal-title" id="LIBERAR">Deseja LIBERAR a internet:?</h2>
<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body"><center>
<?php   
include "liberar.php";  ?></center>
</div>
</div>
</div>
</div>
</td>
<!-------------------------------------------- Botão Vender itens ou serviços --------------------------------------------->
<!-- Botão para acionar modal -->
<td>
</td>

<!-------------------------------------------- AREA PARA Botão --------------------------------------------->
<td>
</td>
<!-------------------------------------------- AREA PARA Botão --------------------------------------------->
</table>
<!-------------------------------------------- FIM DA TABELA MENU --------------------------------------------->
<br>
<!--------------------------------- tabela de Roteador ------------------------>
<?php
$id_s = $_SESSION['numIpp'];
$usuario =$_SESSION['$vreg[2]'];
$id_servidor= $_SESSION['$id_servidor'];
$sql="SELECT * FROM clientes where usuario = '$usuario'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$user = $vreg[2];	
$idservidor = $vreg[5];
 };
 $sql="SELECT * FROM roteador where id_servidor = '$idservidor' and cliente = '$n1'";
$res=mysqli_query($con,$sql);
$lin=mysqli_num_rows($res);
while($vreg=mysqli_fetch_row($res)){
$id_cr = $vreg[0];	
$id_clr = $vreg[1];
$nomer = $vreg[2];	
$pagamento = $vreg[3];
$valor2 = $vreg[4];
$data2 = $vreg[5];
$remotor = $vreg[6];
$macr = $vreg[7];
};
if($lin == 1 ){}else{
$res=mysqli_query($con,"insert into roteador values
(NULL, '$id_admin', '$user2', 'Não', 'Não', 'Não', 'Não' , '00:00:00:00:00:00');");

}
if(!isset($nome)) $nome = null;	
if(!isset($pagamento)) $pagamento = null;	
if(!isset($valor2)) $valor2 = null;
if(!isset($data2)) $data = null;
if(!isset($user2)){$user2=$n1;}
?> 			  </center>
			  
<!--------------------- Fim de roteador ------------------------------->
<!--------------------- EDIÇÃO DO CLIENTE ----------------------------->

<form name="login" method="post" action="" >
<input type="hidden" name="get" value="nada" /> 
<table>
 <?php 
///////////////////////////////////////////////////////////////////
//////////MOSTRANDO O TEMPO QUE ESTA ONLINE////////////////////////
///////////////////////////////////////////////////////////////////
if ($API->connect("$servidor_mikrotik","$login_servidor_mikrotik","$senha_servidor_mikrotik")) {
$ARRAY = $API->comm("/ppp/active/print");
foreach ($ARRAY as $regtable) {
if($regtable['name'] == $n1 ){$usuarioo = $regtable['name'];}else{}
if($regtable['name'] == $n1 ){$ipp = $regtable['address'];}else{}
if($regtable['name'] == $n1 ){$macr = $regtable['caller-id'];}else{}
if($regtable['name'] == $n1 ){$uptime = $regtable['uptime'];}else{}
}}
if($usuarioo == $n1 ){$status = "<font color='black'><strong><h2>STATUS: <font color='gree'>On". "-" . $uptime . "</strong></font></h2>";}else{$status = "<font color='black'><strong>STATUS= <font color='red'>Desconectado</strong></font></h2>";};
///////////////////////////////////////////////////////////////////
///////////////FIM DO SCRIPT///////////////////////////////////////
///////////////////////////////////////////////////////////////////
echo $status;
if($id_cliente_sociedade == "Sim"){$botao = "<button type='button' class='btn btn-danger'>SOCIEDADE</button>";};
echo "</td></tr>
<br><br><p> <a href='excluir_acao.php?id=$n1'> <button type='button' class='btn btn-danger'>Excluir cliente</button></a>
<a href='bloqueio_acao.php?id=$n1'> <button type='button' class='btn btn-warning'>Bloquear</button></a>
<a href='desconectar_acao.php?id=$n1'> <button type='button' class='btn btn-warning'>Desconectar</button> " . $botao . "</a></p>";
?>
<tr>
<td>
<font color='black' class="bmd-label-floating"><strong>Nome:</strong></font>
</td>
<td>
<input type="text" class="form-control" name="nome1"   value="<?php echo $nome; ?>" onchange="carregatexto(this.value)" />
</td>

<td>
<font color='black' class="bmd-label-floating"><strong>CPF:</strong></font>
</td>
<td>
<input type="text" name="cpf" value="<?php echo $cpf; ?>" class="form-control" onkeypress="$(this).mask('000.000.000-00');" size="30" maxlength="18"  onchange="carregatexto(this.value)" />
</td>

<td>
<font color='black' class="bmd-label-floating"><strong>Apelido:</strong></font>
</td>
<td>
<input type="text" class="form-control" name="apelido" size="30" maxlength="35" value="<?php if(!isset($apelido))$c = null; echo $apelido;?>" onchange="carregatexto(this.value)" />
</td>
</tr>
<tr>
</tr>
<td>
<br>
</td>
<tr>
<td>
<font color='black' class="bmd-label-floating"><strong>E-mail:</strong></font>
</td>
<td>
<input type="text" class="form-control" name="email" size="30" maxlength="35" value="<?php echo $email;?>" onchange="carregatexto(this.value)" />
</td>

<td>
<font color='black' class="bmd-label-floating"><strong>Endereço:</strong></font>
</td>
<td>
<input type="text" class="form-control" name="endereco" size="30" maxlength="200" value="<?php echo $endereço; ?>" onchange="carregatexto(this.value)" />
</td>

<td>
<font color='black' class="bmd-label-floating"><strong>Numero:</strong></font>
</td>
<td>
<input type="text" class="form-control" name="numero" size="30" maxlength="35" value="<?php echo $numero;  ?>" onchange="carregatexto(this.value)" />
</td>
</tr>
<tr>
</tr>
<td>
<br>
</td>
<tr>
<td>
<font color='black' class="bmd-label-floating"><strong>Complemento:</strong></font>
</td>
<td>
<input type="text" class="form-control" name="complemento" size="30" maxlength="55" value="<?php echo $complemento;  ?>" onchange="carregatexto(this.value)" />
</td>

<td>
<font color='black' class="bmd-label-floating"><strong>Tel:</strong></font>
</td>
<td>
<input type="text" class="form-control" name="contato" size="30" maxlength="50" value="<?php echo $tel;  ?>" onchange="carregatexto(this.value)" />
</td>

<td>
<font color='black' class="bmd-label-floating"><strong>Data instalação:</strong></font>
</td>
<td>
<input type="txt" class="form-control" name="data" size="25" maxlength="35" value="<?php echo $instalaçao;?>" onchange="carregatexto(this.value)" />
</td>
</tr>
<tr>
</tr>
<td>
<br>
</td>
<tr>
<td>
<font color='black' class="bmd-label-floating"><strong>Usuario</strong></font>
</td>
<td>
<input type="txt" class="form-control" name="nome4" size="25" maxlength="50" value="<?php echo $n1; ?>"/>
</td>

<td>
<font color='black' class="bmd-label-floating"><strong>sociedade</strong></font>
</td>
<td>
<select name="teste" class="form-control" id="select">
<option><?php echo $id_cliente_sociedade;  ?></option>
<option>Sim</option>
<option>Não</option>
</select>
</td>

<td>
<font color='black' class="bmd-label-floating"><strong>Senha</strong></font>
</td>
<td>
<input type="password4" class="form-control" name="senha4" size="25" maxlength="25" value="123456" />
</td>
</tr>
<tr>
</tr>
<td>
<br>
</td>
<tr>
<td>
<font color='black' class="bmd-label-floating"><strong>Plano</strong></font>
</td>
<td>
<select name="profile4" class="form-control" id="select">
<option><?php echo $plano;  ?></option>
<?php
if ($API->connect("$servidor_mikrotik","$login_servidor_mikrotik","$senha_servidor_mikrotik")) {
$ARRAY = $API->comm("/ppp/profile/print");
foreach ($ARRAY as $regtable) {
echo "<option>";
echo $regtable['name'];
echo "</option>";}}
?> 
<br>
</select>
<br>
</td>

<td>
<font color='black' class="bmd-label-floating"><strong>Vecimento</strong></font>
</td>
<td>
<select name="comentario4" class="form-control" id="select">
<option><?php echo $ven;  ?></option>
<option>05</option>
<option>10</option>
<option>15</option>
<option>20</option>
<option>25</option></select>
</td>

<td>
<font color='black' class="bmd-label-floating"><strong>Valor R$:</strong></font>
</td>
<td>
<input type="text" class="form-control" name="valor" size="30" maxlength="25" value="<?php if(!isset($valor)) $valor=null; echo $valor;  ?>" onchange="carregatexto(this.value)" onkeypress="$(this).mask('#.##0,00', {reverse: true});" />
</td>
</tr>
<tr>
</tr>
<td>
<br>
</td>
<tr>
<td>
<a href='acao.php?id=$n1'>
<button type="submit" class="btn btn-primary pull-right">Salvar</button>
</li>
</td>
<tr>
</table>
</form>

<?php

if(isset($_POST["valor"])){
$valor2=$_POST["valor"];}
if(isset($_POST["nome4"])){
$n4=$_POST["nome4"];
######SOCIEDADE######
if(isset($_POST["teste"])){
$soci=$_POST["teste"];}
if($soci == 'Sim' ){
$res=mysqli_query($con,"insert into sociedade values
( default, '$id_soc','$n1');");};
############
if(isset($_POST["valor"])){
$valor=$_POST["valor"];}
if(isset($_POST["comentario4"])){
$c4=$_POST["comentario4"];}
if(isset($_POST["senha4"])){
$s4=$_POST["senha4"];}
if(isset($_POST["profile4"])){
$p4=$_POST["profile4"];
///////////////////////////////////////////////////////////////////////////
//////////////////  se mudar o plano ele desconecta o cliente /////////////
///////////////////////////////////////////////////////////////////////////
if($plano !== $p4){
	if ($API->connect("$servidor_mikrotik","$login_servidor_mikrotik","$senha_servidor_mikrotik")) {
$API->write('/interface/pppoe-server/print
?user='."$n1".'
.id=.id');
$find = $API->read();
//Remove ID encontrado
foreach ($find as $find):
$API->write('/interface/pppoe-server/remove', false);
$API->write('=.id='.$find['.id']);
$API->read();
endforeach;
};
///////////////////////////////////////////////////////////////////////////
//////////////////  se mudar o plano ele desconecta o cliente /////////////
///////////////////////////////////////////////////////////////////////////
}}
$com= $p4."-".$c4;
if(isset($_POST["nome1"])){
$nome1=$_POST["nome1"];}
if(isset($_POST["endereco"])){
$endereco=$_POST["endereco"];}
if(isset($_POST["complemento"])){
$complemento=$_POST["complemento"];}
if(isset($_POST["contato"])){
$contato=$_POST["contato"];}
if(isset($_POST["usuario"])){
$n=$_POST["usuario"];}
if(isset($_POST["email"])){
$email=$_POST["email"];}
if(isset($_POST["data"])){
$instalacao=$_POST["data"];}
if(isset($_POST["numero"])){
$numero=$_POST["numero"];}
if(isset($_POST["apelido"])){
$apelido=$_POST["apelido"];}
if(!isset($nome1))
$nome1=null;
if(!isset($nome1))
$nome1=null;
if(!isset($n4))
$n4=null;
if(!isset($email))
$email=null;
if(!isset($contato))
$contato=null;
if(!isset($instalacao))
$instalacao=null;
if(!isset($endereco))
$endereco=null;
if(!isset($numero))
$numero=null;
if(!isset($complemento))
$complemento=null;
if(!isset($apelido))
$apelido=null;
if(!isset($p4))
$p4=null;
if(!isset($c4))
$c4=null;
if(!isset($valor))
$valor=null;
$API = new RouterosAPI();
$API->debug = false;
if(isset($_POST["nome1"])){
if ($API->connect("$servidor_mikrotik","$login_servidor_mikrotik","$senha_servidor_mikrotik")) {
$ARRAY = $API->comm("/ppp/secret/print");
if(!isset($n1))
$n1 = null;
$arrID=$API->comm("/ppp/secret/getall", 
array(
".proplist"=> ".id",
"?name" => $n1,));
if(!isset($p))
$p="null";
if(!isset($arrID[0]))
$arrID[0] = "";
$API->comm("/ppp/secret/set",
array(
".id" => $arrID[0][".id"],
// "password" => $s4,
"name" => $n4,
"profile" => $p4,  
"comment" => $com, 
"service" => "pppoe",	))  ;}}
if(!isset($nome1))
$nome1 = null;
if(isset($_POST["nome1"])){
$nome1=$_POST["nome1"];}
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
if(isset($_POST["email"])){
$email=$_POST["email"];}
if(isset($_POST["data"])){
$instalacao=$_POST["data"];}
if(isset($_POST["numero"])){
$numero=$_POST["numero"];}
if(isset($_POST["apelido"])){
$apelido=$_POST["apelido"];}
if(isset($_POST["email"])){
$email=$_POST["email"];}
if(isset($_POST["cpf"])){
$cpf=$_POST["cpf"];}
if(!isset($n))
$n=null;
if(!isset($instalacao))
$instalacao = null;
$sql="SELECT * FROM db_clientes where usuario = '$n1' and id_cliente = '$id_servidor'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$id=$vreg[0];};
if(!isset($id))
$id=null;
if(!isset($id_admin))
$id_admin=null;
if ($id == $id_admin ) {
if(isset($_POST["nome1"])){
$sql="SELECT * FROM db_clientes where usuario = '$n1' and id_cliente = '$id_servidor'";
$res= mysqli_query($con,$sql);
$lin=mysqli_num_rows($res);
while($vreg=mysqli_fetch_row($res)){
$id=$vreg[1];}
if($lin == 1 ){
if(isset($_POST["nome1"])){
$sql="UPDATE db_clientes SET usuario = '$n4', nome = '$nome1',plano= '$p4',dia_vencimento= '$c4' , email= '$email', cpf= '$cpf' ,
complemento= '$complemento', data_instalacao= '$instalacao', apelido = '$apelido', numero='$numero', endereco= '$endereco' WHERE id = $id";
$res=mysqli_query($con,$sql);
$sql="UPDATE db_clientes SET valor_plano = '$valor' , telefone = '$contato' WHERE id = $id";
$res=mysqli_query($con,$sql);
}else{
	/// se não tiver na db ele cria....
}
echo '
<script type="text/javascript"> 
var urlAtual = window.location.href;
window.location.href=urlAtual;
</script>';

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
$res=mysqli_query($con,"insert into historico values
(default, '$nome1','$n1', '$id_servserv',NOW(),'Atualização Cadastral', '$user' ,'$endereco' ,'$complemento','$p4','$contato',
'$data_hora','$numero', '$c4','$valor','$apelido' );");
}else{
$dat = date("d");
/////////// quando o cliente for do dia 05 /////////////////////
if( $c == 05){
if($dat <=5){$data="3";}}else{$data = "2";}
{
if($dat >=6 and $dat <20 ){$data="2";}	else {$data="3";}
};
/////////// quando o cliente for do dia 10 /////////////////////
if( $c == 10){
if($dat <=10){$data="3";}}else{$data = "2";}
{
if($dat >=11 and $dat <20 ){$data="2";}	else {$data="3";}
};
/////////// quando o cliente for do dia 15 /////////////////////
if( $c == 15){
if($dat <=15 ){$data="3";}	else {$data="2";}
};
/////////// quando o cliente for do dia 20 /////////////////////
if( $c == 20){
if($dat <=20){$data="3";}}else{$data = "2";}
{
if($dat >=21 and $dat <28 ){$data="2";}	else {$data="3";}
};
/////////// quando o cliente for do dia 25 /////////////////////
if( $c == 25){
if($dat >=10 and $dat<=25){$data="3";}	else {$data="2";}
};
$u = $_SESSION['$vreg[2]'];
$sql="SELECT * FROM clientes where usuario = '$u'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$serv=$vreg[5];};
$data = $c;
if($dat > $data){$data = "2";};
if($dat <= $data){$data = "3";};
$res=mysqli_query($con,"insert into db_clientes values
('$serv', default, '$nome1','$n4', '$email', '$contato', '$instalacao','$endereco',
'$numero','$complemento','$apelido', '$p4', '$c4', '$data', '$valor', '$cpf'  );");

$user = $_SESSION['$vreg[2]'];
$res=mysqli_query($con,"insert into historico values
(default, '$nome1','$n1', '$serv',NOW(),'Já cadastrado na RB', '$user' ,'$endereco' ,'$complemento','$p4','$contato',
'$instalacao','$numero', '$c4','$valor','$apelido' );");
echo '<script type="text/javascript"> 
var urlAtual = window.location.href;
window.location.href=urlAtual;
</script>';}}}
$_SESSION['$n4']=$n4;};


?>

<!--------------------- EDIÇÃO DO ROTEADOR ---------------------------->
<!--------------------------------------------------------------------->

<br>
<br>


<div class="card-header card-header-primary" >
<h4 class="card-title">Roteador</h4>
<p class="card-category">Informações sobre o roteador do cliente.</p>
</div>
<form name="login" method="post" action="" >
<input type="hidden" name="get" value="nada" /> 
<table >
<tr>
<td>
<font color='black'>
<strong>
<h2>
<?php if($pagamento == "Comodato"){echo "<font color='red'>" .  $pagamento . "</font>";}?>
</h2>
</strong>
</font>
</td>
</tr>
<tr>
<td>
<font color='black' class="bmd-label-floating">
<strong>Usuário:</strong>
</font>
</td>
<td>
<input type="text" class="form-control" name="nomer" size="30" maxlength="35" value="<?php echo $nomer;?>" onchange="carregatexto(this.value)" />
</td>
<td><font color='black' class="bmd-label-floating"><strong>Mac:</strong></font>
</td><td>
<input type="text" class="form-control" name="macr" size="30" maxlength="20" value="<?php echo $macr; ?>" onchange="carregatexto(this.value)" />
</td>
<td><font color='black' class="bmd-label-floating"><strong>Amarrar Mac:</strong></font></td><td>
<select name="amarrar_mac" class="form-control" id="select" >
<option>Selecione</option>
<option>Sim</option>
<option>Não</option>
</select>
</td>
</tr>
<tr>
</tr>
<td>
<br>
</td>
<tr>
<td>
<font color='black' class="bmd-label-floating">
<strong>
Remoto:
</strong>
</font>
</td>
<td>
<select name="remotor" class="form-control" id="select" >
<option><?php echo $remotor; ?></option>
<option>Sim</option>
<option>Não</option>
</select>
</td>
<td>
<font color='black' class="bmd-label-floating">
<strong>
Venda
</strong>
</font>
</td>
<td>
<select name="aquisicaor" class="form-control" id="select" >
<option><?php echo $pagamento;  ?></option>
<option>Comodato</option>
<option>Já possui</option>
<option>A vista Dinheiro</option>
<option>A vista Cartão</option>
<option>Parcelado Cartão</option>
<option>Parcelado Mensalidades</option>
</select>
</td>
<td>
<font color='black' class="bmd-label-floating">
<strong>
Valor R$:
</strong>
</font>
</td>
<td>
<input type="text" class="form-control" class="form-control" onkeypress="$(this).mask('#.##0,00', {reverse: true});" name="valorr" size="30" maxlength="30" value="<?php echo $valor2;  ?>" onchange="carregatexto(this.value)" />
</td>
</tr>
<tr>
</tr>
<td>
<br>
</td>
<tr>
<td>
<font color='black' class="bmd-label-floating"><strong>Data:</strong></font>
</td>
<td>
<input type="text" class="form-control" name="datar" size="30" maxlength="25" value="<?php echo $data2; ?>" onchange="carregatexto(this.value)" />
</td>
<td>
<font color='black' class="bmd-label-floating">
<strong>
IP fixo:
</strong>
</font>
</td>
<td>
<select name="ip_fixo" class="form-control" id="select" >
<option>Selecione</option>
<option>Sim</option>
<option>Não</option>
</select>
</td>
</tr>
<tr>
<td>
<font color='black'class="bmd-label-floating"><strong>IP:</strong></font>
</td>
<td>
<input type="text" class="form-control" name="ip_r" size="13" maxlength="16" value="<?php echo $ipp;?>" onchange="carregatexto(this.value)" />
</td>
</tr>
<tr>
<td>
</td>
<td>
<?php echo "<button><a href='http://$ipp:8888' target='_blank' class='form-control'>Gerenciamento emoto</a></button>";
echo "<button><a href='http://$servidor_mikrotik:8099/graphs/iface/<pppoe-$n1>/' target='_blank' class='form-control'>Grafico</a></button>";?>
</td>
</tr>
<td>
<br>
</td>
<tr>
<td>
<a href='acao.php?id=$n1'>
<button type="submit" class="btn btn-primary pull-right">Salvar</button>
</li>
</td>
</tr>
</table>
</form>
<?PHP
if(!isset($nomer))
$nomer = $nomer;
if(isset($_POST["nomer"])){
$nomer=$_POST["nomer"];
////////
if(!isset($aquisicaor))
$aquisicaor = $pagamento;
if(isset($_POST["aquisicaor"])){
$aquisicaor=$_POST["aquisicaor"];}
if(isset($_POST["ip_r"])){
$ip_r=$_POST["ip_r"];}
if(isset($_POST["ip_fixo"])){
$ip_fixo=$_POST["ip_fixo"];
if($ip_fixo == 'Selecione'){}else{if($ip_fixo == 'Sim'){$ip_fixo = $ip_r;}else{if($ip_fixo == 'Não'){$ip_fixo = "default";}}
	
if ($API->connect("$servidor_mikrotik","$login_servidor_mikrotik","$senha_servidor_mikrotik")) {
$ARRAY = $API->comm("/ppp/secret/print");
if(!isset($n1))
$n1 = null;
$arrID=$API->comm("/ppp/secret/getall", 
array(
".proplist"=> ".id",
"?name" => $n1,));
if(!isset($p))
$p="null";
if(!isset($arrID[0]))
$arrID[0] = "";
$API->comm("/ppp/secret/set",
array(
".id" => $arrID[0][".id"],
// "password" => $s4,
"remote-address" => $ip_fixo,
));
$API->write('/interface/pppoe-server/print
?user='."$n1".'
.id=.id');
$find = $API->read();
//Remove ID encontrado
foreach ($find as $find):
$API->write('/interface/pppoe-server/remove', false);
$API->write('=.id='.$find['.id']);
$API->read();
endforeach;
}}}
//////////////////////////////////////AMARRANDO MAC\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
if(isset($_POST["amarrar_mac"])){
$mac_address=$_POST["amarrar_mac"];
////////////////////////////////
if(isset($_POST["macr"])){
$mac_add=$_POST["macr"];
if($mac_address == 'Selecione'){}else{if($mac_address == 'Sim'){$mac_address = $mac_add;}else{if($mac_address == 'Não'){$mac_address = "default";}}
	
if ($API->connect("$servidor_mikrotik","$login_servidor_mikrotik","$senha_servidor_mikrotik")) {
$ARRAY = $API->comm("/ppp/secret/print");
if(!isset($n1))
$n1 = null;
$arrID=$API->comm("/ppp/secret/getall", 
array(
".proplist"=> ".id",
"?name" => $n1,));
if(!isset($p))
$p="null";
if(!isset($arrID[0]))
$arrID[0] = "";
$API->comm("/ppp/secret/set",
array(
".id" => $arrID[0][".id"],
// "password" => $s4,
"caller-id" => $mac_address,
));
$API->write('/interface/pppoe-server/print
?user='."$n1".'
.id=.id');
$find = $API->read();
//Remove ID encontrado
foreach ($find as $find):
$API->write('/interface/pppoe-server/remove', false);
$API->write('=.id='.$find['.id']);
$API->read();
endforeach;
}}}}

////////
if(!isset($valorr))
$valorr = $valor2;
if(isset($_POST["valorr"])){
$valorr=$_POST["valorr"];}
////////
if(!isset($datar))
$datar = $data2;
if(isset($_POST["datar"])){
$datar=$_POST["datar"];}
////////
if(!isset($macr))
$macr = $macr;
if(isset($_POST["macr"])){
$macr=$_POST["macr"];}
////////
if(!isset($remotor))
$remotor = $remoto;
if(isset($_POST["remotor"])){
$remotor=$_POST["remotor"];}
////////////////////////////////////////////////////
$sql="UPDATE roteador SET cliente = '$nomer' , parcelas = '$aquisicaor' , valor = '$valorr' , data = '$datar' , acesso_remoto = '$remotor' , mac = '$macr'  WHERE id = $id_cr";
$res=mysqli_query($con,$sql);
echo '
<script type="text/javascript"> 
var urlAtual = window.location.href;
window.location.href=urlAtual;
</script>';
}
?>
<br>
<br>
<div class="card-header card-header-primary" >
                  <h4 class="card-title">Observação</h4>
                  <p class="card-category">Observações a serem feitas sobre o cliente.</p>
				  </div>
				  <br>
<!--------------------------------------------------------------------->
<!--------------------- EDIÇÃO DE DESCRIÇÃO --------------------------->
<!--------------------------------------------------------------------->
<?php
//////// VERIFICA SE JA TEM NO BANCO, SE NÃO ELE CRIA //////////////////
$data_ob = date("d/m/Y");
 $sql="SELECT * FROM observacao where id_cliente_ob = '$id'";
$res= mysqli_query($con,$sql);
$lin=mysqli_num_rows($res);
if($lin == 1 ){
$id_ob=$vreg[0];
$id_c_ob=$vreg[1];
$data_ob=$vreg[2];
$porta_ob=$vreg[3];
$obs_ob=$vreg[4];
}else{
$res=mysqli_query($con,"insert into observacao values
(NULL, '$id', '$data_ob','Não informado' ,'Sem obs.' );");
 }
/////////////////////////////////////////////////////////////////////
//////////////////// FORMULARIO DE OBSERVAÇÃO ///////////////////////
/////////////////////////////////////////////////////////////////////
$sql="SELECT * FROM observacao where id_cliente_ob = '$id'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$id_ob=$vreg[0];
$id_c_ob=$vreg[1];
$data_ob=$vreg[2];
$porta_ob=$vreg[3];
$obs_ob=$vreg[4];
}
?>
<form name="login" method="post" action="">
<input type="hidden" name="get" value="nada" /> 
<div class="table-responsive">
<table class="table table-hover">
<tr>
<td>
<font color='black' class="bmd-label-floating"><strong>Data da edição:</strong></font>
</td>
<td>
<input type="text" class="form-control" name="dataob" size="30" maxlength="35" value="<?php echo $data_ob; ?>" onchange="carregatexto(this.value)" />
</td>
<td>
<font color='black' class="bmd-label-floating"><strong>Porta na caixa:</strong></font>
</td>
<td>
<input type="text" class="form-control" name="portaob" size="30" maxlength="50" value="<?php echo $porta_ob; ?>" onchange="carregatexto(this.value)" />
</td>
</tr>
<tr>
<td><font color='black' class="bmd-label-floating"><strong>Descrição:</strong></font>
</td><td>
<textarea type="text" class="form-control" name="descricaoob" rows="5" cols="32"> <?php echo $obs_ob; ?></textarea>
</tr>
</tr>
<tr>
<td>
<a href='acao.php?id=$n1'>
<button type="submit" class="btn btn-primary pull-right">Salvar</button>
</li>
</td>
</tr>
</table>
</form>  
<?php
if(!isset($portaob))
$portaob = $portaob;
if(isset($_POST["portaob"])){
$portaob=$_POST["portaob"];
if(!isset($descricaoob))
$descricaoob = $descricaoob;
if(isset($_POST["descricaoob"])){
$descricaoob=$_POST["descricaoob"];}
//$data_ob = date("d/m/Y");
if(isset($_POST["dataob"])){
$data_ob=$_POST["dataob"];}
$sql="UPDATE observacao SET data = '$data_ob' , porta_caixa = '$portaob' , obs = '$descricaoob' WHERE id_cliente_ob = $id";
$res=mysqli_query($con,$sql);
echo '<script type="text/javascript"> 
var urlAtual = window.location.href;
window.location.href=urlAtual;
</script>';
}
?>
<br>
<br>
<div class="card-header card-header-primary">
                  <h4 class="card-title">Servidor</h4>
                  <p class="card-category">Mudar o cliente do servidor.</p>
				  </div>
				 
				  <br>
				  <br>
<!--------------------------------------------------------------------->
<!-------------------- MUDANDO CLIENTE DE SERVIDOR -------------------->
<!--------------------------------------------------------------------->
<form name="login" method="post" >
<input type="hidden" name="acao" value="nada" /> 
<table border="0"  >
<tr>
<td>
<font color='black' class="bmd-label-floating"><strong>Servidor:</strong></font>
</td>
<td>
<select name="nome2" class="form-control"  id="select">
<option>Selecionar</option>
<?php
$user1 = $_SESSION['$vreg[2]'];
$username1 = $_SESSION['$vreg[1]'];
$sql="SELECT * FROM clientes where usuario = '$user1'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$useruser = $vreg[1];
}
$sql="SELECT * FROM clientes where usuario = '$useruser'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$id_user = $vreg[0];
}
$sql="SELECT * FROM servidores where id_cliente = $id_user ";
$res=mysqli_query($con,$sql);
	while($vreg=mysqli_fetch_row($res)){
     $idserv=$vreg[1];
	 echo "<option>";
echo $serv=$vreg[2];
echo "</option>";
}
 ?> 
</select>
</td>
</tr>
<tr>
<td>
<a href='acao.php?id=$n1'>
<button type="submit" class="btn btn-primary pull-right">Salvar</button>
</li>
</td>
</tr>
</table>
</form>  
<?php
$com= $plano."-".$ven;
if(isset($_POST["nome2"])){
$nome2=$_POST["nome2"];
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
$sql="SELECT * FROM servidores where Nome = $nome2 ";
$res=mysqli_query($con,$sql);
	while($vreg=mysqli_fetch_row($res)){
    echo $idserv=$vreg[1];}
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
///-----------------MUDANDO ROTEADOR -------------------------///
$sql="SELECT * FROM servidores where nome = '$nome2' ";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$serv=$vreg[1];
$ip=$vreg[3];
}
$sql="UPDATE roteador SET id_servidor = '$serv' WHERE cliente = '$n1'";
$res=mysqli_query($con,$sql);
///---------------- REMOVENDO CLIENTE DA RB --------------------///
$arrID=$API->comm("/ppp/secret/getall", 
array(
".proplist"=> ".id",
"?name" => $n1,
));
$API->comm("/ppp/secret/remove",
array(
".id" => $arrID[0][".id"],
));
///---------------- CRIANDO CLIENTE DA RB --------------------///

if ($API->connect("$ip","$login_servidor_mikrotik","$senha_servidor_mikrotik")) {
	$API->comm("/ppp/secret/add", array(
"name"     => $n1,
"password" => "123456",
"profile" => $plano,  
"comment" => $com, 
"service" => "pppoe",)) ;
echo "<br>Usuario Transferido de servidor com sucesso!.";
}
///-----------------MUDANDO SERVIDOR -------------------------///
$sql="UPDATE db_clientes SET id_cliente = '$serv' WHERE id = $id";
$res=mysqli_query($con,$sql);
echo '<script type="text/javascript"> 
var urlAtual = window.location.href;
window.location.href=urlAtual;
</script>';
}
?>
<!--------------------------------------------------------------------->
<!---------------- FIM MUDANDO CLIENTE DE SERVIDOR -------------------->
<!--------------------------------------------------------------------->
<br>
<br>
<div class="col-md-12">
              <div class="card card-plain">
                <div class="card-header card-header-primary">
                  <h4 class="card-title mt-0"> Atualizações</h4>
                  <p class="card-category"> Todas as mudanças feitas no cadastro do cliente.</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class="">
    <tr>
<th scope="col">DATA E HORA</th>
<th scope="col">ALTERAÇÃO</th>
<th scope="col">USUARIO</th>
</tr>
</thead>
<?php
$sql="SELECT * FROM historico where usuario_cliente = '$n1' ORDER BY data DESC limit 10";
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
	

echo "<td >"; if($oq=="Cliente Excluido"){echo "<a href='acao4.php?id=$usuario'><font color=red size=3>";}else{if($oq=="Pagamento"){echo "<font color=blue size=3>";}else{if($oq=="Bloqueio"){echo "<font color=black size=3>";}else{echo "<font color=#04B404 size=3>";} }} echo $inst ."</a></td>";
echo "<td >"; if($oq=="Cliente Excluido"){echo "<a href='acao4.php?id=$usuario'><font color=red size=3>";}else{if($oq=="Pagamento"){echo "<font color=blue size=3>";}else{if($oq=="Bloqueio"){echo "<font color=black size=3>";}else{echo "<font color=#04B404 size=3>";} }} echo $oq ."</a></td>";
echo "<td >"; if($oq=="Cliente Excluido"){echo "<a href='acao4.php?id=$usuario'><font color=red size=3>";}else{if($oq=="Pagamento"){echo "<font color=blue size=3>";}else{if($oq=="Bloqueio"){echo "<font color=black size=3>";}else{echo "<font color=#04B404 size=3>";} }} echo $quem ."</font></a></td>";


	echo "</td>";
echo "</tr>";	

}

mysqli_close($con);
}
?>
</table>

			
             
			  
			  
			  
			  
            </div>
            </div>
          </div>
        </div>
      </div>
     </div>
  </div>
  </div>
  </div>
 
  <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Filters</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger active-color">
            <div class="badge-colors ml-auto mr-auto">
              <span class="badge filter badge-purple" data-color="purple"></span>
              <span class="badge filter badge-azure" data-color="azure"></span>
              <span class="badge filter badge-green" data-color="green"></span>
              <span class="badge filter badge-warning" data-color="orange"></span>
              <span class="badge filter badge-danger" data-color="danger"></span>
              <span class="badge filter badge-rose active" data-color="rose"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="header-title">Images</li>
        <li class="active">
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-1.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-2.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-3.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-4.jpg" alt="">
          </a>
        </li>
        <li class="button-container">
          <a href="https://www.creative-tim.com/product/material-dashboard" target="_blank" class="btn btn-primary btn-block">Free Download</a>
        </li>
        <!-- <li class="header-title">Want more components?</li>
            <li class="button-container">
                <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-warning btn-block">
                  Get the pro version
                </a>
            </li> -->
        <li class="button-container">
          <a href="https://demos.creative-tim.com/material-dashboard/docs/2.1/getting-started/introduction.html" target="_blank" class="btn btn-default btn-block">
            View Documentation
          </a>
        </li>
        <li class="button-container github-star">
          <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
        </li>
        <li class="header-title">Thank you for 95 shares!</li>
        <li class="button-container text-center">
          <button id="twitter" class="btn btn-round btn-twitter"><i class="fa fa-twitter"></i> &middot; 45</button>
          <button id="facebook" class="btn btn-round btn-facebook"><i class="fa fa-facebook-f"></i> &middot; 50</button>
          <br>
          <br>
        </li>
      </ul>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="../assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="../assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="../assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="../assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="../assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="../assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
</body>

</html>