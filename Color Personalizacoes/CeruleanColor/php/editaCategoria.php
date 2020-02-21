<?php

require_once("conexaoBanco.php");

$idCategoria =$_POST['idCategoria'];
$nome=$_POST['nome'];
$descricao=$_POST['descricao'];

//echo $idCategoria."<br>";
//echo $nome."<br>";
//echo $descricao."<br>";

$comando="UPDATE categorias SET 
nome='".$nome."',
descricao='".$descricao."'  
WHERE id=".$idCategoria;

//echo $comando;

 
$resultado=mysqli_query($conexao,$comando);

if($resultado==true){
	header("Location: ../paginasSistema/registroCategorias.php?retorno=1");
}else{
	header("Location: ../paginasSistema/registroCategorias.php?retorno=0");
}



?>