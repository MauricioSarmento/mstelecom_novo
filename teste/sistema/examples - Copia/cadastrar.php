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
   CADASTRO
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
					
					
      <div class="content">
	 <!--- //auto refresh -->
 	   <div id="total_cliente_conectado" class="widget-int num-count">
	  <!--- carrega a pagina auto_refresh_index.php-->	
<?php  
echo $painel;  ?>	  


<!--- ATUALIZAÇÕES -->
	

				<!--- ATUALIZAÇÕES -->
              </div>
			  
			  
			  <center>
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
<table  align="center" cellpadding="2" cellspacing="2" >
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
<td>Apelido:
</td><td>
<input type="text" name="apelido" class="form-control" size="30" maxlength="98"  onchange="carregatexto(this.value)" />
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
<button type="submit" class="btn btn-primary pull-right">Cadastrar cliente</button>
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
if(isset($_POST["apelido"])){
$apelido=$_POST["apelido"];}
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
if(!isset($apelido))
$apelido = "Não informado";
if(!isset($valor))
$valor = "Não informado";
if(!isset($cpf))
$cpf = "Não informado";
$res=mysqli_query($con,"insert into db_clientes values
('$serv', default, '$nome','$n', '$email', '$contato', '$instalacao','$endereco',
'$numero','$complemento','$apelido', '$plano', '$c', '$data', '$valor', '$cpf'  );");
$sql="SELECT * FROM db_clientes where nome = '$nome'";
$res= mysqli_query($con,$sql);
$lin=mysqli_num_rows($res);
while($vreg=mysqli_fetch_row($res)){
$id=$vreg[1];}
if($lin == 1 ){
echo "<center><font color='#00CC00'> Usuario adicionado no banco de dados com sucesso! </font>  ";
echo "<p> <a href='acao.php?id=$n'> <button type='button' class='btn btn-primary'>Ir para Perfil do cliente</button></a></p>";
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
'$instalacao','$numero', '$c','$valor','$apelido' );");	

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
</center>
			  
			  
			  
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