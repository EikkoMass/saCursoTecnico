<?php 
require_once("conexaoBanco.php");
$matricula=$_POST['matricula'];
$nome=$_POST['nome'];
$usuario=$_POST['usuario'];
$senha=$_POST['senha'];
$cpf=$_POST['cpf'];
$email=$_POST['email'];
$nivel=$_POST['nivel'];

$bairro=$_POST['bairro'];
$rua=$_POST['rua'];
$numero=$_POST['numero'];
$cidade=$_POST['cidade'];
$cep=$_POST['CEP'];
$estado=$_POST['estado'];

$comando="UPDATE funcionarios SET nome='".$nome."', usuario='".$usuario."', senha='".$senha."', cpf=".$cpf.", email='".$email."', nivel=".$nivel.", rua='".$rua."', bairro='".$bairro."', numero=".$numero.", cidade='".$cidade."', estado='".$estado."', cep=".$cep." WHERE matricula=".$matricula;

$resultado=mysqli_query($conexao,$comando);

if($resultado==true){
    header("Location:  ../paginasSistema/registroFuncionarios.php?retorno=1");
}else{
   header("Location:  ../paginasSistema/registroFuncionarios.php?retorno=0");
}



?>