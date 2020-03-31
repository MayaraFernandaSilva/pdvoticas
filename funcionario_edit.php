<?php
session_start();
date_default_timezone_set('Brazil/East');
require('conexao/conexao.php');
require('function/class.php');

$randNum = new numberRandom;
$randNum->max=6;

$id = mysqli_real_escape_string($conn,$_GET['id']);
$user = new userConsult;
$user->id = $id;
$user->tb = 'register_login';
$dados = $user->check();

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
           <form action="function/api.php?action=editFuncionario" method="POST">
            <div class="box-left">
                <div class="form-title">Dados Pessoais</div>
                
                <div class="form-group qw5">
                    <label>Nome:<span class="require">*</span></label>
                    <input type="text" name="nomeUser" placeholder="Ex: Adelaide Santos Cupim" value="<?=$dados['nome']?>" require disabled="">
                </div>
                <div class="form-group qw5">
                    <label>Codigo:<span class="require">*</span></label>
                    <input type="text" name="codUser" value="<?=$dados['codigo']?>" require disabled="">
                </div>
                <div class="form-group qw4">
                    <label>CPF:<span class="require">*</span></label>
                    <input type="text" name="cpf" id="CPF" placeholder="487.547.788-39" value="<?=$dados['cpf']?>" require disabled="">
                </div>
                <div class="form-group qw4">
                    <label>Sexo:<span class="require">*</span></label>
                    <select name="sexo" require disabled="">
                        <option <?php if($dados['sexo'] == "Feminino"){ ?> selected <?php } ?>>Feminino</option>
                        <option <?php if($dados['sexo'] == "Masculino"){ ?> selected <?php } ?>>Masculino</option>
                    </select>
                </div>
                <div class="form-group qw4">
                    <label>Cargo:<span class="require">*</span></label>
                    <input type="text" name="cargo" require disabled="" placeholder="Auxiliador" value="<?=$dados['cargo']?>">
                </div>
                <div class="form-group qw4">
                    <label>Tipo:<span class="require">*</span></label>
                    <select name="nivelUser" require disabled="">
                        <option value="1" <?php if($dados['nivel_acesso'] == "1"){ ?> selected <?php } ?>>F. Comum</option>
                        <option value="2" <?php if($dados['nivel_acesso'] == "2"){ ?> selected <?php } ?>>Administrador</option>
                    </select>
                </div>
            </div>    
            
            <div class="left">
                <div class="box-left">
                    <div class="form-title">Login de Acesso</div>

                    <div class="form-group qw55">
                    <label>Usuario:<span class="require">*</span></label>
                    <input type="text" name="login" placeholder="FC0021" value="<?=$dados['login']?>" require disabled="">
                </div>
                <div class="form-group qw55">
                    <label>Senha:<span class="require">*</span></label>
                    <input type="password" name="password" class="password" require placeholder="************" disabled="">
                </div>
                <div class="form-group qw55">
                    <label>Repetir Senha:<span class="require">*</span></label>
                    <input type="password" name="passwordConfirm" class="passwordConfirm" require  placeholder="************" disabled="">
                </div>
                </div>
                <div class="statusAcc">
                <label>Situação:</label>
                <div class="radio_label">
                    <input type="radio" checked="" name="statusacc"  <?php if($dados['status'] == "1"){ ?> checked <?php } ?> value="1"disabled=""><span>Ativo</span>
                    <input type="radio" name="statusacc" disabled="" <?php if($dados['status'] == "0"){ ?> checked <?php } ?> value="0"><span>Inativo</span>

                </div>
            </div>
            </div>
            

            <div class="right">
                <div class="form-group qw666">
                    <label>Observações:</label>
                    <textarea name="obs" disabled="false"><?=$dados['obs']?></textarea>
                    <input type="hidden" name="idUser" value="<?=$dados['id']?>">
                   
                </div>   
             </div>
             <div class="right">
                   
            
                 <button class="btn_save"><img src="img/save_icon.png">Salvar</button>    
                <a class="btn_save" key="editarFuncionario" style="background: #009ee3; cursor: pointer;"><img src="img/icon_edit.png">Editar</a>
                 <a class="btn_save" key="excluirFuncionario" style="background: #e30000; cursor: pointer;"><img src="img/excluir_icon.png">Excluir</a>  
             

</form>

                     </div>
                 
            </div>


        
        
        
		<div class="option_bottom">
			<button class="help" key="home"><img src="img/icon_home.png"> <span>Home</span></button>
		</div>
        <ul class="info_op">
            <li><strong>Operador: </strong> <span>Geronimo Andrade</span></li>
            <li><strong>Codigo: </strong> <span>AD0001</span></li>
            <li><div class="status active"></div> <span>Ativo</span></li>
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
        a.btn_save{
            height: auto;
            padding: 10px 20px;
        }
      </style>
</body>
</html>
<script src="js/script.js"></script>
<script type="text/javascript">

    $('.btn_save').click(function(){
    var key = $(this).attr('key');
    if(key == "editarFuncionario"){
       event.preventDefault();
       $('input').prop("disabled", false);  
       $('select').prop("disabled", false); 
       $('textarea').prop("disabled", false); 
    }
    else if(key == "excluirFuncionario"){
      
     var txt;
     var r = confirm("Iremos excluir o Usuario <?=$dados['nome']?>?");
    
      if(r == true){
            location.href="?exl=<?=$id?>&id=<?=$id?>";
        }else{

        }
    }
});

</script>
<?php
    unset($_SESSION['sucessAction'],$_SESSION['errorAction']);
?>
<?php
if($_GET['exl'] != NULL){
   $mysql = mysql_query("DELETE FROM `register_login` WHERE id='$id'");
            
            if($mysql){
                $_SESSION['sucessAction'] = "Alteração de ".$nome." Feita com sucesso";
                ?><script>window.history.back(-1)</script><?php
            }
}
?>