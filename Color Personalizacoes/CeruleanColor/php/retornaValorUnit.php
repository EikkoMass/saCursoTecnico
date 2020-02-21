<?php

require_once("conexaoBanco.php");
$id=$_POST["id"];
$comando = "SELECT preco_unidade FROM produtos WHERE id=".$id;
$resultado = mysqli_query($conexao, $comando);
$vlu = array();

$vlu = mysqli_fetch_assoc($resultado);


?>
<?=$vlu['preco_unidade'];?>
