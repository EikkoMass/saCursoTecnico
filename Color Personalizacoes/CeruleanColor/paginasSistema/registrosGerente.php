<?php
session_start();
if(isset($_SESSION['nivelLogado']) && $_SESSION['nivelLogado']==1){

require_once("../php/conexaoBanco.php");

 ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title> Painel de registros || Color </title>
<link rel="stylesheet" href="../css/registrosGerente.css">
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
<a href="registroClientes.php"><div id="local1" class="locais"><img src="../img/iconsSistema/registroClientes.png" alt="Registro de Clientes" class="imgs"><p>Registro de Clientes</p></div></a>
<a href="registroFuncionarios.php"><div id="local2" class="locais"><img src="../img/iconsSistema/registroFuncionarios.png" alt="Registro de Funcionários" class="imgs" id="aordem"><p>Registro de Funcionários</p></div></a>
<a href="registroCategorias.php"><div id="local5" class="locais"><img src="../img/iconsSistema/registroCategorias.png" alt="Registro de Categorias" class="imgs"><p>Registro de Categorias</p></div></a>
<a href="registroProdutos.php"><div id="local3" class="locais"><img src="../img/iconsSistema/registroProdutos.png" alt="Registro de Produtos" class="imgs"><p>Registro de Produtos</p></div></a>
<a href="registroOrdem.php"><div id="local4" class="locais"><img src="../img/iconsSistema/registroOrdem.png" alt="Registro de Ordens de Serviço" class="imgs"><p>Registro de Ordens de Serviço</p></div></a>


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
