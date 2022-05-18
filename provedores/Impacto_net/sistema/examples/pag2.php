<?php
require_once '../login/conect.php';
$jan="1";
$fev="1";
$mar="1";
$abr="1";
$mai="1";
$jun="1";
$jul="1";
$ago="1";
$set="1";
$out="1";
$nov="1";
$dez="1";
$data = date ('d');
$mes = date("M");
$ano = date("y");
if(date("m") == 12){$mes = 'Dez';}
############# mudando o status do cliente no dia do vecimento do dia 05
if($data >=5 and $data <=10){
$sql="SELECT id_clientes,$mes FROM mensalidade where ano = $ano and $mes = '1'" ;
$res1=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res1)){
$id=$vreg[0];
$status= $vreg[1];
$sql="UPDATE db_clientes SET status_cliente = '1' WHERE dia_vencimento = '05' and id = '$id'";
$res2=mysqli_query($con,$sql);	
}
$sql="SELECT id_clientes,$mes FROM mensalidade where ano = $ano and $mes = '2'" ;
$res3=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res3)){
$id=$vreg[0];
$status= $vreg[1];

$sql="UPDATE db_clientes SET status_cliente = '2' WHERE dia_vencimento = '05' and id = '$id'";
$res4=mysqli_query($con,$sql);

}
$sql="SELECT id_clientes,$mes FROM mensalidade where ano = $ano and $mes = '3'" ;
$res5=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res5)){
$id=$vreg[0];
$status= $vreg[1];
if($data >=6){
$sql="UPDATE db_clientes SET status_cliente = '2' WHERE dia_vencimento = '05' and id = '$id'";
$res6=mysqli_query($con,$sql);			
}}}

############# mudando o status do cliente no dia do vecimento do dia 10
if($data >=10 and $data <=15){
$sql="SELECT id_clientes,$mes FROM mensalidade where ano = $ano and $mes = '1'" ;
$res7=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res7)){
$id=$vreg[0];
$status= $vreg[1];
$sql="UPDATE db_clientes SET status_cliente = '1' WHERE dia_vencimento = '10' and id = '$id'";
$res8=mysqli_query($con,$sql);			
}
$sql="SELECT id_clientes,$mes FROM mensalidade where ano = $ano and $mes = '2'" ;
$res9=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res9)){
$id=$vreg[0];
$status= $vreg[1];

$sql="UPDATE db_clientes SET status_cliente = '2' WHERE dia_vencimento = '10' and id = '$id'";
$res10=mysqli_query($con,$sql);			
}
$sql="SELECT id_clientes,$mes FROM mensalidade where ano = $ano and $mes = '3'" ;
$res11=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res11)){
$id=$vreg[0];
$status= $vreg[1];
if($data >=11){
$sql="UPDATE db_clientes SET status_cliente = '2' WHERE dia_vencimento = '10' and id = '$id'";
$res12=mysqli_query($con,$sql);			
}}}

############# mudando o status do cliente no dia do vecimento do dia 15
if($data >=15 and $data <=20){
$sql="SELECT id_clientes,$mes FROM mensalidade where ano = $ano and $mes = '1'" ;
$res13=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res13)){
$id=$vreg[0];
$status= $vreg[1];
$sql="UPDATE db_clientes SET status_cliente = '1' WHERE dia_vencimento = '15' and id = '$id'";
$res14=mysqli_query($con,$sql);			
}
$sql="SELECT id_clientes,$mes FROM mensalidade where ano = $ano and $mes = '2'" ;
$res15=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res15)){
$id=$vreg[0];
$status= $vreg[1];
$sql="UPDATE db_clientes SET status_cliente = '2' WHERE dia_vencimento = '15' and id = '$id'";
$res16=mysqli_query($con,$sql);			
}
$sql="SELECT id_clientes,$mes FROM mensalidade where ano = $ano and $mes = '3'" ;
$res17=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res17)){
$id=$vreg[0];
$status= $vreg[1];
if($data >=16){
$sql="UPDATE db_clientes SET status_cliente = '2' WHERE dia_vencimento = '15' and id = '$id'";
$res18=mysqli_query($con,$sql);			
}}}

############# mudando o status do cliente no dia do vecimento do dia 20
if($data >=20 and $data <=25){
$sql="SELECT id_clientes,$mes FROM mensalidade where ano = $ano and $mes = '1'" ;
$res19=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res19)){
$id=$vreg[0];
$status= $vreg[1];
$sql="UPDATE db_clientes SET status_cliente = '1' WHERE dia_vencimento = '20' and id = '$id'";
$res20=mysqli_query($con,$sql);			
}
$sql="SELECT id_clientes,$mes FROM mensalidade where ano = $ano and $mes = '2'" ;
$res21=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res21)){
$id=$vreg[0];
$status= $vreg[1];
$sql="UPDATE db_clientes SET status_cliente = '2' WHERE dia_vencimento = '20' and id = '$id'";
$res22=mysqli_query($con,$sql);			
}
$sql="SELECT id_clientes,$mes FROM mensalidade where ano = $ano and $mes = '3'" ;
$res23=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res23)){
$id=$vreg[0];
$status= $vreg[1];
if($data >=21){
$sql="UPDATE db_clientes SET status_cliente = '2' WHERE dia_vencimento = '20' and id = '$id'";
$res24=mysqli_query($con,$sql);			
}}}


