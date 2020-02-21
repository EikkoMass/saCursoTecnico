<?php
session_start();
if(isset($_SESSION['nivelLogado']) && $_SESSION['nivelLogado']==3){

require_once("../php/conexaoBanco.php");

 ?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title> Ordens de Serviços || Color </title>
<link rel="stylesheet" href="../css/ordensServico.css">
<link rel="shortcut icon" href="../img/Favicon.ico" />
</head>
<body>
<header>
  <form method="POST" action="../php/efetuaLogout.php">
  <button type="submit"style="background-color: transparent; border: none; float: right"><img src="../img/iconsSistema/quit.png" alt="Sair do Sistema" id="saia"></button>


  </form>  <br><br><a href="principalAtendente.php"><p id="voltar">Voltar</p></a>
</header>
<main>
<img src="../img/Logo.png" alt="Logo" id="LogoPrincipal">
<h2>Ordem de Serviço</h2>
    <form method="GET" action="ordensServico.php">
            <fieldset id="fieldset">

                <label for="nome" class="pesquisa">Nome do Cliente: </label>
                <input type="text" name="buscaNome" id="nome">
                <button type="submit" id="botaoPesquisa"><img src="../img/iconsSistema/pesquisaPequeno.png" alt="pesquisa" id="pesquisa"></button>
                <br><br>
                  </form>
                <div id="linha"></div>
                <br><br>
                <div id="planoFundo">
                <table id="tabela">
                  <thead>
                    <tr id="cabeca">
                      <th class="thborder" id="th1">Código</th>
                      <th class="thborder">Cliente</th>
                      <th class="thborder">Data de Entrega</th>
                      <th class="thborder">Funcionário Responsável</th>
                      <th class="thborder">Status</th>
                      <th class="thborder" id="th6">Ação</th>
                    </tr>
                  </thead>
                  <tbody>

                      <?php
                        require_once("../php/conexaoBanco.php");

                        if(isset($_GET['buscaNome'])==false){
                  				$comando="SELECT ord.id, cli.nome, ord.data_entrega, fun.nome AS nome_funcionario, ord.status FROM ordens_de_servicos AS ord INNER JOIN funcionarios AS fun ON ord.funcionarios_matricula=fun.matricula INNER JOIN orcamentos AS orc ON orc.id=ord.orcamentos_id INNER JOIN clientes AS cli ON orc.clientes_id=cli.id";
                  			}else if (isset($_GET['buscaNome'])==true
                  			&& $_GET['buscaNome']==""){
                  				$comando="SELECT ord.id, cli.nome, ord.data_entrega, fun.nome AS nome_funcionario, ord.status FROM ordens_de_servicos AS ord INNER JOIN funcionarios AS fun ON ord.funcionarios_matricula=fun.matricula INNER JOIN orcamentos AS orc ON orc.id=ord.orcamentos_id INNER JOIN clientes AS cli ON orc.clientes_id=cli.id";
                        }else if (isset($_GET['buscaNome'])==true
                  			&& $_GET['buscaNome']!=""){
                  					$busca = $_GET['buscaNome'];
                  					$comando="SELECT ord.id, cli.nome, ord.data_entrega, fun.nome AS nome_funcionario, ord.status FROM ordens_de_servicos AS ord INNER JOIN funcionarios AS fun ON ord.funcionarios_matricula=fun.matricula INNER JOIN orcamentos AS orc ON orc.id=ord.orcamentos_id INNER JOIN clientes AS cli ON orc.clientes_id=cli.id WHERE cli.nome LIKE '%".$busca."%'";
                          }

                          $resultado = mysqli_query($conexao,$comando);
                    			$linhas=mysqli_num_rows($resultado);
                    			if($linhas==0){		?>

                    			<tr>
                    				<td colspan="6">Nenhuma categoria encontrada</td>
                    			</tr>

                    			<?php
                    				}else{
                    					$geralRetornadas = array();

                    					while($cadaLinha = mysqli_fetch_assoc($resultado)){
                    						array_push($geralRetornadas,$cadaLinha);
                    					}
                    					foreach($geralRetornadas as $cadaGeral){
                    					?>
                    					<tr>

                    					<td class="tdborder" > <?php echo $cadaGeral['id'];?> </td>
                    					<td class="tdborder"> <?php echo $cadaGeral['nome'];?> </td>
                              <td class="tdborder"> <?php echo $cadaGeral['data_entrega'];?> </td>
                              <td class="tdborder"> <?php echo $cadaGeral['nome_funcionario'];?> </td>
                              <td class="tdborder"> <?php
                                if($cadaGeral['status']==1){
                                  echo "Em Andamento";
                                }elseif($cadaGeral['status']==2){
                                  echo "Concluído";
                                }elseif($cadaGeral['status']==3){
                                  echo "Cancelado";
                                }
                              ?> </td>
                              <td class="tdborder">

                                	<form action="visualizarOrdemAte.php" method="GET">
                                    <input type="hidden" value="<?php echo $cadaGeral['id'];?>" name="idVi" >
                                <button type="submit" class="visualizar"><img src="../img/iconsSistema/olho.png" id="olho" alt="Visualizar ordem"></button>
                              </form>
                            </td>
                              </tr>
                    <?php
                      }//fechamento foreach
                    }//fechamento else
                     ?>
                  </tbody>

                </table>

                </div>
            </fieldset>




</main>
<footer id="rodape">

</footer>

</body>
</html>

<?php }
else{
  header("Location: ../paginasSite/login.php");
}


 ?>
