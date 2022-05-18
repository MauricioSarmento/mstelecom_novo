<?php
##include "conexao.php";

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MSTelecom</title>

<script type="text/javascript">
function validaCampo()
{
if(document.login.usuario.value=="")
{
alert("Insira seu nome de usuário.");
return false;
}
else
if(document.login.senha.value=="")
{
alert("Insira sua senha.");
return false;
}
else
return true;
}
</script>

</head>
<body>









<table align="center" width="800" height="600" border="0">
  <tr><td>


<link href="estilos.css" rel="stylesheet" type="text/css">
<div id="index">
<center>
<h1>
MSTelecom
</h1></center>
  <div class="retorno">
  <p>Área restrita à administração<br /><br>
  <a href="../../index.php">Retornar ao menu principal</a></p>  
  </div>
  <form name="login" method="POST" action="login.php">
    <fieldset>
     <legend>Logar no Sistema</legend>
     
       <label>
       <span>Usuário</span>
       <input type="text" name="usuario" />
       </label>

       <label>
       <span>Senha</span>
       <input type="password" name="senha" />
       </label>
       <input type="submit" name="logar" value="Logar" class="btn" />
       </fieldset>
       <!--<div class="link">
       <a href="index.php">Recuperar dados</a> | <a href="index.php">Cadastrar usuário</a>
       </div> -->
  </form>
</div>
</td>
</tr>


</body>
</html>