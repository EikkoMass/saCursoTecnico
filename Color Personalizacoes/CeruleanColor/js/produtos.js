var escritorio1;
var escritorio2;
var produtosEco;
var produtosFesta;
var produtosVestuario;

window.onload=function(){
    escritorio1=document.getElementById("escritorio1");
    escritorio2=document.getElementById("escritorio2");
    produtosEco=document.getElementById("produtosEco");
    produtosFesta=document.getElementById("produtosFesta");
    produtosVestuario=document.getElementById("produtosVestuario");


    var escritorioIcon=document.getElementById("escritorioIcon");
    escritorioIcon.onclick=mostrarescritorio1;

    var volta=document.getElementById("volta");
    volta.onclick=mostrarescritorio1;

    var proxima=document.getElementById("proxima");
    proxima.onclick=mostrarescritorio2;

    var ecoIcon=document.getElementById("ecoIcon");
    ecoIcon.onclick=mostrarprodutosEco;

    var festaIcon=document.getElementById("festaIcon");
    festaIcon.onclick=mostrarprodutosFesta;

    var vestuarioIcon=document.getElementById("vestuarioIcon");
    vestuarioIcon.onclick=mostrarprodutosVestuario;

    escritorio1.classList.remove("escondido");
    escritorio2.classList.add("escondido");
    produtosEco.classList.add("escondido");
    produtosFesta.classList.add("escondido");
    produtosVestuario.classList.add("escondido");
    
    
}

function mostrarescritorio1(){
    escritorio1.classList.remove("escondido");
    escritorio2.classList.add("escondido");
    produtosEco.classList.add("escondido");
    produtosFesta.classList.add("escondido");
    produtosVestuario.classList.add("escondido");
}
function mostrarescritorio2(){
    escritorio1.classList.add("escondido");
    escritorio2.classList.remove("escondido");
    produtosEco.classList.add("escondido");
    produtosFesta.classList.add("escondido");
    produtosVestuario.classList.add("escondido");
}
function mostrarprodutosEco(){
    escritorio1.classList.add("escondido");
    escritorio2.classList.add("escondido");
    produtosEco.classList.remove("escondido");
    produtosFesta.classList.add("escondido");
    produtosVestuario.classList.add("escondido");
}

function mostrarprodutosFesta(){
    escritorio1.classList.add("escondido");
    escritorio2.classList.add("escondido");
    produtosEco.classList.add("escondido");
    produtosFesta.classList.remove("escondido");
    produtosVestuario.classList.add("escondido");
}

function mostrarprodutosVestuario(){
    escritorio1.classList.add("escondido");
    escritorio2.classList.add("escondido");
    produtosEco.classList.add("escondido");
    produtosFesta.classList.add("escondido");
    produtosVestuario.classList.remove("escondido");
}