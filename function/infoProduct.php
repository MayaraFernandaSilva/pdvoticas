<?php
require('../conexao/conexao.php');
require('class.php');
$id = mysqli_real_escape_string($conn, $_POST['id']);

if($id != NULL){
	$init = new productList;
	$init->id = $id;
	echo json_encode($init->check());
}

?>