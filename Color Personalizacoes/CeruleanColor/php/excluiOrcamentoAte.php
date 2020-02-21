<?php
require_once("conexaoBanco.php");

$id=$_POST['id'];


$comando="SELECT id FROM orcamentos WHERE id=".$id;



$resultado=mysqli_query($conexao,$comando);
$linhas=mysqli_num_rows($resultado);




if($linhas>0){
	$comando3="DELETE FROM  orcamentos_tem_produtos  WHERE orcamentos_id=".$id;
	$resultado3 = mysqli_query($conexao,$comando3);
	$comando2="DELETE FROM  orcamentos  WHERE id=".$id;
	$resultado2 = mysqli_query($conexao,$comando2);
	if($resultado2==true){
		header("Location:  ../paginasSistema/orcamentoAte.php?retorno=1");
	}else{
		header("Location:  ../paginasSistema/orcamentoAte.php?retorno=0");

  }
}else{
	header("Location: ../paginasSistema/orcamentoAte.php?retorno=2");
}


?>
