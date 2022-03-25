<?php
require_once '../login/protect.php';
require_once 'conexao/conect.php';
require 'api/routeros_api.class.php';
require_once'pag2.php';
$_SESSION['numIpp'];
$t = $_SESSION['numIpp'];
if($t == "Sem_Servidor"){}else{
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
$lin=mysqli_num_rows($res);
while($vreg=mysqli_fetch_row($res)){
  $max = $vreg[1];
  $max = $vreg[2];
  $max = $vreg[3];
  $hora = $vreg[4];

}
if(!isset($max)){
$max= 0;}
$data = date("d/m/Y");
if($lin == 1 ){}else{$res=mysqli_query($con,"insert into conf values
(default,'$userid', 'NULL','$cliente_conectado', '$data', 'NULL', 'NULL', 'NULL');");}
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

			

$painel = '
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
                    <a href="bloqueados.php"><h5>BLOQUEADOS</h5></a>
                  </div>
                </div>
              </div>
			  </div>
			<div class="col-lg-2 col-md-4 col-sm-4">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">Liberados</i>
                  
				  </div>

                  <p class="card-category"></p>
                  <h3 class="card-title">'. $Liberados .'
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="liberados.php"><h5>LIBERADOS</h5></a>
                  </div>
                </div>
              </div>
            </div>
			
          </div>
		  
		</div>';
		
		##### MENU LATERAL -----------------------------------------------------------------------------------------------------------------------
		$menu = '<div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="index.php">
              <i class="material-icons">Painel</i>
              <p>Painel</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="clientes.php">
              <i class="material-icons">Clientes</i>
              <p>Clientes</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="http://mstelecom.org/cadastro_cliente/index.php" target="_blank">
              <i class="material-icons">Novo cadastro</i>
              <p>Novo cadastro</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="ativos.php">
              <i class="material-icons">Ativos</i>
              <p>Ativos</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="historico.php"> 
              <i class="material-icons">Historico</i>
              <p>Histórico</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="servidor.php">
              <i class="material-icons">Servidor</i>
              <p>Servidor</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="vencimento.php">
              <i class="material-icons">Vencimentos</i>
              <p>Vencimentos</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="status.php">
              <i class="material-icons">Status</i>
              <p>Status</p>
            </a>
          </li>
          <li class="nav-item active-pro ">
            <a class="nav-link" href="trocar_servidor.php">
              <i class="material-icons">Troca</i>
              <p>Trocar de servidor</p>
            </a>
          </li>
        </ul>
      </div>'; 
		
		
		###### PESQUISA, NOTIFICAÇÃO E OUTROS -------------------------------------------------------------------------------
		
		$pesquisa = ' <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
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
                <button type="submit" value="Localizar" class="btn btn-white btn-round btn-just-icon">
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
                  <span class="notification">2</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  
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
      </nav>';
		
		
		
		
		
		
		
		
		
		
		
		
		
}
	?>