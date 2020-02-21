<?php
session_start();
if(isset($_SESSION['nivelLogado']) && $_SESSION['nivelLogado']==1){

require_once("../php/conexaoBanco.php");

 ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="utf-8">
 <title> Edição de Categorias || Color </title>
<link rel="stylesheet" href="../css/editaCategoriaForm.css">
<link rel="shortcut icon" href="../img/Favicon.ico" />
</head>
<body>
<header>
  <form method="POST" action="../php/efetuaLogout.php">
  <button type="submit"style="background-color: transparent; border: none; float: right;"><img src="../img/iconsSistema/quit.png" alt="Sair do Sistema" id="saia"></button>


  </form> <br><br><a href="registroCategorias.php"><p id="voltar">Voltar</p></a>
</header>
<main>
<img src="../img/Logo.png" alt="Logo" id="LogoPrincipal">



<h2>Edição de Categorias</h2>

<?php
	require_once("../php/conexaoBanco.php");

	$idCategoria = $_POST['idCategoria'];


	//echo "ID da categoria: ".$idCategoria;

	$comando="SELECT * FROM categorias WHERE
    id=".$idCategoria;

   // echo $comando;





	$resultado=mysqli_query($conexao,$comando);

	$categoria=mysqli_fetch_assoc($resultado);
	//echo $categoria['idCategoria']."<br>";
	//echo $categoria['nomeCategoria']."<br>";
	//echo $categoria['descricaoCategoria']."<br>";

?>

           <div id="fieldset">
               <form method="POST" action="../php/editaCategoria.php" onsubmit="return validaRegistro()">

              <input class="inputsForm" type="hidden" name="idCategoria" value="<?=$categoria['id'];?>">

               <label  id="txtNome">Nome*:</label>
               <input type="text" name="nome" id="nome" class="caixas" value="<?=$categoria['nome'];?>"><br><br>

               <label for="descreve" id="descricao">Descrição*:</label><br>
               <textarea class="estilotextarea" id="descreve" name="descricao" ><?=$categoria['descricao'];?></textarea>


               <button type="submit" id="registrar">Editar</button>
               </form>

</main>




</body>
</html>

<?php }
else{
  header("Location: ../paginasSite/login.php");
}


 ?>
