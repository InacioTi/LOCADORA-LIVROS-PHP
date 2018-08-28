<?php

//include 'testeconect.php';

//dados do usuario da sessão
$email = $_POST['login'];
$senha = $_POST['senha'];


//$enviar = isset($_POST['enviar']) ? $_POST['enviar']: '';
$con = mysqli_connect('localhost', 'root', '') or trigger_error(mysqli_error(),E_USER_ERROR); 

mysqli_select_db($con, 'localdb');


//verificou se há usuairo
$resultado = mysqli_query($con, "SELECT * FROM funcionario WHERE email ='$email' AND senha ='$senha'");

$num_rows = mysqli_num_rows ($resultado);


///Caso consiga logar cria a sessão
if (mysqli_num_rows ($resultado) > 0) {
	
    // session_start inicia a sessão
    session_start();
     
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;

	header("Location:adm.php");
	
	
}

//Caso contrário redireciona para a página de autenticação
else {

    //Destrói
	session_destroy(); 

    //Limpa
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
 
    //Redireciona para a página de autenticação
    header('location:index.php');
}
   
?>