<?php
session_start();
if(isset($_SESSION['nivelLogado']) && $_SESSION['nivelLogado']==3){

require_once("../php/conexaoBanco.php");

 ?>


<?php
function mostraCategorias($conexao){
$comando = "SELECT * FROM categorias";
$resultado = mysqli_query($conexao, $comando);
$categorias = array();

while ($cadaCategoria = mysqli_fetch_assoc($resultado)) {
  array_push($categorias, $cadaCategoria);
}

$options = "<option value='0'>Categoria*</option>";
foreach ($categorias as $cadaCategoria) {
$options.="<option value='".$cadaCategoria['id']."'  >".$cadaCategoria['nome']."</option>";
}
return $options;
}

function mostraClientes($conexao){
$comando0 = "SELECT * FROM clientes";
$resultadoCli = mysqli_query($conexao, $comando0);
$clientes0 = array();

while ($cadaCliente0 = mysqli_fetch_assoc($resultadoCli)) {
  array_push($clientes0, $cadaCliente0);
}

$optionsCli = "";
foreach ($clientes0 as $cadaCliente0) {
$optionsCli.="<option value='".$cadaCliente0['id']."'  >".$cadaCliente0['nome']."</option>";
}
return $optionsCli;
}
 ?>
<input type="hidden" id="todasAsCategorias" value="<?=mostraCategorias($conexao);?>">
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title> Registro de Orçamentos || Color </title>
<link rel="stylesheet" href="../css/orcamento.css">
<link rel="shortcut icon" href="../img/Favicon.ico" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../js/orcamento.js"></script>
</head>
<body>
<header>
  <form method="POST" action="../php/efetuaLogout.php">
  <button type="submit"style="background-color: transparent; border: none; float: right"><img src="../img/iconsSistema/quit.png" alt="Sair do Sistema" id="saia"></button>


  </form>  <br><br><a href="principalAtendente.php"><p id="voltar">Voltar</p></a>
</header>
<main>
<img src="../img/Logo.png" alt="Logo" id="LogoPrincipal">

<p id="titulo">Registro de Orçamentos</p>

<div id="conteudo">

  <form method="post" action="../php/registraOrcamentoAte.php" id="formPedido" onsubmit="return validaOrcamento(cont)">
    <div class='popupFinal' id="popupFinal">

      <h2>Atenção!</h2>

      <p id="pe">foi detectado uma taxa de desconto no orçamento, aplicando-o sairá por:</p>

      <a class='reales'>R$</a><input type='number' id="valorTotalFinal" name='valorTotalFinal' readonly>

      <p id="pa">Deseja Mesmo prosseguir?</p>

      <div class='botoes'><button type='button' class='button' onclick='ocultador()' id="wait">Preciso rever algo</button>

      <button type='submit' class='button' id='confirm'>Continuar</button><input type='hidden' value='none' id='tota'>
    </div>
    </div>

  <div id="lefto">
    <?php
    if(isset($_GET['retorno']) && $_GET['retorno']==1){
    include_once('../alertas/sucesso.html');
    }else if(isset($_GET['retorno']) && $_GET['retorno']==2){
      include_once('../alertas/erro.html');

    }else if(isset($_GET['retorno']) && $_GET['retorno']==3){
      include_once('../alertas/erro.html');

    }

     ?>

  <select name="cliente" id="cliente" class="textbox" onChange='defineLocal()'>
    <option value='0'>Insira o Cliente*</option>
    <?=mostraClientes($conexao)?>
  </select><br>
  <input type="text" name="localEntrega" id="localEntrega" class="textbox localEntrega" placeholder="Local de Entrega*" readonly="readonly"><br>
  <input type="text" name="localEntregasemi" id="localEntregasemi" class="textbox localEntrega" placeholder="Local de Entrega*"><br>
  <div name="unidos">
  <input type="checkbox" name="alternaEntrega" id="alternaEntrega" style="margin-left: 3%; margin-top: 0.5%;" onClick="return entregaEntrega()"><label for="alternaEntrega" style="font-size: 14px;">Local Alternativo</label>
  </div>
  <input type="text" name="desconto" id="desconto" placeholder="Desconto %" class="textbox porcento">
  </div>
  <div id="righto"><label for="parcelas">Parcelas</label>
  <select id="parcelas" name="parcelas" class="textbox">
    <option selected value="1">1x</option>
    <option value="2">2x</option>
    <option value="3">3x</option>
    <option value="4">4x</option>
    <option value="5">5x</option>
    <option value="6">6x</option>
    <option value="7">7x</option>
    <option value="8">8x</option>
    <option value="9">9x</option>
    <option value="10">10x</option>
    <option value="11">11x</option>
    <option value="12">12x</option>
  </select><br>
  <label for="dataAdi">Data de Emissão*</label>
  <input type="text" name="dataAdi" id="dataAdi" class="textbox date" readonly="readonly" value="<?php
$dataAtual= date("d/m/Y");
echo $dataAtual;
?>"><br>
</div><br><br>
  <div class="divisa"></div><br><br>
  <div id="registrosDiv">
  <div id="regisProduto0" class="regisProduto">

  <select id="categoria0" name="categoria[]" onchange="retornaProduto(0)" class="textbox categoria">
      <?=mostraCategorias($conexao);?>
    </select>

  <select id="produto0" name="produtos[]" onchange="retornaValorUnit(0)" class="textbox produto">
    <option value="0">Produto*</option>

  </select>
  <input type="number" name="valorUnitario[]" id="valorUnitario0" class="textbox unitario" placeholder="Valor Unitário" readonly="readonly">

  <input type="text" name="descricao[]" id="descricao0" class="textbox descricao" placeholder="Descrição Estampa*">

  <input type="number" name="quantidade[]" min="0" id="quantidade0" onblur="atualizaValorTotal(this.value,0)" class="textbox quantitativo" placeholder="Quantidade*">

  <button type="button" onclick="adicionaProduto()" class="formDecimal"><img src="../img/iconsSistema/plus.png" class="geral" alt="adicionar produtos"></button>




</div>

</div>
  <button type="button" id="registrar" onclick="defineProcesso()">Registrar</button>
  <input type="text" name="valorTotal" id="valorTotal" value="0.00" step="any" readonly="readonly"  class="textbox" onchange="arredondador()">
</form>
  <br><br><div class="divisa"></div><br><br>
  <form action="#" method="get">
<label for="nome">Nome do Cliente: </label>
<input type="text" name="nomeBusca" id="nome">
<button type="submit" id="botaoPesquisa"><img src="../img/iconsSistema/pesquisaPequeno.png" alt="pesquisa" id="pesquisa"></button>
</form>
<br><br><div id="planoFundo">
  <table>
    <tr>
      <th id="th1">Código</th>
      <th>Cliente</th>
      <th>CPF/CNPJ</th>
      <th>Valor Total</th>
      <th id="th11">Ação</th>
    </tr>

    <?php


$comandoNome = "";
    if(isset($_GET['nomeBusca']) && $_GET['nomeBusca']==""){
      $comandoGeral = "SELECT c.cpf, c.cnpj, c.nome, o.id, o.preco_total FROM clientes AS c INNER JOIN orcamentos AS o ON o.clientes_id=c.id WHERE o.status=1";



    }else if (isset($_GET['nomeBusca']) && $_GET['nomeBusca']!="") {
      $nomeBusca1=$_GET['nomeBusca'];
      $nomeBusca1= strtolower($nomeBusca1);
      $comandoGeral="SELECT c.cpf, c.cnpj, c.nome, o.id, o.preco_total FROM clientes AS c INNER JOIN orcamentos AS o on c.id=o.clientes_id WHERE c.nome LIKE '%".$nomeBusca1."%' AND o.status=1";
      //echo $comandoIdCliente;




    }else if(isset($_GET['nomeBusca'])==false){
      $comandoGeral = "SELECT c.cpf, c.cnpj, c.nome, o.id, o.preco_total FROM clientes AS c INNER JOIN orcamentos AS o ON o.clientes_id=c.id WHERE o.status=1";

  }
// echo $comandoNome."<br>";
// echo $comandoCliente;



$resultandoTabela = mysqli_query($conexao, $comandoGeral);
$linhasTab = mysqli_num_rows($resultandoTabela);
// $resultadoIdCliente=mysqli_query($conexao, $comandoIdCliente);
// $idClienteVAR=mysqli_fetch_assoc($resultadoIdCliente);



if($linhasTab==0){

?>
<tr><td colspan="5">Nenhum Orcamento Encontrado!</td></tr>
<?php    }else {

$paraGeral = array();


while ($cadaParaGeral = mysqli_fetch_assoc($resultandoTabela)) {
  array_push($paraGeral, $cadaParaGeral );
}

foreach ($paraGeral as $cadaParaGeral ) {


?>

<tr>
  <td><?=$cadaParaGeral['id']?></td>
  <td><?=$cadaParaGeral['nome']?></td>
  <td><?php
if ($cadaParaGeral['cpf'] == NULL) {
  echo $cadaParaGeral['cnpj'];
}else {
  echo $cadaParaGeral['cpf'];

}
?></td>
  <td><?=$cadaParaGeral['preco_total']?></td>

     <td class="tdborder">
        <form action="../php/editaOrcamentoFormAte.php" method="POST" class="formato editaform" id="editaform1">
        <input type="hidden" name="id" id="id" value="<?=$cadaParaGeral['id'];?>">
          <button type="submit" class="buttonEditar"><img src="../img/iconsSistema/miniEditar.png" alt="Editar Conteúdo" id="editar[]" class="icons editar"></button>
        </form>
        <form action="../php/excluiOrcamento.php" method="POST" class="formato" id="apagaform" class="apagaForm">
        <input type="hidden" name="id" id="id" value="<?=$cadaParaGeral['id'];?>">
          <button type="submit" class="buttonApagar" onClick="return confirma()"><img src="../img/iconsSistema/miniApagar.png" alt="Apagar conteúdo" id="apagar" class="icons apagar"></button>
        </form>
    </td>
</tr>

<?php
}} ?>


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
