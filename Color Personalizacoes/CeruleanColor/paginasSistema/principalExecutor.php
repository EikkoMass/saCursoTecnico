<?php
session_start();
if(isset($_SESSION['nivelLogado']) && $_SESSION['nivelLogado']==2){

require_once("../php/conexaoBanco.php");

 ?>


  <!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title> Painel do Executor || Color </title>
<link rel="stylesheet" href="../css/principalExecutor.css">
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


<div name="alocamento">
<a href="ordensServico.php"><div id="local1" class="locais"><img src="../img/iconsSistema/ordemServicos.png" alt="Ordens de Serviço" class="imgs"><p>Ordens de Serviço</p></div></a>

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
