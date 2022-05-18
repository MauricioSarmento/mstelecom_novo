<?php
require_once '../../login/conexao.php';
if(!isset($_GET["id"]))
$_GET["id"]= null;
$n1=$_GET["id"];
$sql="SELECT * FROM db_clientes where id_cliente = 133 and usuario = '$n1'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
    $id_admin=$vreg[0];
	$id=$vreg[1];
	$nome=$vreg[2];
	$usuario=$vreg[3];
	$email=$vreg[4];
	$tel=$vreg[5];
	$instalaçao=$vreg[6];
	$endereço=$vreg[7];
	$numero=$vreg[8];
	$complemento=$vreg[9];
	$apelido=$vreg[10];
	$plano=$vreg[11];
$ven=$vreg[12];
$valor=$vreg[14];
$cpf=$vreg[15];
}


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
$mensalidade = $mes[$dat];
if($mensalidade == 'janeiro'){$mensalidade = 'Janeiro';}
if($mensalidade == 'fevereiro'){$mensalidade = 'Fevereiro';}
if($mensalidade == 'março'){$mensalidade = 'Março';};
if($mensalidade == 'abril'){$mensalidade = 'Abril';};
if($mensalidade == 'mail'){$mensalidade = 'Maio';};
if($mensalidade == 'junho'){$mensalidade = 'Junho';};
if($mensalidade == 'julho'){$mensalidade = 'Julho';};
if($mensalidade == 'agosto'){$mensalidade = 'Agosto';};
if($mensalidade == 'setembro'){$mensalidade = 'Setembro';};
if($mensalidade == 'outubro'){$mensalidade = 'Outubro';};
if($mensalidade == 'novembro'){$mensalidade = 'Novembro';};
if($mensalidade == 'dezembro'){$mensalidade = 'Dezembro';};

?>
<!DOCTYPE HTML>
<!-- SPACES 2 -->
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="Resource-type" content="document">
    <meta name="Robots" content="all">
    <meta name="Rating" content="general">
    <meta name="author" content="Gabriel Masson">
    <title>Gerador de Carnê</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="img/favicon.png" rel="shortcut icon" type="image/x-icon">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <style type="text/css">
	  <link rel="stylesheet" href="../../assets/navigation-round.css">
      header, footer { padding: 2% 0; text-align: center; }
    </style>
  </head>
  <body>
  </body>
  <center>

    <header>
    
    
      <h1 class="text-primary">
        Gerador de Carnê
      </h1>
      <small>* Não utilize "aspas" nos campos abaixo.</small><br>
      <small><h3>* Por favor verifique todos os dados antes de imprimir o carnê.</h3></small></center>
    </header>

    <hr>

    <div class="container">
      <form role="form" action="carne.php" method="post">
        <div class="row">
          <div class="col-md-6">
            <h3>Seus Dados</h3>
            <div class="form-group">
              <label>Nome</label>
              <input name="nome_empresa" type="text" value="MSTelecom" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Endereço</label>
              <textarea name="endereco_empresa" class="form-control" required>Rua amparo do tororó, Nº 233, Salvador-BA</textarea>
            </div>
            <div class="form-group">
              <label>Telefone</label>
              <input name="tel_empresa" type="text" class="form-control" value="(71) 98720-9903 / 98757-8923">
            </div>
            <div class="form-group">
              <label>URL do Logotipo <small>* para capa do carnê</small></label>
              <input name="logo" type="text" class="form-control" value="img/MS.png">
            </div>
            <div class="form-group">
              <label>Observações</label>
              <textarea name="obs" class="form-control">Ao efetuar o depósito favor enviar comprovante para o whatsapp do setor financeiro, 71 98757-8923, do contrario não será considerado.</textarea>
            </div>
			<div class="form-group">
              <label>Informações de conta</label>
              <textarea name="conta" class="form-control">PIX = CPF 039.943.865-35 - Mauricio Ferreira Sarmento<br>
			  Bradesco = AG 3266 CONTA 4406-7 - Mauricio Ferreira Sarmento<br>
			  Caixa = AG 4799 CONTA 00002645-8 	013 - Marileia Bispo dos Santos Sarmento
			  </textarea>
            </div>
          </div>
          <div class="col-md-6">
            <h3>Dados do Cliente</h3>
            <div class="form-group">
              <label>Nome Completo</label>
              <input name="nome" type="text" class="form-control" value="<?php echo $nome;  ?>" required>
            </div>
            <div class="form-group">
              <label>Endereço</label>
              <textarea name="endereco" class="form-control" required><?php echo $endereço . '  Nº' . $numero;  ?></textarea>
            </div>
            <div class="form-group">
              <label>CPF / CNPJ / USUARIO</label>
              <input name="cpf" type="text" value="<?php echo $cpf;  ?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Valor da Parcela</label>
              <input name="valor" type="text" class="form-control" value="<?php echo $valor;  ?>" required>
            </div>
            <div class="form-group">
              <label>Quantidade de Parcelas</label>
              <input name="qtd" type="number" class="form-control" value="12" max="212" required>
            </div>
            <div class="form-group">
              <label>Dia de Vencimento</label>
              <input name="vence" type="text" class="form-control" value="<?php echo $ven;  ?>" required>
            </div>
            <div class="form-group">
              <label>Primeira Parcela</label>
              <div class="row">
                <div class="col-xs-6">
                  <select name="primeiromes" class="form-control">
				  <option><?php echo $mensalidade;  ?></option>
                    <option value="1">Janeiro</option>
                    <option value="2">Fevereiro</option>
                    <option value="3">Março</option>
                    <option value="4">Abril</option>
                    <option value="5">Maio</option>
                    <option value="6">Junho</option>
                    <option value="7">Julho</option>
                    <option value="8">Agosto</option>
                    <option value="9">Setembro</option>
                    <option value="10">Outubro</option>
                    <option value="11">Novembro</option>
                    <option value="12">Dezembro</option>
                  </select>
                </div>
                <div class="col-xs-6">
                  <select name="primeiroano" class="form-control">
                    <option value="<?php echo date("Y");?>"><?php echo date("Y");?></option>
					<option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="text-center">
          <br><br>
          <button type="submit" class="btn btn-primary btn-lg">Gerar Carnê</button>
        </div>
      </form>
    </div>

    <br><hr>
	<center>
	  <a href="../index.php">Voltar</a> </p>
	
	  
	  <br>

    <footer>
        2019 © Todos os direitos reservados a Mauricio Sarmento
    </footer>
</center>
  </body>
</html>