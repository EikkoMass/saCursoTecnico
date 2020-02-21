<?php
session_start();
if(isset($_SESSION['nivelLogado']) && $_SESSION['nivelLogado']==1){

require_once("../php/conexaoBanco.php");

 ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title> Registro de Produtos || Color </title>
<link rel="stylesheet" href="../css/registroProdutos.css">
<link rel="shortcut icon" href="../img/Favicon.ico" />
<script src="../js/registroProdutos.js"></script>
</head>
<body>
<header>
  <form method="POST" action="../php/efetuaLogout.php">
  <button type="submit"style="background-color: transparent; border: none; float: right"><img src="../img/iconsSistema/quit.png" alt="Sair do Sistema" id="saia"></button>


  </form><br><br><a href="registrosGerente.php"><p id="voltar">Voltar</p></a>
</header>
<main>
<img src="../img/Logo.png" alt="Logo" id="LogoPrincipal">

<h2>Registro de Produto</h2>

  <div id="corpo">
      <form action="../php/validaProduto.php" method="POST" id="baseCorpo" enctype="multipart/form-data">

<?php
if (isset($_GET["retorno"]) && $_GET["retorno"]==0) {
require("../alertas/sucesso.html");
}else if(isset($_GET["retorno"]) && $_GET["retorno"]==1){
  require("../alertas/erro.html");

}


 ?>


        <label for="nome">Nome*</label>
        <input type="text" name="nome" id="nome" class="caixas" > <br>

        <label for="categoria">Categoria*</label>
        <select name="categoria" id="categoria" class="caixas">

<option value="0">Selecione</option>
          <?php
          $comando = "SELECT id,nome FROM categorias";
          $resultado = mysqli_query($conexao, $comando);
          $categorias = array();

          while($cadaCat = mysqli_fetch_assoc($resultado)){
            array_push($categorias, $cadaCat);
          }
          foreach($categorias as $cadaCat){

            if($cadaCat['id']==$nome['nome']){

            }
?>
  <option value="<?=$cadaCat['id'];?>"><?=$cadaCat["nome"];?></option>
        <?php
      }
         ?>
        </select><br>

        <label for="fornecedor">Fornecedor*</label>
        <input type="text" name="fornecedor" id="fornecedor" class="caixas"><br>

        <label for="precoUN">Preço Unitario*</label>
        <input type="text" name="precoUN" id="precoUN" class="caixas" maxlength="4"> <br>

        <label for="imginsert">Inserir Imagem*</label>
        <input type="file" name="imginsert" class="boximg"  accept="image/png, image/jpeg"  multiple />

        <button type="submit" id="registrar">Registrar</button>

      </form>
  </div>


  <div id="linha"></div>


  <div id="fieldset">
    <h1>Pesquisa de Produtos</h1>

                <form action="#" method="GET" id="busca">
                  <label for="nomeBusca" id="titulo">Nome do Produto: </label>
                <input type="text" name="nomeBusca" id="nomeBusca">
                <button type="submit" id="botaoPesquisa"><img src="../img/iconsSistema/pesquisa.png" alt="pesquisa" id="pesquisa"></button>
              </form><br><br>

                <br><br>

                <div id="tabela">
                <div id="rolagem">
                <table id="tabel">
                
                  <thead>
                    <tr id="cabeca">
                      <th class="thborder" id="th1">Código</th>
                      <th class="thborder">Nome</th>
                      <th class="thborder">categoria</th>
                      <th class="thborder">Fornecedor</th>
                      <th class="thborder">Preço Unitário</th>
                      <th class="thborder" id="th6">Ação</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      if(isset($_GET['nomeBusca']) && $_GET['nomeBusca']!=""){
                        $comando2= "SELECT * FROM produtos WHERE nome='".$_GET['nomeBusca']."'";
                      }else if (isset($_GET['nomeBusca']) && $_GET['nomeBusca']=="") {
                        $comando2 = "SELECT * FROM produtos";
                      }elseif (isset($_GET['nomeBusca'])==false) {
                        $comando2 = "SELECT * FROM produtos";
                      }
                      $resultado2= mysqli_query($conexao, $comando2);
                      $linha = mysqli_num_rows($resultado2);

                      if ($linha==0) {
                        ?>
                        <tr><td colspan="6">Nenhum Produto encontrado</td></tr>
                      <?php
                    }else {
                      $produtos = array();
                      while($cadaProduto = mysqli_fetch_assoc($resultado2)){
                        array_push($produtos, $cadaProduto);
                      }

                      foreach ($produtos as $cadaProduto) {
                      ?>
                      <tr>
                        <td class="tdborder"><?=$cadaProduto['id'];?></td>
                        <td class="tdborder"><?=$cadaProduto['nome'];?></td>
                        <td class="tdborder"><?=$cadaProduto['categorias_id'];?></td>
                        <td class="tdborder"><?=$cadaProduto['fornecedor'];?></td>
                        <td class="tdborder"><?=$cadaProduto['preco_unidade'];?></td>
                        <td class="tdborder">
            <form action="editaProdutoForm.php" method="POST" class="formato" id="editaform1">
            <input type="hidden" value="<?=$cadaProduto['id']?>" name="idProduto">
              <button type="submit" class="buttonEditar">
                <img src="../img/iconsSistema/miniEditar.png" alt="Editar Conteúdo" id="editar1" class="icons">
              </button>
            </form>
            <form action="../php/excluiProduto.php" onsubmit="return confirma()" method="POST" class="formato" id="apagaform1">
            <input type="hidden" value="<?=$cadaProduto['id'];?>" name="idProduto" id="idProdutoEx">
              <button type="submit" class="buttonApagar">
                <img src="../img/iconsSistema/miniApagar.png" alt="Apagar conteúdo" id="apagar1" class="icons">
              </button>
            </form>
          </td>
                  </tr>
                      <?php
                    }
                    }
                    ?>
        </tr></tbody>
        
                </table>
                </div>       
    </div> 
  

</main>
<footer id="rodape"></footer>

</body>
</html>

<?php }
else{
  header("Location: ../paginasSite/login.php");
}


 ?>
