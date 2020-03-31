<?php
	require('../conexao/conexao.php');
	$titulo = mysqli_real_escape_string($conn, $_POST['titulo']);

	$check = mysql_query("SELECT * FROM `product_register` WHERE titulo LIKE'%$titulo%'");
	
	
		$arrayName = array(); ;
	while ($dados = mysql_fetch_array($check)) {
	 	$arrayName[] = array('id' => $dados['id'],'titulo' => $dados['titulo'], 'unitPreco' => $dados['valor']);

	}	
	echo json_encode($arrayName);

?>