<?php

require_once("conexaoBanco.php");


$nome=$_POST['nome'];
$descricao=$_POST['descricao'];

$comandoIgualado = "SELECT nome FROM categorias WHERE nome='".$nome."'";
$resultaIgual = mysqli_query($conexao, $comandoIgualado);
$linhasIguais = mysqli_fetch_assoc($resultaIgual);

if ($linhasIguais > 0) {
	header("Location: ../paginasSistema/registroCategorias.php?retorno=2");
	die();
}


$comando="INSERT INTO categorias (nome, descricao) VALUES ('".$nome."', '".$descricao."')";
$resultado=mysqli_query($conexao,$comando);


if($resultado==true){

header("Location: ../paginasSistema/registroCategorias.php?retorno=1");

}else{

header("Location: ../paginasSistema/registroCategorias.php?retorno=0");

}








?>
