

function registraClientes(){

    var bairro=document.getElementById("txtBairro").value;
    var numero=document.getElementById("txtNumero").value;
    var rua=document.getElementById("txtRua").value;
    var CEP=document.getElementById("txtCEP").value;
    var cidade=document.getElementById("txtCidade").value;
    var estado=document.getElementById("txtEstado").value;

    var nome=document.getElementById("txtNome").value;
    var CPF=document.getElementById("txtCPF").value;
    var CNPJ=document.getElementById("txtCNPJ").value;

    var inscricaoEstadual=document.getElementById("inscricaoEstadual").value;
    var email=document.getElementById("txtEmail").value;
    var tel1=document.getElementById("txtTel1").value;
    var tel2=document.getElementById("txtTel2").value;
    var select=document.getElementById('select').value;

    var mostraErros="";

    if(select==""){
        mostraErros+="Selecione uma pessoa!\n"
    }
    if(bairro==""){
        mostraErros+="Digite um bairro!"+"\n";
    }
    if(numero==""){
        mostraErros+="Digite um numero!"+"\n";
    }
    if(rua==""){
        mostraErros+="Digite uma rua!"+"\n";
    }
    if(CEP==""){
        mostraErros+="Digite um CEP!"+"\n";
    }
    if(cidade==""){
        mostraErros+="Digite uma cidade!"+"\n";
    }
    if(estado==""){
        mostraErros+="Digite um estado!"+"\n";
    }

    if(nome==""){
        mostraErros+="Digite um nome!"+"\n";
    }

    if (CPF=="" && CNPJ=="") {
        mostraErros+="Digite um CPF ou um CNPJ!\n";
      }
    if(CNPJ=="" && CPF!=="" && CPF.lenght<11){
        mostraErros+="Digite um CPF válido!\n";
    }
    if(CPF=="" && CNPJ!=="" && CNPJ.lenght<14){
        mostraErros+="Digite um CPF válido!\n";
    }
    if(CPF=="" && inscricaoEstadual==""){
        mostraErros+="Digite uma inscrição estadual"+"\n";
    }

    if (email=="" && email.indexOf("@")==-1 || email.indexOf(".")==-1) {
        mostraErros=mostraErros+"Por favor digite um email válido!"+"\n";
      }
    if(tel1==""){
        mostraErros+="Digite um telefone!"+"\n";
    }


    if(mostraErros!=""){
        alert("Foram encontrados erros no registro:\n\n" + mostraErros);
    return false;
    }
    return true;

}
function confirma(){

   var resposta= confirm("Deseja mesmo excluir o cliente selecionado?");

   if(resposta==true){
       return true;
   }else{
       return false;
   }
}


$(document).ready(function(){

$('#select').on('change',function(){
    var selectValor ='#'+$(this).val();
   alert(selectValor);
    $('#pai').children('div').hide();
    $('#pai').children(selectValor).show();





});

});
