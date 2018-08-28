<?php

//LISTA FUNCIONÁRIO //inicia sessão  
session_start();
 
//Caso o usuário não esteja autenticado, limpa os dados e redireciona
if ( !isset($_SESSION['login']) and !isset($_SESSION['senha']) ) {
    //Destrói
    session_destroy();
 
    //Limpa
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
     
    //Redireciona para a página de autenticação
    header('location:login.php');
}
                            
//dados do banco e dados sistema
include 'conexao.php';
    
?>





<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Locadora Livros Medievais</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
	
	<body>
		
		<div class="wrapper">
			<div class="box">
				<div class="row">
				
				
					<!-- MENU -->            
					<div class="column col-sm-3" id="sidebar">
						<a class="logo" href="#"><span>Locadora de Livros Medievais</span></a>
							<ul class="nav">
								<li class="active">
									<a href="adm.php">Livros</a>
								</li>
								<li>
									<a href="cliente.php">Clientes</a>
								</li>
								<li>
									<a href="funcionario.php">Funcionarios</a>
								</li>
								<li>
									<a href="LocarLivro.php">Locar livros</a>
								</li>
								<li>
									<a href="sair.php">Sair</a>
								</li>
							 </ul>
							<ul class="nav hidden-xs" id="sidebar-footer">
							<li>
							  <a href="#"><h3>Locadora de Livros Medievais</h3></a>
							</li>
						</ul>
					</div>
					
			<!-- DIV PRINCIPAL-->		
			<div class="column col-sm-9" id="main">
              <div class="padding">
				<div class="full col-sm-9">
				
						<!-- cliente que loca o livro -->
                        <div class="col-sm-12" id="featured">   
                          <div class="page-header text-muted">Locar Livro</div>
                          
                          <form class="form-horizontal" action="aluguelLivro.php" method="post">
							<fieldset>
							
							<!-- Form Name -->
							<legend>Locar Livro</legend>
							
							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="filme">Nome</label>
							  <div class="controls">
							    <input id="nome" name="nome" type="text" placeholder="Nome do Cliente" />
							    
							  </div>
							</div>
							
							<!-- Text input -->
							<div class="control-group">
							  <label class="control-label" for="sinopse">Endereco</label>
							  <div class="controls">
							    <textarea id="endereco" name="endereco" placeholder="Endereco"></textarea>
							  </div>
							</div>
							
							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="quantidade">Telefone</label>
							  <div class="controls">
							    <input id="telefone" name="telefone" type="text" placeholder="Telefone" class="input-xxlarge">
							   
							  </div>
							</div>
							
							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="trailer">CPF</label>
							  <div class="controls">
							    <input id="cpf" name="cpf" type="text" placeholder="CPF" class="input-xxlarge">
							    
							  </div>
							</div>
							
							<!-- Text input-->
							<div class="control-group">
							  <label class="control-label" for="trailer">EMAIL</label>
							  <div class="controls">
							    <input id="email" name="email" type="text" placeholder="email" class="input-xxlarge">
							    
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="trailer">Livros a locar:</label>
							  <div class="controls">
							    <input id="email" name="email" type="text" placeholder="Livros" class="input-xxlarge">
							    
							  </div>
							</div>
							
							
							<!-- Button 
							<div class="control-group">
							  <label class="control-label" for=""></label>
							  <div class="controls">
							    <input type="submit" class="btn btn-inverse" value="Enviar" />
							  </div>
							</div>
							
							-->
							</fieldset>
							</form>
                        </div>
                        
                        <!-- cliente-->
				
				

				    <div class="col-sm-12" id="stories">  
						<div class="page-header text-muted divider">
						Livros Cadastrados
						</div>
					</div>
												
					
					<table class="table table-hover">
						<tr>
							<th>Livros</th>
							<th>status</th>
							<th>Classificacao</th>
							<th></th>
						</tr>
									
					<!--Lista de livros do banco -->
					<?php
					//exibindo os dados do banco....
					$query = "select * from TblLivros WHERE status = '' ";
					$dados = mysqli_query($con, $query);
				
					while($linha = mysqli_fetch_assoc($dados)){
					?>
					
					<!-- locar o livro -->
						<tr>
							
							<td class="col-md-6"><?php echo $linha['titulo'];  ?></td>
							<td class="col-md-6"><?php echo $linha['status'];  ?>
							
							<select id="ouro" name="alugar" action="aluguelLivro.php">
									<option></option>
									<option>Alugar</option>
									
							</select>
								
							</td>
							<td class="col-md-6"><?php echo $linha['classific'];  ?></td>
							<td class="col-md-1" action="aluguelLivro.php"><a class="btn btn-danger" href="<?php echo "aluguelLivro.php?codigo=".$linha['codigo']; ?>" role="button">Locar livro</a></td>
						</tr>
						
					<?php 
					}
					?>
                        	
					</table>
					
					<hr>
						<a class="btn btn-info" href="<?php echo "imprimir_filme.php?opcao=1"; ?>" role="button">Imprimir Listagem de Filmes</a>  
					</hr>
				


						
					
				</div>	<!-- fecha div /col-9 -->		
			</div>	<!-- fecha div  /padding -->	
		</div><!-- fecha div  /main -->
	
	</div>			
	</div>		
	</div
		<!-- Links do css e jquery -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
 </body>
</html>