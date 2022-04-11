<?php
require_once '../login/protect.php';
require_once 'conexao/conect.php';
require_once"painel.php";?>
<html lang="pt">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   MSTELECOM
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
      <!--        PAINEL PRINCIPAL    -->
      <div class="logo"><a href="index.php" class="simple-text logo-normal">
          MSTELECOM
        </a></div>
      <?php echo $menu; ?>
    </div>
    <div class="main-panel">
	   <!-- PESQUISA E NOTIFICAÇÕES -->
	<?php $id_serv = $_SESSION['$id_servidor'];
	$sql="SELECT * FROM cadastro where id_cliente = '1' and id_servidor = '$id_serv'";
$res= mysqli_query($con,$sql);
$lin=mysqli_num_rows($res);
$user1 = $_SESSION['$vreg[2]'];
$sql="SELECT * FROM clientes where usuario = '$user1'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$user1 = $vreg[1];}
$sql="SELECT * FROM clientes where nome = '$user1' and usuario = '$user1'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$id_servserv = $vreg[7];}
$sql="SELECT * FROM chamado where id_serv = $id_servserv and status = '1' and nome_cliente = 'Instalação'";
$res=mysqli_query($con,$sql);
$lin2=mysqli_num_rows($res);
$lin3 = $lin + $lin2;	 ?>
	 	 <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Usuario:   <?php echo $_SESSION['$vreg[2]']; ?></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="status.php">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification"><?php echo $lin3;  ?></span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
<?php
$sql="SELECT * FROM cadastro where id_cliente = '1'";
$res= mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
echo '<a class="dropdown-item" href="confirmar.php">Instalação =  '. $vreg[10] .'</a>';}
$sql="SELECT * FROM chamado where id_serv = $id_servserv and status = '1' ";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
	if($vreg[2]=='Instalação'){
	echo '<a class="dropdown-item" href="chamados.php">'. $vreg[2] .' ver em chamados</a>';
	}}?>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Conta
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                 <a class="dropdown-item" href="#">Perfil</a>
                  <a class="dropdown-item" href="#">Configurações</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../login/logout.php">Sair</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- CAIXAS DE AVISOS  -->
<script>
			$(function(){
				//chama a função atualizaDados daqui à 10000ms (1s)
				window.setTimeout(atualizaDados, 10000);
				function atualizaDados() {
					//carrega o conteúdo do arquivo "auto_refresh.php" para dentro da div#total_cliente_conectado
					$("#total_cliente_conectado").load('clientes_refresh_painel.php');
					//para perpetuar a chamada da função sempre a cada 1s
					window.setTimeout(atualizaDados, 10000);
				}
			});
</script>
      <div class="content">
	 <!--- //auto refresh -->
 	   <div id="total_cliente_conectado" class="widget-int num-count">
	  <!--- carrega a pagina auto_refresh_index.php-->	
	   <?php echo '<br>' . $painel;   ?>  
<!--- ATUALIZAÇÕES -->
              </div>
<?php
if(!isset($_GET["id"]))
$_GET["id"]= null;
$n1=$_GET["id"];
$id_s = $_SESSION['numIpp'];
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
$sql="SELECT * FROM historico where id_servidor = $id_servserv and usuario_cliente = '$n1'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
	$nome=$vreg[1];
	$user=$vreg[2];
	$endereço=$vreg[7];
	$complemento=$vreg[8];
	$plano=$vreg[9];
	$contato=$vreg[10];
	$instalaçao=$vreg[11];
	$numero=$vreg[12];
	$ven=$vreg[13];
	$valor=$vreg[14];
	$id_cliente=$vreg[15];
	$apelido=$vreg[16];
	$cpf=$vreg[17];
	$email=$vreg[18];}
