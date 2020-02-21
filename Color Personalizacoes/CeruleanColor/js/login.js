function validaLogin(){

    var usuario= document.getElementById("usuario").value;
    var senha= document.getElementById("senha").value;
    var erro= "";

if(usuario==""){
    erro= "Campo usuário inserido não está preenchido!\n";
}
if(senha== ""){
    erro += "Campo senha inserido não está preenchido!";
}
if(erro != ""){
    alert(erro);
    return false;
}

return true;

}
function showPass(){

if(document.getElementById('senha').type == 'password'){
  document.getElementById('senha').type = 'text';
}else {
  document.getElementById('senha').type = 'password';
}

}
