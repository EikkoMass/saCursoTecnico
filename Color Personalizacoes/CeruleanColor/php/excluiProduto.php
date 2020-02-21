<?php

require_once("conexaoBanco.php");

$idProduto = $_POST['idProduto'];




$comando="SELECT id FROM produtos WHERE 
id=".$idProduto; 



$resultado=mysqli_query($conexao,$comando);
$linhas=mysqli_num_rows($resultado);


if($linhas>0){
	$comando2="DELETE FROM produtos WHERE 
	id=".$idProduto;
	$resultado2 = mysqli_query($conexao,$comando2);
	if($resultado2==true){
		header("Location: ../paginasSistema/registroProdutos.php?retorno=0");
	}else{
		header("Location: ../paginasSistema/registroProdutos.php?retorno=1");
	}
}else{
	header("Location: ../paginasSistema/registroProdutos.php?retorno=2");
}

?>