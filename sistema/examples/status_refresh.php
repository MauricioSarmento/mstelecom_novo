<?php
require_once '../login/protect.php';
require_once 'conexao/conect.php';
require 'api/routeros_api.class.php';
require_once'pag2.php';
### CLIENTES ONLINE ###
$API = new RouterosAPI();
$API->debug = false;
/* Fazendo conexão com microtik */
if ($API->connect("$servidor_mikrotik","$login_servidor_mikrotik","$senha_servidor_mikrotik")) {
	$ARRAY = $API->comm("/ppp/secret/print", array(
"count-only"=> "",
));$cliente_cadastrado = $ARRAY;

$ARRAY = $API->comm("/ppp/active/print", array(
"count-only"=> "",
));$cliente_conectado = $ARRAY;


}
$ARRAY = $API->comm("/ppp/secret/print");
$count = 1;
$count2 = 1;
$pl8 = 1;
$pl10 = 1;
$pl15 = 1;
$pl20 = 1;
$pl30 = 1;
$pl50 = 1;
foreach ($ARRAY as $regtable) {
	if($regtable['profile'] == 'Bloqueio'){$Bloqueados = $count ++;}	
	if($regtable['profile'] == 'Bloqueio2'){$Bloqueados = $count ++;}
	if($regtable['profile'] == 'Liberado'){$Liberados = $count2 ++;}
	if($regtable['profile'] == '8M'){$p8 = $pl8 ++;}
	if($regtable['profile'] == '10M'){$p10 = $pl10 ++;}
	if($regtable['profile'] == '15M'){$p15 = $pl15 ++;}
	if($regtable['profile'] == '20M'){$p20 = $pl20 ++;}
	if($regtable['profile'] == '30M'){$p30 = $pl30 ++;}
	if($regtable['profile'] == '50M'){$p50 = $pl50 ++;}
}

#echo $userid = $_SESSION['$id_servidor'];
#echo $total_cliente_conectado = '<center><strong>CLIENTES CADASTRADOS:<font color= gree>' . $cliente_cadastrado . '</font></strong> ------<strong>  ONLINE:<font color= gree>' . $cliente_conectado . '</font></strong>';


# colocando a quantidade de clientes em max login
 $userid = $_SESSION['$id_servidor'];
$sql="SELECT * FROM conf where id_usuario = '$userid'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
  $max = $vreg[1];
  $max = $vreg[2];
  $max = $vreg[3];
  $hora = $vreg[4];

}
$data = date("d/m/Y");
if($max > 0){if($cliente_conectado > $max){
		$sql="UPDATE conf SET max_login = '$cliente_conectado' , hora = '$data' ";
$res=mysqli_query($con,$sql);
	}} else {
	
$res=mysqli_query($con,"insert into conf values
(default,'$userid', 'NULL','$cliente_conectado', '$data');");
}
# esta em auto_refresh_online ----->
# echo "MAXIMO DE CLIENTES CONECTADOS = " . $max . " --- " . $hora;

				  $user1 = $_SESSION['$vreg[2]'];
$sql="SELECT * FROM clientes where usuario = '$user1'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$user1 = $vreg[1];
}
$sql="SELECT * FROM clientes where usuario = '$user1' and nome = '$user1'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$id_servserv = $vreg[7];
}
$sql="SELECT * FROM chamado where id_serv = $id_servserv and status = '1' ";
$res=mysqli_query($con,$sql);
$lin=mysqli_num_rows($res);

			

