<?php
session_start();
if(isset($_SESSION['nivelLogado']) && $_SESSION['nivelLogado']==1){

require_once("../php/conexaoBanco.php");

 ?>


<?php
require_once("../php/conexaoBanco.php"); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title> Edição de Produtos || Color </title>
<link rel="stylesheet" href="../css/editaProdutoForm.css">
<link rel="shortcut icon" href="../img/Favicon.ico" />
<script src="../js/editaProdutoForm.js"></script>
</head>
<body>
<header>
  <form method="POST" action="../php/efetuaLogout.php">
  <button type="submit"style="background-color: transparent; border: none; float: right"><img src="../img/iconsSistema/quit.png" alt="Sair do Sistema" id="saia"></button>


  </form><br><br><a href="registroProdutos.php"><p id="voltar">Voltar</p></a>
</header>
<main>
<img src="../img/Logo.png" alt="Logo" id="LogoPrincipal">

<h2>Edição de Produto</h2>

  <div id="corpo">

<?php
if (isset($_GET["retorno"]) && $_GET["retorno"]==0) {
require("../alertas/sucesso.html");
}else if(isset($_GET["retorno"]) && $_GET["retorno"]==1){
  require("../alertas/erro.html");
}




 ?>
 <?php

  $idProduto = $_POST['idProduto'];



	//echo "ID do produto: ".$idProduto;

	$comando="SELECT * FROM produtos WHERE
    id=".$idProduto;

   // echo $comando;


	$resultado=mysqli_query($conexao,$comando);
  $produto=mysqli_fetch_assoc($resultado);

	//echo $produto['idProduto']."<br>";
	//echo $produto['nomeProduto']."<br>";
  //echo $produto['fornecedorProduto']."<br>";
  //echo $produto['precoProduto']."<br>";

?>
<form method="POST" action="../php/editaProduto.php" onsubmit="return validaRegistro()" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php

echo $idProduto;
?>">
<input type="hidden" value="<?=$produto['imagens']?>" name=imgGera>
        <label for="nome">Nome*</label>
        <input type="text" name="nome" id="nome" class="caixas" value="<?=$produto['nome'];?>"> <br>

        <label for="categoria">Categoria*</label>
        <select name="categoria" id="categoria" class="caixas" value="<?=$produto['categorias_id'];?>">
        <option value="">Selecione</option>
        <?php
          $categoriado = $_POST['idCategoria'];
          $comandado = "SELECT id,nome FROM categorias";
          $resultado = mysqli_query($conexao, $comandado);
          $categorias = array();

          while($cadaCat = mysqli_fetch_assoc($resultado)){
            array_push($categorias, $cadaCat);
          }

          foreach($categorias as $cadaCat){
            if($cadaCat['id']==$produto['categorias_id']){
        ?>

        <option value="<?=$cadaCat['id'];?>" selected="selected">
          <?=$cadaCat["nome"];?>
        </option>
              <?php
              }else{
                ?>
<option value="<?=$cadaCat['id'];?>">
          <?=$cadaCat["nome"];?>
                <?php
      }
    }
      ?>
        </select><br>

        <label for="fornecedor">Fornecedor*</label>
        <input type="text" name="fornecedor" id="fornecedor" class="caixas" value="<?=$produto['fornecedor'];?>"><br>


        <label for="precoUN">Preço Unitario*</label>
        <input type="text" name="precoUN" id="precoUN" class="caixas" value="<?=$produto['preco_unidade'];?>"> <br>

        <label for="imginsert">Inserir Imagem*</label>
        <input type="file" name="imginsert" class="boximg" accept="image/png, image/jpeg"  multiple />


        <button type="submit" id="registrar">Editar</button>

      </form>

</main>
<footer id="rodape">

</footer>

</body>
</html>

<?php }
else{
  header("Location: ../paginasSite/login.php");
}


 ?>
