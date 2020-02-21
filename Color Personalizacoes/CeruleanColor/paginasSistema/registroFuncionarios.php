<?php
session_start();
if(isset($_SESSION['nivelLogado']) && $_SESSION['nivelLogado']==1){

require_once("../php/conexaoBanco.php");

 ?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title> Registro de Funcionários || Color </title>
<link rel="stylesheet" href="../css/registroFuncionarios.css">
<link rel="shortcut icon" href="../img/Favicon.ico" />
<script src="../js/registroFuncionarios.js"></script>
</head>
<body>
<header>
  <form method="POST" action="../php/efetuaLogout.php">
  <button type="submit"style="background-color: transparent; border: none; float: right"><img src="../img/iconsSistema/quit.png" alt="Sair do Sistema" id="saia"></button>


  </form>  <br><br><a href="registrosGerente.php"><p id="voltar">Voltar</p></a>
</header>
<main>
<img src="../img/Logo.png" alt="Logo" id="LogoPrincipal">

<p id="titulo">Registro de Funcionários</p>



<div id="conteudo">

<?php
	if(isset($_GET['retorno'])==true){
		if($_GET['retorno']==1){
			include("../alertas/sucesso.html");
		}else if ($_GET['retorno']==0){
			include("../alertas/erro.html");
		}
	}

	?>
  <form action="../php/registraFuncionario.php" method="POST" onsubmit="return validaRegistro()" >

    <fieldset id="fieldendereco">
      <div id="boxEndereco">
      <input type="text" name="bairro" id="txtBairro" class="textbox" placeholder="Digite seu Bairro *">
      <input type="text" name="numero" id="txtNumero" class="textbox" placeholder="Digite seu Nrº *">
      <br>
      <input type="text" name="rua" id="txtRua" class="textbox" placeholder="Digite sua rua *">

      <input type="text" name="cidade" id="txtCidade" class="textbox" placeholder="Digite a Cidade *">
      <input type="text" name="cep" id="txtCEP" class="textbox" placeholder="Digite o CEP *"><br>
      <select name="estado" id="txtEstado" class="textbox">
          <option value="0">Selecione um Estado</option>
          <option value="AC">AC</option>
          <option value="AL">AL</option>
          <option value="AP">AP</option>
          <option value="AM">AM</option>
          <option value="BA">BA</option>
          <option value="CE">CE</option>
          <option value="DF">DF</option>
          <option value="ES">ES</option>
          <option value="GO">GO</option>
          <option value="MA">MA</option>
          <option value="MT">MT</option>
          <option value="MS">MS</option>
          <option value="MG">MG</option>
          <option value="PA">PA</option>
          <option value="PB">PB</option>
          <option value="PR">PR</option>
          <option value="PE">PE</option>
          <option value="PI">PI</option>
          <option value="RJ">RJ</option>
          <option value="RN">RN</option>
          <option value="RS">RS</option>
          <option value="RO">RO</option>
          <option value="RR">RR</option>
          <option value="SC">SC</option>
          <option value="SP">SP</option>
          <option value="SE">SE</option>
          <option value="TO">TO</option>

      </select>
    </div>
  </fieldset>

    <br>
    <div id="pt1">
    <input type="text" name="nome" id="txtNome" class="textbox" placeholder="Digite o Nome *">

    <input type="text" name="usuario" id="txtUsuario" class="textbox" placeholder="Digite o Usuário *">
<br>
    <input type="text" name="senha" id="txtSenha" class="textbox" placeholder="Digite a senha *"><br>
    <input type="text" name="cpf" id="txtCPF" class="textbox" placeholder="Digite o CPF *"><br>
    <input type="text" name="email" id="txtEmail" class="textbox" placeholder="Digite o E-mail *"><br>

    <select id="nivel" name="nivel">
      <option value="0" id="seletor" selected>Nível...</option>
      <option value="1">Gerente</option>
      <option value="2">Executor</option>
      <option value="3">Atendente</option>
    </select><br>
  </div><br>
  <button type="submit" id="registrar">Registrar</button>
  </form>
  <br><br>
<div id="divisa"></div>
<br>
<div id="barra">
  <form method="POST" action="registroFuncionarios.php" >
<label for="buscaNome" id="nometxtpesquisa">Nome do Funcionário: </label>
<input type="text" name="buscaNome" id="nome">
<button type="submit" id="botaoPesquisa"><img src="../img/iconsSistema/pesquisaPequeno.png" alt="pesquisa" id="pesquisa"></button>
</form>
</div>
<br><br>

<div id="planoFundo">
  <table>
    <tr>
      <th id="th1">Nome</th>
      <th>Usuário</th>
      <th>CPF</th>
      <th>E-mail</th>
      <th>Nível</th>
      <th>Rua</th>
      <th>Bairro</th>
      <th>Número</th>
      <th>Cidade</th>
      <th id="th11">Ação</th>
    </tr>
    <?php
    require_once("../php/conexaoBanco.php");
    if(isset($_POST['buscaNome'])==false){
      $comando="SELECT * FROM funcionarios WHERE nivel!=1";

    }else if (isset($_POST['buscaNome'])==true
    && $_POST['buscaNome']==""){

      $comando="SELECT * FROM funcionarios WHERE nivel!=1";
    }else if (isset($_POST['buscaNome'])==true
    && $_POST['buscaNome']!=""){

        $busca = $_POST['buscaNome'];
        $comando="SELECT * FROM funcionarios WHERE nome LIKE '%".$busca."%' AND nivel!=1";
      }
      $resultado = mysqli_query($conexao,$comando);
      $linhas=mysqli_num_rows($resultado);



			if($linhas==0){		?>
    <tr>
				<td colspan="10">Nenhum funcionário encontrado</td>
			</tr>

			<?php
				}
    else{
      $funcionariosRetornados = array();

      while($cadaLinha = mysqli_fetch_assoc($resultado)){
        array_push($funcionariosRetornados,$cadaLinha);
      }
      foreach($funcionariosRetornados as $cadaFuncionario){
      ?>

      <tr>

      <td> <?php echo $cadaFuncionario['nome'];?> </td>
      <td> <?php echo $cadaFuncionario['usuario'];?> </td>
      <td> <?php echo $cadaFuncionario['cpf'];?> </td>
      <td> <?php echo $cadaFuncionario['email'];?> </td>
      <td> <?php echo $cadaFuncionario['nivel'];?> </td>
      <td> <?php echo $cadaFuncionario['rua'];?> </td>
      <td> <?php echo $cadaFuncionario['bairro'];?> </td>
      <td> <?php echo $cadaFuncionario['numero'];?> </td>
      <td> <?php echo $cadaFuncionario['cidade'];?> </td>
      <td class="tdborder">
        <form action="editaFuncionarioForm.php" method="POST" class="formato" id="editaform2">
        <input id="matricula" type="hidden" name="matricula" value="<?php echo $cadaFuncionario['matricula'];?>">
          <button type="submit" class="buttonEditar"><img src="../img/iconsSistema/miniEditar.png" alt="Editar Conteúdo" id="editar2" class="icons"></button>
        </form>
        <form action="../php/excluiFuncionario.php" method="POST" class="formato" id="apagaform2">
        <input id="matricula" type="hidden" name="matricula" value="<?php echo $cadaFuncionario['matricula'];?>">
          <button type="submit" class="buttonApagar" onClick="return confirma()"><img src="../img/iconsSistema/miniApagar.png" alt="Apagar conteúdo" id="apagar2" class="icons"></button>
        </form>
      </td>

      </tr>




    <?php
      }//fechamento foreach
    }//fechamento else
     ?>





  </table>
</div>



</div>

</main>


</body>
</html>
<?php }
else{
  header("Location: ../paginasSite/login.php");
}


 ?>
