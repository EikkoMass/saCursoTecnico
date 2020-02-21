<?php
//recebimento dos dados
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];
// echo $nome."<br>";
// echo $email."<br>";
// echo $problema."<br>";
// echo $mensagem."<br>";

require_once("PHPMailerAutoload.php");

$mail = new PHPMailer();
$mail-> isSMTP();
$mail-> Host='smtp.gmail.com';
$mail-> Port=587;
$mail-> SMTPSecure='tls';
$mail-> SMTPAuth=true;
$mail-> Username="email.color.personalizacoes@gmail.com";
$mail-> Password="color12345";
$mail-> setFrom("$email", "E-mail do Sistema");
$mail-> addAddress("$email");
$mail-> Subject="assunto - ".$assunto;
$mail-> msgHTML("
<img src='../img/IntroduzEmail.png' id='img' alt='colorLogo' style='height: 9%; width: 85%;margin-left: 7%;'><br>
<h2 style='text-align: center; font-size: 20px; color: #1a1a1a;'>Olá ".$nome.",</h2>\n 
<p style='text-align:center; font-size: 16px; color: #0b7ca8;'> Estamos cientes do seu contato e certificamos que e nossa equipe entrará em contato o mais rápido possivel.</p>
<br><br>
<p style='text-align: center; color: #459ec1;'>Atenciosamente Color Personalizações</p>
<img src='../img/FimEmail.png' id='img' alt='colorLogo' style='height: 14%; width: 85%;margin-left: 7%;'><br>

");


//envio e construção da mensagem
if($mail->send()==true){
$mail = new PHPMailer();
$mail-> isSMTP();
$mail-> Host='smtp.gmail.com';
$mail-> Port=587;
$mail-> SMTPSecure='tls';
$mail-> SMTPAuth=true;
$mail-> Username="email.color.personalizacoes@gmail.com";
$mail-> Password="color12345";
$mail-> setFrom("email.color.personalizacoes@gmail.com", "E-mail do Sistema");
$mail-> addAddress("email.color.personalizacoes@gmail.com");
$mail-> Subject="assunto - ".$assunto;
$mail-> msgHTML("
<fieldset>
Nome: ".$nome.".<br>
Email: ".$email.".<br>
Telefone: ".$telefone.".<br>
Assunto: ".$assunto.".<br>
Mensagem: ".$mensagem.".
</fieldset>

");

if ($mail->send()==true) {
  header("Location: ../paginasSite/contato.php?retorno=1");
}
}else {
  header("Location: ../paginasSite/contato.php?retorno=0");
}





?>