############# mudando o status do cliente no dia do vecimento do dia 25
if($data >=25 and $data <=31){
$sql="SELECT id_clientes,$mes FROM mensalidade where ano = $ano and $mes = '1'" ;
$res25=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res25)){
$id=$vreg[0];
$status= $vreg[1];
$sql="UPDATE db_clientes SET status_cliente = '1' WHERE dia_vencimento = '25' and id = '$id'";
$res26=mysqli_query($con,$sql);			
}
$sql="SELECT id_clientes,$mes FROM mensalidade where ano = $ano and $mes = '2'" ;
$res27=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res27)){
$id=$vreg[0];
$status= $vreg[1];
$sql="UPDATE db_clientes SET status_cliente = '2' WHERE dia_vencimento = '25' and id = '$id'";
$res28=mysqli_query($con,$sql);			
}
$sql="SELECT id_clientes,$mes FROM mensalidade where ano = $ano and $mes = '3'" ;
$res29=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res29)){
$id=$vreg[0];
$status= $vreg[1];
if($data >=26){
$sql="UPDATE db_clientes SET status_cliente = '2' WHERE dia_vencimento = '25' and id = '$id'";
$res30=mysqli_query($con,$sql);			
}}}

################ tirando o status 3 dia 25 #######################

$sql="SELECT status_cliente,id FROM db_clientes where status_cliente = '3' and dia_vencimento = '25'" ;
$res31=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res31)){
$status=$vreg[0];
$id=$vreg[1];

$sql="SELECT $mes FROM mensalidade where ano = $ano and id_clientes = '$id'" ;
$res32=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res32)){
$status_mes=$vreg[0];
if($status_mes == 1){$sql="UPDATE db_clientes SET status_cliente = '2' WHERE dia_vencimento = '25' and id = '$id'";
$res33=mysqli_query($con,$sql);
}
}}
#####################################################

################ tirando o status 3 dia 20 #######################

$sql="SELECT status_cliente,id FROM db_clientes where status_cliente = '3' and dia_vencimento = '20'" ;
$res34=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res34)){
$status=$vreg[0];
$id=$vreg[1];

$sql="SELECT $mes FROM mensalidade where ano = $ano and id_clientes = '$id'" ;
$res35=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res35)){
$status_mes=$vreg[0];
if($status_mes == 1){$sql="UPDATE db_clientes SET status_cliente = '2' WHERE dia_vencimento = '20' and id = '$id'";
$res36=mysqli_query($con,$sql);
}
}}
#####################################################

################ tirando o status 3 dia 15 #######################

$sql="SELECT status_cliente,id FROM db_clientes where status_cliente = '3' and dia_vencimento = '15'" ;
$res37=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res37)){
$status=$vreg[0];
$id=$vreg[1];

$sql="SELECT $mes FROM mensalidade where ano = $ano and id_clientes = '$id'" ;
$res38=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res38)){
$status_mes=$vreg[0];
if($status_mes == 1){$sql="UPDATE db_clientes SET status_cliente = '2' WHERE dia_vencimento = '15' and id = '$id'";
$res39=mysqli_query($con,$sql);
}
}}
#####################################################

################ tirando o status 3 dia 10 #######################

$sql="SELECT status_cliente,id FROM db_clientes where status_cliente = '3' and dia_vencimento = '10'" ;
$res40=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res40)){
$status=$vreg[0];
$id=$vreg[1];

$sql="SELECT $mes FROM mensalidade where ano = $ano and id_clientes = '$id'" ;
$res41=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res41)){
$status_mes=$vreg[0];
if($status_mes == 1){$sql="UPDATE db_clientes SET status_cliente = '2' WHERE dia_vencimento = '10' and id = '$id'";
$res42=mysqli_query($con,$sql);
}
}}
#####################################################

################ tirando o status 3 dia 05 #######################

$sql="SELECT status_cliente,id FROM db_clientes where status_cliente = '3' and dia_vencimento = '05'" ;
$res43=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res43)){
$status=$vreg[0];
$id=$vreg[1];

$sql="SELECT $mes FROM mensalidade where ano = $ano and id_clientes = '$id'" ;
$res44=mysqli_query($con,$sql);
while($vreg=mysqli_fetch_row($res44)){
	
$status_mes=$vreg[0];
if($status_mes == 1){$sql="UPDATE db_clientes SET status_cliente = '2' WHERE dia_vencimento = '05' and id = '$id'";
$res45=mysqli_query($con,$sql);
}
}}

#####################################################

#teste de crontab
$sql="UPDATE db_clientes SET status_cliente = '2' WHERE usuario = 'casa'";
$res56=mysqli_query($con,$sql);	


#	$res55=mysqli_query($con,"INSERT INTO `mensalidade` (`id`, `id_clientes`, `usuario`, `Jan`, `Feb`,
#`Mar`, `Apr`, `May`, `Jun`, `Jul`, `Aug`, `Sep`, `Oct`, `Nov`, `Dez`, `ano`) VALUES 
#(NULL, '$id','Admin','$jan', $fev, '$mar','$abr', '$mai', '$jun', '$jul','$ago','$set','$out','$nov', '$dez', '$ano')");


?>