$id_servidor;
if(!isset($nome)) $nome = null;
if(!isset($usuario)) $usuario = null; 
if(!isset($nome)) $nome = null;
if(!isset($nome)) $nome = null;		
if(!isset($instalaçao)) $instalaçao = null;	
if(!isset($endereço)) $endereço = null;	
if(!isset($numero)) $numero = null;
if(!isset($complemento)) $complemento = null;
if(!isset($plano)) $plano = null;	
if(!isset($ven)) $ven = null;
if(!isset($email)) $email = null;
if(!isset($tel)) $tel = null;
if(!isset($valor)) $valor = null;
?>
<script type="text/javascript">
function validaCampo()
{
if(document.login.nome.value=="")
{
alert("Insira o nome completo.");
return false;
}
else
if(document.login.usuario.value=="")
{
alert("Insira o nome de usuario.");
return false;
}
else
return true;
}
</script>
<form name="login" method="post" action="">
<input type="hidden" name="get" value="nada" /> 
<table border="1" align="center" cellpadding="2" cellspacing="2">
<tr>
<td>Nome completo:
</td>
<td>
<input type="text" name="nome" size="30" maxlength="50"  value="<?php echo $nome;?>" onchange="carregatexto(this.value)" />
</td>
</tr>
<tr>
<td>CPF:
</td>
<td>
<input type="text" name="cpf" size="30" maxlength="50" value="<?php echo $cpf;?>" onchange="carregatexto(this.value)" />
</td>
</tr>
<tr>
<td>Id do cliente:
</td><td>
<input type="text" name="apelido" size="30" maxlength="35" value="<?php echo $id_cliente;?>" onchange="carregatexto(this.value)" />
</td>
</tr>
<tr>
<td>Apelido
</td><td>
<input type="text" name="email" size="30" maxlength="35" value="<?php echo $apelido;?>" onchange="carregatexto(this.value)" />
</td>
</tr><tr>
<td>E-mail:
</td><td>
<input type="text" name="email" size="30" maxlength="35" value="<?php echo $email;?>" onchange="carregatexto(this.value)" />
</td>
</tr>
<tr>
<td>Endereço:
</td><td>
<input type="text" name="endereco" size="20" maxlength="50" value="<?php echo $endereço;?>" onchange="carregatexto(this.value)" />
Numero:
<input type="text" name="numero" size="4" maxlength="35" value="<?php echo $numero;?>" onchange="carregatexto(this.value)" />
</td>
</tr>
<tr>
<td>complemento:
</td><td>
<input type="text" name="complemento" size="30" maxlength="25" value="<?php echo $complemento;?>" onchange="carregatexto(this.value)" />
</td>
</tr>
<tr>
<td>Tel:
</td><td>
<input type="text" name="contato" size="30" maxlength="25" value="<?php echo $contato;?>" onchange="carregatexto(this.value)" />
</td>
</tr>
<tr>
<td>Data:
</td><td>
<input type="txt" name="data" size="15" maxlength="35" value="<?php echo date("d/m/Y"); ?>" onchange="carregatexto(this.value)" />
</td>
</tr>
<tr>
<td>Usuario:
</td><td>
<input type="text" name="usuario" size="30" maxlength="25"  value="<?php echo $user;?>" onchange="carregatexto(this.value)" />
</td>
</tr>
<tr>
<td>Senha:
</td><td>
<input type="password" name="senha" size="30" maxlength="25" value="123456" />
</td>
</tr>
<tr>
<td>Plano:
</td><td>
<select name="profile" id="select">
<?php
echo "<option>". $plano ."</option>";
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
<td>Vecimento:
</td>
<td>
<select name="comentario" id="select">
<option>05</option>
<option>10</option>
<option>15</option>
<option>20</option>
<option>25</option></select>
</td>
</tr>
<tr>
<td>Valor do contrato R$:
</td>
<td>
<input type="text" name="valor" size="30" maxlength="25" value="<?php echo $valor;  ?>"  onchange="carregatexto(this.value)" />
</td>
</tr>
<tr>
<td>Roteador:
</td>
<td>SIM: <input type="radio" name="roteador" value="sim" />
NÃO: <input type="radio" name="roteador" value="nao" />
</td>
</tr>
<tr>
<td>Parcelas do Roteador:
</td>
<td>
<select name="roteador2" id="select">
<option>Selecione</option>
<option>1x</option>
<option>2x</option>
<option>3x</option>
<option>  A vista</option></select>
</td>
</tr>
<td>Valor do roteador R$:
</td>
<td>
<input type="text" name="roteador3" size="30" maxlength="25"  onchange="carregatexto(this.value)" />
</td>
</tr>
<td>Gerenciamento remoto do Roteador:
</td>
<td>
<select name="roteador4" id="select">
<option>Selecione</option>
<option>Sim</option>
<option>Não</option>
</select>
</td>
</tr>
<tr>
<td colspan="2">
<input type="submit" name="entrar" value="Cadastrar" />
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
"service" => "pppoe",)) ;}}
$ARRAY = $API->comm("/ppp/secret/print", array(
"count-only"=> "",
)); $num2 = $ARRAY;
if(!isset($num2))
$num2 = null;
if(!isset($num))
$num = $num2;
if($n == null ){
}else{
if($num !== $num2 ){
echo " <center> <font color='#00CC00'>Usuario criado com sucesso na RB!</font> </center> ";
}else{};
};
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
if(isset($_POST["apelido"])){
$apelido=$_POST["apelido"];}
if(isset($_POST["email"])){
$email=$_POST["email"];}
$dat = date("d");
if( $c == 05){
if($dat <=5){$data="3";}
}else{$data = "2";}
{
if($dat >=6 and $dat <20 ){$data="2";}	else {$data="3";}
};
/////////// quando o cliente for do dia 15 /////////////////////
if( $c == 15){

	if($dat <=15 ){$data="3";}	else {$data="2";}
	
	};

