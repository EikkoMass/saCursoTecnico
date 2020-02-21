var cont;
var categorias = $("#todasAsCategorias").val();
var valoresJaAdicionadosAoTotal = [];

$(document).ready(function(){
    var precosUnitarios= document.getElementsByName("valorUnitario[]");
    var quantidades= document.getElementsByName("quantidade[]");
    var contJaAdicionado=0;


    for(var i=0; i<precosUnitarios.length; i++){

        contJaAdicionado= precosUnitarios[i].parentElement.id;
        contJaAdicionado= contJaAdicionado.substring(12);
        contJaAdicionado=parseInt(contJaAdicionado);

        valoresJaAdicionadosAoTotal[contJaAdicionado]=(parseFloat(precosUnitarios[i].value) * parseFloat(quantidades[i].value));
    }
cont=contJaAdicionado+1;
console.log("Cont Inicial"+cont);



});




function adicionaProduto(){
  $("#registrosDiv").append(
  '<div id="regisProduto'+cont+'" class="regisProduto">'+
  '<select id="categoria'+cont+'" name="categoria[]" onchange="retornaProduto('+cont+')" class="textbox categoria">'+categorias+'</select>'+
  '<select id="produto'+cont+'" name="produtos[]" onchange="retornaValorUnit('+cont+')" class="textbox produto"><option value="0">Produto*</option></select>'+
  '<input type="number" name="valorUnitario[]" id="valorUnitario'+cont+'" class="textbox unitario" placeholder="Valor Unitário" readonly="readonly">'+
  '<input type="text" name="descricao[]" id="descricao'+cont+'" class="textbox descricao" placeholder="Descrição Estampa*">'+
  '<input type="number" min="0" name="quantidade[]" id="quantidade'+cont+'" class="textbox quantitativo" placeholder="Quantidade*"  onblur="atualizaValorTotal(this.value,'+cont+')">'+
  '<button type="button" onclick="adicionaProduto('+cont+')" id="formDecimal"><img src="../img/iconsSistema/plus.png" class="geral" alt="adicionar produtos"></button>'+
  '<button type="button" onclick="removeProduto('+cont+')" id="formDecimal"><img src="../img/iconsSistema/minus.png" class="geral" alt="remover produtos"></button>'+
  '</div>'

  );


cont+=1;
}
function removeProduto(cont){

var valorTotalAtualPedido= $("#valorTotal").val();


var produtoSelecionado = $("#produtos"+cont).val();

if((valorTotalAtualPedido!=0.00)&&(produtoSelecionado!=0)){
  var valorUnitario= $("#valorUnitario"+cont).val();
  var quantidade = $("#quantidade"+cont).val();
  var valorAReduzir= parseFloat(valorUnitario)* parseInt(quantidade);
  if(valorAReduzir == NaN || produtoSelecionado == undefined){
    valorAReduzir = 0;
  }

  $("#valorTotal").val(valorTotalAtualPedido-valorAReduzir);
}


$("#regisProduto"+cont).remove();

}



function atualizaValorTotal(quantidade,cont){

      var produtoSelecionado = $("#produto"+cont).val();
      var valorJaAdicionado = valoresJaAdicionadosAoTotal[cont];
      var valorTotalAtual = document.getElementById("valorTotal").value;
      var valorUnitarioProdutos= document.getElementById("valorUnitario"+cont).value;



      if ((produtoSelecionado!=0) && (valorJaAdicionado==null)) {
      valorTotalAtual = parseFloat(valorTotalAtual);
      valorUnitarioProdutos = parseFloat(valorUnitarioProdutos);
      var valorAtualizado = (valorUnitarioProdutos * quantidade)+valorTotalAtual;
      $("#valorTotal").val(valorAtualizado);
      }else if ((produtoSelecionado!=0) && (valorJaAdicionado>0)) {
      valorTotalAtual = parseFloat(valorTotalAtual);
      valorUnitarioProdutos = parseFloat(valorUnitarioProdutos);
      $("#valorTotal").val((valorTotalAtual - valorJaAdicionado)+valorUnitarioProdutos*quantidade);
      }
      valoresJaAdicionadosAoTotal[cont] = (valorUnitarioProdutos*quantidade);

}




function retornaProduto(cont){
var resetado = 0;
var campo2="categoria"+cont;
var idCategoria=document.getElementById(campo2).value;





var pagina="../php/retornaProduto.php";
if(idCategoria!=0){
  $.ajax({
    type:'POST',
    dataType:'html',
    url: pagina,
    data:{id:idCategoria},
    success: function(retproduto){
      var selectProduto = ("#produto"+cont);
      $(selectProduto).empty();
      $(selectProduto).append(retproduto);
    }
  });
}else {
  var selectProduto = ("#produto"+cont);
  $(selectProduto).empty();
  $(selectProduto).append("<option value='0'>Produto*</option>");

}
}


function retornaValorUnit(cont){

  var campo2="produto"+cont;
  var idProduto=document.getElementById(campo2).value;
  var pagina="../php/retornaValorUnit.php";

  if(idProduto!=0){
    $.ajax({
      type:'POST',
      dataType:'html',
      url: pagina,
      data:{id:idProduto},
      success: function(retVl){
        var inputVl = ("#valorUnitario"+cont);
        $(inputVl).val(retVl);
      }
    });
  }
}

function evitaErro(){
var errado = document.getElementById("valorTotal").value();
if (errado == NaN) {
  document.getElementById("valorTotal").value() == 0;
}

}


function validaOrcamento(cont){
  // var contAtual = cont;
var erro = "";

 var localEntrega = $("#localEntrega").val();
//var desconto = document.getElementById("desconto").value();
//var parcelas = document.getElementById("parcelas").value();
var dataAdi = $("#dataAdi").val();
var categoria = [];
var produto = [];
var quantidade = [];
categoria = document.getElementsByName("categoria[]");
produto= document.getElementsByName("produtos[]");
quantidade=document.getElementsByName("quantidade[]");

for (var i = 0; i < categoria.length; i++) {
  if(categoria[i].value=="0" || produto[i].value=="0" || quantidade[i].value==""){
erro+="Campos de inserção de produto não estão completos!\n";
  }

}

if (localEntrega=="" || localEntrega==undefined) {
  erro += "Local de Entrega não inserido!\n";
}
if (dataAdi=="") {
  erro += "Data de Emissão não corresponde!";
}
if (erro!="") {
alert(erro);
return false;
}

return true;
}
function confirma(){
  var id=document.getElementById('id').value;
 var resposta= confirm("Deseja mesmo excluir o orçamento selecionado ?");

 if(resposta==true){
     return true;
 }else{
     return false;
 }
}
function confirma(){
  var id=document.getElementById('id').value;
 var resposta= confirm("Deseja mesmo excluir o orçamento selecionado?");

 if(resposta==true){
     return true;
 }else{
     return false;
 }
}
