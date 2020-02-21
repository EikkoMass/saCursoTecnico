function registraOrdem(){
    var orcamento=document.getElementById("orcamento").value;
    var dtEntrega=document.getElementById("dtEntrega").value;
    var funcionario=document.getElementById("funcionario").value;
    var mostraErros="";

    if(orcamento==0){
        mostraErros+="Selecione um orçamento\n";
    }
    if(funcionario==0){
        mostraErros+="Selecione um funcionário!";
    }

    if(mostraErros!=""){
        alert("Por favor:\n\n"+mostraErros);
    }
}