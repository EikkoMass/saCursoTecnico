<?php
require_once("conexaoBanco.php");

$nome = $_POST['nome'];
$categoria = $_POST['categoria'];
$fornecedor = $_POST['fornecedor'];
$precoUN = $_POST['precoUN'];

require("validaImagem.php");
$comando = "INSERT INTO produtos (nome, fornecedor, preco_unidade, categorias_id, imagens) VALUES ('".$nome."', '".$fornecedor."', ".$precoUN.", ".$categoria.", '".$destinoImagem."')";
$resultado = mysqli_query($conexao, $comando);

 if($resultado == true){
   header("Location: ../paginasSistema/registroProdutos.php?retorno=0");
}else{
  header("Location: ../paginasSistema/registroProdutos.php?retorno=1");
}

 ?>
