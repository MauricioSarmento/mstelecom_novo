<?php
require_once '../login/protect.php';
require_once 'conexao/conect.php';
require_once"painel.php";
#header("Refresh: 50");
$id_serv = $_SESSION['$id_servidor'];
?>

<html lang="pt">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   HISTÓRICO
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
     
		 <?php 
	$sql="SELECT * FROM cadastro where id_cliente = '1' and id_servidor = '$id_serv'";
$res= mysqli_query($con,$sql);
$lin=mysqli_num_rows($res);

 $user1 = $_SESSION['$vreg[2]'];

$sql="SELECT * FROM clientes where usuario = '$user1'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
 $user1 = $vreg[1];

}
$sql="SELECT * FROM clientes where nome = '$user1' and usuario = '$user1'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$id_servserv = $vreg[7];

}
$sql="SELECT * FROM chamado where id_serv = $id_servserv and status = '1' and nome_cliente = 'Instalação'";
$res=mysqli_query($con,$sql);
$lin2=mysqli_num_rows($res);
$lin3 = $lin + $lin2;
	 ?>
	 	 <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Painel de trabalho</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
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
echo '<a class="dropdown-item" href="confirmar.php">Instalação =  '. $vreg[10] .'</a>';
	                                }
$sql="SELECT * FROM chamado where id_serv = $id_servserv and status = '1' ";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
	if($vreg[2]=='Instalação'){
	echo '<a class="dropdown-item" href="chamados.php">'. $vreg[2] .' ver em chamados</a>';
	}
}						
//$sql="SELECT * FROM cadastro";
//$res= mysqli_query($con,$sql);
//while($vreg=mysqli_fetch_row($res)){
//echo '<a class="dropdown-item" href="#">Boleto =  '. $vreg[10] .'</a>';
//	                                }
?>
                  
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
				//chama a função atualizaDados daqui à 1000ms (1s)
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
	

				<!--- ATUALIZAÇÕES -->
              </div>
			  
			  
	<form name="login" method="post" action="">
<input type="hidden" name="get" value="nada" /> 
<table border="0" align="left" cellpadding="2" cellspacing="2" >

<td>
<input type="text" class='form-control' name="localizar" size="30" maxlength="25" placeholder="Pesquisar..."/>
</td>
<td>
<select name="dia" id="select">
<option>Todos</option>
<option>Cliente Novo</option>
<option>Cliente Excluido</option>
<option>Cliente Recuperado</option>
<option>Atualização Cadastral</option>
<option>Pagamento</option>
<option>Liberação de Internet</option>
</td>
<td>
<button type="submit" value="Localizar" class="btn btn-white btn-round btn-just-icon">
<i class="material-icons">search</i>
</td>
</tr>
</table>
</form>		

<br>
<form name="login" method="post" action="" >
<input type="hidden" name="acao" value="nada" /> 

<table border="0" align="center" cellpadding="1" cellspacing="1">
<tr>
<td>
Exibir clientes que:
</td><td>
<select name="dia" id="select">
<option>Todos</option>
<option>Cliente Novo</option>
<option>Cliente Excluido</option>
<option>Cliente Recuperado</option>
<option>Atualização Cadastral</option>
<option>Pagamento</option>
<option>Liberação de Internet</option>
<input type="submit" name="entrar" value="Enviar" />
</td>
</tr>
</form>  
<?php
if(isset($_POST["dia"])){
$dia=$_POST["dia"];
}else{
	$dia = "Todos";
}

require_once 'conexao/conect.php';
$u = $_SESSION['$vreg[2]'];
echo '<div class="col-md-12">
              <div class="card card-plain">
                <div class="card-header card-header-primary">
                  <h4 class="card-title mt-0"> Historico</h4>
                  <p class="card-category"> Historico de atualização de dados, com data, hora e quem fez a modificação.</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class="">
    <tr>
<th scope="col">NOME</th>
<th scope="col">USUARIO</th>
<th scope="col">PLANO</th>
<th scope="col">CONTATO</th>
<th scope="col">DATA</th>
<th scope="col">ALTERAÇÃO</th>
<th scope="col">USUARIO</th>
</tr>
</thead>';
$sql="SELECT * FROM clientes where usuario = '$u'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
    $serv=$vreg[5];
	};

