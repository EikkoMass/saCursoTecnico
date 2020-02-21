<?php

require_once("conexaoBanco.php");

$nome=$_POST['nome'];


$cpf=$_POST['cpf'];
$cnpj=$_POST['cnpj'];
$inscricaoEstadual=$_POST['inscricaoEstadual'];
$select=$_POST['select'];
if($select=="pf"){
    $cnpj="NULL";
    $inscricaoEstadual="NULL";
}if($select=="pj"){
    $cpf="NULL";

}

$email=$_POST['email'];
$telefone1=$_POST['telefone1'];
$telefone2=$_POST['telefone2'];

$bairro=$_POST['bairro'];
$rua=$_POST['rua'];
$numero=$_POST['numero'];
$cidade=$_POST['cidade'];
$cep=$_POST['CEP'];
$estado=$_POST['estado'];

if($inscricaoEstadual==""){
    $inscricaoEstadual="NULL";
}
if($cpf==""){
    $cpf="NULL";
}
if($cnpj==""){
    $cnpj="NULL";
}

$comando="INSERT INTO clientes (inscricao_estadual, nome, email, telefone, rua, bairro, numero, cidade, estado, cep, cpf, cnpj, telefone2) VALUES (".$inscricaoEstadual.", '".$nome."', '".$email."', ".$telefone1.", '".$rua."', '".$bairro."', ".$numero.", '".$cidade."', '".$estado."', ".$cep.", ".$cpf.", ".$cnpj.", ".$telefone2.")";



$resultado=mysqli_query($conexao,$comando);

if($resultado==true){

    header("Location: ../paginasSistema/registroClientesAte.php?retorno=1");

    }else{

    header("Location: ../paginasSistema/registroClientesAte.php?retorno=0");

    }

?>
