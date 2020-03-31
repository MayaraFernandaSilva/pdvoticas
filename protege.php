<?php
session_start();
require("conexao/conexao.php");
$idLogin = $_SESSION['idLogin'];
if($idLogin){
	$dadosConst = mysql_query("SELECT * FROM `register_login` where id='$idLogin'");
	$dadosUser = mysql_fetch_array($dadosConst);
}
?>