<!doctype html>
<html lang="pt">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Impacto_net</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<!--     Fonts and icons     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

	<!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="assets/css/demo.css" rel="stylesheet" />
</head>

<body>
<div class="image-container set-full-height" style="background-image: url('assets/img/wizard-city.jpg')">
    <!--   Creative Tim Branding   -->
    <a href="http://mstelecom.org/provedores/Impacto_net">
         <div class="logo-container">
            <div class="logo">
                <img src="assets/img/new_logo.png">
            </div>
            <div class="brand">
                Impacto_net
            </div>
        </div>
    </a>

	<!--  Made With Get Shit Done Kit  -->
		<a href="http://mstelecom.org/provedores/Impacto_net" class="made-with-mk">
			<div class="brand">MS</div>
			<div class="made-with">Impacto_net <strong>!</strong></div>
		</a>
<br>
<br>

    <!--   Big container   -->
    <div class="container">
        <div class="row">
        <div class="col-sm-8 col-sm-offset-2">

            <!--      Wizard container        -->
            <div class="wizard-container">

                <div class="card wizard-card" data-color="orange" id="wizardProfile">
                    <form action="" method="">
                <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                    	
<!--        COMEÇANDO O PROJETO          -->
<?php
require_once '../sistema/login/conexao.php';
$plano=$_GET["plano"];
if(!isset($_GET["confirmacao"]))
$_GET["confirmacao"]= null;
$confirmar=$_GET["confirmacao"];
if($confirmar == 'on'){
?>
<div class="wizard-header">
                        	<h3>
                        	   <b>CONTA</b> CRIADA COM  SUCESSO! <br>
                        	   <small>Entraremos em contato.</small>
                        	</h3>
                    	</div>
						<div class="wizard-navigation">
							<ul>
	                            <li><a href="#about" data-toggle="tab">Obrigado pela preferencia</a></li>
	                            
	                            
	                        </ul>

						</div>

                        <div class="tab-content">
                            <div class="tab-pane" id="about">
                              <div class="row">
                                  <h4 class="info-text">
								  <?php
 echo $nome=$_GET["nome"];
 $cpf=$_GET["cpf"];
 $telefone=$_GET["telefone"];
 $email=$_GET["email"];
 $rua=$_GET["rua"];
 $numero=$_GET["numero"];
 $complemento=$_GET["complemento"];
 $bairro=$_GET["bairro"];
 $cep=$_GET["cep"];
 $data=$_GET["data"];
$id_cliente = '00';
$res=mysqli_query($con,"INSERT INTO `cadastro` (`id`, `id_cliente`, `nome`, `cpf`, `telefone`, `email`, `plano`, `rua`, `numero`, `complemento`, `bairro`, `cep`, `data`, `id_servidor`) VALUES
 (NULL, '1', '$nome', '$cpf', '$telefone', '$email', '$plano', '$rua', '$numero', '$complemento', '$bairro', '$cep', '$data' , '133')");


$sql="SELECT * FROM cadastro where nome = '$nome'";
$res= mysqli_query($con,$sql);
$lin=mysqli_num_rows($res);
while($vreg=mysqli_fetch_row($res)){
$id=$vreg[1];}
if($lin == 1 ){
echo '
								                PARABÉNS SUA CONTA FOI CRIADA COM SUCESSO! 
												<BR>
												AGUARDE O CONTATO DE UM DOS NOSSOS COLABORADORES...
												<BR>
												<BR>
												<BR>
												<BR>
												SE AINDA ESTIVER COM ALGUMA DUVIDA, VOCÊ PODE DA 
												<BR>
                                                UMA PESQUISADA NO SITE.		
                                                <BR>
                                                FIQUE SEMPRE ATENTO AS PROMOÇÕES!												
                                                <BR>												
                                                <BR>												
                                                <BR>												
												<a href="http://mstelecom.org/provedores/Impacto_net">
												Vá para nosso site para ficar por dentro das novidades
												</a>
';}?>
								  
								  </h4>
                                  </div>	
                                  </div>	
                                  </div>	
                                
                              	
                            	
	
<?php	
}else{
////////////////////////////////////////////////////
if(!isset($_GET["nome"]))
$_GET["nome"]= null;
$confirmar=$_GET["nome"];
if($confirmar != null){
////////////////////////////////////////////////////
$confirmar=$_GET["nome"];
$nome=$_GET["nome"];
$cpf=$_GET["cpf"];
$telefone=$_GET["telefone"];
$email=$_GET["email"];
$plano=$_GET["plano"];
$rua=$_GET["rua"];
$numero=$_GET["numero"];
$complemento=$_GET["complemento"];
$bairro=$_GET["bairro"];
$cep=$_GET["cep"];
$data=$_GET["data"];

#################################
#################################
#################################
#################################
?>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script> $(function(){
       $('input.checkgroup').click(function(){
          if($(this).is(":checked")){
             $('input.checkgroup').attr('disabled',true);
             $(this).removeAttr('disabled');
          }else{
             $('input.checkgroup').removeAttr('disabled');
          }
       })
    })</script>
<div class="wizard-header">
                        	<h3>
                        	   <b>CONFIRMAR</b> INFORMAÇÕES <br>
                        	   <small>Estas informações permitirão que saibamos mais sobre você.</small>
                        	</h3>
                    	</div>
						<div class="wizard-navigation">
							<ul>
	                            <li><a href="#about" data-toggle="tab">CONFIRME SEUS DADOS</a></li>
	                            
	                            
	                        </ul>

						</div>

                        <div class="tab-content">
                            <div class="tab-pane" id="about">
                              <div class="row">
                                  <h4 class="info-text">Dados pessoas:</h4>
                                  <div class="col-sm-4 col-sm-offset-1">
                                     <div class="picture-container">
                                          <div class="choice" >
                                                
                                                <div class="icon">
												
                                                    <i><?php echo $plano; ?></i>
													<input name="plano" type="text" class="form-control" value="<?php echo $plano; ?>">
                                                </div>                                                
                                            </div>
                                         
										 
                                      </div>
                                  </div>
<!------------------------------------------------------------------------------------------------------------------------------------------------>								  
<!------------------------------------------------------------------------------------------------------------------------------------------------>								  
<!------------------------------------------------------------------------------------------------------------------------------------------------>								  
<!------------------------------------------------------------------------------------------------------------------------------------------------>								  
<!------------------------------------------------------------------------------------------------------------------------------------------------>								  
<!------------------------------------------------------------------------------------------------------------------------------------------------>	                                 

								  <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>Nome completo <small>(required)</small></label>
                                        <input name="nome" type="text" class="form-control" value="<?php echo $nome; ?>"placeholder="João...">
                                      </div>
                                      <div class="form-group">
                                        <label>CPF sem . ou -<small>(required)</small></label>
                                        <input name="cpf" value="<?php echo $cpf; ?>" type="number_format" class="form-control" onkeypress="$(this).mask('00000000000');" placeholder="00000000000...">
                                      </div>
                                  </div>
                                  <div class="col-sm-10 col-sm-offset-1">
                                      <div class="form-group">
                                          <label>Telefone <small>(required)</small></label>
                                          <input name="telefone" value="<?php echo $telefone; ?>" type="phone" class="form-control" placeholder="00 00000-0000">
                                      </div>
                                  </div> 
								  <div class="col-sm-10 col-sm-offset-1">
                                      <div class="form-group">
                                          <label>E-mail <small>(required)</small></label>
                                          <input name="email" value="<?php echo $email; ?>" type="email" class="form-control" placeholder="exemplo@mstelecom.org/provedores/Impacto_net">
                                      </div>
                                  </div>
<!------------------------------------------------------------------------------------------------------------------------------------------------>								  
<!------------------------------------------------------------------------------------------------------------------------------------------------>								  
<!------------------------------------------------------------------------------------------------------------------------------------------------>								  
<!------------------------------------------------------------------------------------------------------------------------------------------------>								  
<!------------------------------------------------------------------------------------------------------------------------------------------------>								  
<!------------------------------------------------------------------------------------------------------------------------------------------------>								  

								  <div class="col-sm-12">
                                        <h4 class="info-text">Endereço:</h4>
                                    </div>
                                    <div class="col-sm-7 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>Nome da rua</label>
                                            <input name="rua" value="<?php echo $rua; ?>" type="text" class="form-control" placeholder="Amparo do tororó">
                                          </div>
                                    </div>
                                    <div class="col-sm-3">
                                         <div class="form-group">
                                            <label>Numero</label>
                                            <input name="numero" value="<?php echo $numero; ?>" type="text" class="form-control" placeholder="242">
                                          </div>
                                    </div>
                                    <div class="col-sm-5 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>Complemento</label>
                                            <input name="complemento" value="<?php echo $complemento; ?>" type="text" class="form-control" placeholder="centro">
                                          </div>
                                    </div>
                                    <div class="col-sm-5">
                                         <div class="form-group">
                                            <label>Bairro</label><br>
                                             <select name="bairro" value="<?php echo $bairro; ?>" class="form-control">
                                             <option><?php echo $bairro; ?></option>
                                            </select>
                                          </div>
                                    </div>
									
									
									<div class="col-sm-5 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>Cep</label>
                                            <input name="cep" value="<?php echo $cep; ?>" type="text" class="form-control" placeholder="40050100">
                                          </div>
                                    </div>
									
									<div class="col-sm-5">
                                         <div name="vencimento" class="form-group">
                                            <label>Data de vencimento da fatura</label><br>
                                             <select name="data" class="form-control">
                                                <option value="<?php echo $data; ?>"> <?php echo $data; ?></option>
                                             </select>
                                          </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script type="text/javascript">
function validaCampo()
{
if(document.login.confirmacao.value=="")
{
alert("Insira o nome completo.");
return false;
}

</script>
										  <label>Confirmação <small>(required)</small></label>
										  <h6><input type="checkbox" name="confirmacao" class="checkgroup" id="ok"/> <font color="red">CONFIRA TODOS AS SUAS INFORMAÇÕES, E SE ESTIVER TUDO CERTO MARQUE A CAIXA AO LADO. </font></h6>
                                    </div>
								  
								  
								  
								  
                              </div>
                            </div>
                            </div>
                            
                            
                            



<?php
#################################
#################################
#################################
#################################
 }else{ ?>

<script>
				 $(function(){
       $('input.checkgroup').click(function(){
          if($(this).is(":checked")){
             $('input.checkgroup').attr('disabled',true);
             $(this).removeAttr('disabled');
          }else{
             $('input.checkgroup').removeAttr('disabled');
          }
       })
    })				

$(document).ready(function(){
	$("input.data").mask("99/99/9999");
        $("input.cpf").mask("999.999.999-99");
        $("input.cep").mask("99.999-999");
});	
		</script>
		
		
<div class="wizard-header">
                        	<h3>
                        	   <b>CRIAR</b> A SUA CONTA <br>
                        	   <small>Estas informações permitirão que saibamos mais sobre você.</small>
                        	</h3>
                    	</div>
						<div class="wizard-navigation">
							<ul>
	                            <li><a href="#about" data-toggle="tab">Dados pessoassss</a></li>
	                            <li><a href="#account" data-toggle="tab">Planos</a></li>
	                            <li><a href="#address" data-toggle="tab">Endereço</a></li>
	                            
	                        </ul>

						</div>

                        <div class="tab-content">
                            <div class="tab-pane" id="about">
                              <div class="row">
                                  <h4 class="info-text"> Vamos começar com as informações básicas (com validação)</h4>
                                  <div class="col-sm-4 col-sm-offset-1">
                                     <div class="picture-container">
                                          <div class="picture">
                                              <img src="assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
                                              <input type="file" id="wizard-picture">
                                          </div>
                                          <h6>Foto</h6>
                                      </div>
                                  </div>
                                  
								  
								  
								  
								  
								  <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>Nome completo <small>(required)</small></label>
                                        <input name="nome" type="text" class="form-control" placeholder="João...">
                                      </div>
                                      <div class="form-group">
                                        <label>CPF <small>(required)</small></label>
                                        <input name="cpf" type="number_format" maxlength="14" id="cpf" class="form-control cpf" onkeypress="$(this).mask('000.000.000-00')" placeholder="000.000.000-00...">
                                      </div>
                                  </div>
                                  <div class="col-sm-10 col-sm-offset-1">
                                      <div class="form-group">
                                          <label>Telefone <small>(required)</small></label>
                                          <input name="telefone" type="text" maxlength="14" class="form-control" placeholder="00 00000-0000">
                                      </div>
                                  </div> 
								  <div class="col-sm-10 col-sm-offset-1">
                                      <div class="form-group">
                                          <label>E-mail <small>(required)</small></label>
                                          <input name="email" type="text" class="form-control" placeholder="exemplo@mstelecom.org/provedores/Impacto_net">
                                      </div>
                                  </div>
								  
								  
								  
						<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		  						  
                              </div>
                            </div>
                            <div class="tab-pane" id="account">
                                <h4 class="info-text"> Qual plano você deseja? </h4>
                                <div class="row">

                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="col-sm-4">
                                            <div class="choice" >
                                                
                                                <div class="icon">
                                                    <i>8 MB</i>
                                                </div>
                                                
                                            </div>
											<center><h6>R$ 40,00 <input type="checkbox" class="form-control checkgroup"  name="plano" value="8M"></h6></center>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="choice" ">
                                                
                                                <div class="icon">
                                                    <i>10 MB</i>
                                                </div>
                                               
                                            </div>
											 <center><h6>R$ 45,00 <input type="checkbox" class="form-control checkgroup"  name="plano" value="10M"></h6></center>

                                        </div>
                                        <div class="col-sm-4">
                                            <div class="choice" >
                                                
                                                <div class="icon">
                                                     <i>15 MB</i>
                                                </div>
                                               
                                            </div>
											 <center><h6>R$ 55,00 <input type="checkbox" class="form-control checkgroup"  name="plano" value="15M"></h6></center>

                                        </div>
										<div class="col-sm-4">
                                            <div class="choice" >
                                                
                                                <div class="icon">
                                                     <i>20 MB</i>
                                                </div>
                                               
                                            </div>
											 <center><h6>R$ 65,00 <input type="checkbox" class="form-control checkgroup"  name="plano" value="20M"></h6></center>

                                        </div>
										<div class="col-sm-4">
                                            <div class="choice" >
                                                
                                                <div class="icon">
                                                     <i>30 MB</i>
                                                </div>
                                                
                                            </div>
											<center><h6>R$ 85,00 <input type="checkbox" class="form-control checkgroup"  name="plano" value="30M"></h6></center>

                                        </div>
										<div class="col-sm-4">
                                            <div class="choice" >
                                                
                                                <div class="icon">
                                                     <i>50 MB</i>
                                                </div>
                                               
                                            </div>
                                            <center><h6>R$ 110,00 <input type="checkbox" class="form-control checkgroup"  name="plano" value="50M"></h6></center>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane" id="address">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="info-text"> Onde você mora?</h4>
                                    </div>
                                    <div class="col-sm-7 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>Nome da rua</label>
                                            <input name="rua" type="text" class="form-control" placeholder="Amparo do tororó">
                                          </div>
                                    </div>
                                    <div class="col-sm-3">
                                         <div class="form-group">
                                            <label>Numero</label>
                                            <input name="numero" type="text" class="form-control" placeholder="242">
                                          </div>
                                    </div>
                                    <div class="col-sm-5 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>Complemento</label>
                                            <input name="complemento" type="text" class="form-control" placeholder="centro">
                                          </div>
                                    </div>
                                    <div class="col-sm-5">
                                         <div class="form-group">
                                            <label>Bairro</label><br>
                                             <select name="bairro" class="form-control">
                                                <option value="Tororó"> Bairro </option>
                                                <option value="Tororó"> Tororó </option>
                                                <option value="Joana Angelica"> Joana Angelica </option>
                                                <option value="Apache"> Apache </option>
                                                <option value="Mouraria"> Mouraria </option>
                                                <option value="Jardin Bahiano"> Jardin Bahiano </option>
                                                <option value="Barris"> Barris </option>
                                                <option value="Lapa"> Lapa </option>
                                                <option value="Gravatá"> Gravatá </option>
                                                <option value="Centro histótico"> Centro histótico </option>
                                                <option value="...">...</option>
                                            </select>
                                          </div>
                                    </div>
									
									
									<div class="col-sm-5 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>Cep</label>
                                            <input name="cep" type="text" class="form-control" placeholder="40050100">
                                          </div>
                                    </div>
									
									<div class="col-sm-5">
                                         <div name="vencimento" class="form-group">
                                            <label>Data de vencimento da fatura</label><br>
                                             <select name="data" class="form-control">
                                                <option value="05"> Data </option>
                                                <option value="05"> 05 </option>
                                                <option value="10"> 10 </option>
                                                <option value="15"> 15 </option>
                                                <option value="20"> 20 </option>
                                                <option value="25"> 25 </option>
                                                </select>
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						
<?php 
 }
}
?>
						
                        <div class="wizard-footer height-wizard">
                            <div class="pull-right">
                                <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='next' value='Próximo' />
								<!-- BOTÃO FINALIZAR -->
								<?php if($_GET["confirmacao"]=="on"){}else{ ?>
                                <input type="submit" action="confirmar.php" class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='finish' value='Finalizar' />
                                <?php }   ?>
                            </div>

                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Anterior' />
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </form>
                </div>
            </div> <!-- wizard container -->
        </div>
        </div><!-- end row -->
    </div> <!--  big container -->

    <div class="footer">
        <div class="container">
            Se DEUS é por nós <i class="fa fa-heart heart"></i> quém <a href="http://mstelecom.org/provedores/Impacto_net">será</a> contra nós? <a href="http://mstelecom.org/provedores/Impacto_net"></a>
        </div>
    </div>

</div>

</body>

	<!--   Core JS Files   -->
	<script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="assets/js/gsdk-bootstrap-wizard.js"></script>

	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="assets/js/jquery.validate.min.js"></script>

</html>
