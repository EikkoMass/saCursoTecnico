<?php
session_start();
if(isset($_SESSION['nivelLogado']) && $_SESSION['nivelLogado']==1){

require_once("../php/conexaoBanco.php");

 ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title> Edição de Funcionário || Color </title>
<link rel="stylesheet" href="../css/editaFuncionarioForm.css">
<link rel="shortcut icon" href="../img/Favicon.ico" />
<script src="../js/registroFuncionarios.js"></script>
</head>
<body>
<header>
  <form method="POST" action="../php/efetuaLogout.php">
  <button type="submit"style="background-color: transparent; border: none; float: right"><img src="../img/iconsSistema/quit.png" alt="Sair do Sistema" id="saia"></button>


  </form>  <br><br><a href="registroFuncionarios.php"><p id="voltar">Voltar</p></a>
</header>
<main>
<img src="../img/Logo.png" alt="Logo" id="LogoPrincipal">

<p id="titulo">Edição de Funcionário</p>
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

        $matricula=$_POST['matricula'];

        $comando="SELECT * FROM funcionarios WHERE matricula=".$matricula;



        $resultado=mysqli_query($conexao,$comando);


        $funcionario=mysqli_fetch_assoc($resultado);




    ?>


    <form action="../php/editaFuncionario.php" method="POST">
      <fieldset id="dados">
          <legend>Dados</legend>
          <div id="pt1">

              <input type="hidden" name="matricula" id="matricula" value="<?=$funcionario['matricula'];?>">
          <label id="tnome">Nome Completo:</label>
          <input type="text" name="nome" id="txtNome" class="textbox" value="<?=$funcionario['nome'];?>">
<label id="tusuario">Usuario:</label>
<input type="text" name="usuario" id="txtUsuario" class="textbox" value="<?=$funcionario['usuario'];?>">
<br>
<label id="tsenha">Senha:</label>
<input type="text" name="senha" id="txtSenha" class="textbox" value="<?=$funcionario['senha'];?>"><br>
<label id="tcpf" >CPF: </label>
<input type="text" name="cpf" id="txtCPF" class="textbox" value="<?=$funcionario['cpf'];?>"><br>
<label id="temail">Email:</label>
<input type="text" name="email" id="txtEmail" class="textbox" value="<?=$funcionario['email'];?>"><br>
<label id="tnivel">Nível:</label>
<select id="nivel" name="nivel" >
  <?php if($funcionario['nivel']==1){?>
                                    <option value="1">Gerente</option>
                                    <option value="2">Executor</option>
                                    <option value="3">Atendente</option>
                            <?php }if($funcionario['nivel']==2){ ?>
                                <option value="2">Executor</option>
                                <option value="1">Gerente</option>
                                <option value="3">Atendente</option>
                                <?php }if($funcionario['nivel']==3){ ?>
                                    <option value="3">Atendente</option>
                                    <option value="1">Gerente</option>
                                    <option value="2">Executor</option>
                                <?php }?>


</select><br>
</div>
</fieldset>
      <fieldset id="endereco">
          <legend>Endereço</legend>
          <label id="tbairro">Bairro:</label>
        <input type="text" name="bairro" id="txtBairro" class="textbox" value="<?=$funcionario['bairro'];?>"><br>
        <label id="tnumero">Numero:</label>
        <input type="text" name="numero" id="txtNumero" class="textbox" value="<?=$funcionario['numero'];?>">
        <br>
        <label id="trua">Rua:</label>
        <input type="text" name="rua" id="txtRua" class="textbox" value="<?=$funcionario['rua'];?>"><br>
        <label id="tcep">CEP:</label>
        <input type="text" name="CEP" id="txtCEP" class="textbox" value="<?=$funcionario['cep'];?>"><br>
        <label id="tcidade">Cidade:</label>
        <input type="text" name="cidade" id="txtCidade" class="textbox" value="<?=$funcionario['cidade'];?>"><br>



        <label id="testado">Estado:</label>
        <select name="estado" id="txtEstado" >
        <option value="<?=$funcionario['estado'];?>"><?=$funcionario['estado'];?></option>
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
