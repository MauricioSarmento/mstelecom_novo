<html lang="pt">

<head>
  <title>MSTELECOM</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="assets/css/main.css" rel="stylesheet" type="text/css"> 
  <!-- Material Kit CSS -->
  <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
</head>
     	<center>
<img alt="..."  width="500" height="300" class="img-circle" src="ms.png"/>
        </center>
<body>
  <div class="wrapper ">
  
	  <div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header card-header-primary">
              <h3 class="card-title">Area do cliente</h3>
              <p class="card-category">Digite seu CPF e veja alguns dados do seu cadastro.
              </p>
            </div>
			   <div class="card-body">

                   

	                     
						<!-- end: LOGIN BOX -->
						<!-- end: LOGIN BOX -->
						<!--  BOX -->
						<!--  BOX -->
						<!--  BOX -->
						<center>
			<form method="post" name="cpf" id="cpf" >
<font face="Verdana" size="2">
Digite seu CPF, apenas numeros sem . ou -: 
<input name="cpf" type="text" size='6' value=''/> 
<input type="submit" value="Entrar">
</font>
</form>
</center> 

<?php
if(isset($_POST["cpf"])){ $cpf = $_POST[cpf];};
if(!isset($cpf)){
	if($cpf == null){$cpf = 1;};
?>

<br/>
            
            <div class="box-login">	
				 <h3>CONFIRA ABAIXO AS CONTAS PARA O DEPOSITO REFERENTE AO PAGAMENTO DE SERVIÇOS PRESTADOS OU DA MENSALIDADE DA INTERNET.</h3>
				
                
                 <div class="box-login">
              
                        
                           
                   <div class="timeline" align="center">
					<div class="spine"></div>
						<div class="date_separator">
							<span>CONTAS PARA DEPÓSITO</span>
						</div>
						<ul class="columns">
							<li>
								<div class="timeline_element teal">
									<div class="timeline_title">
										<span class="timeline_label"></span><span class="timeline_date"></span>
									</div>
									<div class="content">
										<p>Caixa Econômica Federal</p>
										<p>
											Marileia Bispo dos Santos Sarmento</br>
											Agência: 4799</br>
											Conta: 00002645-8</br>
											Variação: 013
										</p>
										<b>POR FAVOR AO EFETUAR O DEPÓSITO, ENVIAR O COMPROVANTE PELO WHATZAPP:</b> 
										<i class="clip-phone-2"></i> (071) 98720-9903 / 98757-8923
									</div>
									<div class="readmore">
										<a href="#" class="btn btn-info">
											Obrigado <i class="clip-thumbs-up"></i>
										</a>
									</div>
							</li>
							<li>
								<div class="timeline_element teal">
									<div class="timeline_title">
										<span class="timeline_label"></span><span class="timeline_date"></span>
									</div>
									<div class="content">
										<p>Bradesco</p>
										<p>
											Mauricio Ferreira Sarmento</br>
											Agência: 3266</br>
											c/c: 4406-7
										</p>
										<b>POR FAVOR AO EFETUAR O DEPÓSITO, ENVIAR O COMPROVANTE PELO WHATZAPP:</b> 
										<i class="clip-phone-2"></i> (071) 98720-9903 / 98757-8923
									</div>
									<div class="readmore">
										<a href="#" class="btn btn-info">
											Obrigado <i class="clip-thumbs-up"></i>
										</a>
									</div>
								</div>
							</li>
						</ul>

					</div> 
					<br>
					<center>
<strong> Chave do Pix CPF = 03994386535.<br> Mauricio Ferreira Sarmento </strong>
                    </center>
<br/>
<br/>
</div> 
</div> 
</div> 
 

		<?php
				  
		}else{
			
			require_once'sistema/login/conexao.php';
		echo ' <center> <div class="box-login" align="center">	
               <div class="box-login" align="center"> 
               ';
			   
			    if($cpf == null){$cpf = 2;};
				if(isset($_POST["cpf"])){
					$cpf = $_POST["cpf"];
			   $sql="SELECT * FROM db_clientes where cpf = '$cpf'";
$res= mysqli_query($con,$sql);
$lin=mysqli_num_rows($res);
if($lin == 0 ){
	echo "<font color='red'>CPF invalido!</font>";
}else{
while($vreg=mysqli_fetch_row($res)){
				$nome=$vreg[2];
				$contato=$vreg[5];
				$data_contato=$vreg[6];
				$endereco=$vreg[7];
				$numero_casa=$vreg[8];
				$plano=$vreg[11];
				$vencimento=$vreg[12];
				$status=$vreg[13];
				$valor_plano=$vreg[14];
				}}}
				
				if($lin == 0 ){
	
}else{ 
if($status == 1){$status = "<font color='red'>Atrasado</font>";}else{$status = "<font color='gree'>ok</font>";}
		echo "	
		<br>
		<center>
				<table border='1' align='center'>
				<tr>
				    <td scope='col' width='350' align='center'> NOME COMPLETO   </td>
				    <td scope='col' width='150' align='center'> CPF </td>
				    <td scope='col' width='200' align='center'> TELEFONE   </td>
				    <td scope='col' width='150' align='center'> DATA DO CONTRATO   </td>
				    <td scope='col' width='250' align='center'> ENDEREÇO    </td>
				    <td scope='col' width='50' align='center'> PLANO</td>
				    <td scope='col' width='50' align='center'> VALOR   </td>
				    <td scope='col' width='50' align='center'> VENCIMENTO</td>
				    <td scope='col' width='50' align='center'> STATUS     </td>
				</tr>
				<tr>
					<td align='center'> $nome  </td>
				    <td align='center'> $cpf   </td>
				    <td align='center'> $contato   </td>
				    <td align='center'> $data_contato    </td>
				    <td align='center'> $endereco Nº $numero_casa   </td>
				    <td align='center'> <center> $plano  </center>  </td>
				    <td align='center'> <center> $valor_plano </center>  </td>
				    <td align='center'> <center> $vencimento </center> </td>
				    <td align='center'> <center> $status </center></td>
				</tr>
				</table>
					
				</div> 
				
";}
		
?>

  
            <div class="box-login">	
				 <h3>CONFIRA ABAIXO AS CONTAS PARA O DEPOSITO REFERENTE AO PAGAMENTO DE SERVIÇOS PRESTADOS OU DA MENSALIDADE DA INTERNET.</h3>
				
                
                 <div class="box-login">
              
                        
                           
                   <div class="timeline" align="center">
					<div class="spine"></div>
						<div class="date_separator">
							<span>CONTAS PARA DEPÓSITO</span>
						</div>
						<ul class="columns">
							<li>
								<div class="timeline_element teal">
									<div class="timeline_title">
										<span class="timeline_label"></span><span class="timeline_date"></span>
									</div>
									<div class="content">
										<p>Caixa Econômica Federal</p>
										<p>
											Marileia Bispo dos Santos Sarmento</br>
											Agência: 4799</br>
											Conta: 00002645-8</br>
											Variação: 013
										</p>
										<b>POR FAVOR AO EFETUAR O DEPÓSITO, ENVIAR O COMPROVANTE PELO WHATZAPP:</b> 
										<i class="clip-phone-2"></i> (071) 98720-9903 / 98757-8923
									</div>
									<div class="readmore">
										<a href="#" class="btn btn-info">
											Obrigado <i class="clip-thumbs-up"></i>
										</a>
									</div>
							</li>
							<li>
								<div class="timeline_element teal">
									<div class="timeline_title">
										<span class="timeline_label"></span><span class="timeline_date"></span>
									</div>
									<div class="content">
										<p>Bradesco</p>
										<p>
											Mauricio Ferreira Sarmento</br>
											Agência: 3266</br>
											c/c: 4406-7
										</p>
										<b>POR FAVOR AO EFETUAR O DEPÓSITO, ENVIAR O COMPROVANTE PELO WHATZAPP:</b> 
										<i class="clip-phone-2"></i> (071) 98720-9903 / 98757-8923
									</div>
									<div class="readmore">
										<a href="#" class="btn btn-info">
											Obrigado <i class="clip-thumbs-up"></i>
										</a>
									</div>
								</div>
							</li>
						</ul>

					</div> 
					<br>
					<center>
<strong> Chave do Pix CPF = 03994386535.<br> Mauricio Ferreira Sarmento </strong>
                    </center>
<br/>
<br/>
</div> 
</div> 
</div> 

<?php








		
};
?>	

		</center>				 
			


						 
						 
	               </div>
	             </div>
	           </div>
	  </div>
	  </div>
	  </div>
	  <center>
                <a href="index.html" class="navbar-brand">
                    Voltar a pagina principal!
                </a>			 
</center>
	  </div>
      <!-- End Navbar -->
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="index.php">
                  MSTELECOM
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right" >
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, Desenvolvedor <i class="material-icons">favorite</i> 
            <a href="index.php" target="_blank">Mauricio Sarmento</a> para o mundo.
          </div>
          <!-- your footer here -->
        </div>
      </footer>
</html>

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