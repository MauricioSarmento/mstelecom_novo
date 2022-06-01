﻿<?php
require_once '../login/protect.php';
require_once '../login/conect.php';
require_once"painel.php";
$id_serv = $_SESSION['$id_servidor'];
$user1 = $_SESSION['$vreg[2]'];
$sql="SELECT * FROM clientes where usuario = '$user1'";
$res= mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$priv=$vreg[6];
}
if($priv == 1 or $priv == 3) { 
?>
<html lang="pt">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   FINANÇAS
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
	<br>
    <div class="main-panel">
      <!-- VERIFICA SE O USUARIO JA TEM SERVIDOR CADASTRADO -->
		 <?php 
$_SESSION['numIpp'];
$t = $_SESSION['numIpp'];
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
	$sql="SELECT * FROM cadastro where id_cliente = '1'";
	$res=mysqli_query($con,$sql);
	$lin3=mysqli_num_rows($res);
$lin4 = $lin + $lin2 + $lin3;
	 ?>
	 <!-- PESQUISA E NOTIFICAÇÕES -->
	 	 <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Usuario:   
			<?php echo $_SESSION['$vreg[2]']; ?></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
           <form class="navbar-form" name="login" method="post" action="">
             <input type="hidden" name="acao" value="nada" /> 
              <div class="input-group no-border">
                
				<input type="text" name="localizar" size="15" class="form-control" maxlength="25" value="" placeholder="Procurar...">
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
                  <span class="notification"><?php echo $lin4;  ?></span>
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
	 
	 
	 <br>
	 <br>
	 <div class="col-md-12">
              <div class="card card-plain">
                <div class="card-header card-header-primary">
                  <h4 class="card-title mt-0"> Clientes</h4>
                  <p class="card-category"> Todos os clientes que foram colocados como pago</p>
                </div>
	 <br>
	 <br>
	 
	 				  <style type="text/css">
table
{
float:left;
}
</style>

	 <form name="login" method="post" action="">
<input type="hidden" name="acao" value="nada" /> 
<table border="0" cellpadding="1" cellspacing="1">
<tr>
<td>
Ano 20
</td><td>
<select name="Ano" id="select">
<option><?php echo date('y'); ?></option>
<option><?php echo date('y')-1; ?></option>
<option><?php echo date('y')-2; ?></option>
<option><?php echo date('y')-3; ?></option>
</td>
<td>
Mes
</td><td>
<select name="Mes" id="select">
<?php
if(isset($_POST["Mes"])){
echo '<option>'.$_POST["Mes"].'</option>';
}
?>
<option><?php echo date('m'); ?></option>
<option>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
<option>08</option>
<option>09</option>
<option>10</option>
<option>11</option>
<option>12</option>
</td>
<td>
Dia
</td>
<td>
<select name="Dia" id="select">
<?php
if(isset($_POST["Dia"])){
echo '<option>'.$_POST["Dia"].'</option>';
}
?>
<option><?php echo date('d'); ?></option>
<option>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
<option>08</option>
<option>09</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
<option>31</option>
<option>Todos</option>
</select>
</td>
<td>
Ordenar
</td><td>
<select name="ordenar" id="select">
<option>Normal</option>
<option>Nome</option>
<option>Sociedade</option>
</td>
</tr>
<tr>
<td>
<input type="submit" name="entrar" value="Enviar" />
</td>
</tr>
</form>  
<table>
<tr><td>
</td>
<td>
<?php
if(isset($_POST["ordenar"])){
$ordenar=$_POST["ordenar"];}
if($ordenar == 'Normal'){$ordem_alfabetica = '';}
if($ordenar == 'Nome'){$ordem_alfabetica = 'ORDER BY nome_cliente';}
if($ordenar == 'Sociedade'){$ordem_alfabetica = 'ORDER BY socio';}

if(isset($_POST["Mes"])){
$data_m=$_POST["Mes"];
if(isset($_POST["Ano"])){
$data_y=$_POST["Ano"];}
if(isset($_POST["Dia"])){
$data_dia=$_POST["Dia"];}
session_start();
	$_SESSION['data_m']=$data_m;
	$_SESSION['data_y']=$data_y;
	$_SESSION['data_d']=$data_dia;
	if($data_dia == 'Todos'){$data_dian = "id_servidor ='133'";}else{$data_dian = "data_dia = '$data_dia' and id_servidor ='133'";}
$sql="SELECT SUM(valor) AS total FROM pagamentos where data_ano = '$data_y' and data_mes = '$data_m' and $data_dian";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
echo 'Total Faturado R$:' . number_format( $vtotal4=$vreg[0] , 2);
}
//// TOTAL FATURADO Mauricio
$sql="SELECT SUM(valor) AS total FROM pagamentos where data_ano = '$data_y' and data_mes = '$data_m' and $data_dian and socio = 'Mauricio' ";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
echo '<br>Total Faturado Mauricio R$:' . number_format( $vreg[0] , 2);
}
$sql="SELECT * FROM pagamentos where data_ano = '$data_y' and data_mes = '$data_m' and $data_dian and socio = 'Mauricio' ";
$res=mysqli_query($con,$sql);
$lin_mauricio=mysqli_num_rows($res);
//// TOTAL FATURADO Jurlan
$sql="SELECT SUM(valor) AS total FROM pagamentos where data_ano = '$data_y' and data_mes = '$data_m' and $data_dian and socio = 'Jurlan' ";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
echo '<br>Total Faturado Jurlan R$:' . number_format( $vreg[0] , 2);
}
$sql="SELECT * FROM pagamentos where data_ano = '$data_y' and data_mes = '$data_m' and $data_dian and socio = 'Jurlan' ";
$res=mysqli_query($con,$sql);
$lin_jurlan=mysqli_num_rows($res);
//// TOTAL FATURADO Bimdo
$sql="SELECT SUM(valor) AS total FROM pagamentos where data_ano = '$data_y' and data_mes = '$data_m' and $data_dian and socio = 'Bimbo'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
echo '<br>Total Faturado Bimbo R$:' . number_format( $vreg[0] , 2);
}
$sql="SELECT * FROM pagamentos where data_ano = '$data_y' and data_mes = '$data_m' and $data_dian and socio = 'Bimbo'";
$res=mysqli_query($con,$sql);
$lin_bimbo=mysqli_num_rows($res);
//////////////////////////////////////////////////
if($data_dia == 'Todos'){$data_dia = "and id_servidor ='133'";}else{$data_dia = "and data_dia = '$data_dia' and id_servidor ='133'";}
$sql="SELECT * FROM pagamentos where data_ano = '$data_y' and data_mes = '$data_m' $data_dia";
$res=mysqli_query($con,$sql);
$lin=mysqli_num_rows($res);
?>
</td></tr>
</table>

