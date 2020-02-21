<?php
require_once("conexaoBanco.php");

$idCliente=$_POST['idCliente'];

$comando="SELECT id FROM clientes WHERE id=".$idCliente;

echo $comando;

$resultado=mysqli_query($conexao, $comando);
$linhas=mysqli_num_rows($resultado);

if($linhas!=0){
	$comando2="DELETE FROM clientes WHERE
	id=".$idCliente;
	echo $comando2;

	$resultado2 = mysqli_query($conexao,$comando2);
	if($resultado2==true){
		header("Location:  ../paginasSistema/registroClientes.php?retorno=1");
	}else{
		
		header("Location:  ../paginasSistema/registroClientes.php?retorno=0");
	}

}else{
	header("Location: ../paginasSistema/registroClientes.php?retorno=2");
}

?>
