<?php

//acesso ao banco de dados   
$enderecobd = "localhost";   
$dbname = "localdb";       
                             
//dados do banco             
$usuariobd = "root";         
$senhabd = "";         

//conectar ao banco                                                                                   
$con  = mysqli_connect($enderecobd,$usuariobd,$senhabd) or die ("Erro na conexão do Banco de Dados!");

//acessou ao banco dados	                                                 
$selbd = mysqli_select_db($con, $dbname) or die ("Erro em selecionar Tabela!");


?>
