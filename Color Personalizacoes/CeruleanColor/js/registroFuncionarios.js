function validaRegistro(){


var bairro=document.getElementById("txtBairro").value;
var numero=document.getElementById("txtNumero").value;
var rua=document.getElementById("txtRua").value;
var CEP=document.getElementById("txtCEP").value;
var cidade=document.getElementById("txtCidade").value;
var estado=document.getElementById("txtEstado").value;
var nome=document.getElementById("txtNome").value;
var CPF=document.getElementById("txtCPF").value;
var usuario=document.getElementById("txtUsuario").value;
var email=document.getElementById("txtEmail").value;
var senha=document.getElementById("txtSenha").value;
var nivel=document.getElementById("nivel").value;


var mostraErros="";


if(bairro==""){
    mostraErros+="Digite um bairro válido!"+"\n";
}

if(numero==""){
    mostraErros+="Digite um numero válido!"+"\n";
}

if(rua==""){
    mostraErros+="Digite uma rua válida!"+"\n";
}
if(CEP==""){
    mostraErros+="Digite um CEP válido!"+"\n";
}
if(cidade==""){
    mostraErros+="Digite uma cidade válida!"+"\n";
}
if(estado==""){
    mostraErros+="Digite um estado válido!"+"\n";
}

if(nome==""){
    mostraErros+="Digite um nome válido!"+"\n";
}

if (CPF=="" || CPF.length<11) {
    mostraErros+="Digite um CPF válido!\n";
  }
if(usuario==""){
    mostraErros+="Digite um Usuario válido!"+"\n";
}
if(senha==""){
    mostraErros+="Digite uma senha válida!"+"\n";
}
if(nivel==0){
    mostraErros+="Digite um nivel válido!"+"\n";
}


if (email=="" && email.indexOf("@")==-1 || email.indexOf(".")==-1) {
    mostraErros=mostraErros+"Por favor digite um email válido!"+"\n";
  }
 


if(mostraErros!=""){
    alert("Foram encontrados erros no registro:\n\n" + mostraErros);
 return false;
}else{
    return true;
}

}function confirma(matricula){
    var matricula=document.getElementById('matricula').value;
   var resposta= confirm("Deseja mesmo excluir o funcionario selecionado ?");

   if(resposta==true){
       return true;
   }else{
       return false;
   }
}