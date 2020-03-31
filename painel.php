<?php
require("protege.php");
?>
<html>
<head>
    <title>GO - Gestão de Oticas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/painel.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	

</head>   
<body>
	<div class="appContent">
		
		<div class="logo" style="margin-top: 60px; float: left;">
			<center>
				<img src="img/logo.png" >
			</center>
		</div>
		<div class="painel">
		
			<button class="btn_painel" key="cadastro"><span><img src="img/icon_cadastro.png"></span> <p>Cadastrar</p></button>
			<button class="btn_painel" key="consultar"><span><img src="img/icon_consulta.png"></span> <p>Consultar</p></button>
			<button class="btn_painel" key="gerarOS"><span><img src="img/icon_gerar_os.png"></span> <p>Gerar OS</p></button>
			<button class="btn_painel" key="concluirVenda"><span><img src="img/icon_conclui_venda.png"></span> <p>Concluir Venda</p></button>
			<button class="btn_painel" key="relatorio"><span><img src="img/icon_relatorio.png"></span> <p>Relatórios</p></button>
			<button class="btn_painel" key="estoque"><span><img src="img/icon_estoque.png"></span> <p>Estoque</p></button>
		
		</div>
		<div class="option_bottom">
			<button class="help" key="help"><img src="img/icon_help.png"> <span>Ajuda</span></button>
			<button class="exit"><img src="img/icon_sair.png"> <span>Sair</span></button>
		</div>
		<ul class="info_op">
			<li><strong>Operador: </strong> <span><?=$dadosUser['nome']?></span></li>
			<li><strong>Codigo: </strong> <span><?=$dadosUser['codigo']?></span></li>
			<li><div class="status <?php if($dadosUser['status'] == 1){ echo "active"; }elseif($dadosUser['status'] == 0){ echo "inactive"; }?>"></div> <span><?php if($dadosUser['status'] == 1){ echo "Ativo"; }elseif($dadosUser['status'] == 0){ echo "Inativo"; }?></span></li>
		</ul>
	</div>
</body>
</html>
<script src="js/script.js"></script>