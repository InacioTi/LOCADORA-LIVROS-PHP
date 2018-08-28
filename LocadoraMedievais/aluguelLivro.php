<?php  

   //acesso ao banco
    include 'conexao.php';
    
    //dados do filme a ser inserido
    $nome 		=	$_REQUEST['nome'];
	$cpf		=	$_REQUEST['cpf'];
	$email		=	$_REQUEST['email'];
	$telefone	=	$_REQUEST['telefone'];
	$endereco	=	$_REQUEST['endereco'];
	$alugar		=	$_REQUEST['alugar'];	
	$codigo		=	"DEFAULT";

	//query
	$query = "INSERT INTO `localdb`.`AlugaStatus`(`codigo`,`nome`,`cpf`,`telefone`,`endereco`,`email`, `EstatusAluguel`)
VALUES (".$codigo.",'".$nome."','".$cpf."','".$telefone."','".$endereco."','".$email."', '".$alugar."')";
	
		
	$resultado = mysql_query($query,$con) or die ("erro em inserir no banco!!!");	
	header('Location:cliente.php');
	

?>



