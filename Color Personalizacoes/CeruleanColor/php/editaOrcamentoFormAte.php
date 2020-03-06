<?php
session_start();
if(isset($_SESSION['nivelLogado']) && $_SESSION['nivelLogado']==3){

require_once("../php/conexaoBanco.php");

 ?>
<?php

require_once("conexaoBanco.php");
function mostraProdutos($conexao){
  $comando="SELECT * FROM produtos";
  $resultado=mysqli_query($conexao, $comando);
  $produtos=array();

  while($cadaProduto = mysqli_fetch_assoc($resultado)){
    array_push($produtos, $cadaProduto);
  }
  $options="<option value='0'>Selecione...</option>";
  foreach($produtos as $cadaProduto){
    $options.="<option value='".$cadaProduto['id']."'>".$cadaProduto['nome']."</option>";
  }
  return $options;
}

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
<input id="todosOsProdutos" type="hidden" value="<?=mostraProdutos($conexao);?>">

 <!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title> Registro de Orçamentos || Color </title>
<link rel="stylesheet" href="../css/editaOrcamentoForm.css">
<link rel="shortcut icon" href="../img/Favicon.ico" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../js/funcoesOrcamentoEdicao.js"></script>
<script src='../js/orcamento.js'></script>
</head>
<body>
<header>
  <a href="../index.html"><img src="../img/iconsSistema/quit.png" alt="Sair do Sistema" id="saia"></a>
  <br><br><a href="../paginasSistema/orcamentoAte.php"><p id="voltar">Voltar</p></a>
</header>
<main>
<img src="../img/Logo.png" alt="Logo" id="LogoPrincipal">

<p id="titulo">Edição de Orçamentos</p>

<form action="editaOrcamento.php" method="POST">
<?php

$id=$_POST['id'];

//comando que trás os produtos
$comando="SELECT categorias.id as idCat, orcamentos_tem_produtos.produtos_id as idProd,  orcamentos_tem_produtos.quantidade, orcamentos_tem_produtos.descricao, orcamentos_tem_produtos.preco_unico, orcamentos.clientes_id FROM categorias INNER JOIN produtos ON categorias.id=produtos.categorias_id INNER JOIN orcamentos_tem_produtos ON produtos.id=orcamentos_tem_produtos.produtos_id INNER JOIN orcamentos ON orcamentos_tem_produtos.orcamentos_id=orcamentos.id WHERE orcamentos.id=".$id;
$resultado=mysqli_query($conexao,$comando);

//comando que trás os dados estáticos do orçamento
$comando2="SELECT * FROM orcamentos WHERE id=".$id;
$resultado2=mysqli_query($conexao,$comando2);
$tudoOrcamento=mysqli_fetch_assoc($resultado2);

$itensOrcamento=array();


while($cadaItem=mysqli_fetch_assoc($resultado)){
    array_push($itensOrcamento,$cadaItem);
  }

?>
<input type="hidden" name="dateNow" id="dateNow" value="<?=$tudoOrcamento['dt_emissao'];?>">
<input type="hidden" name="idOrcamento" id="idOrcamento" value="<?=$id?>">
<input type="hidden" name="matriculaFuncionario" id="matriculaFuncionario" value="<?=$tudoOrcamento['funcionarios_matricula'];?>">
<div id="conteudo">
<label for="cliente">Cliente</label>
<select name="cliente" id="cliente" class="textbox" onchange="defineLocal()">
<?php
    $comandoCliente="SELECT * FROM clientes";
    $resultadoCliente=mysqli_query($conexao,$comandoCliente);
    $clientes=array();
    while($cadaCliente=mysqli_fetch_assoc($resultadoCliente)){
      array_push($clientes,$cadaCliente);
    }
    foreach($clientes as $cadaCliente){
      if($cadaItemCliente['clientes_id']==$cadaCliente['id']){
    ?>
    <option selected="selected" value="<?=$cadaCliente['id'];?>"><?=$cadaCliente['nome']; ?></option>
    <?php
   }
   else{
    ?>
    <option value="<?=$cadaCliente['id'];?>"><?=$cadaCliente['nome'];?></option>
    <?php
    }
    }
    ?>


    <!-- todos os clientes e selected o que o id for igual ao tudoOrcamento.idCliente-->
  </select><br>
  <label for="localEntrega" class="labelEntrega">Local de Entrega</label>
  <input type="text" name="localEntrega" id="localEntrega" class="textbox" placeholder="Local de Entrega*" value="<?=$tudoOrcamento["local"];?>"><br>
  <label for="desconto">Desconto</label>
  <input type="text" name="desconto" id="desconto" placeholder="Desconto %" class="textbox porcento" value="<?=$tudoOrcamento["desconto"];?>">

  <div id="righto"><label for="parcelas">Parcelas</label>
  <select id="parcelas" name="parcelas" class="textbox">
    <?php

    for($i=0; $i<13; $i++){
      if($i == $tudoOrcamento['parcelas']){
        ?>
        <option selected value="<?=$i;?>"><?=$i;?>x</option>
        <?php
      }else {
?>
<option value="<?=$i;?>"><?=$i;?>x</option>
<?php
      }
    }
     ?>
  </select><br>
  <label for="dataAdi">Data de Emissão*</label>
  <input type="text" name="dataAdi" id="dataAdi" class="textbox date" readonly="readonly" value="<?=date('d/m/Y', strtotime($tudoOrcamento['dt_emissao']));?>"><br>
</div><br><br>


  <div class="divisa"></div><br><br>

<div class="rolagem">


  <div id="registrosDiv">
  <?php
      $cont=0;
      foreach($itensOrcamento as $cadaItem){

  ?>

<div id="<?="regisProduto".$cont;?>">

  <select id="<?="categoria".$cont;?>" name="categoria[]" onchange="retornaProduto(<?php $cont?>)" class="textbox categoria">
  <?php
    $comandoCat="SELECT * FROM categorias";
    $resultadoCat=mysqli_query($conexao,$comandoCat);
    $categorias=array();
    while($cadaCategoria=mysqli_fetch_assoc($resultadoCat)){
      array_push($categorias,$cadaCategoria);
    }
    foreach($categorias as $cadaCategoria){
      if($cadaItem['idCat']==$cadaCategoria['id']){
    ?>
    <option selected="selected" value="<?=$cadaCategoria['id'];?>"><?=$cadaCategoria['nome']; ?>
    </option>
    <?php
   }
   else{
    ?>
    <option value="<?=$cadaCategoria['id'];?>"><?=$cadaCategoria['nome']?></option>
    <?php
    }
    }
    ?>



    </select>

  <select id="<?="produtos".$cont;?>" name="produtos[]" onchange="retornaValorUnit(<?php $cont?>)" class="textbox produto" id=" <?="produtos".$cont;?>">
    <option value="0">Produto*</option>

  <?php
    $comando2="SELECT * FROM produtos";
    $resultado2=mysqli_query($conexao,$comando2);
    $produtos=array();
    while($cadaProduto=mysqli_fetch_assoc($resultado2)){
      array_push($produtos,$cadaProduto);
    }
    foreach($produtos as $cadaProduto){
      if($cadaItem['idProd']==$cadaProduto['id']){
    ?>
    <option selected="selected" value="<?=$cadaProduto['id'];?>"><?=$cadaProduto['nome']; ?>
    </option>
    <?php
   }
   else{
    ?>
    <option value="<?=$cadaProduto['id'];?>"><?=$cadaProduto['nome']?></option>
    <?php
    }
    }
    ?>
  </select>


  <input type="number" name="valorUnitario[]" id="<?="valorUnitario".$cont;?>" class="textbox unitario" placeholder="Valor Unitário" readonly="readonly" id="<?="vlUnitario".$cont;?>" value="<?=$cadaItem['preco_unico'];?>">

  <input type="text" name="descricao[]" id="<?="descricao".$cont;?>" class="textbox descricao" placeholder="Descrição Estampa*" value="<?=$cadaItem['descricao'];?>">

  <input type="number" name="quantidade[]" min="0" id="<?="quantidade".$cont;?>" onblur="atualizaValorTotal(this.value,<?php $cont?>)" class="textbox quantitativo" placeholder="Quantidade*" id="<?="qtde".$cont;?>" value="<?=$cadaItem['quantidade'];?>">


  <button type="button" onclick="adicionaProduto()" id="formDecimal"><img src="../img/iconsSistema/plus.png" class="geral" alt="adicionar produtos"></button>
   <?php
   if($cont >0 ){

   ?>
 <button type='button' onclick='removeProduto(<?php  echo $cont;?>)' id='formDecimal'><img src='../img/iconsSistema/minus.png' class='geral' alt='remover produtos'></button>
<?php
   }

?>

</div>
<?php
$cont=$cont+1;
  }

?>


</div>
</div>
<button type="submit" id="registrar">Registrar</button>
  <input type="text" name="valorTotal" id="valorTotal" value="<?=$tudoOrcamento['preco_total'];?>" step="any" readonly class="textbox" onchange="arredondador()">
</div>

</div>
</form>
</main>
</body>
</html>
<?php }
else{
  header("Location: ../paginasSite/login.php");
}


 ?>
