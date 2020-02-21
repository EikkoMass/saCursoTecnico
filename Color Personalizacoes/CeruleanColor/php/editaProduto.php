<?php
require_once("conexaoBanco.php");

$idProduto = $_POST['id'];
$categoria= $_POST['categoria'];
$nome=$_POST['nome'];
$fornecedor=$_POST['fornecedor'];
$precoUN=$_POST['precoUN'];
$imgGera = $_POST['imgGera'];


//echo $idCategoria."<br>";
//echo $nome."<br>";
//echo $fornecedor."<br>";
//echo $precoUN."<br>";

if(isset($_FILES['imginsert']['name'])==false){
$comando="UPDATE produtos SET 
nome='".$nome."',
categorias_id=".$categoria.",
fornecedor='".$fornecedor."',
preco_unidade=".$precoUN.",
imagens='".$imgGera."' 
WHERE id=".$idProduto;

}else{

	require("validaImagem.php");
	$comando="UPDATE produtos SET 
	nome='".$nome."',
	categorias_id=".$categoria.",
	fornecedor='".$fornecedor."',
	preco_unidade=".$precoUN.",
	imagens='".$destinoImagem."' 
	WHERE id=".$idProduto;

}



//echo $comando;

 
$resultado=mysqli_query($conexao,$comando);

if($resultado==true){
	header("Location: ../paginasSistema/registroProdutos.php?retorno=0");
}else{
	header("Location: ../paginasSistema/registroProdutos.php?retorno=1");
}
?>