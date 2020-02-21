
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Color Personalizações</title>
  <meta charset="utf-8">
  <script src="../js/login.js"></script>
  <link rel="stylesheet" href="../css/login.css">
  <link rel="shortcut icon" href="../img/Favicon.ico" />
</head>
<body>
    <main>
        <div id="login">
            <a href="../index.html"><img src="../img/Logo.png" id="img" alt="logo color Personalizações"></a>
            <h2>Login</h2>
<?php


if (isset($_GET["retorno"])==true && $_GET["retorno"]==1) {
include("../alertas/erro.html");
}
 ?>

            <form method="POST"  onsubmit="return validaLogin()" action="../php/efetuaLogin.php">
                <div id="campo_login"><label for="usuario" class="labelclass">Usuário:</label>
                <input type="text" id="usuario" name="usuario" class="textbox"></div>
              <div id="campo_senha"><label for="senha" class="labelclass" id="labelsenha">Senha:</label>
                <div id="totallypass"><input type="password" id="senha" name="senha" class="textbox"><img src='../img/eye.png' id="eye" onclick="showPass()"></div></div>

                <button type="submit" id="enviar">Confirmar</button>
            </form>
        </div>



    </main>
</body>
</html>
