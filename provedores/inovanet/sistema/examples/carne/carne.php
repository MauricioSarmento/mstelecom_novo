<?php

if (!$_POST['nome_empresa']) { $nome_empresa = ""; } else { $nome_empresa = addslashes($_POST['nome_empresa']); }
if (!$_POST['endereco_empresa']) { $endereco_empresa = ""; } else { $endereco_empresa = addslashes($_POST['endereco_empresa']); }
if (!$_POST['tel_empresa']) { $tel_empresa = ""; } else { $tel_empresa = addslashes($_POST['tel_empresa']); }
if (!$_POST['logo']) { $logo = ""; } else { $logo = addslashes($_POST['logo']); }
if (!$_POST['obs']) { $obs = ""; } else { $obs = addslashes($_POST['obs']); }
if (!$_POST['conta']) { $obs = ""; } else { $conta = addslashes($_POST['conta']); }

if (!$_POST['nome']) { $nome = ""; } else { $nome = addslashes($_POST['nome']); }
if (!$_POST['endereco']) { $endereco = ""; } else { $endereco = addslashes($_POST['endereco']); }
if (!$_POST['cpf']) { $cpf = ""; } else { $cpf = addslashes($_POST['cpf']); }
if (!$_POST['valor']) { $valor = ""; } else { $valor = addslashes($_POST['valor']); }
if (!$_POST['qtd']) { $qtd = ""; } else { $qtd = addslashes($_POST['qtd']); }
if (!$_POST['vence']) { $vence = ""; } else { $vence = addslashes($_POST['vence']); }
if (!$_POST['primeiromes']) { $primeiro_mes = ""; } else { $primeiro_mes = addslashes($_POST['primeiromes']); }
if (!$_POST['primeiroano']) { $primeiro_ano = ""; } else { $primeiro_ano = addslashes($_POST['primeiroano']); }


if($primeiro_mes == 'Janeiro'){$primeiro_mes = '1';}
if($primeiro_mes == 'Fevereiro'){$primeiro_mes = '2';}
if($primeiro_mes == 'Março'){$primeiro_mes = '3';};
if($primeiro_mes == 'Abril'){$primeiro_mes = '4';};
if($primeiro_mes == 'Mail'){$primeiro_mes = '5';};
if($primeiro_mes == 'Junho'){$primeiro_mes = '6';};
if($primeiro_mes == 'Julho'){$primeiro_mes = '7';};
if($primeiro_mes == 'Agosto'){$primeiro_mes = '8';};
if($primeiro_mes == 'Setembro'){$primeiro_mes = '9';};
if($primeiro_mes == 'Outubro'){$primeiro_mes = '10';};
if($primeiro_mes == 'Novembro'){$primeiro_mes = '11';};
if($primeiro_mes == 'Dezembro'){$primeiro_mes = '12';};



$hoje = date("d/m/Y");

if ($qtd > 212) { header("Location: index.php?error=qtd_limite"); }
?>
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
    <title>Carnê</title>
    <link href="img/favicon.png" rel="shortcut icon" type="image/x-icon">
    <link href="css/style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
  <div class="bto">
    Ao Imprimir o carnê certifique-se se a impressão está ajustada à página
    <br>
    <br>
    <button class="btn-impress" onclick="window.print()">Imprimir</button>
    &nbsp;
    <?php echo "<a href=\"capa.php?endereco={$endereco_empresa}&tel={$tel_empresa}&logo={$logo}\" class=\"btn\" target=\"_blank\">
      Capa do carnê
    </a>"; ?>
    &nbsp;
    <button class="btn" onclick="window.history.back()">Voltar ao formulário</button>
  </div>

<?php

$count = 1;
$ano_vence = $primeiro_ano;
$mes_vence = $primeiro_mes -1;

while ($count <= $qtd) {

  if ($mes_vence == 12) { 
    $ano_vence = $ano_vence + 1;
    $mes_vence = 1;
  } else {
    $mes_vence++;
  }

  echo "<!-- PARCELA -->
  <div class=\"parcela\">
    <div class=\"grid\">
      <div class=\"col4\">
        <div class=\"destaca\">
          <table width=\"100%\">
            <tr>
              <td>
                <small>Parcela</small>
                <br>{$count} / {$qtd}
              </td>
            <td>
              <small>Valor</small>
              <br>{$valor}
            </td>
            </tr>
            <tr>
              <td colspan=\"2\">
                <small>Vencimento</small>
                <br>{$vence}/{$mes_vence}/{$ano_vence}
              </td>
            </tr>
            <tr>
              <td colspan=\"2\">
                <small>Observações</small>
                <br><br>{$obs}<br><br><br>
              </td>
            </tr>
          </table>
        </div>
      </div>
      <div class=\"col8\">
        <table width=\"100%\">
          <tr>
            <td colspan=\"2\">
              <small>Prestador de serviços</small>
              <br>{$nome_empresa}
            </td>
            <td>
              <small>Parcela</small>
              <br>{$count} / {$qtd}
            </td>
            <td>
              <small>Valor</small>
              <br>{$valor}
            </td>
          </tr>
          <tr>
            <td>
              <small>Data do Documento</small>
              <br>{$hoje}
            </td>
            <td>
              <small>Tipo de Documento</small>
              <br>Carnê
            </td>
            <td colspan=\"2\">
              <small>Vencimento</small>
              <br>{$vence}/{$mes_vence}/{$ano_vence}
            </td>
          </tr>
          <tr>
            <td colspan=\"4\">
			
			{$conta}
			
			<br>
              {$obs}
			  <br>
			   <div class=\"nome\">{$nome}, {CPF: $cpf}, {$endereco}</div>
            </td>
          </tr>
        </table>
       
      </div>
    </div>
  </div>";
if(!isset($count_quebra_pg))	$count_quebra_pg = null;
  if (!$count_quebra_pg) { $count_quebra_pg = 0; } // Preenche Variavel
  $count_quebra_pg++; // contagem de loop
  if ($count_quebra_pg == 4) { // Adiciona quebra a cada 4 loops e zera a variavel
    echo "<div class=\"quebra-pagina\"></div>";
    $count_quebra_pg = 0;
  }

  $count++;
}

?>
 </body>
</html>