<?php
require_once("conexaoBanco.php");


$orcamento = $_POST['orcamento'];
$dtEntrega = $_POST['dtEntrega'];
$funcionario = $_POST['funcionario'];

$comandoINS = "INSERT INTO ordens_de_servicos (data_entrega, status, funcionarios_matricula, orcamentos_id) VALUES ('".$dtEntrega."', 1, ".$funcionario.", ".$orcamento.")";

$resultaIns = mysqli_query($conexao, $comandoINS);

if ($resultaIns==true) {
  $comandoUP = "UPDATE orcamentos SET status=2 WHERE id=".$orcamento;
  $resultaUP = mysqli_query($conexao, $comandoUP);

  header("Location: ../paginasSistema/registroOrdem.php?retorno=1");

}else {

header("Location: ../paginasSistema/registroOrdem.php?retorno=2");

}





 ?>
