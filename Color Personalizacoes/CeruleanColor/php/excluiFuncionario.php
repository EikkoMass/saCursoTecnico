<?php 
require_once("conexaoBanco.php");

$matricula=$_POST['matricula'];

$comando="SELECT matricula FROM funcionarios WHERE  funcionarios_matricula=".$matricula;



$resultado=mysqli_query($conexao,$comando);
$linhas=mysqli_num_rows($resultado);

if($linhas==0){
	$comando2="DELETE FROM funcionarios WHERE 
	matricula=".$matricula;
	$resultado2 = mysqli_query($conexao,$comando2);
	if($resultado2==true){
		header("Location:  ../paginasSistema/registroFuncionarios.php?retorno=1");
	}else{
		header("Location:  ../paginasSistema/registroFuncionarios.php?retorno=0");
	}
	
}else{
	header("Location: ../paginasSistema/registroFuncionarios.php?retorno=2");
}

?>