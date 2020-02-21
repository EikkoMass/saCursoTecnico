function validaRegistro(){

var nome=document.getElementById("nome").value;
var descricao=document.getElementById("descreve").value;

var mostraErros="";


if(nome==""){
    mostraErros+="Digite um nome válido!"+"\n";
}

if(descricao==""){
    mostraErros+="Digite uma descrição válida!"+"\n";
}

if(mostraErros!=""){
    alert("Foram encontrados erros no registro:\n\n" + mostraErros);
 return false;
}else{
    return true;
}
}
function confirma(){
    var id=document.getElementById('idCategoria').value;
    var confirmacao=confirm("Deseja mesmo excluir a categoria?");

    if(confirmacao==true){
        return true;
    }else{
        return false;
    }
}
