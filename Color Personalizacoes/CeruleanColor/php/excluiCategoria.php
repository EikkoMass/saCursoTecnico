<?php

require_once("conexaoBanco.php");

$idCategoria=$_POST['idCategoria'];


echo $idCategoria;

$comando="SELECT idProduto FROM produtos WHERE 
categorias_idCategoria=".$idCategoria; 

$resultado=mysqli_query($conexao,$comando);
$linhas=mysqli_num_rows($resultado);

if($linhas==0){
	$comando2="DELETE FROM categorias WHERE 
	id=".$idCategoria;
	$resultado2 = mysqli_query($conexao,$comando2);
	if($resultado2==true){
		header("Location: ../paginasSistema/registroCategorias.php?retorno=1");
	}else{
		header("Location: ../paginasSistema/registroCategorias.php?retorno=0");
	}
}else{
	header("Location: ../paginasSistema/registroCategorias.php?retorno=2");
}


?>




