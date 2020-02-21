<?php 
require_once("conexaoBanco.php");

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
$cep=$_POST['cep'];
$estado=$_POST['estado'];


$comando="INSERT INTO funcionarios (nome, usuario, senha, cpf, email, nivel, rua, bairro, numero, cidade, estado, cep) VALUES ('".$nome."', '".$usuario."', '".$senha."', ".$cpf.",'".$email."', ".$nivel.", '".$rua."', '".$bairro."', ".$numero.", '".$cidade."', '".$estado."', ".$cep." )";

$resultado=mysqli_query($conexao,$comando);

if($resultado==true){
    
    header("Location: ../paginasSistema/registroFuncionarios.php?retorno=1");
        
    }else{
        
    header("Location: ../paginasSistema/registroFuncionarios.php?retorno=0");
    
    }
?>