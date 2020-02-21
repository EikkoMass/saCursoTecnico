<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title> Ordens de Serviços || Color </title>
<link rel="stylesheet" href="../css/editaStatusOrdem.css">
<link rel="shortcut icon" href="../img/Favicon.ico" />
</head>
<body>
<header>
  <a href="../index.html"><img src="../img/iconsSistema/quit.png" alt="Sair do Sistema" id="saia"></a>
  <br><br><a href="../paginasSistema/ordensServico.php"><p id="voltar">Voltar</p></a>
</header>
<main>
<img src="../img/Logo.png" alt="Logo" id="LogoPrincipal">
<h2>Ordem de Serviço</h2>
<form action="editaStatus.php" type="GET">
<div id="cape">
  <br><br>
                <div id="planoFundo">
                <table id="tabela">
                  <thead>
                    <tr id="cabeca">
                      <th class="thborder" id="th1">Código</th>
                      <th class="thborder">Cliente</th>
                      <th class="thborder">Data de Entrega</th>
                      <th class="thborder">Funcionário Responsável</th>
                      <th class="thborder" id="th5">Status</th>

                    </tr>
                  </thead>
                  <tbody>

                      <?php
                        require_once("../php/conexaoBanco.php");

                        $idvi=$_GET['idVi'];
                        $comando="SELECT ord.id, cli.nome, ord.data_entrega, fun.nome AS nome_funcionario, ord.status FROM ordens_de_servicos AS ord INNER JOIN funcionarios AS fun ON ord.funcionarios_matricula=fun.matricula INNER JOIN orcamentos AS orc ON orc.id=ord.orcamentos_id INNER JOIN clientes AS cli ON orc.clientes_id=cli.id WHERE ord.id= ".$idvi;


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
                              <td class="tdborder">
                              <select name="status">
                                <option value="1">Em Andamento</option>
                                <option value="2">Concluído</option>

                              </select> </td>

                              </tr>

                  </tbody>

                </table>
                <br><br>

                  <input type="hidden" value="<?php echo $cadaGeral['id'];?>" name="idVi" >
                  <button type="submit" id="salvar">Salvar</button>
                </form><?php
                      }//fechamento foreach
                    }//fechamento else
                     ?>
                <br><br>
                </div>
              </div>
            </fieldset>




</main>
<footer id="rodape">

</footer>

</body>
</html>
