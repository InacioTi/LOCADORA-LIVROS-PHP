<?php
    //acesso ao banco
    include 'testeconect.php';
    
    //dados do filme a ser inserido
    $titulo 	=	$_REQUEST['titulofilme'];
	$sinopse	=	$_REQUEST['sinopse'];
	$quantidade =	$_REQUEST['quantidade'];
	$trailer	=	$_REQUEST['trailer'];
	$classific  =   $_REQUEST['classific'];
	$codigo		=	"DEFAULT";

	//query
	$query = "INSERT INTO `localdb`.`TblLivros`(`codigo`,`titulo`,`sinopse`,`quantidade`,`trailer`, `classific`)
VALUES (".$codigo.",'".$titulo."','".$sinopse."','".$quantidade."','".$trailer."', '".$classific."')";

	$resultado = mysqli_query($con,$query) or die ("erro em inserir no banco!");
	header('Location:adm.php');
	
?>