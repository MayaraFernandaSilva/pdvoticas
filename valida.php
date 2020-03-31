<?php
session_start();
require("conexao/conexao.php");

$login 			= mysqli_real_escape_string($conn, $_POST['login']);
$password		= mysqli_real_escape_string($conn, $_POST['password']);
$pass 			= md5($password);
	if($_POST['submit']){

		$dados = mysql_query("SELECT * FROM `register_login` WHERE login='$login' && senha ='$pass'");
		$row = mysql_num_rows($dados);

		if($row > 0){
			// INICIA
			$infoLogin = mysql_fetch_array($dados);
			if($infoLogin['status'] != 0){
				$_SESSION['idLogin'] = $infoLogin['id'];
				$_SESSION['userLogin'] = $infoLogin['login'];
				$_SESSION['userTipo'] = $infoLogin['nivel_acesso'];
				$_SESSION['passLogin'] = $infoLogin['password'];
				?><script type="text/javascript">window.location.href="painel.php";</script><?
			}else{
				// Login ou senha incorreta;
				$_SESSION['errorLogin'] = "Sua conta esta inativa.";
				?><script type="text/javascript">window.history.back(-1)</script><?	
			}
		}elseif($row == 0){
			// Login ou senha incorreta;
			$_SESSION['errorLogin'] = "Login ou Senha Incorreta";
			?><script type="text/javascript">window.history.back(-1)</script><?
		}

	}

?>