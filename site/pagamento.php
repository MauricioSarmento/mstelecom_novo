<!doctype html>
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

<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
      <div class="logo">
         <a href="sistema/index.php">
        <img src='ms.png' width='250' height='150'>
		</a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="index.php">
              <i class="material-icons">dashboard</i>
              <p>INICIO</p>
            </a>
          </li>
		  <li class="nav-item active  ">
            <a class="nav-link" href="cobertura.php">
              <i class="material-icons">Cobertura</i>
              <p>COBERTURA</p>
			</a>
		  </li>
		  <li class="nav-item active  ">
            <a class="nav-link" href="pagamento.php">
              <i class="material-icons">Pagamento</i>
              <p>PAGAMENTO</p>
            </a>
          </li>
		  <li class="nav-item active  ">
            <a class="nav-link" href="download.php">
              <i class="material-icons">Download</i>
              <p>DOWNLOADS</p>
            </a>
          </li>
		  <li class="nav-item active  ">
            <a class="nav-link" href="servicos.php">
              <i class="material-icons">Servi</i>
              <p>SERVIÇOS</p>
            </a>
          </li>
		  <li class="nav-item active  ">
            <a class="nav-link" href="sobre.php">
              <i class="material-icons">Sobre</i>
              <p>SOBRE NÓS</p>
            </a>
          </li>
            </a>
          </li>
          <!-- your sidebar here -->
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">FORMAS DE PAGAMENTOS</a>
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
                <a class="nav-link" href="javascript:;">
                  
                </a>
              </li>
              <!-- your navbar here -->
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <!-- End Navbar -->
	  
	  <div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header card-header-primary">
              <h3 class="card-title">Formas de pagamento</h3>
              <p class="card-category">Veja como pode ser feito os pagamentos de nossos serviços...
              </p>
            </div>
			   <div class="card-body">
                 <div class="row">
                   

	                     
						<!-- end: LOGIN BOX -->
						<!-- end: LOGIN BOX -->
						<!--  BOX -->
						<!--  BOX -->
						<!--  BOX -->
						<center>
			<form method="post" name="cpf" id="cpf" >
<font face="Verdana" size="2">
Informe o CPF e veja se como esta sua condição financeira com a empresa 'Apenas para cliente!': 
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
              
                        
                           
                   <div class="timeline">
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
<strong> Chave do Pix CPF = 03994386535.<br> Mauricio Ferreira Sarmento </strong>
<br/>
<br/>
</div> 
 

		<?php
				  
		}else{
			require_once'../login/conexao.php';
		echo ' <div class="box-login">	
               <div class="box-login">
               ';
			    if($cpf == null){$cpf = 2;};
				if(isset($_POST["cpf"])){ 
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
		echo "		<center>
				<table border='1'>
				<tr><td width='150'> NOME    </td>
				    <td width='150'> CPF </td>
				    <td width='150'> TELEFONE   </td>
				    <td width='150'> DATA DO CONTRATO   </td>
				    <td width='150'> ENDEREÇO    </td>
				    <td width='50'> PLANO</td>
				    <td width='50'> VALOR   </td>
				    <td width='20'> VEN</td>
				    <td width='50'> STATUS     </td></tr>
					<tr>
					<td> $nome  </td>
				    <td> $cpf   </td>
				    <td> $contato   </td>
				    <td> $data_contato    </td>
				    <td> $endereco Nº $numero_casa   </td>
				    <td> <center> $plano  </center>  </td>
				    <td> <center> $valor_plano </center>  </td>
				    <td> <center> $vencimento </center> </td>
				    <td> <center> $status </center></td>
					</tr>
					</table>
					<center>
				</div> 
					<br>
<strong> Chave do Pix CPF = 03994386535.<br> Mauricio Ferreira Sarmento </strong>
<br/>
<br/>
</div>
</div>
</div>
</div>
</div>
</div>
				
";}
				 
};
?>	
		</center>				 
						 
						 
						 
						 
	               </div>
	             </div>
	           </div>
	  </div>
	  </div>
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
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, Desenvolvedor <i class="material-icons">favorite</i> 
            <a href="index.php" target="_blank">Mauricio Sarmento</a> para o mundo.
          </div>
          <!-- your footer here -->
        </div>
      </footer>
    </div>
  </div>
</body>

</html>