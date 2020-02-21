<?php
session_start();
require_once("conexaoBanco.php");

$cliente = $_POST["cliente"];

$comandoCliente = "SELECT id FROM clientes WHERE id='".$cliente."'";
$resultadoCliente = mysqli_query($conexao, $comandoCliente);
$linhas=mysqli_num_rows($resultadoCliente);
$clientela = mysqli_fetch_array($resultadoCliente);

// echo $clientela['id'];
if($linhas>0){

$desconto = $_POST['desconto'];
$local = $_POST['localEntrega'];
$parcelas = $_POST['parcelas'];
$precoTotal = $_POST['valorTotal'];
if($desconto == NULL || $desconto == ""){
  $desconto = 0;
}


$comando2 = "INSERT INTO orcamentos (desconto, parcelas, preco_total, clientes_id, funcionarios_matricula, status, dt_emissao, local) VALUES (".$desconto.", ".$parcelas.", ".$precoTotal.", ".$clientela['id'].", ".$_SESSION['nivelLogado'].", 1, '".date("Y-m-d")."', '".$local."')";
$resultado = mysqli_query($conexao, $comando2);



if ($resultado==true) {
  $categorias = array();
  $categorias = $_POST['categoria'];


  $produto = array();
  $produto = $_POST['produtos'];


  $valorUnitario = array();
  $valorUnitario = $_POST['valorUnitario'];


  $descricao = array();
  $descricao = $_POST['descricao'];


  $quantidade = array();
  $quantidade = $_POST['quantidade'];


$restauraOrcamento = "SELECT MAX(id) as id FROM orcamentos";
$resultadorestauraOrca = mysqli_query($conexao, $restauraOrcamento);
$idOrcamento= mysqli_fetch_assoc($resultadorestauraOrca);

for ($i = 0; $i< sizeof($categorias); $i++){
// echo $quantidade[$i]."<br>";
// echo $descricao[$i]."<br>";
// echo $valorUnitario[$i]."<br>";
// echo $produto[$i]."<br>";
// echo $categorias[$i]."<br>";

$comando3 = "INSERT INTO orcamentos_tem_produtos (produtos_id, orcamentos_id, descricao, quantidade, preco_unico) VALUES (".$produto[$i].", ".$idOrcamento['id'].", '".$descricao[$i]."', ".$quantidade[$i].", ".$valorUnitario[$i].");";
$resultadoFinal = mysqli_query($conexao, $comando3);

}

 header("Location: ../paginasSistema/orcamentoAte.php?retorno=1");
}
else {
  header("Location: ../paginasSistema/orcamentoAte.php?retorno=2");
}

}else {
  header("Location: ../paginasSistema/orcamentoAte.php?retorno=3");
}

 ?>
