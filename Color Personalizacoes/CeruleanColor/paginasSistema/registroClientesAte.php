<?php
session_start();
if(isset($_SESSION['nivelLogado']) && $_SESSION['nivelLogado']==3){

require_once("../php/conexaoBanco.php");

 ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title> Registro de Clientes || Color </title>
<link rel="stylesheet" href="../css/registroClientesAte.css">
<link rel="shortcut icon" href="../img/Favicon.ico" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="../js/registroClientes.js"></script>
</head>
<body>
<header>
  <form method="POST" action="../php/efetuaLogout.php">
  <button type="submit"style="background-color: transparent; border: none; float: right"><img src="../img/iconsSistema/quit.png" alt="Sair do Sistema" id="saia"></button>


  </form>  <br><br><a href="principalAtendente.php"><p id="voltar">Voltar</p></a>
</header>
<main>
<img src="../img/Logo.png" alt="Logo" id="LogoPrincipal">

<p id="titulo">Registro de Clientes</p>
<div id="conteudo">
  <h2 id="colorir">Dados</h2>
  <form action="../php/registraClientesAte.php" method="POST" onsubmit="return registraClientes()">

    <fieldset id="fieldendereco">

      <div id="boxEndereco">
      <input type="text" name="bairro" id="txtBairro" class="textbox" placeholder="Digite seu Bairro *">
      <input type="text" name="numero" id="txtNumero" class="textbox" placeholder="Digite seu Nrº *">
      <br>
      <input type="text" name="rua" id="txtRua" class="textbox" placeholder="Digite a rua *">
      <input type="text" name="CEP" id="txtCEP" class="textbox" placeholder="Digite o CEP *"><br>
      <input type="text" name="cidade" id="txtCidade" class="textbox" placeholder="Digite a Cidade *"><br>




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

<?php
	if(isset($_GET['retorno'])==true){
		if($_GET['retorno']==1){
			include("../alertas/sucesso.html");
		}else if ($_GET['retorno']==0){
			include("../alertas/erro.html");
		}
	}

	?>
    <input type="text" name="nome" id="txtNome" class="textbox" placeholder="Digite o Nome*">
<br>


      <select name="select" id="select" class="textbox" onClick="apagaCampo()">
      <option value="" selected()>Selecione</option>
        <option value="pf" id="selecionaPF" onClick="apagaInput()">Pessoa Física</option>
        <option value="pj"  id="selecionaPJ" onClick="apagaInput()">Pessoa Juridica</option>

      </select>


  <div id=pai>
    <div id="pf">
      <input type="text" name="cpf" id="txtCPF" class="textbox"  placeholder="Digite o CPF" ><br>
    </div>
    <div id="pj">
      <input type="text" name="cnpj" id="txtCNPJ" class="textbox"   placeholder="Digite o CNPJ " ><br>
    <input type="text" name="inscricaoEstadual" id="inscricaoEstadual" class="textbox" placeholder="Digite a Inscrição Estadual" ><br>
    </div>
    </div>
    <input type="text" name="email" id="txtEmail" class="textbox" placeholder="Digite o E-mail *"><br>

    <input type="text" name="telefone1" id="txtTel1" class="textbox" placeholder="Digite o telefone primário *"><br>
    <input type="text" name="telefone2" id="txtTel2" class="textbox" placeholder="Digite o telefone secundário"><br>



  </div>
  <button type="submit" id="registrar">Registrar</button>
  </form>
  <br><br>
<div id="divisa"></div>
<br>
<div id="barra">
  <form method="POST" action="registroClientes.php" >
<label for="nome">Nome do Cliente: </label>
<input type="text" name="buscaNome" id="nome">
<button type="submit" id="botaoPesquisa"><img src="../img/iconsSistema/pesquisaPequeno.png" alt="pesquisa" id="pesquisa"></button>
</form>
</div>
<br><br>

<div id="planoFundo">
  <table>
    <tr>
      <th id="th1">Nome</th>
      <th>CPF/CPNJ</th>
      <th>E-mail</th>
      <th>Telefone 1</th>
      <th>CEP</th>
      <th>Número</th>
      <th id="th10">Ações</th>
    </tr>
    <?php
    require_once("../php/conexaoBanco.php");
    if(isset($_POST['buscaNome'])==false){
      $comando="SELECT * FROM clientes";

    }else if (isset($_POST['buscaNome'])==true
    && $_POST['buscaNome']==""){

      $comando="SELECT * FROM clientes";
    }else if (isset($_POST['buscaNome'])==true
    && $_POST['buscaNome']!=""){

        $busca = $_POST['buscaNome'];
        $comando="SELECT * FROM clientes WHERE nome LIKE '%".$busca."%'";
      }
      $resultado = mysqli_query($conexao,$comando);
      $linhas=mysqli_num_rows($resultado);
      if($linhas==0){		?>
        <tr>
            <td colspan="7">Nenhum cliente encontrado</td>
          </tr>

          <?php
            }
        else{
          $clientesRetornados = array();

          while($cadaLinha = mysqli_fetch_assoc($resultado)){
            array_push($clientesRetornados,$cadaLinha);
          }
          foreach($clientesRetornados as $cadaCliente){
          ?>

          <tr>

          <td> <?php echo $cadaCliente['nome'];?> </td>


          <td> <?php
            if($cadaCliente['cnpj']==0){

          echo $cadaCliente['cpf'];
            }else{
              echo $cadaCliente['cnpj'];
            }



          ?> </td>


          <td> <?php echo $cadaCliente['email'];?> </td>
          <td> <?php echo $cadaCliente['telefone'];?> </td>
          <td> <?php echo $cadaCliente['cep'];?> </td>
          <td> <?php echo $cadaCliente['numero'];?> </td>


          <td class="tdborder">

            <form action="editaClienteFormAte.php" method="POST" class="formato" id="editaform2">
                <input type="hidden" name="idCliente" value="<?php echo $cadaCliente['id'];?>">
                <button type="submit" class="buttonEditar"><img src="../img/iconsSistema/miniEditar.png" alt="Editar Conteúdo" id="editar2" class="icons"></button>
            </form>
            <form action="../php/excluiCliente.php" method="POST" class="formato" id="apagaform2">
            <input id="idcliente" type="hidden" name="idCliente" value="<?php echo $cadaCliente['id'];?>">
                <button type="submit" class="buttonApagar" onClick="confirma()"><img src="../img/iconsSistema/miniApagar.png" alt="Apagar conteúdo" id="apagar2" class="icons"></button>
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
