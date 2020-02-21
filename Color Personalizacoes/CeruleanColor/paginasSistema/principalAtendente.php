<?php
session_start();
if(isset($_SESSION['nivelLogado']) && $_SESSION['nivelLogado']==3){

require_once("../php/conexaoBanco.php");

 ?>


  <!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title> Painel do(a) Atendente || Color </title>
<link rel="stylesheet" href="../css/principalAtendente.css">
<link rel="shortcut icon" href="../img/Favicon.ico" />
</head>
<body>
<header>
  <p><?php

    require_once("../php/conexaoBanco.php");


    $comando="SELECT nome FROM funcionarios WHERE matricula=".$_SESSION['idLogado'];
    // echo $comando;
    $resultado = mysqli_query($conexao, $comando);
    $resultadoO=mysqli_fetch_assoc($resultado);
    echo "Seja Bem-Vindo(a), ".$resultadoO['nome'];

  ?></p><form method="POST" action="../php/efetuaLogout.php">
<button type="submit"style="background-color: transparent; border: none; float: right"><img src="../img/iconsSistema/quit.png" alt="Sair do Sistema" id="saia"></button>


</form>
</header>
<main>
<img src="../img/Logo.png" alt="Logo" id="LogoPrincipal">


<div id="alocamento">
<a href="registroClientesAte.php"><div id="local1" class="locais"><img src="../img/iconsSistema/registroClientes.png" alt="Registro de cliente" class="imgs"><p>Registro de <br> Clientes</p></div></a>
<a href="orcamentoAte.php"><div id="local2" class="locais"><img src="../img/iconsSistema/registroOrcamentos.png" alt=" Registro de orçamentos" class="imgs"><p>Registro de <br> Orçamentos</p></div></a>
<a href="ordensServicoAte.php"><div id="local3" class="locais"><img src="../img/iconsSistema/pesquisa.png" alt="Ordens de Serviços" class="imgs"><p>Consulta de Ordens <br> de Serviço</p></div></a>

</div>

</main>
<footer id="rodape">

</footer>

</body>
</html>


<?php }
else{
  header("Location: ../paginasSite/login.php");
}


 ?>