///////////////////////////////
$mes = array("defalt,jan,fev,mar,abr,mai,jun,jul,ago,set,out,nov,dez");
$mes[0]='defalt';
$mes['01']='Janeiro';
$mes['02']='Fevereiro';
$mes['03']='Março';
$mes['04']='Abril';
$mes['05']='Maio';
$mes['06']='Junho';
$mes['07']='Julho';
$mes['08']='Agosto';
$mes['09']='Setembro';
$mes[10]='Outubro';
$mes[11]='Novembro';
$mes[12]='Dezembro';
$a = "and Ação = '$dia'";
if($dia == "Todos"){$a = null;};


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
if(isset($_POST["localizar"])){
$localizar=$_POST["localizar"];
$sql="SELECT * FROM historico where id_servidor = $id_servserv $a and nome LIKE '%$localizar%' limit 50";
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
	
echo "<td >"; if($oq=="Cliente Excluido"){echo "<a href='acao4.php?id=$usuario'><font color=red size=3>";}else{if($oq=="Pagamento"){echo "<font color=blue size=3>";}else{if($oq=="Bloqueio"){echo "<font color=black size=3>";}else{echo "<a href='acao.php?id=$usuario'><font color=#04B404 size=3>";} }} echo $n . "</a>"; 
echo "</a></td>";
echo "<td>";
if($oq=="Cliente Excluido"){echo "<a href='acao4.php?id=$usuario'><font color=red size=3>";}else{if($oq=="Pagamento"){echo "<a href='acao.php?id=$usuario'><font color=blue size=3>";}else{if($oq=="Bloqueio"){echo "<a href='acao.php?id=$usuario'><font color=black size=3>";}else{echo "<a href='acao.php?id=$usuario'><font color=#04B404 size=3>";}} } echo $usuario . " </a></td>";
echo "<td >"; if($oq=="Cliente Excluido"){echo "<a href='acao4.php?id=$usuario'><font color=red size=3>";}else{if($oq=="Pagamento"){echo "<a href='acao.php?id=$usuario'><font color=blue size=3>";}else{if($oq=="Bloqueio"){echo "<a href='acao.php?id=$usuario'><font color=black size=3>";}else{echo "<a href='acao.php?id=$usuario'><font color=#04B404 size=3>";} }} echo $plano." </a></td>";
echo "<td >"; if($oq=="Cliente Excluido"){echo "<a href='acao4.php?id=$usuario'><font color=red size=3>";}else{if($oq=="Pagamento"){echo "<a href='acao.php?id=$usuario'><font color=blue size=3>";}else{if($oq=="Bloqueio"){echo "<a href='acao.php?id=$usuario'><font color=black size=3>";}else{echo "<a href='acao.php?id=$usuario'><font color=#04B404 size=3>";} }} echo $contato ."</a></td>";
echo "<td >"; if($oq=="Cliente Excluido"){echo "<a href='acao4.php?id=$usuario'><font color=red size=3>";}else{if($oq=="Pagamento"){echo "<a href='acao.php?id=$usuario'><font color=blue size=3>";}else{if($oq=="Bloqueio"){echo "<a href='acao.php?id=$usuario'><font color=black size=3>";}else{echo "<a href='acao.php?id=$usuario'><font color=#04B404 size=3>";} }} echo $inst ."</a></td>";
echo "<td >"; if($oq=="Cliente Excluido"){echo "<a href='acao4.php?id=$usuario'><font color=red size=3>";}else{if($oq=="Pagamento"){echo "<a href='acao.php?id=$usuario'><font color=blue size=3>";}else{if($oq=="Bloqueio"){echo "<a href='acao.php?id=$usuario'><font color=black size=3>";}else{echo "<a href='acao.php?id=$usuario'><font color=#04B404 size=3>";} }} echo $oq ."</a></td>";
echo "<td >"; if($oq=="Cliente Excluido"){echo "<a href='acao4.php?id=$usuario'><font color=red size=3>";}else{if($oq=="Pagamento"){echo "<a href='acao.php?id=$usuario'><font color=blue size=3>";}else{if($oq=="Bloqueio"){echo "<a href='acao.php?id=$usuario'><font color=black size=3>";}else{echo "<a href='acao.php?id=$usuario'><font color=#04B404 size=3>";} }} echo $quem ."</a></td></font>";


	echo "</td>";
echo "</tr>";		

}}else{
	$sql="SELECT * FROM historico where id_servidor = $id_servserv $a ORDER BY data DESC limit 500";
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
	
echo "<td >"; if($oq=="Cliente Excluido"){echo "<a href='acao4.php?id=$usuario'><font color=red size=3>";}else{if($oq=="Pagamento"){echo "<font color=blue size=3>";}else{if($oq=="Bloqueio"){echo "<font color=black size=3>";}else{echo "<a href='acao.php?id=$usuario'><font color=#04B404 size=3>";} }} echo $n . "</a>"; 
echo "</a></td>";
echo "<td>";
if($oq=="Cliente Excluido"){echo "<a href='acao4.php?id=$usuario'><font color=red size=3>";}else{if($oq=="Pagamento"){echo "<a href='acao.php?id=$usuario'><font color=blue size=3>";}else{if($oq=="Bloqueio"){echo "<a href='acao.php?id=$usuario'><font color=black size=3>";}else{echo "<a href='acao.php?id=$usuario'><font color=#04B404 size=3>";}} } echo $usuario . " </a></td>";
echo "<td >"; if($oq=="Cliente Excluido"){echo "<a href='acao4.php?id=$usuario'><font color=red size=3>";}else{if($oq=="Pagamento"){echo "<a href='acao.php?id=$usuario'><font color=blue size=3>";}else{if($oq=="Bloqueio"){echo "<a href='acao.php?id=$usuario'><font color=black size=3>";}else{echo "<a href='acao.php?id=$usuario'><font color=#04B404 size=3>";} }} echo $plano." </a></td>";
echo "<td >"; if($oq=="Cliente Excluido"){echo "<a href='acao4.php?id=$usuario'><font color=red size=3>";}else{if($oq=="Pagamento"){echo "<a href='acao.php?id=$usuario'><font color=blue size=3>";}else{if($oq=="Bloqueio"){echo "<a href='acao.php?id=$usuario'><font color=black size=3>";}else{echo "<a href='acao.php?id=$usuario'><font color=#04B404 size=3>";} }} echo $contato ."</a></td>";
echo "<td >"; if($oq=="Cliente Excluido"){echo "<a href='acao4.php?id=$usuario'><font color=red size=3>";}else{if($oq=="Pagamento"){echo "<a href='acao.php?id=$usuario'><font color=blue size=3>";}else{if($oq=="Bloqueio"){echo "<a href='acao.php?id=$usuario'><font color=black size=3>";}else{echo "<a href='acao.php?id=$usuario'><font color=#04B404 size=3>";} }} echo $inst ."</a></td>";
echo "<td >"; if($oq=="Cliente Excluido"){echo "<a href='acao4.php?id=$usuario'><font color=red size=3>";}else{if($oq=="Pagamento"){echo "<a href='acao.php?id=$usuario'><font color=blue size=3>";}else{if($oq=="Bloqueio"){echo "<a href='acao.php?id=$usuario'><font color=black size=3>";}else{echo "<a href='acao.php?id=$usuario'><font color=#04B404 size=3>";} }} echo $oq ."</a></td>";
echo "<td >"; if($oq=="Cliente Excluido"){echo "<a href='acao4.php?id=$usuario'><font color=red size=3>";}else{if($oq=="Pagamento"){echo "<a href='acao.php?id=$usuario'><font color=blue size=3>";}else{if($oq=="Bloqueio"){echo "<a href='acao.php?id=$usuario'><font color=black size=3>";}else{echo "<a href='acao.php?id=$usuario'><font color=#04B404 size=3>";} }} echo $quem ."</a></td></font>";


	echo "</td>";
echo "</tr>";		

}
	
}

mysqli_close($con);
?>
</table>
			  
			  
			  
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