/////////// quando o cliente for do dia 25 /////////////////////
if( $c == 25){
	
	if($dat >=10 and $dat<=25){$data="3";}	else {$data="2";}
	
	};

///////////////////////////////////////////////////


$data = $c;
if($dat > $data){$data = "2";};
if($dat <= $data){$data = "3";};
//////////////////////////////////////////////
if($nome == null ){
	
	echo "<center> Preencha os campos para adicionar. <center>";}else{
$u = $_SESSION['$vreg[2]'];
$sql="SELECT * FROM clientes where usuario = '$u'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
    $serv=$vreg[5];
};
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
if(!isset($apelido))
$apelido = "Não informado";
if(!isset($valor))
$valor = "Não informado";
if(!isset($cpf))
$cpf = "Não informado";


$res=mysqli_query($con,"insert into db_clientes values
('$serv', '$apelido', '$nome','$n', '$email', '$contato', '$instalacao','$endereco',
'$numero','$complemento','null', '$plano', '$c', '$data', '$valor', '$cpf'  );");
$sql="SELECT * FROM db_clientes where nome = '$nome'";
$res= mysqli_query($con,$sql);
$lin=mysqli_num_rows($res);
while($vreg=mysqli_fetch_row($res)){
$id=$vreg[1];}
if($lin == 1 ){
	echo "<center><font color='#00CC00'> Usuario adicionado no banco de dados com sucesso!</font> ";
echo "<p> <a href='acao.php?id=$n1'> <button type='button' class='btn btn-primary'>Voltar</button></a></p>";

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
#$res=mysqli_query($con,"insert into mensalidade values
#(NULL,'$id','$u','$jan', $fev, '$mar','$abr', '$mai', '$jun', '$jul','$ago',
#'$set','$out','$nov', '$dez', '$ano');");

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
(NULL, '$id_servserv', '$n', '$roteador2', '$roteador3', '$d', '$remoto');");
////(NULL, '$serv', '$n', '$roteador2', '$roteador3', '$d', '$remoto');");
$sql="SELECT * FROM clientes where usuario = '$user1'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$id_user = $vreg[0];
}
$sql="SELECT * FROM servidores where id_cliente = $id_user ";
$res=mysqli_query($con,$sql);
	while($vreg=mysqli_fetch_row($res)){
$idserv=$vreg[1];
$nomeserv=$vreg[2];
$ipip=$vreg[3];

}
$data_hora = date('d-m-y H:i:s');
$res=mysqli_query($con,"insert into historico values
(default, '$nome','$n', '$id_servserv',NOW(),'Cliente Recuperado', '$user' ,'$endereco' ,'$complemento','$plano','$contato',
'$data_hora','$numero', '$c','$valor','$id_cliente','$apelido','$cpf','$email' );");	
header("Refresh: 3; url = acao.php?id=$n1'");

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
header("Refresh: 3; url = acao.php?id=$n1'");
}
}


}
	
	
	
	
	
}else{
		
	echo "<center><font color='red'> Nome de usuario já existe no banco de dados! </font></center>";	
	}}
	};

mysqli_close($con);

?>
			  
			  
			  
           </div>
          </div>
	  <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
           
		   
		   <!------------------------------------->
		   
          </nav>
          <div class="copyright float-right">
           
<!------------------------------------->


		   </div>
        </div>
      </footer>
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
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
</body>

</html>