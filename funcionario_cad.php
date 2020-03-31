<?php
session_start();
date_default_timezone_set('Brazil/East');
require('conexao/conexao.php');
require('function/class.php');
require("protege.php");
$randNum = new numberRandom;
$randNum->max=6;

if($_SESSION['userTipo'] != 2){
    ?>
    <script type="text/javascript">
        alert("Funçao Inacessivel para seu nivel de acesso");
        window.history.back(-1);
    </script>
    <?
}else{

?>
<html>
<head>
    <title>GO - Gestão de Oticas</title>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <link rel="stylesheet" type="text/css" href="css/funcionario.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>


</head>   
<body>
	<div class="appContent">
		<div class="container">
			<div class="logo"><img src="img/logo.png"></div>
		<div class="content">
				<h1>Cadastro de Funcionarios</h1>
			</div>
		</div>
        <div class="painel">
            <i>É obrigatorio o preenchimento de todos os campos marcados com <span class="require">*</span></i>
           <form action="function/api.php?action=cadFuncionario" method="POST">
            <div class="box-left">
                <div class="form-title">Dados Pessoais</div>
                
                <div class="form-group qw5">
                    <label>Nome:<span class="require">*</span></label>
                    <input type="text" name="nomeUser" placeholder="Ex: Adelaide Santos Cupim" require>
                </div>
                <div class="form-group qw5">
                    <label>Codigo:<span class="require">*</span></label>
                    <?php
                        $all        = mysql_query("SELECT * FROM `register_login` ORDER by id DESC");
                        $fetch      = mysql_fetch_array($all);

                        $cod =$fetch['codigo'];
                        $cod = str_replace('CC', '', $cod);
                        $codigo =   $cod++;
                        
                        if(strlen($cod) == 1){
                            $cod = '000'.$cod;
                        }elseif(strlen($cod) == 2){
                            $cod = '00'.$cod;
                        }elseif(strlen($cod) == 3){
                            $cod = '0'.$cod;
                        }elseif(strlen($cod) > 3 ){
                            $cod = $cod;
                        }
                        $cod = 'CC'.$cod;
                    ?>
                    
                    <input type="text" disabled="" value="<?=$cod?>">
                    <input type="hidden" name="codUser" value="<?=$cod?>">
                </div>
                <div class="form-group qw4">
                    <label>CPF:<span class="require">*</span></label>
                    <input type="text" name="cpf" id="CPF" placeholder="487.547.788-39" require>
                </div>
                <div class="form-group qw4">
                    <label>Sexo:<span class="require">*</span></label>
                    <select name="sexo" require>
                        <option>Feminino</option>
                        <option>Masculino</option>
                    </select>
                </div>
                <div class="form-group qw4">
                    <label>Cargo:<span class="require">*</span></label>
                    <input type="text" name="cargo" require placeholder="Auxiliador">
                </div>
                <div class="form-group qw4">
                    <label>Tipo:<span class="require">*</span></label>
                    <select name="nivelUser" require>
                        <option value="1">F. Comum</option>
                        <option value="2">Administrador</option>
                    </select>
                </div>
            </div>    
            
            <div class="left">
                <div class="box-left">
                    <div class="form-title">Login de Acesso</div>

                    <div class="form-group qw55">
                    <label>Usuario:<span class="require">*</span></label>
                    <input type="text" name="login" placeholder="FC0021" require>
                </div>
                <div class="form-group qw55">
                    <label>Senha:<span class="require">*</span></label>
                    <input type="password" name="password" class="password" require placeholder="************">
                </div>
                <div class="form-group qw55">
                    <label>Repetir Senha:<span class="require">*</span></label>
                    <input type="password" name="passwordConfirm" class="passwordConfirm" require  placeholder="************">
                </div>
                </div>
                <div class="statusAcc">
                <label>Situação:</label>
                <div class="radio_label">
                    <input type="radio" checked="" name="statusacc" value="1"><span>Ativo</span>
                    <input type="radio" name="statusacc" value="0"><span>Inativo</span>

                </div>
            </div>
            </div>
            

            <div class="right">
                <div class="form-group qw666">
                    <label>Observações:</label>
                    <textarea name="obs"></textarea>
                   
                </div>   
             </div>
             <div class="right">
                   
            
                 <button class="btn_save"><img src="img/save_icon.png">Salvar</button>
                    <input type="reset" class="btn_limpa" value='Limpar'>   
        
             </div>
</form>
            </div>


        
        
        
		<div class="option_bottom">
			<button class="help" key="home"><img src="img/icon_home.png"> <span>Home</span></button>
		</div>
        <ul class="info_op">
            <li><strong>Operador: </strong> <span><?=$dadosUser['nome']?></span></li>
            <li><strong>Codigo: </strong> <span><?=$dadosUser['codigo']?></span></li>
            <li><div class="status <?php if($dadosUser['status'] == 1){ echo "active"; }elseif($dadosUser['status'] == 0){ echo "inactive"; }?>"></div> <span><?php if($dadosUser['status'] == 1){ echo "Ativo"; }elseif($dadosUser['status'] == 0){ echo "Inativo"; }?></span></li>
        </ul>
    </div>
    <?php if($_SESSION['sucessAction'] or $_SESSION['errorAction'] ){ ?>
    <div class="alert">
        <div class="alert-dialog">
            <button class="close-dialog"><span></span><span></span></button>
            <?php 
            if($_SESSION['sucessAction'] != NULL){
                echo "<h1>Sucesso!!</h1>";
            }
            elseif($_SESSION['errorAction'] != NULL){
                echo "<h1>Erro</h1>";
            }
            echo "<h2><center>".$_SESSION['sucessAction']."</center></h2>";
            
            echo "<h2><center>".$_SESSION['errorAction']."</center></h2>";
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
<script src="js/script.js"></script>
<?php
 }
    unset($_SESSION['sucessAction'],$_SESSION['errorAction']);
?>