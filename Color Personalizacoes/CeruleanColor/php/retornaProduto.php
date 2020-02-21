<?php

require_once("conexaoBanco.php");
$id=$_POST["id"];
$comando = "SELECT * FROM produtos WHERE categorias_id=".$id;
$resultado = mysqli_query($conexao, $comando);
$produtos = array();

while ($cadaProduto = mysqli_fetch_assoc($resultado)) {
array_push($produtos, $cadaProduto);
}

$options="<option value='0'>Produto*</option>";
foreach ($produtos as $cadaProduto) {
$options.='<option value="'.$cadaProduto['id'].'">'.$cadaProduto['nome'].'</option>';
}

echo $options;
?>
