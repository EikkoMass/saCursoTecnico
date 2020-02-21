function validaContato(){
 var nome = document.getElementById("nome").value;
 var email = document.getElementById("email").value;
 var telefone = document.getElementById("telefone").value;
 var mensagem = document.getElementById("mensagem").value;
 var erro = "";

    if(nome==""){
        erro = "O Nome inserido é inválido! \n";
    }
    if(email=="" || email.indexOf("@")== -1  || email.indexOf(".")==-1){
        erro += "E-mail inválido! \n";
    }
    if(telefone==""){
        erro += "Telefone inválido! \n"
    }
    if(mensagem==""){
        erro += "Mensagem Inválida!\n";
    }
    if (erro != "") {
        alert(erro);
        return false;
      }
      alert("Mensagem enviada com sucesso!\nFique atento ao seu e-mail e por favor, aguarde a página atualizar!");
 return true;
}
