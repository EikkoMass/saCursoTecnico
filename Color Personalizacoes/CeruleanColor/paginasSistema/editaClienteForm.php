<?php
session_start();
if(isset($_SESSION['nivelLogado']) && $_SESSION['nivelLogado']==1){

require_once("../php/conexaoBanco.php");

 ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title> Edição de Clientes || Color </title>
<link rel="stylesheet" href="../css/editaClienteForm.css">
<link rel="shortcut icon" href="../img/Favicon.ico" />
<script src="../js/registroClientes.js"></script>
</head>
<body>
<header>
  <form method="POST" action="../php/efetuaLogout.php">
  <button type="submit"style="background-color: transparent; border: none; float: right"><img src="../img/iconsSistema/quit.png" alt="Sair do Sistema" id="saia"></button>


  </form>  <br><br><a href="registroClientes.php"><p id="voltar">Voltar</p></a>
</header>
<main>
<img src="../img/Logo.png" alt="Logo" id="LogoPrincipal">

<p id="titulo">Edição de Clientes</p>
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

    <?php

        require_once("../php/conexaoBanco.php");

        $idCliente=$_POST['idCliente'];

        $comando="SELECT * FROM clientes WHERE id=".$idCliente;



        $resultado=mysqli_query($conexao,$comando);


        $cliente=mysqli_fetch_assoc($resultado);




    ?>


    <form action="../php/editaCliente.php" method="POST">
      <fieldset id="dados">
          <legend>Dados</legend>
        <input class="inputsForm" type="hidden" name="idCliente" value="<?=$cliente['id'];?>"><br>
        <label id="tnome">Nome Completo:</label>
        <input type="text" name="nome" id="txtNome" class="textbox" value="<?=$cliente['nome'];?>"><br>



        <?php
        if($cliente['cpf']!=0){
        ?>
        <input type="hidden" name="inscricaoEstadual" id="inscricaoEstadual" class="textbox" value=0>
        <input type="hidden" name="cnpj" id="txtCNPJ" class="textbox" value=0 >
        <label id="tcpf" >CPF: </label>
        <input type="text" name="cpf" id="txtCPF" class="textbox" value="<?=$cliente['cpf'];?>"><br>
        <?php }if($cliente['cnpj']!=0){
        ?>
          <input type="hidden" name="cpf" id="txtCPF" class="textbox" value=0>
        <LABEL id="tcnpj">CNPJ:</LABEL>
        <input type="text" name="cnpj" id="txtCNPJ" class="textbox" value="<?=$cliente['cnpj'];?>" ><br>
        <label id="tinscricao">Inscrição Estadual: </label>
        <input type="text" name="inscricaoEstadual" id="inscricaoEstadual" class="textbox" value="<?=$cliente['inscricao_estadual'];?>"><br>
        <?php
      }?>





        <label id="temail">Email:</label>
        <input type="text" name="email" id="txtEmail" class="textbox" value="<?=$cliente['email'];?>"><br>
        <label id="ttel1">Telefone1: </label>
        <input type="text" name="telefone1" id="txtTel1" class="textbox" value="<?=$cliente['telefone'];?>"><br>
        <label id="ttel2">Telefone2:</label>
        <input type="text" name="telefone2" id="txtTel2" class="textbox" value="<?=$cliente['telefone2'];?>"><br>
</fieldset>
      <fieldset id="endereco">
          <legend>Endereço</legend>
      <label id="tbairro">Bairro:</label>
        <input type="text" name="bairro" id="txtBairro" class="textbox" value="<?=$cliente['bairro'];?>"><br>
        <label id="tnumero">Numero:</label>
        <input type="text" name="numero" id="txtNumero" class="textbox" value="<?=$cliente['numero'];?>">
        <br>
        <label id="trua">Rua:</label>
        <input type="text" name="rua" id="txtRua" class="textbox" value="<?=$cliente['rua'];?>"><br>
        <label id="tcep">CEP:</label>
        <input type="text" name="CEP" id="txtCEP" class="textbox" value="<?=$cliente['cep'];?>"><br>
        <label id="tcidade">Cidade:</label>
        <input type="text" name="cidade" id="txtCidade" class="textbox" value="<?=$cliente['cidade'];?>"><br>



        <label id="testado">Estado:</label>
        <select name="estado" id="txtEstado" >
        <option value="<?=$cliente['estado'];?>"><?=$cliente['estado'];?></option>
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

</fieldset>
      <button type="submit" id="registrar">Editar</button>
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
