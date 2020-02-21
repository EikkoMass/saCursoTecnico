<?php
require_once("conexaoBanco.php");


$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$senha = md5($senha);

$comando = "SELECT * FROM funcionarios WHERE usuario='".$usuario."' AND senha='".$senha."'";

$resultado = mysqli_query($conexao, $comando);
$usuario = mysqli_fetch_assoc($resultado);
$linhas = mysqli_num_rows($resultado);

if($linhas==0){
  header("Location: ../paginasSite/login.php?retorno=1");
}else{
  session_start();
  $_SESSION['idLogado'] = $usuario['matricula'];
  $_SESSION['usuarioLogado'] = $usuario['usuario'];
  $_SESSION['nivelLogado'] = $usuario['nivel'];

  if ($_SESSION['nivelLogado'] == 1) {
  header("Location: ../paginasSistema/principalGerente.php");
}else if($_SESSION['nivelLogado'] == 2){
header("Location: ../paginasSistema/principalExecutor.php");
  }else if($_SESSION['nivelLogado'] == 3){
header("Location: ../paginasSistema/principalAtendente.php");

}}

 ?>
