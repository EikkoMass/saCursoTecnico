<?php
require_once("conexaoBanco.php");
include("mpdf/mpdf.php");

  $relatorio = $_POST['html'];
  if($relatorio==""){
  $relatorio = "<tr><td colspan='4'>Nenhum Valor encontrado</td></tr>";

  }
$mpdf = new mPDF();
$mpdf->SetDisplayMode("fullpage");



$mpdf->WriteHTML("
<style>
*{
  font-family: Arial;
}
h1{
  text-align: center;
  border-top: 2px solid #707070;
  border-bottom: 2px solid #707070;
  color: #707070;
  padding: 10px 0px;
}
th{
  border-bottom: 2px solid #22e3d8;
  text-align: center;
  padding-left:4%;
  padding-right:4%;
  color: #5e5e5e;
}
table{

  border-radius: 20px;

}
td{
  text-align: center;
  border: 1px solid darkgrey;
}

#imgLogo{
  height: 35px;
  width: 35px;
  margin-left: 46%;
}
#borda{
  padding: 4%;
  border-radius: 15px;
  border: 3px solid #707070;

}
</style>
<img src='../img/iconsSistema/LogoServico.png' id='imgLogo'>
<h1>Relatório de Pedidos</h1>
<div id='borda'>
<table>
  <tr>
    <th>Nome do Cliente</th>
    <th>Data de Cadastro</th>
    <th>Valor Total</th>
    <th>Funcionário Responsável</th>
    <th>Produtos</th>
  </tr>
  <tr>
    ".$relatorio."
  </tr>
</table>
</div>


");







$mpdf->Output();
exit();
?>
