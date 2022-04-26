<?php
require_once 'conexao/conect.php';
#criando a tabela
echo "<meta charset='utf-8'>
<table border='1'>
<td colspan='15' aling='center'>Planilha de Clientes</td>
<tr>
<td>Id</td>
<td>Nome</td>
<td>Usuario</td>
<td>E-mail</td>
<td>Telefone</td>
<td>D/instalação</td>
<td>Endereço</td>
<td>Numero</td>
<td>Complemento</td>
<td>Apelido</td>
<td>Plano</td>
<td>Vencimento</td>
<td>Status</td>
<td>Valor do plano</td>
<td>Cpf</td>
</tr>";
#puxando Dados da tabela

$sql="SELECT * FROM db_clientes where id_cliente='133'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$html .= '<td>' . $vreg[1] . ' </td>';
$html .= '<td>' . $vreg[2] . ' </td>';
$html .= '<td>' . $vreg[3] . '</td>';
$html .= '<td>' . $vreg[4] . '</td>';
$html .= '<td>' . $vreg[5] . '</td>';
$html .= '<td>' . $vreg[6] . '</td>';
$html .= '<td>' . $vreg[7] . '</td>';
$html .= '<td>' . $vreg[8] . '</td>';
$html .= '<td>' . $vreg[9] . '</td>';
$html .= '<td>' . $vreg[10] . '</td>';
$html .= '<td>' . $vreg[11] . '</td>';
$html .= '<td>' . $vreg[12] . '</td>';
$html .= '<td>' . $vreg[13] . '</td>';
$html .= '<td>' . $vreg[14] . '</td>';
$html .= '<td>' . $vreg[15] . '</td>';
$html .= '<td>' . $vreg[16] . '</td>';
$html .= '</tr>';
}

#Formatando o arquivo
 header("Content-type: application/vnd.ms-excel");
 header("Content-type: application/force-download");
 header("Content-Disposition: attachment; filename=Clientes_completo.xls");
 header("Pragma: no-cache");

#enviar o conteudo do arquivo
echo $html;
exit;