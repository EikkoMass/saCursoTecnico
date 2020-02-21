<?php 
require_once("conexaoBanco.php");
$id=$_POST['idCliente'];
$nome=$_POST['nome'];
$cpf=$_POST['cpf'];
$cnpj=$_POST['cnpj'];
$inscricaoEstadual=$_POST['inscricaoEstadual'];
$email=$_POST['email'];
$telefone1=$_POST['telefone1'];
$telefone2=$_POST['telefone2'];

$bairro=$_POST['bairro'];
$rua=$_POST['rua'];
$numero=$_POST['numero'];
$cidade=$_POST['cidade'];
$cep=$_POST['CEP'];
$estado=$_POST['estado'];


$comando="UPDATE clientes SET inscricao_estadual=".$inscricaoEstadual.", nome='".$nome."', email='".$email."', telefone=".$telefone1.", rua='".$rua."', bairro='".$bairro."', numero=".$numero.", cidade='".$cidade."', estado='".$estado."', cep=".$cep.", cpf=".$cpf.", cnpj=".$cnpj.", telefone2=".$telefone2." WHERE id=".$id;


$resultado=mysqli_query($conexao,$comando);

if($resultado==true){
    header("Location:  ../paginasSistema/registroClientes.php?retorno=1");
}else{
   header("Location:  ../paginasSistema/registroClientes.php?retorno=0");
}


?>