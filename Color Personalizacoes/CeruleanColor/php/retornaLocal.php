<?php
include_once("conexaoBanco.php");

$id = $_POST['id'];

$comando = "SELECT rua, bairro, numero, cidade, estado FROM clientes WHERE id=".$id;

$resultado = mysqli_query($conexao, $comando);
$resulta = array();
$resulta = mysqli_fetch_assoc($resultado);
 ?>
<?php echo $resulta['estado'].", ".$resulta["cidade"].", ".$resulta['bairro'].", ".$resulta['rua'].", ".$resulta['numero']; ?>
