<?php
require_once '../login/conect.php';
#criando a tabela
echo "<meta charset='utf-8'>
<table border='1'>
<td colspan='2' aling='center'>Planilha de Clientes</td>
<tr>
<td>Id</td>
<td>Nome de Usuario</td>
</tr>";
#puxando Dados da tabela

$sql="SELECT * FROM sociedade where sociedade ='Jurlan'";
$res=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res)){
$html .= '<td>' . $vreg[1] . ' </td>';
$html .= '<td>' . $vreg[2] . ' </td>';
$html .= '</tr>';
}

#Formatando o arquivo
 header("Content-type: application/vnd.ms-excel");
 header("Content-type: application/force-download");
 header("Content-Disposition: attachment; filename=Clientes_Jurlan.xls");
 header("Pragma: no-cache");

#enviar o conteudo do arquivo
echo $html;
exit;