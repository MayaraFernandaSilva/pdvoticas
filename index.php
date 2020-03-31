<?php
require("protege.php");
$errorLogin = $_SESSION['errorLogin'];
?>
<html>
<head>
    <title>GO - Gestão de Oticas</title>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>   
<body>
<div class="backG"></div>		
	<div class="appContent">
		<div class="container">
			<div class="logo"><img src="img/logo.png"></div>
			<div class="login">
				<h1>Seja Bem Vindo!</h1>
                <div class="option">
                    <button class="optLogin active" key="login">Login</button>
                    <button class="optLogin" key="cadastro">Cadastro</button>
                </div>
				<div class="form log">

					<div class="header">
						<span>Login</span>
						<p>Entre com seus dados corretamente para acessar o sistema.</p>
					</div>
					<form action="valida.php" method="POST">
					<div class="content">
						<div class="optGroup">
							<label for="login">Usuário: </label>
							<input type="text" name="login" id="login" placeholder="Seu Nome ou Codigo de Funcionario">
						</div>
						<div class="optGroup">
							<label for="password">Senha: </label>
							<input type="password" name="password" id="password" placeholder="************">
						</div>
						<div class="optGroup">
							<input type="submit" id="submit" name="submit" value="Entrar">
						</div>
						</form>
					</div>

				</div>
			     <div class="form cadastro">
                    <div class="header">
                        <span>Cadastro</span>
                    </div>
                    <form action="register.php" method="POST">
                    <div class="content">
                        <div class="optGroup">
                            <label for="nome">Nome: </label>
                            <input type="text" name="nome" id="nome" placeholder="Seu Nome completo">
                        </div>
                        <div class="optGroup">
                            <label for="cpf">CPF: </label>
                            <input type="text" name="cpf" id="cpf" placeholder="Seu CPF">
                        </div>
                        <div class="optGroup">
                            <label for="sexo">Sexo: </label>
                            <select name="sexo" id="sexo">
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                            </select>
                        </div>
                        <div class="optGroup">
                            <label for="login">Usuário: </label>
                            <input type="text" name="login" id="login" placeholder="Seu Nome de usuario">
                        </div>
                        <div class="optGroup">
                            <label for="password">Senha: </label>
                            <input type="password" name="password" id="password" placeholder="************">
                        </div>
                        <div class="optGroup">
                            <input type="submit" id="submit" name="submit" value="Cadastrar-se">
                        </div>
                        </form>
                    </div>
            </div>
		</div>
	<div class="clear"></div>
	</div>
	<?php if($_SESSION['errorLogin'] or $_SESSION['errorAction'] ){ ?>
    <div class="alert">
        <div class="alert-dialog">
            <button class="close-dialog"><span></span><span></span></button>
            <?php 
            
            if($_SESSION['errorLogin'] != NULL){
                echo "<h1><center>Erro</center></h1>";
            }
            
            echo "<h2><center>".$_SESSION['errorLogin']."</center></h2>";
            ?>
        </div>
    </div>
    <?php } ?> 
    <?php if($_SESSION['successLogin'] ){ ?>
    <div class="alert">
        <div class="alert-dialog">
            <button class="close-dialog"><span></span><span></span></button>
            <?php 
            
            if($_SESSION['successLogin'] != NULL){
                echo "<h1><center>Sucesso</center></h1>";
            }
            
            echo "<h2><center>".$_SESSION['successLogin']."</center></h2>";
            ?>
        </div>
    </div>
    <?php } ?>    
    <style>
        
        .alert-dialog button{
            position:absolute;
            right:0;
            top:0;
            width:40px;
            height:40px;
            background:transparent;
            border:none;
        }
        .alert-dialog button span:nth-child(1){
            height:100%;
            width:4px;
            background:red;
            float:left;
            position:absolute;
            left:20;
            top:0;
            transform:rotate(-45deg);
        }.alert-dialog button span:nth-child(2){
            height:100%;
            width:4px;
            background:red;
            float:left;
            position:absolute;
            left:20;
            top:0;
            transform:rotate(45deg);
        }
        .alert{
            float:left;
            height:100vh;
            width:100%;
            position:absolute;
            background:rgba(0,0,0,.5);
        }
        .alert-dialog{
            position:relative;
            top:calc(50% - 230px);
            width:50%;
            margin-left:25%;
            background:#3988af ;
            padding-top:20px;
            padding-bottom:20px;
            height:calc(460px - 40px);
        }
        @media screen and (max-width:750px){
            .alert-dialog{
            position:relative;
            top:0;
            width:95%;
            margin-left:2.5%;
            background:#3988af ;
            padding-top:20px;
            padding-bottom:20px;
            height:calc(460px - 40px);
        }
        }
        .alert-dialog h1{
            color:yellow;
        }.alert-dialog h2{
            color:white;
        }
    </style>
</body>
</html>
<script type="text/javascript">
    $('.optLogin').click(function(){
        var exist = $(this).hasClass('active');
        var key   = $(this).attr('key');
        if(exist == true){

        }else{
            $('.optLogin').removeClass('active');
            $(this).addClass('active');
            if(key == "login"){
                $('.cadastro').fadeOut('slow').hidden;
                setTimeout(function(){
                    $('.log').fadeIn('slow').show;    
                },600);
            }if(key == "cadastro"){
                $('.log').fadeOut('slow').hidden;
                setTimeout(function(){
                    $('.cadastro').fadeIn('slow').show;    
                },600);
                
            }
        }

    });
</script>
<script src="js/script.js"></script>
<?php unset($_SESSION['errorLogin'],$_SESSION['successLogin']); ?>