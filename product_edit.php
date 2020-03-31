<?php
    date_default_timezone_set('Brazil/East');
    session_start();
    require("protege.php");
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $busca = mysql_query("SELECT * FROM `product_register` WHERE id='$id'");
    $dados = mysql_fetch_array($busca);
?>
<html>
<head>
    <title>GO - Gestão de Oticas</title>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <link rel="stylesheet" type="text/css" href="css/cadproduct.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>

</head>   
<body>
	<div class="appContent">
		<div class="container">
			<div class="logo"><img src="img/logo.png"></div>
		<div class="content">
				<h1>Cadastro de Produtos</h1>
			</div>
		</div>
        <div class="painel">
            <form action="function/api.php?action=productEdit" method="POST">
            <div class="box-left">
                <div class="form-title">Dados do produto</div>
                
                <div class="form-group qw6">
                    <label>Nome do Produto:<span class="require">*</span></label>
                    <input type="text" placeholder="Ex: Oculos Ray-Ban - Preto" disabled="" name="nomeProduct" value="<?=$dados['titulo']?>" required="">
                </div>
                <div class="form-group qw4">
                    <label>Codigo Interno:<span class="require">*</span></label>
                    
                    <input type="text" disabled="" name="codProduct" value="<?=$dados['codigo']?>" disabled="">

                </div>
                <div class="form-group qw4">
                    <label>Codigo de Barra:<span class="require">*</span></label>
                    <input type="text" placeholder="55648763431748612536887654" name="codBarra" required="" value="<?=$dados['codigoBarra']?>" disabled="">
                </div>
                               <div class="form-group qw3">
                    <label>Marca:<span class="require">*</span></label>
                    <input type="text" placeholder="" name="marcaProduct" required="" value="<?=$dados['marca']?>" disabled="">
                </div>
                <div class="form-group qw3">
                    <label>Modelo:<span class="require">*</span></label>
                    <input type="text" placeholder="" name="modeloProduct" required="" value="<?=$dados['modelo']?>" disabled="">
                </div>
                <div class="form-group qw2">
                    <label>ICMS:<span class="require">*</span></label>
                    <input type="text" placeholder="" name="icms"  required="" value="<?=$dados['icms']?>" disabled="">
                </div>
                <div class="form-group qw2">
                    <label>Cfop:<span class="require">*</span></label>
                    <input type="text" placeholder="" name="cfog" required="" value="<?=$dados['Cfop']?>" disabled="">
                </div>
                <div class="form-group qw4">
                    <label>Tributação:<span class="require">*</span></label>
                    <input type="text" placeholder="" name="tributo" required="" value="<?=$dados['tributoStatus']?>" disabled="">
                </div>

                <div class="form-group qw2">
                    <label>Quantidade:<span class="require">*</span></label>
                    <input type="text" value="5" name="qtdProduct" required="" value="<?=$dados['qtd']?>" disabled="">
                </div>
                <div class="form-group qw3">
                    <label>Preço Unitario:<span class="require">*</span></label>
                    <input type="text" placeholder="R$ 440,00" name="valorUnit" required="" value="<?=$dados['valor']?>" disabled="">
                </div>

                <div class="statusAcc qw3">
                
                    <label style="width: 100%; float: left;"><center>Contabilizar em estoque:</center></label>
                    <div class="radio" style="float: left; width: 100%; margin-top:10px;">
                        <center>
                        <input type="radio" checked="" name="statusacc" value="1" disabled=""><span>Sim</span>
                        <input type="radio" name="statusacc" value="0" disabled=""><span>Não</span>
                        </center>
                    </div>

                </div>
             
            </div>    
            
            <div class="left">
                <div class="img-product">
                    <center>
                        <img src="<?=str_replace('../','',$dados['img'])?>" class="productImg">
                    </center>
                    <input type="hidden" class="productImg" name="imgProduct" value="<?=str_replace('../','',$dados['img'])?>" required="">
                </div>               
                <div class="btn-product">
                    <div class="addImg"><i class="fas fa-plus"></i> <span>Adicionar</span></div>
                    <div class="removeImg"><i class="fas fa-trash"></i> <span>Remover</span></div>
                </div>
            </div>
            

            <div class="right">
                <div class="form-group qw10">
                    <label>Observações:</label>
                    <textarea rows="8" name="ObsProduct" disabled=""></textarea>
                   
                </div>

             <input type="hidden" name="idProduct" value="<?=$dados['id']?>">

                  <button class="btn_save"><img src="img/save_icon.png">Salvar</button>
                    <a class="btn_save" key="editarFuncionario" style="background: #009ee3; cursor: pointer;"><img src="img/icon_edit.png">Editar</a>
                  <a class="btn_save" key="excluirFuncionario" style="background: #e30000; cursor: pointer;"><img src="img/excluir_icon.png">Excluir</a>  
        
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
    <div class="imgAdd" style="display: none;">
        <div class="dialog">
            <button class="closeDialog"><span></span><span></span></button>
            <h1>Hospedar Imagem</h1>
            <div class="content3">
                <div class='input-wrapper'>
                  <label for='input-file'>
                    Selecionar um arquivo
                  </label>
                  <input id='input-file' type='file' value='' />
                  <span id='file-name'></span>
                  <button class="upload_item">Upload</button>
                </div>
            </div>
        </div>
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
<?php
    if($_GET['exl'] != NULL){
        
            $save = mysql_query("DELETE FROM `product_register` WHERE id='$id'");
            ?><script>
                window.history.back(-3);
            </script><?php
     
    }

?>
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
     var r = confirm("Iremos excluir o Produto <?=$dados['titulo']?>?");
    
      if(r == true){
            location.href="?exl=<?=$id?>&id=<?=$id?>";
        }else{

        }
    }
});
</script>
<style type="text/css">
   .radio input{
    width: 20px;
   }
</style>
<?php
    unset($_SESSION['sucessAction'],$_SESSION['errorAction']);
?>