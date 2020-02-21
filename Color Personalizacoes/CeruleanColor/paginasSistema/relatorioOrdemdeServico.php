<?php
session_start();
$html="";
if(isset($_SESSION['nivelLogado']) && $_SESSION['nivelLogado']==1){

require_once("../php/conexaoBanco.php");

 ?>
 <?php
 function mostraExecutor($conexao){
   $num=2;
 $comando0 = "SELECT * FROM funcionarios WHERE nivel=".$num;
 $resultadoExe = mysqli_query($conexao, $comando0);
 $Executores0 = array();

 while ($cadaExecutore0 = mysqli_fetch_assoc($resultadoExe)) {
   array_push($Executores0, $cadaExecutore0);
 }

 $optionsExe = "";
 foreach ($Executores0 as $cadaExecutore0) {
 $optionsExe.="<option value='".$cadaExecutore0['nome']."'>".$cadaExecutore0['nome']."</option>";
 }
 return $optionsExe;
 }
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
  <title> Relatório de Ordem de Serviço || Color </title>
<link rel="stylesheet" href="../css/relatorioOrdemdeServico.css">
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

<p id="titulo">Relatório de Ordem de Serviço</p>
<div id="conteudo">
  <form action="#" method="GET">
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
              <label for="dtInicial">Data Entrega</label>
            <input type="date" name="dtInicial" id="dtInicial"></div><br>
            </div>
          <label for="cliente">Cliente</label>
          <select id="cliente" name="cliente" class="seletor">
            <option value="0" selected>...</option>
            <?=mostraClientes($conexao)?>
          </select><br>
          <label for="status">Status</label>
          <select id="status" name="status" class="seletor">
            <option value="0" selected>...</option>
            <option value="1">Em Andamento</option>
            <option value="2">Concluído</option>
            <option value="3">Cancelado</option>

          </select><br>
          <label for="funcionarioExe">Funcionário Executor</label>
          <select id="funcionarioExe" name="funcionarioExe">
            <option value="0" selected>...</option>
            <?=mostraExecutor($conexao)?>
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
      <th>Funcionário Responsável</th>
      <th id="th5">Produtos</th>
    </tr>
    <?php
    if(isset($_GET['status']) && isset($_GET['dtInicial']) && isset($_GET['cliente']) && isset($_GET['funcionarioExe'])){
    $cliente=$_GET["cliente"];
    $data_entrega=$_GET["dtInicial"];
    $status=$_GET["status"];
    $funcionario=$_GET["funcionarioExe"];

    if ($cliente!="0" && $data_entrega!="" && $status!=0 && $funcionario!="0") {//v v v v
      $comando= "SELECT ord.id, o.preco_total, c.nome AS nome_cliente, otp.produtos_id, f.nome AS nome_funcionario, p.nome
      FROM orcamentos AS o INNER JOIN clientes AS c ON o.clientes_id=c.id INNER JOIN orcamentos_tem_produtos AS otp ON
       otp.orcamentos_id=o.id INNER JOIN produtos AS p ON otp.produtos_id=p.id INNER JOIN ordens_de_servicos AS ord ON
       ord.orcamentos_id=o.id INNER JOIN funcionarios AS f ON f.matricula=ord.funcionarios_matricula
       WHERE c.nome='".$cliente."' AND ord.data_entrega='".$data_entrega."' AND ord.status=".$status." AND f.nome='".$funcionario."'";

    }elseif($cliente!="0" && $data_entrega=="" && $status==0 && $funcionario=="0"){ //vxxx
      $comando= "SELECT ord.id, o.preco_total, c.nome AS nome_cliente, otp.produtos_id, f.nome AS nome_funcionario, p.nome
      FROM orcamentos AS o INNER JOIN clientes AS c ON o.clientes_id=c.id INNER JOIN orcamentos_tem_produtos AS otp ON
       otp.orcamentos_id=o.id INNER JOIN produtos AS p ON otp.produtos_id=p.id INNER JOIN ordens_de_servicos AS ord ON
       ord.orcamentos_id=o.id INNER JOIN funcionarios AS f ON f.matricula=ord.funcionarios_matricula
       WHERE c.nome='".$cliente."'";

    }elseif($cliente!="0" && $data_entrega!="" && $status==0 && $funcionario=="0"){ //vvxx
      $comando= "SELECT ord.id, o.preco_total, c.nome AS nome_cliente, otp.produtos_id, f.nome AS nome_funcionario, p.nome
      FROM orcamentos AS o INNER JOIN clientes AS c ON o.clientes_id=c.id INNER JOIN orcamentos_tem_produtos AS otp ON
       otp.orcamentos_id=o.id INNER JOIN produtos AS p ON otp.produtos_id=p.id INNER JOIN ordens_de_servicos AS ord ON
       ord.orcamentos_id=o.id INNER JOIN funcionarios AS f ON f.matricula=ord.funcionarios_matricula
       WHERE c.nome='".$cliente."' AND ord.data_entrega='".$data_entrega."'";

    }elseif($cliente!="0" && $data_entrega!="" && $status!=0 && $funcionario=="0"){ //vvvx
      $comando= "SELECT ord.id, o.preco_total, c.nome AS nome_cliente, otp.produtos_id, f.nome AS nome_funcionario, p.nome
      FROM orcamentos AS o INNER JOIN clientes AS c ON o.clientes_id=c.id INNER JOIN orcamentos_tem_produtos AS otp ON
       otp.orcamentos_id=o.id INNER JOIN produtos AS p ON otp.produtos_id=p.id INNER JOIN ordens_de_servicos AS ord ON
       ord.orcamentos_id=o.id INNER JOIN funcionarios AS f ON f.matricula=ord.funcionarios_matricula
       WHERE c.nome='".$cliente."' AND ord.data_entrega='".$data_entrega."' AND ord.status=".$status."";

    }elseif($cliente=="0" && $data_entrega!="" && $status==0 && $funcionario=="0"){ //xvxx
      $comando= "SELECT ord.id, o.preco_total, c.nome AS nome_cliente, otp.produtos_id, f.nome AS nome_funcionario, p.nome
      FROM orcamentos AS o INNER JOIN clientes AS c ON o.clientes_id=c.id INNER JOIN orcamentos_tem_produtos AS otp ON
       otp.orcamentos_id=o.id INNER JOIN produtos AS p ON otp.produtos_id=p.id INNER JOIN ordens_de_servicos AS ord ON
       ord.orcamentos_id=o.id INNER JOIN funcionarios AS f ON f.matricula=ord.funcionarios_matricula
       WHERE ord.data_entrega='".$data_entrega."'";

    }elseif($cliente=="0" && $data_entrega!="" && $status!=0 && $funcionario=="0"){//xvvx
      $comando= "SELECT ord.id, o.preco_total, c.nome AS nome_cliente, otp.produtos_id, f.nome AS nome_funcionario, p.nome
      FROM orcamentos AS o INNER JOIN clientes AS c ON o.clientes_id=c.id INNER JOIN orcamentos_tem_produtos AS otp ON
       otp.orcamentos_id=o.id INNER JOIN produtos AS p ON otp.produtos_id=p.id INNER JOIN ordens_de_servicos AS ord ON
       ord.orcamentos_id=o.id INNER JOIN funcionarios AS f ON f.matricula=ord.funcionarios_matricula
       WHERE ord.data_entrega='".$data_entrega."' AND ord.status=".$status."";

    }elseif($cliente=="0" && $data_entrega!="" && $status!=0 && $funcionario!="0"){//xvvv
      $comando= "SELECT ord.id, o.preco_total, c.nome AS nome_cliente, otp.produtos_id, f.nome AS nome_funcionario, p.nome
      FROM orcamentos AS o INNER JOIN clientes AS c ON o.clientes_id=c.id INNER JOIN orcamentos_tem_produtos AS otp ON
       otp.orcamentos_id=o.id INNER JOIN produtos AS p ON otp.produtos_id=p.id INNER JOIN ordens_de_servicos AS ord ON
       ord.orcamentos_id=o.id INNER JOIN funcionarios AS f ON f.matricula=ord.funcionarios_matricula
       WHERE ord.data_entrega='".$data_entrega."' AND ord.status=".$status." AND f.nome='".$funcionario."'";

    }elseif($cliente=="0" && $data_entrega=="" && $status!=0 && $funcionario=="0"){//xxvx
      $comando= "SELECT ord.id, o.preco_total, c.nome AS nome_cliente, otp.produtos_id, f.nome AS nome_funcionario, p.nome
      FROM orcamentos AS o INNER JOIN clientes AS c ON o.clientes_id=c.id INNER JOIN orcamentos_tem_produtos AS otp ON
       otp.orcamentos_id=o.id INNER JOIN produtos AS p ON otp.produtos_id=p.id INNER JOIN ordens_de_servicos AS ord ON
       ord.orcamentos_id=o.id INNER JOIN funcionarios AS f ON f.matricula=ord.funcionarios_matricula
       WHERE  ord.status=".$status."";

    }elseif($cliente=="0" && $data_entrega=="" && $status!=0 && $funcionario!="0"){//xxvv
      $comando= "SELECT ord.id, o.preco_total, c.nome AS nome_cliente, otp.produtos_id, f.nome AS nome_funcionario, p.nome
      FROM orcamentos AS o INNER JOIN clientes AS c ON o.clientes_id=c.id INNER JOIN orcamentos_tem_produtos AS otp ON
       otp.orcamentos_id=o.id INNER JOIN produtos AS p ON otp.produtos_id=p.id INNER JOIN ordens_de_servicos AS ord ON
       ord.orcamentos_id=o.id INNER JOIN funcionarios AS f ON f.matricula=ord.funcionarios_matricula
       WHERE ord.status=".$status." AND f.nome='".$funcionario."'";

    }elseif($cliente=="0" && $data_entrega=="" && $status==0 && $funcionario!="0"){//xxxv
      $comando= "SELECT ord.id, o.preco_total, c.nome AS nome_cliente, otp.produtos_id, f.nome AS nome_funcionario, p.nome
      FROM orcamentos AS o INNER JOIN clientes AS c ON o.clientes_id=c.id INNER JOIN orcamentos_tem_produtos AS otp ON
       otp.orcamentos_id=o.id INNER JOIN produtos AS p ON otp.produtos_id=p.id INNER JOIN ordens_de_servicos AS ord ON
       ord.orcamentos_id=o.id INNER JOIN funcionarios AS f ON f.matricula=ord.funcionarios_matricula
       WHERE f.nome='".$funcionario."'";

    }elseif($cliente=="0" && $data_entrega=="" && $status==0 && $funcionario=="0"){//xxxx
      $num=1999999999999999999999900000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000;
      $comando="SELECT * FROM clientes WHERE id=".$num;

    }elseif($cliente!="0" && $data_entrega=="" && $status!=0 && $funcionario=="0"){//vxvx
      $comando= "SELECT ord.id, o.preco_total, c.nome AS nome_cliente, otp.produtos_id, f.nome AS nome_funcionario, p.nome
      FROM orcamentos AS o INNER JOIN clientes AS c ON o.clientes_id=c.id INNER JOIN orcamentos_tem_produtos AS otp ON
       otp.orcamentos_id=o.id INNER JOIN produtos AS p ON otp.produtos_id=p.id INNER JOIN ordens_de_servicos AS ord ON
       ord.orcamentos_id=o.id INNER JOIN funcionarios AS f ON f.matricula=ord.funcionarios_matricula
       WHERE c.nome='".$cliente."'  AND ord.status=".$status."";
    }elseif($cliente!="0" && $data_entrega=="" && $status!=0 && $funcionario!="0"){//vxvv
      $comando= "SELECT ord.id, o.preco_total, c.nome AS nome_cliente, otp.produtos_id, f.nome AS nome_funcionario, p.nome
      FROM orcamentos AS o INNER JOIN clientes AS c ON o.clientes_id=c.id INNER JOIN orcamentos_tem_produtos AS otp ON
       otp.orcamentos_id=o.id INNER JOIN produtos AS p ON otp.produtos_id=p.id INNER JOIN ordens_de_servicos AS ord ON
       ord.orcamentos_id=o.id INNER JOIN funcionarios AS f ON f.matricula=ord.funcionarios_matricula
       WHERE c.nome='".$cliente."' AND ord.status=".$status." AND f.nome='".$funcionario."'";
    }elseif($cliente=="0" && $data_entrega!="" && $status==0 && $funcionario!="0"){//vxvv
       $comando= "SELECT ord.id, o.preco_total, c.nome AS nome_cliente, otp.produtos_id, f.nome AS nome_funcionario, p.nome
          FROM orcamentos AS o INNER JOIN clientes AS c ON o.clientes_id=c.id INNER JOIN orcamentos_tem_produtos AS otp ON
           otp.orcamentos_id=o.id INNER JOIN produtos AS p ON otp.produtos_id=p.id INNER JOIN ordens_de_servicos AS ord ON
           ord.orcamentos_id=o.id INNER JOIN funcionarios AS f ON f.matricula=ord.funcionarios_matricula
           WHERE  ord.data_entrega='".$data_entrega."'  AND f.nome='".$funcionario."'";
     }elseif($cliente=="0" && $data_entrega!="" && $status==0 && $funcionario!="0"){//vvxv
           $comando= "SELECT ord.id, o.preco_total, c.nome AS nome_cliente, otp.produtos_id, f.nome AS nome_funcionario, p.nome
           FROM orcamentos AS o INNER JOIN clientes AS c ON o.clientes_id=c.id INNER JOIN orcamentos_tem_produtos AS otp ON
            otp.orcamentos_id=o.id INNER JOIN produtos AS p ON otp.produtos_id=p.id INNER JOIN ordens_de_servicos AS ord ON
            ord.orcamentos_id=o.id INNER JOIN funcionarios AS f ON f.matricula=ord.funcionarios_matricula
            WHERE c.nome='".$cliente."' AND ord.data_entrega='".$data_entrega."' AND f.nome='".$funcionario."'";
    }
    $resultado=mysqli_query($conexao,$comando);
    $linhas=mysqli_num_rows($resultado);
    if($linhas==0){
    ?>

    <tr><td colspan="5">Nenhum pedido encontrado!</td></tr>

    <?php
    }//fechamento do IF do LINHAS
    else{
      $ordem=array();
      while($cadaOrd = mysqli_fetch_assoc($resultado)){
          array_push($ordem,$cadaOrd);
      }
      $html="";
      foreach ($ordem as $cadaOrd){
      $html.="

      <tr>
        <td>".$cadaOrd['id']."</td>
        <td>".$cadaOrd['nome_cliente']."</td>
        <td>".$cadaOrd['preco_total']."</td>
        <td>".$cadaOrd['nome_funcionario']."</td>
        <td>".$cadaOrd['nome']."</td>
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
<form action="../php/gerarPdfOrdemServico.php" method="POST">
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
