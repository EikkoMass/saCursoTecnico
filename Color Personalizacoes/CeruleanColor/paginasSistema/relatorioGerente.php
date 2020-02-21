<?php
session_start();
if(isset($_SESSION['nivelLogado']) && $_SESSION['nivelLogado']==1){

require_once("../php/conexaoBanco.php");

 ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title> Painel do Gerente || Color </title>
<link rel="stylesheet" href="../css/relatorioGerente.css">
<link rel="shortcut icon" href="../img/Favicon.ico" />
</head>
<body>
<header>
  <form method="POST" action="../php/efetuaLogout.php">
  <button type="submit"style="background-color: transparent; border: none; float: right"><img src="../img/iconsSistema/quit.png" alt="Sair do Sistema" id="saia"></button>


  </form>  <br><br><a href="principalGerente.php"><p id="voltar">Voltar</p></a>
</header>
<main>
<img src="../img/Logo.png" alt="Logo" id="LogoPrincipal">


<div name="alocamento">
<a href="relatorioOrdemdeServico.php"><div id="local1" class="locais"><img src="../img/iconsSistema/ordemServico.png" alt="Ordem de Serviço" class="imgs"><p>Relatório de Ordem de Serviço</p></div></a>
<a href="relatorioOrcamento.php"><div id="local2" class="locais"><img src="../img/iconsSistema/orcamento.png" alt="Orçamentos" class="imgs"><p>Relatório de Orçamento</p></div></a>
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