<br>
<br>
<br>
<br>
<br>
<?php echo '<br> <strong>Encontrados: </strong>' . $lin . 
' ||---|| Clientes de Mauricio = ' . $lin_mauricio . ' ||---|| Clientes de Jurlan = ' . $lin_jurlan . ' ||---|| Clientes de Bimbo = ' . $lin_bimbo; ?>
<br>
<br>
           		 <div class="card-body">
                  <div class="table-responsive">
				   <table class="table table-hover">
                      <thead class="">
<tr>
<th scope="col"> <center>NOME DO USUARIO </center></th>
<th scope="col"> <center>VALOR</center></th>
<th scope="col"> <center>VENCIMENTO </center></th>
<th scope="col"> <center>DATA DE PAGAMENTO</center></th>
<th scope="col"> <center>SOCIEDADE</center></th>

</tr>
</thead>



<?php

$sql="SELECT * FROM pagamentos where data_ano = '$data_y' and data_mes = '$data_m' $data_dia $ordem_alfabetica";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
echo '<tr><td>' . $cliente=$vreg[3] . '</td>';
echo '<td>' . $valor=$vreg[7] . '</td>';
echo '<td>' . $venvimento=$vreg[8] . '</td>';
echo '<td>' . $data_pagamento=$vreg[9] . '</td>';
echo '<td>' . $sociedade=$vreg[10] . '</td></tr>';
}
echo '<table>';
 }else{
?>

<br>
<br>
<?php
	 ////////////////////////////////////////////////////////////////////////////
	 ////////////////////////////////////////////////////////////////////////////
	 ////////////////////////////////////////////////////////////////////////////
$data_dian = "id_servidor ='133'";	 
$data_y = date('y');
$data_m= date('m');
	 $sql="SELECT SUM(valor) AS total FROM pagamentos where data_ano = '$data_y' and data_mes = '$data_m' and $data_dian";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
echo 'Total Faturado R$:' . number_format( $vtotal4=$vreg[0] , 2);
}
//// TOTAL FATURADO Mauricio
$sql="SELECT SUM(valor) AS total FROM pagamentos where data_ano = '$data_y' and data_mes = '$data_m' and $data_dian and socio = 'Mauricio' ";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
echo '<br>Total Faturado Mauricio R$:' . number_format( $vreg[0] , 2);
}
$sql="SELECT * FROM pagamentos where data_ano = '$data_y' and data_mes = '$data_m' and $data_dian and socio = 'Mauricio' ";
$res=mysqli_query($con,$sql);
$lin_mauricio=mysqli_num_rows($res);
//// TOTAL FATURADO Jurlan
$sql="SELECT SUM(valor) AS total FROM pagamentos where data_ano = '$data_y' and data_mes = '$data_m' and $data_dian and socio = 'Jurlan' ";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
echo '<br>Total Faturado Jurlan R$:' . number_format( $vreg[0] , 2);
}
$sql="SELECT * FROM pagamentos where data_ano = '$data_y' and data_mes = '$data_m' and $data_dian and socio = 'Jurlan' ";
$res=mysqli_query($con,$sql);
$lin_jurlan=mysqli_num_rows($res);
//// TOTAL FATURADO Bimdo
$sql="SELECT SUM(valor) AS total FROM pagamentos where data_ano = '$data_y' and data_mes = '$data_m' and $data_dian and socio = 'Bimbo'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
echo '<br>Total Faturado Bimbo R$:' . number_format( $vreg[0] , 2);
}
$sql="SELECT * FROM pagamentos where data_ano = '$data_y' and data_mes = '$data_m' and $data_dian and socio = 'Bimbo'";
$res=mysqli_query($con,$sql);
$lin_bimbo=mysqli_num_rows($res);
//////////////////////////////////////////////////
if($data_dia == 'Todos'){$data_dia = "and id_servidor ='133'";}else{$data_dia = "and data_dia = '$data_dia' and id_servidor ='133'";}
$sql="SELECT * FROM pagamentos where data_ano = '$data_y' and data_mes = '$data_m'";
$res=mysqli_query($con,$sql);
$lin=mysqli_num_rows($res);
	 echo '      
	 
	 </td></tr>
