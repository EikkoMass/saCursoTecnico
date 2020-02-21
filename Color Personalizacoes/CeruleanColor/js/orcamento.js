
var categorias = $("#todasAsCategorias").val();
var valoresJaAdicionadosAoTotal = [];
var cont = 1;
var contadora = false;


window.onload = function(){
  entregaEntrega(); }


function adicionaProduto(){
  $("#registrosDiv").append(
  '<div id="regisProduto'+cont+'" class="regisProduto">'+
  '<select id="categoria'+cont+'" name="categoria[]" onchange="retornaProduto('+cont+')" class="textbox categoria">'+categorias+'</select>'+
  '<select id="produto'+cont+'" name="produtos[]" onchange="retornaValorUnit('+cont+')" class="textbox produto"><option value="0">Produto*</option></select>'+
  '<input type="number" name="valorUnitario[]" id="valorUnitario'+cont+'" class="textbox unitario" placeholder="Valor Unitário" readonly="readonly">'+
  '<input type="text" name="descricao[]" id="descricao'+cont+'" class="textbox descricao" placeholder="Descrição Estampa*">'+
  '<input type="number" min="0" name="quantidade[]" id="quantidade'+cont+'" class="textbox quantitativo" placeholder="Quantidade*"  onblur="atualizaValorTotal(this.value,'+cont+')">'+
  '<button type="button" onclick="adicionaProduto('+cont+')" class="formDecimal"><img src="../img/iconsSistema/plus.png" class="geral" alt="adicionar produtos"></button>'+
  '<button type="button" onclick="removeProduto('+cont+')" class="formDecimal"><img src="../img/iconsSistema/minus.png" class="geral" alt="remover produtos"></button>'+
  '</div>'

  );


cont+=1;
}
function removeProduto(cont){

var valorTotalAtualPedido= $("#valorTotal").val();

var produtoSelecionado = $("#produto"+cont).val();

if((valorTotalAtualPedido!=0.00)&&(produtoSelecionado!=0)){
  var valorUnitario= $("#valorUnitario"+cont).val();
  var quantidade = $("#quantidade"+cont).val();
  var valorAReduzir= parseFloat(valorUnitario)* parseInt(quantidade);
  $("#valorTotal").val(valorTotalAtualPedido-valorAReduzir);
}


$("#regisProduto"+cont).remove();

}



function atualizaValorTotal(quantidade,cont){
// rever esse trecho com mais detalhes para um melhor desempenho / entendimento!

      var produtoSelecionado = $("#produto"+cont).val();
      var valorJaAdicionado = valoresJaAdicionadosAoTotal[cont];
      var valorTotalAtual = document.getElementById("valorTotal").value;

      var valorUnitarioProdutos= document.getElementById("valorUnitario"+cont).value;


//=============================================================================================
      if ((produtoSelecionado!=0) && (valorJaAdicionado==null)) {
      valorTotalAtual = parseFloat(valorTotalAtual);
      valorUnitarioProdutos = parseFloat(valorUnitarioProdutos);

        var valorAtualizado = (valorUnitarioProdutos * quantidade)+valorTotalAtual;

      $("#valorTotal").val(valorAtualizado);
      }else if ((produtoSelecionado!=0) && (valorJaAdicionado>0)) {
      valorTotalAtual = parseFloat(valorTotalAtual);
      valorUnitarioProdutos = parseFloat(valorUnitarioProdutos);
      var valorAtualizado = (valorTotalAtual-valorJaAdicionado)+valorUnitarioProdutos*quantidade;

      $("#valorTotal").val(valorAtualizado);

      }
      //=============================================================================================





      valoresJaAdicionadosAoTotal[cont] = (valorUnitarioProdutos*quantidade);

// rever esse trecho com mais detalhes para um melhor desempenho / entendimento!
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




function validaOrcamento(cont){
  // var contAtual = cont;
var erro = "";
var desconto = $("#desconto").val();
console.log(desconto);

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

if(desconto<0){
  erro += "Desconto precisa ser um valor positivo!\n";

}

if(desconto>100){
  erro += "Desconto não pode sobrepor ao preço!\n";


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

// function popup(){
//   var desconto = $("#desconto").val();
//
//   if(desconto>0 || desconto<101 && desconto!= NULL && desconto!=""){
//     var popup = document.getElementById('popupFinal');
//   popup.style.display = 'block';
//   var definidor = document.getElementById('tota');
//
//   }
//
//
//
//     if(definidor.value=='sim'){
//       popup.style.display = 'none';
//       return true;
//
//     }else if(definidor.value=='nao') {
//       popup.style.display = 'none';
//       return false;
//
//     }else{
//       alert('não pegou nenhum');
//       return false;
// }}
function confirma(){
 var resposta= confirm("Deseja mesmo excluir o orçamento selecionado ?");

 if(resposta==true){
     return true;
 }else{
     return false;
 }
}


function defineLocal(){
var idcliente =  document.getElementById("cliente").value;
if(idcliente!=0){
  var pagina="../php/retornaLocal.php";
  $.ajax({
    type:'POST',
    dataType:'html',
    url: pagina,
    data:{id:idcliente},
    success: function(retVl){
      $("#localEntrega").val(retVl);
    }
  });
  }
}
function definidorDesconto(){
var desconto = $('#desconto').val();
var valorTotal = $('#valorTotal').val();

desconto = desconto / 100;
desconto = valorTotal * desconto;
let quaseLa = valorTotal - desconto;
final = parseFloat(quaseLa.toFixed(2));

$('#valorTotalFinal').val(final);


}

function arredondador(){
  var valor = $('#valorTotal').val();
document.getElementById('valorTotal').value = parseFloat(valor.toFixed(2));
 }

function ocultador(){ document.getElementById('popupFinal').style.display = 'none';}

function defineProcesso(){

var desconto = $('#desconto').val();


let validador = validaOrcamento();

if(validador){
  if(desconto == "" || desconto==0){

    document.getElementById('formPedido').submit();

  }else{
    definidorDesconto();
  document.getElementById('popupFinal').style.display='block';

  }
}
}

function entregaEntrega(){

if(contadora==false){
  document.getElementById('localEntrega').style.display= "block";
  document.getElementById('localEntregasemi').style.display= "none";
contadora=true;

}else if(contadora==true){

  document.getElementById('localEntrega').style.display="none";
  document.getElementById('localEntregasemi').style.display="block";
contadora=false;

}


}
