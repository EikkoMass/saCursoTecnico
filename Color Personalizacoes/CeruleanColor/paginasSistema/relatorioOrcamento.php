<?php
session_start();
$html="";
if(isset($_SESSION['nivelLogado']) && $_SESSION['nivelLogado']==1){

require_once("../php/conexaoBanco.php");

 ?>


<?php
function mostraClientes($conexao){
$comando0 = "SELECT * FROM clientes";
$resultadoCli = mysqli_query($conexao, $comando0);
$clientes0 = array();

while ($cadaCliente0 = mysqli_fetch_assoc($resultadoCli)) {
  array_push($clientes0, $cadaCliente0);
}

$optionsCli = "";
foreach ($clientes0 as $cadaCliente0) {
$optionsCli.="<option value='".$cadaCliente0['nome']."'>".$cadaCliente0['nome']."</option>";
}
return $optionsCli;
}
?>





<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title> Relatório de Orçamento || Color </title>
<link rel="stylesheet" href="../css/relatorioOrcamento.css">
<link rel="shortcut icon" href="../img/Favicon.ico" />
</head>
<body>
<header>
  <form method="POST" action="../php/efetuaLogout.php">
  <button type="submit"style="background-color: transparent; border: none; float: right"><img src="../img/iconsSistema/quit.png" alt="Sair do Sistema" id="saia"></button>


  </form>  <br><br><a href="relatorioGerente.php"><p id="voltar">Voltar</p></a>
</header>
<main>
<img src="../img/Logo.png" alt="Logo" id="LogoPrincipal">

<p id="titulo">Relatório de Orçamento</p>
<div id="conteudo">
  <form method="GET" action="#">
    <?php
    if(isset($_GET['retorno']) && $_GET['retorno']==1){
    include_once('../alertas/sucesso.html');
    }else if(isset($_GET['retorno']) && $_GET['retorno']==2){
      include_once('../alertas/erro.html');

    }else if(isset($_GET['retorno']) && $_GET['retorno']==3){
      include_once('../alertas/erro.html');

    }

     ?>

    <fieldset id="fieldfiltros">
      <legend>Filtros</legend>
      <div id="boxFiltros">
          <div id="datas"><div id="datasi">
              <label for="dtInicial">Data de Emissão</label>
            <input type="date" name="dtInicial" id="dtInicial"></div><br>
            <div id="datasf">
        </div></div>
          <label for="cliente">Cliente</label>
          <select id="cliente" name="cliente" class="seletor">
              <option value="0" selected>...</option>
              <?=mostraClientes($conexao)?>
            </select><br>
            <label for="status">Status</label>
            <select id="status" name="status" class="seletor">
              <option value="0" selected>...</option>
              <option value="1">Em aprovação</option>
              <option value="2">Aprovado</option>
              <option value="3">Cancelado</option>

            </select><br>
            </div>

  </fieldset>

    <br>
  <button type="submit" id="gerar">Gerar</button>
  </form>
  <br><br>
<div id="divisa"></div>
<br>
<div id="barra">


<div id="planoFundo">
    <fieldset id="fieldrelatorio">
  <table>
    <tr>
        <th id="th1">Código</th>
      <th>Cliente</th>
      <th>Valor Total</th>
      <th id="th4">Produtos</th>
    </tr>
    <?php
if(isset($_GET['status']) && isset($_GET['dtInicial']) && isset($_GET['cliente'])){
    $cliente=$_GET["cliente"];
    $data_emissao=$_GET["dtInicial"];
    $status=$_GET["status"];

    if($cliente!="0" && $data_emissao=="" && $status==0){// v x x
      $comando="SELECT o.id, o.preco_total, c.nome AS nome_cliente, otp.produtos_id, p.nome FROM orcamentos AS o INNER JOIN clientes AS c ON o.clientes_id=c.id INNER JOIN orcamentos_tem_produtos AS otp ON otp.orcamentos_id=o.id INNER JOIN produtos AS p ON otp.produtos_id=p.id WHERE c.nome='".$cliente."'";
    }elseif ($cliente!="0" && $data_emissao!="" && $status==0) {//v v x
      $comando="SELECT o.id, o.preco_total, c.nome AS nome_cliente, otp.produtos_id, p.nome FROM orcamentos AS o INNER JOIN clientes AS c ON o.clientes_id=c.id INNER JOIN orcamentos_tem_produtos AS otp ON otp.orcamentos_id=o.id INNER JOIN produtos AS p ON otp.produtos_id=p.id WHERE c.nome='".$cliente."' AND o.dt_emissao='".$data_emissao."'";
    }elseif ($cliente!="0" && $data_emissao!="" && $status!=0) {//v v v
      $comando="SELECT o.id, o.preco_total, c.nome AS nome_cliente, otp.produtos_id, p.nome FROM orcamentos AS o INNER JOIN clientes AS c ON o.clientes_id=c.id INNER JOIN orcamentos_tem_produtos AS otp ON otp.orcamentos_id=o.id INNER JOIN produtos AS p ON otp.produtos_id=p.id WHERE c.nome='".$cliente."' AND o.dt_emissao='".$data_emissao."' AND o.status=".$status;
    }elseif ($cliente=="0" && $data_emissao!="" && $status!=0) {//x v v
      $comando="SELECT o.id, o.preco_total, c.nome AS nome_cliente, otp.produtos_id, p.nome FROM orcamentos AS o INNER JOIN clientes AS c ON o.clientes_id=c.id INNER JOIN orcamentos_tem_produtos AS otp ON otp.orcamentos_id=o.id INNER JOIN produtos AS p ON otp.produtos_id=p.id WHERE o.dt_emissao='".$data_emissao."' AND o.status=".$status;
    }elseif ($cliente=="0" && $data_emissao!="" && $status==0) {//x v x
      $comando="SELECT o.id, o.preco_total, c.nome AS nome_cliente, otp.produtos_id, p.nome FROM orcamentos AS o INNER JOIN clientes AS c ON o.clientes_id=c.id INNER JOIN orcamentos_tem_produtos AS otp ON otp.orcamentos_id=o.id INNER JOIN produtos AS p ON otp.produtos_id=p.id WHERE o.dt_emissao='".$data_emissao."'";
    }elseif ($cliente=="0" && $data_emissao=="" && $status!=0) {//x x v
      $comando="SELECT o.id, o.preco_total, c.nome AS nome_cliente, otp.produtos_id, p.nome FROM orcamentos AS o INNER JOIN clientes AS c ON o.clientes_id=c.id INNER JOIN orcamentos_tem_produtos AS otp ON otp.orcamentos_id=o.id INNER JOIN produtos AS p ON otp.produtos_id=p.id WHERE o.status=".$status;
    }elseif ($cliente!="0" && $data_emissao=="" && $status!=0) {//v x v
      $comando="SELECT o.id, o.preco_total, c.nome AS nome_cliente, otp.produtos_id, p.nome FROM orcamentos AS o INNER JOIN clientes AS c ON o.clientes_id=c.id INNER JOIN orcamentos_tem_produtos AS otp ON otp.orcamentos_id=o.id INNER JOIN produtos AS p ON otp.produtos_id=p.id WHERE c.nome='".$cliente."' AND o.status=".$status;
    }elseif ($cliente=="0" && $data_emissao=="" && $status==0) {
      $num=1999999999999999999999900000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000;
      $comando="SELECT * FROM clientes WHERE id=".$num;
    }



    $resultado=mysqli_query($conexao,$comando);
    $linhas=mysqli_num_rows($resultado);
    if($linhas==0){
    ?>

    <tr><td colspan="4">Nenhum pedido encontrado!</td></tr>

    <?php
    }//fechamento do IF do LINHAS
    else{
      $orcamentos=array();
      while($cadaOrc = mysqli_fetch_assoc($resultado)){
          array_push($orcamentos,$cadaOrc);
      }
      $html="";
      foreach ($orcamentos as $cadaOrc){
      $html.="

      <tr>
        <td>".$cadaOrc['id']."</td>
        <td>".$cadaOrc['nome_cliente']."</td>
        <td>".$cadaOrc['preco_total']."</td>
        <td>".$cadaOrc['nome']."</td>
      </tr>
      ";

      }//fechamento do FOREACH
      echo $html;
    }//fechamento do ELSE
    }//fechamento do primeiro IF
    ?>


  </table>
</fieldset>
</div>
<br>
<form action="../php/gerarPdfOrcamento.php" method="POST">
	<input type="hidden" name="html" value="<?=$html?>">
	<button type="submit" id="gerarPdf">
		Gerar PDF
	</button>
</form>


  <br><br>


</div>
</div>

</main>

</body>
</html>
<?php
}else{
  header("Location: ../paginasSite/login.php");
}


 ?>
