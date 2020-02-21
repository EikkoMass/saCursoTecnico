<?php

require_once("conexaoBanco.php");



$idVi=$_GET['idVi'];
$status=$_GET['status'];
$comando="SELECT status FROM ordens_de_servicos WHERE id=".$idVi;
$resultado=mysqli_query($conexao,$comando);
$Retornadas = array();

while($cadaLinha = mysqli_fetch_assoc($resultado)){
  array_push($Retornadas,$cadaLinha);
}
foreach($Retornadas as $cadaGeral){

$comando="UPDATE ordens_de_servicos SET status=".$status." WHERE status=".$cadaGeral['status'];
$resultado2=mysqli_query($conexao,$comando);
}
header("Location:../paginasSistema/ordensServicoGer.php?retorno=1");

?>
