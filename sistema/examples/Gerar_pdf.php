<?php 
session_start();
require_once 'conexao/conect.php';
$data_m = $_SESSION['data_m'];
$data_y = $_SESSION['data_y'];
#criando a tabela
echo "<meta charset='utf-8'>
<table border='1'>
<td colspan='2' aling='center'>Planilha Pagamentos do mes " . $data_m . " ano 20" . $data_y . "</td>
<tr>
<td>Usuario do cliente</td>
<td>Mes</td>
<td>ano</td>
<td>Valor</td>
<td>Vencimento</td>
<td>Data do pagamento</td>
</tr>";
#puxando Dados da tabela
$sql="SELECT * FROM pagamentos where data_ano = '$data_y' and data_mes = '$data_m' and id_servidor ='133'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$html .= '<td>' . $vreg[3] . ' </td>';
$html .= '<td>' . $vreg[5] . ' </td>';
$html .= '<td>' . $vreg[6] . ' </td>';
$html .= '<td>' . $vreg[7] . ' </td>';
$html .= '<td>' . $vreg[8] . ' </td>';
$html .= '<td>' . $vreg[8] . ' </td>';
$html .= '</tr>';
}

#Formatando o arquivo
 header("Content-type: application/vnd.ms-excel");
 header("Content-type: application/force-download");
 header("Content-Disposition: attachment; filename=Finanças.xls");
 header("Pragma: no-cache");

#enviar o conteudo do arquivo
echo $html;
exit;

?>