echo $painel = '
  <!--- //auto refresh -->
              <div class="container-fluid">
          <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-4">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">Cadastrados</i>
                  
				  </div>

                  <p class="card-category"></p>
                  <h3 class="card-title">' .$cliente_cadastrado .'                    
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="clientes.php"><h5>CADASTRADOS</h5></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">Ativos</i>
                  </div>
                  <p class="card-category"></p>
                  <h3 class="card-title">' . $cliente_conectado . '
				 </h3>
                </div>
               <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="ativos.php"><h5>ATIVOS</h5></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">Recorde</i>
                  </div>
                  <p class="card-category"></p>
                  <h3 class="card-title">'. $max .'</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                   <a href="#"> <h5>RECORD:' . $hora . '<h5></a>
                  </div>
                </div>
				
              </div>
			  
	        </div>
			
			<div class="col-lg-2 col-md-4 col-sm-4">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">Chamados</i>
                  </div>
                  <p class="card-category"></p>
                  <h3 class="card-title">' . $lin .' </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
				  <i class="material-icons text-danger">warning</i>
                    <a href="chamados.php"><h5>CHAMADOS</h5></a>
                  </div>
                </div>
				
              </div>
			  
	        </div>
			
			
			<div class="col-lg-2 col-md-4 col-sm-4">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">Bloqueados</i>
                  </div>
                  <p class="card-category"></p>
                  <h3 class="card-title">'. $Bloqueados . '</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
				  <i class="material-icons text-danger">warning</i>
                    <a href="#"><h5>BLOQUEADOS</h5></a>
                  </div>
                </div>
              </div>
			  </div>
			<div class="col-lg-2 col-md-4 col-sm-4">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">L</i>
                  
				  </div>

                  <p class="card-category"></p>
                  <h3 class="card-title">'. $Liberados .'
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="#"><h5>LIBERADOS</h5></a>
                  </div>
                </div>
              </div>
            </div>
			<div class="container-fluid">
          <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-4">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">P</i>
                  	  </div>
                  <p class="card-category"></p>
                  <h3 class="card-title">' .$p8 .'                    
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="clientes.php"><h5>8 MEGAS</h5></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">P</i>
                  </div>
                  <p class="card-category"></p>
                  <h3 class="card-title">' . $p10 . '
				 </h3>
                </div>
               <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="ativos.php"><h5>10 MEGAS</h5></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">P</i>
                  </div>
                  <p class="card-category"></p>
                  <h3 class="card-title">' . $p15 . '
				 </h3>
                </div>
               <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="ativos.php"><h5>15 MEGAS</h5></a>
                  </div>
                </div>
              </div>
            </div>
			
			<div class="col-lg-2 col-md-4 col-sm-4">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">P</i>
                  </div>
                  <p class="card-category"></p>
                  <h3 class="card-title">' . $p20 . '
				 </h3>
                </div>
               <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="ativos.php"><h5>20 MEGAS</h5></a>
                  </div>
                </div>
              </div>
            </div>
			
			
			<div class="col-lg-2 col-md-4 col-sm-4">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">P</i>
                  </div>
                  <p class="card-category"></p>
                  <h3 class="card-title">' . $p30 . '
				 </h3>
                </div>
               <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="ativos.php"><h5>30 MEGAS</h5></a>
                  </div>
                </div>
              </div>
            </div>
			
			<div class="col-lg-2 col-md-4 col-sm-4">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">P</i>
                  </div>
                  <p class="card-category"></p>
                  <h3 class="card-title">' . $p50 . '
				 </h3>
                </div>
               <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="ativos.php"><h5>50 MEGAS</h5></a>
                  </div>
                </div>
              </div>
            </div>
			
          </div>
		  
		</div>';
	
	$sql="SELECT * FROM sociedade where sociedade = 'Jurlan' ORDER BY usuario";
$res=mysqli_query($con,$sql);
$jurlan=mysqli_num_rows($res);

$sql="SELECT * FROM sociedade where sociedade = 'Bimbo' ORDER BY usuario";
$res=mysqli_query($con,$sql);
$Bimbo=mysqli_num_rows($res);
	
		?>
					 <div class="col-md-12">
              <div class="card card-plain">
                <div class="card-header card-header-primary">
                  <h4 class="card-title mt-0"> Clientes</h4>
                  <p class="card-category"> Todos os clientes em sociedade</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
				  
				  <style type="text/css">
table
{
float:left;
}
</style>
                    <table width="400" border=4>
                      <thead class="">
			  <tr>
			  <td>CLIENTES DE JULAN =  <?php echo $jurlan;?> <a href='Gerar_pdf_jurlan.php'>Gerar Exel</a></td>	
			  </tr>
			  <tr>
			 
<?php
	########################SÓCIEDADE #############################
$sql="SELECT * FROM sociedade ORDER BY usuario";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
		echo '<tr>';
	$sociedade=$vreg[3];
	$id_cliente_sociedade=$vreg[1];
	if($sociedade == 'Jurlan'){echo '<td>' . $cliente_sociedade=$vreg[2] . '</td>';}
		echo '</tr>';
	}
?>
	           
			   </tr>
</table>



                  <table width="400" border=4 style="margin-left: 5px;">
                      <thead class="">
			  <tr>
			  <td>CLIENTES DE BIMBO =  <?php echo $Bimbo;?> <a href='Gerar_pdf_bimbo.php'>Gerar Exel</a></td>	
			  </tr>
			  <tr>
			 
<?php
	########################SÓCIEDADE #############################
$sql="SELECT * FROM sociedade where sociedade = 'Bimbo' ORDER BY usuario";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
		echo '<tr>';
	$sociedade=$vreg[3];
	$id_cliente_sociedade=$vreg[1];
	if($sociedade == 'Bimbo'){echo '<td>' . $cliente_sociedade=$vreg[2] . '</td>';}
		echo '</tr>';
	}
?>
	           
</tr>
</table>


</div>
</div>
</div>
</div>
</div>
</div>
