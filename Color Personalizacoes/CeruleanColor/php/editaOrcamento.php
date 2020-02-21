<?php
require_once("conexaoBanco.php");

$idOrcamento=$_POST['idOrcamento'];


$comando="DELETE FROM  orcamentos_tem_produtos WHERE orcamentos_id=".$idOrcamento;



$resultado1=mysqli_query($conexao,$comando);

$comando2="DELETE FROM orcamentos WHERE id=".$idOrcamento;

$resultado2=mysqli_query($conexao,$comando2);

$matriculaFuncionario=$_POST['matriculaFuncionario'];

$idCliente=$_POST['cliente'];
$valorTotal=$_POST['valorTotal'];
$dataEmissao=$_POST['dateNow'];
$local=$_POST['localEntrega'];
$desconto=$_POST['desconto'];
$parcelas=$_POST['parcelas'];
$local=$_POST['localEntrega'];
$arraycategorias= array();
$arraycategorias=$_POST['categoria'];
$arrayprodutos= array();
$arrayprodutos=$_POST['produtos'];
$arrayvalorUnitario= array();
$arrayvalorUnitario=$_POST['valorUnitario'];
$arraydescricao=array();
$arraydescricao=$_POST['descricao'];
$arrayquantidade=array();
$arrayquantidade=$_POST['quantidade'];

$comando3="INSERT INTO orcamentos (id, desconto, parcelas, preco_total, clientes_id, funcionarios_matricula, status, dt_emissao, local) VALUES
(".$idOrcamento.", ".$desconto.", ".$parcelas.", ".$valorTotal.", ".$idCliente.", ".$matriculaFuncionario.", 1,  '".$dataEmissao."', '".$local."' )";

$resultado3=mysqli_query($conexao,$comando3);

$tamanho=sizeof($arrayprodutos);

for($i=0; $i<$tamanho; $i++){
    $comando4="INSERT INTO orcamentos_tem_produtos (produtos_id, orcamentos_id, descricao, quantidade, preco_unico) VALUES (".$arrayprodutos[$i].", ".$idOrcamento.", '".$arraydescricao[$i]."', ".$arrayquantidade[$i].", ".$arrayvalorUnitario[$i].")";
    echo $comando4;
    $resultado4=mysqli_query($conexao,$comando4);
}
if($resultado4==true){
    header("Location: ../paginasSistema/orcamento.php?retorno=1");
}else{
   header("Location: ../paginasSistema/orcamento.php?retorno=2");
}






?>
