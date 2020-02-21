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
<link rel="stylesheet" href="../css/principalGerente.css">
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
<a href="registrosGerente.php"><div id="local1" class="locais"><img src="../img/iconsSistema/registros.png" alt="Registros" class="imgs"><p>Registros</p></div></a>
<a href="orcamento.php"><div id="local2" class="locais"><img src="../img/iconsSistema/orcamentos.png" alt="Orçamentos" class="imgs" id="aordem"><p>Orçamentos</p></div></a>
<a href="ordensServicoGer.php"><div id="local3" class="locais"><img src="../img/iconsSistema/ordemServicos.png" alt="Ordens de Serviços" class="imgs"><p>Ordens de Serviços</p></div></a>
<a href="relatorioGerente.php"><div id="local4" class="locais"><img src="../img/iconsSistema/relatorios.png" alt="Relatórios" class="imgs"><p>Relatórios</p></div></a>
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
