
<?php
session_start();
if(isset($_SESSION['nivelLogado']) && $_SESSION['nivelLogado']==2){

require_once("../php/conexaoBanco.php");

 ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title> Visualizar Ordens || Color </title>
<link rel="stylesheet" href="../css/visualizarOrdemGer.css">
<link rel="shortcut icon" href="../img/Favicon.ico" />
</head>
<body>
<header>
  <form method="POST" action="../php/efetuaLogout.php">
  <button type="submit"style="background-color: transparent; border: none; float: right"><img src="../img/iconsSistema/quit.png" alt="Sair do Sistema" id="saia"></button>


  </form>  <br><br><a href="ordensServico.php"><p id="voltar">Voltar</p></a>
</header>
<main>
<img src="../img/Logo.png" alt="Logo" id="LogoPrincipal">
<h2>Ordem de Serviço</h2>

<?php

  require_once("../php/conexaoBanco.php");

  $idVi=$_GET["idVi"];


  $comando="SELECT orc.dt_emissao, ord.id, cli.nome AS nome_cliente, cli.cpf, cli.cnpj, cli.email, cli.rua, cli.cidade, cli.bairro, cli.numero, cli.telefone,
  fun.nome AS nome_funcionario, orcte.descricao, orc.preco_total FROM clientes AS cli INNER JOIN orcamentos AS orc ON orc.clientes_id=cli.id
  INNER JOIN ordens_de_servicos AS ord ON ord.orcamentos_id=orc.id INNER JOIN orcamentos_tem_produtos AS orcte ON orcte.orcamentos_id=orc.id INNER JOIN
  funcionarios AS fun ON fun.matricula=orc.funcionarios_matricula WHERE ord.id=".$idVi."";
  $resultado=mysqli_query($conexao, $comando);
  $geralRetornadas = array();

  while($cadaLinha = mysqli_fetch_assoc($resultado)){
    array_push($geralRetornadas,$cadaLinha);
  }
  foreach($geralRetornadas as $cadaGeral){
  ?>


  <div id="fieldset">


      <div id="documento"><div id="interface">
        <img src="../img/iconsSistema/LogoServico.png" alt="Logo da Empresa na Ordem de Serviço" id="logoOrdem">
                  <p id="dataInicio">Data de Emissão: <a id="valorDataInicio"><?php echo $cadaGeral["dt_emissao"];?></a></p>

                  <p id="idOrdem">Id: <a id="valorIdOrdem"><?php echo $idVi;?></a></p>
                  <p id="certificado">Certificado Color Personalizações&copy;</p>
            </div><br><br>
                <div id="conteudoReal">
                <p id="nomeCliente">Nome do Cliente: <a id="valorNomeCliente"><?php echo $cadaGeral["nome_cliente"];?></a></p>
                <p id="cpfCnpj">CPF/CNPJ: <a id="valorCpfCnpj"><?php echo $cadaGeral["cpf"];?><?php echo $cadaGeral["cnpj"];?></a></p>
                <p id="email">E-Mail: <a id="valorEmail"><?php echo $cadaGeral["email"];?></a></p>
                <div id="endereco">
                <p id="Rua">Rua: <a id="valorRua"><?php echo $cadaGeral["rua"];?></a></p>
                <p id="cidade">Cidade: <a id="valorCidade"><?php echo $cadaGeral["cidade"];?></a></p>
                <p id="bairro">Bairro: <a id="valorBairro"><?php echo $cadaGeral["bairro"];?></a></p>
                <p id="numero">Número: <a id="valorNumero"><?php echo $cadaGeral["numero"];?></a></p></div>
                <p id="telefone">Telefone: <a id="valorTelefone"><?php echo $cadaGeral["telefone"];?></a></p>
                <br>
                <p id="nomeAtendente">Nome do(a) Executor: <a id="valorNomeAtendente"><?php echo $cadaGeral["nome_funcionario"];?></a></p>
                <p id="descricao">Descrição: <a id="valorDescricao"><?php echo $cadaGeral["descricao"];?></a></p>
                <p id="final">Valor Final: <a id="valorFinal"><?php echo $cadaGeral["preco_total"];?></a></p></div>
                <img src="../img/iconsSistema/seloColor.png" alt="Selo de qualidade" id="selo">
              </div>

            </div>
            <?php
          }

            ?>


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
