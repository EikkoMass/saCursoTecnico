function validarCampos(){

    var nome=document.getElementById("nome").value;
    var categoria=document.getElementById("categoria").value;
    var  fornecedor=document.getElementById("fornecedor").value;
    var precoUN=document.getElementById("precoUN").value;
    var mostraErros="";


    if(nome==""){
        mostraErros+="Digite um nome!"+"\n";
    }
    if(categoria== 0){
        mostraErros+="Selecione uma categoria!\n";
    }
    if(fornecedor==0){
        mostraErros+="Selecione um fornecedor!\n";
    }
    if(precoUN==0){
        mostraErros+="Digite um preço por unidade!\n";
    }

    if(mostraErros!=""){
    alert("Foram encontrados erros no registro:\n\n" + mostraErros);
    return false;
    }else{
        return true;

    }
}


function confirma(){
    
    var id=document.getElementById('idProdutoEx').value;
    var confirmacao=confirm("Deseja mesmo excluir o produto ?");

    if(confirmacao==true){
        return true;
    }else{
        return false;
    }
} 