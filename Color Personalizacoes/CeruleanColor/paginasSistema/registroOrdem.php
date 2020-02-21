<?php
session_start();
if(isset($_SESSION['nivelLogado']) && $_SESSION['nivelLogado']==1){

require_once("../php/conexaoBanco.php");

 ?>


<!DOCTYPE html>

<?php
function mostraOrcamentos($conexao){
  $emAprovacao = 1;
$comando = "SELECT id FROM orcamentos WHERE status=".$emAprovacao;
$resultado = mysqli_query($conexao, $comando);
$orcamentos = array();


while($cadaOrcamento = mysqli_fetch_assoc($resultado)){
array_push($orcamentos, $cadaOrcamento);
}

$opOrcamento = "<option value='0'>Selecione*</option>";
foreach ($orcamentos as $cadaOrcamento) {
  $opOrcamento .="<option value'".$cadaOrcamento['id']."'>".$cadaOrcamento['id']."</option>";
}

return $opOrcamento;
}

function funcionariosEXE($conexao){
  $nivelEXE = 2;
  $comando = "SELECT nome, matricula FROM funcionarios WHERE nivel=".$nivelEXE;
  $resultado = mysqli_query($conexao, $comando);
  $executor = array();


  while ($cadaExecutor = mysqli_fetch_assoc($resultado)) {
    array_push($executor, $cadaExecutor);
  }

  $opEXE = "<option value='0'>Selecione*</option>";
  foreach ($executor as $cadaExecutor) {
    $opEXE .= "<option value='".$cadaExecutor['matricula']."'>".$cadaExecutor['nome']."</option>";
  }

  return $opEXE;
}

 ?>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title> Registro de Ordens de Serviço || Color </title>
<link rel="stylesheet" href="../css/registroOrdem.css">
<link rel="shortcut icon" href="../img/Favicon.ico" />
<script src="../js/registroOrdem.js"></script>
</head>
<body>
<header>
  <form method="POST" action="../php/efetuaLogout.php">
  <button type="submit"style="background-color: transparent; border: none; float: right"><img src="../img/iconsSistema/quit.png" alt="Sair do Sistema" id="saia"></button>


  </form>  <br><br><a href="registrosGerente.php"><p id="voltar">Voltar</p></a>
</header>
<main>
<img src="../img/Logo.png" alt="Logo" id="LogoPrincipal">

<p id="titulo">Registro de Ordens de Serviço </p>
<div id="conteudo">

<form action="../php/registroBackOrdem.php" method="POST" onsubmit="return registraOrdem()">
  <?php
  if(isset($_GET['retorno']) && $_GET['retorno']==1){
  include_once('../alertas/sucesso.html');
  }else if(isset($_GET['retorno']) && $_GET['retorno']==2){
    include_once('../alertas/erro.html');

  }?>
    <fieldset id="dados">

        <legend>Dados Gerais</legend>



    <label for="orcamento" id="txtOrcamento">Orçamento</label>
    <label for="dtEntrega" id="txtEntrega">Data Entrega</label>
    <label for="funcionario" id="txtFuncionario">Funcionário Executor</label>
    <br>
        <select name="orcamento" id="orcamento" class="textbox">

            <?=mostraOrcamentos($conexao)?>
        </select>
        <input type="date" name="dtEntrega" id="dtEntrega" class="textbox">
        <select name="funcionario" id="funcionario" class="textbox">
            <?=funcionariosEXE($conexao)?>
        </select>
        <button type="submit" id="registrar">Gerar Ordem de Serviço</button>
    </fieldset>
    </form>



    <form action="#" method="POST">
        <fieldset id="buscaField">
            <legend>Consulta de Ordens de Serviço</legend>
            <form method="POST" action="#" onsubmit="return pesquisaFuncionario()">
                <label for="nome" id="txtNome">Nome do Cliente: </label>
                <input type="text" name="nome" id="nome">
                <button type="submit" id="botaoPesquisa"><img src="../img/iconsSistema/pesquisaPequeno.png" alt="pesquisa" id="pesquisa"></button>
        </form>

<br><br>



<div id="planoFundo">
  <table>
    <tr>
      <th id="th1">Código</th>
      <th>Cliente</th>
      <th>Data de Entrega</th>
      <th>Funcionário Responsável</th>
      <th>Status</th>
      <th id="th10">Ações</th>
    </tr>
    <?php
    $comandoNome = "";
    if (isset($_GET['nome']) && $_GET['nome']=="") {
      $comando = "SELECT c.nome AS nome_Clio, ord.id, ord.data_entrega, f.nome AS nome_Funca, ord.status FROM ordens_de_servicos AS ord INNER JOIN orcamentos AS orc ON orc.id=ord.orcamentos_id INNER JOIN clientes AS c ON orc.clientes_id=c.id INNER JOIN funcionarios AS f ON f.matricula=ord.funcionarios_matricula";
    }else if (isset($_GET['nome']) && $_GET['nome']!="") {
      $comando = "SELECT c.nome AS nome_Clio, ord.id, ord.data_entrega, f.nome AS nome_Funca, ord.status FROM ordens_de_servicos AS ord INNER JOIN orcamentos AS orc ON orc.id=ord.orcamentos_id INNER JOIN clientes AS c ON orc.clientes_id=c.id INNER JOIN funcionarios AS f ON f.matricula=ord.funcionarios_matricula WHERE c.nome='".$_POST['nome']."'";
    }else if(isset($_GET['nome'])==false){
      $comando = "SELECT c.nome AS nome_Clio, ord.id, ord.data_entrega, f.nome AS nome_Funca, ord.status FROM ordens_de_servicos AS ord INNER JOIN orcamentos AS orc ON orc.id=ord.orcamentos_id INNER JOIN clientes AS c ON orc.clientes_id=c.id INNER JOIN funcionarios AS f ON f.matricula=ord.funcionarios_matricula";
    }
  $resultado = mysqli_query($conexao, $comando);
  $linhas = mysqli_num_rows($resultado);


  if($linhas==0){




     ?>
<tr>
  <td colspan="6">Nenhuma Ordem de Serviço Encontrada!</td>
</tr>
<?php
  }else {
$tabela = Array();

while ($cadaUmTabela = mysqli_fetch_assoc($resultado)) {
  array_push($tabela, $cadaUmTabela);
}


foreach ($tabela as $cadaUmTabela) {

?>
<tr>
  <td><?=$cadaUmTabela['id']?></td>
  <td><?=$cadaUmTabela['nome_Clio']?></td>
  <td><?=$cadaUmTabela['data_entrega']?></td>
  <td><?=$cadaUmTabela['nome_Funca']?></td>
  <td><?php
  if($cadaUmTabela['status']=1){
    echo "Em Andamento";

  }elseif ($cadaUmTabela['status']=2) {
    echo "Concluído";

  }else {
    echo "Cancelado";
  }



  ?></td>
  <td><form action="#" method="POST"><button type="submit" class="buttonEditar"><img src="../img/iconsSistema/miniEditar.png" alt="Editar Conteúdo" id="editar1" class="icons"></button></form>
      <form action="#" method="POST"><button type="submit" class="buttonApagar"><img src="../img/iconsSistema/miniApagar.png" alt="Apagar conteúdo" id="apagar1" class="icons"></button></form></td>
</tr>


<?php
}}
?>

  </table>
</div>
</fieldset>
</form>
</div>
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