</table>

<br>
<br>
<br>
<br>
<br>
<br> <strong>Encontrados: </strong>' . $lin . 
' ||---|| Clientes de Mauricio = ' . $lin_mauricio . ' ||---|| Clientes de Jurlan = ' . $lin_jurlan . ' ||---|| Clientes de Bimbo = ' . $lin_bimbo .'
	 <div class="card-body">
                  <div class="table-responsive">
				   <table class="table table-hover">
                      <thead class="">
<tr>
<th scope="col"> <center>NOME DO USUARIO </center></th>
<th scope="col"> <center>VALOR</center></th>
<th scope="col"> <center>VENCIMENTO </center></th>
<th scope="col"> <center>DATA DE PAGAMENTO</center></th>
<th scope="col"> <center>SOCIEDADE</center></th>

</tr>
</thead>';

$sql="SELECT * FROM pagamentos where data_ano = '$data_y' and data_mes = '$data_m'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
echo '<tr><td>' . $cliente=$vreg[3] . '</td>';
echo '<td>' . $valor=$vreg[7] . '</td>';
echo '<td>' . $venvimento=$vreg[8] . '</td>';
echo '<td>' . $data_pagamento=$vreg[9] . '</td>';
echo '<td>' . $sociedade=$vreg[10] . '</td></tr>';
}	 
	 
echo '<table>';	 
 }
?>
</div>
</div>
<!--- ATUALIZAÇÕES -->
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
  <?php
  }else{
	
	echo "<center>VOCÊ NÃO TEM PERMIÇÃO PARA VISUALIZAR ESTA PAGINA, AREA EXCLUSIVA DO ADMINISTRADOR DO SISTEMA.</center>";
}
 ?>  
</body>
</html>