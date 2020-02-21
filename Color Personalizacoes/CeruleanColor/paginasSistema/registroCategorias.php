<?php
session_start();
if(isset($_SESSION['nivelLogado']) && $_SESSION['nivelLogado']==1){

require_once("../php/conexaoBanco.php");

 ?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="utf-8">
 <title> Registro de Categorias || Color </title>
<link rel="stylesheet" href="../css/registroCategorias.css">
<link rel="shortcut icon" href="../img/Favicon.ico" />
<script src="../js/registroCategorias.js"></script>
</head>
<body>
<header>
  <form method="POST" action="../php/efetuaLogout.php">
  <button type="submit"style="background-color: transparent; border: none; float: right"><img src="../img/iconsSistema/quit.png" alt="Sair do Sistema" id="saia"></button>


  </form> <br><br><a href="registrosGerente.php"><p id="voltar">Voltar</p></a>
</header>
<main>
<img src="../img/Logo.png" alt="Logo" id="LogoPrincipal">

<h2>Registro de Categorias</h2>

           <div id="fieldset">
           <?php
	if(isset($_GET['retorno'])==true){
		if($_GET['retorno']==1){
			include("../alertas/sucesso.html");
		}else if ($_GET['retorno']==0){
			include("../alertas/erro.html");
		}else if ($_GET['retorno']==2){
      include("../alertas/categoriaDuplicada.html");
    }
	}

	?>
               <form method="POST" action="../php/registraCategorias.php" onsubmit="return validaRegistro()">
               <label  id="txtNome" for="nome">Nome*:</label>
               <input type="text" name="nome" id="nome" class="caixas" maxlength="45"><br><br>

             <label for="descreve" id="descricao" for="descricao">Descrição*:</label><br>
             <textarea class="estilotextarea" id="descreve" name="descricao"></textarea>


              <button type="submit" id="registrar">Registrar</button>
</form>
              <div id="divisa"></div>
              <br>
              <div id="barra"></div>

              <form method="GET" action="registroCategorias.php" >
                  <label  id="txtNome">Nome da Categoria: </label>
                  <input type="text" name="buscaNomeCategoria" id="cat" >
                  <button type="submit" id="botaoPesquisa"><img src="../img/iconsSistema/pesquisaPequeno.png" alt="pesquisa" id="pesquisa"></button>
          </form>

              <div id="planoFundo">

              <table id="tabela">
                <tr>
                    <th id="th1">ID</th>
                  <th>Nome</th>
                  <th>Descrição</th>
                  <th id="th4">Ação</th>
                </tr>

                <?php
			require_once("../php/conexaoBanco.php");


			if(isset($_GET['buscaNomeCategoria'])==false){
				$comando="SELECT * FROM categorias";

			}else if (isset($_GET['buscaNomeCategoria'])==true
			&& $_GET['buscaNomeCategoria']==""){

				$comando="SELECT * FROM categorias";
			}else if (isset($_GET['buscaNomeCategoria'])==true
			&& $_GET['buscaNomeCategoria']!=""){

					$busca = $_GET['buscaNomeCategoria'];
					$comando="SELECT * FROM categorias WHERE
					nome LIKE '%".$busca."%'";
        }




      $resultado = mysqli_query($conexao,$comando);
       $linhas=mysqli_num_rows($resultado);

       if($linhas==0){		?>

        <tr>
          <td colspan="4">Nenhuma categoria encontrada</td>
        </tr>

       <?php }else{
					$categoriasRetornadas = array();

					while($cadaLinha = mysqli_fetch_assoc($resultado)){
						array_push($categoriasRetornadas,$cadaLinha);
					}
					foreach($categoriasRetornadas as $cadaCategoria){
					?>
					<tr>
					<td> <?php echo $cadaCategoria['id'];?></td>
					<td> <?php echo $cadaCategoria['nome'];?> </td>
					<td> <?php echo $cadaCategoria['descricao'];?> </td>
					<td class="tdborder">

            <form action="editaCategoriaForm.php" method="POST" class="formAcoes" id="editaform2">
            <input type="hidden" name="idCategoria" value="<?php echo $cadaCategoria["id"];?>">
              <button type="submit" class="buttonEditar">
                <img src="../img/iconsSistema/miniEditar.png" class="icons" id="editar2">
                </button>
                </form>

            <form action="../php/excluiCategoria.php" method="POST" class="formAcoes" id="apagaform2">
            <input type="hidden" id="idCategoria" name="idCategoria" value="<?php echo $cadaCategoria["id"];?>">
              <button type="submit" class="buttonApagar" onClick="return confirma()">
                <img src="../img/iconsSistema/miniApagar.png" class="icons" id="apagar2">
						    </button>
					      </form>
					</tr>
				<?php
					}//fechamento foreach
				}//fechamento else
         ?>



              </table>

            </div>





               </form>
             </div>


</main>



</body>
</html>


<?php }
else{
  header("Location: ../paginasSite/login.php");
}


 ?>
