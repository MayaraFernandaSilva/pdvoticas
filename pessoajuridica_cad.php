<?php
    date_default_timezone_set('Brazil/East');
    session_start();
?>
<html>
<head>
    <title>GO - Gestão de Oticas</title>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <link rel="stylesheet" type="text/css" href="css/pessoafisica.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>

</head>   
<body>
	<div class="appContent">
		<div class="container">
			<div class="logo"><img src="img/logo.png"></div>
		<div class="content">
				<h1>Cadastro de Clientes</h1>
				<h3>Pessoa Juridica</h3>
				
			</div>
		</div>
        <div class="painel">
            <form action="function/api.php?action=cadJuridica" method="POST">
<!--            INICIO DIV LEFT-->
            <div class="left">
<!--                Formulario  Dados Pessoais  -->
                <div class="box-left">
                    <div class="form-title">
                        <span>Dados Pessoais</span>
                    </div>
                    <div class="form-group qw10">
                        <label>Razão Social: <span class="require">*</span>
                        </label>
                        <input type="text" placeholder="Ex: Otica Real" name="razaoSocial" required="required"/>
                    </div>
                    
                    <div class="form-group qw10">
                            <label>Nome Fantasia: <span class="require">*</span>
                        </label>
                        <input type="text" placeholder="Ex: Nome Ficticio" name="nomeFantasia" required="required"/>
                    </div>
                    <div class="form-group qw4">
                            <label>CNPJ: <span class="require">*</span>
                        </label>
                        <input type="text" placeholder="Ex: 12.345.678/9123-45" id="CNPJ" name="cnpj" required="required"/>
                    </div>
                    <div class="form-group qw4">
                            <label>Inscr. Estadual: <span class="require">*</span>
                        </label>
                        <input type="text" placeholder="Ex: 027.230.150.004" id="INSCESTADUAL" name="inscrEstadual" required="required"/>
                    </div>
                    <div class="form-group qw4">
                            <label>Isento :
                        </label>
                        <select name="isento">
                            <option value="0">Não</option>
                            <option value="1">Sim</option>
                        </select>
                    </div>
                    
                    
                    
                </div>
<!--               Fim Dados Pessoais -->
<!--                Formulario  Endereço  -->
                <div class="box-left">
                    <div class="form-title">
                        <span>Endereço</span>
                    </div>
                    <div class="form-group qw6">
                        <label>Endereço: <span class="require">*</span>
                        </label>
                        <input type="text" placeholder="Ex: Rua Ficticia de Exemplo" name="endereco" required="required"/>
                    </div>
                    <div class="form-group qw4">
                            <label>Numero: <span class="require">*</span>
                        </label>
                        <input type="text" placeholder="Ex: 675" required="required" name="numero"/>
                    </div>
                    <div class="form-group qw4">
                            <label>Bairro: <span class="require">*</span>
                        </label>
                        <input type="text" placeholder="Ex: 12.345.678-9" required="required" name="bairro"/>
                    </div>
                    <div class="form-group qw4">
                            <label>Municipio: <span class="require">*</span>
                        </label>
                        <input type="text" placeholder="Ex: 123.456.789-00" name="municipio"/>
                    </div>
                    <div class="form-group qw2">
                            <label>UF: <span class="require">*</span>
                        </label>
                        <select name="uf" required="required">
                            <option value="AC">AC</option>
                            <option value="AL">AL</option>
                            <option value="AP">AP</option>
                            <option value="AM">AM</option>
                            <option value="BA">BA</option>
                            <option value="CE">CE</option>
                            <option value="DF">DF</option>
                            <option value="ES">ES</option>
                            <option value="GO">GO</option>
                            <option value="MA">MA</option>
                            <option value="MT">MT</option>
                            <option value="MS">MS</option>
                            <option value="MG">MG</option>
                            <option value="PA">PA</option>
                            <option value="PB">PB</option>
                            <option value="PR">PR</option>
                            <option value="PE">PE</option>
                            <option value="Pi">PI</option>
                            <option value="RR">RR</option>
                            <option value="RO">RO</option>
                            <option value="RJ">RJ</option>
                            <option value="RN">RN</option>
                            <option value="RS">RS</option>
                            <option value="SC">SC</option>
                            <option value="SP">SP</option>
                            <option value="SE">SE</option>
                            <option value="TO">TO</option>
                        </select>
                    </div>
                    <div class="form-group qw3">
                            <label>CEP: <span class="require">*</span>
                        </label>
                        <input type="text" placeholder="Ex: 18887-000" name="cep" required="required"/>
                    </div>
                    
                    <div class="form-group qw6">
                            <label>Complemento: 
                        </label>
                        <input type="text" placeholder="Ex: Apartamento 123" name="complemento" />
                    </div>
                    <div class="form-group qw4">
                            <label>Data de Cadastro: <span class="require">*</span>
                        </label>
                        <input type="text" value="<?=date('d/m/Y')?>" required="" name="dataCadastro">
                    </div>
                    
                    
                </div>
<!--               Fim Endereço -->
            </div>
           
<!--        FIM DIV LEFT-->
<!--        INICIO DIV RIGHT-->
        <div class="right">
            <!--                Formulario  Contato  -->
                <div class="box-left">
                    <div class="form-title">
                        <span>Contato</span>
                    </div>
                    <div class="form-group qw10">
                        <label>Telefone Comercial: <span class="require">*</span>
                        </label>
                        <input type="text" placeholder="Ex: (14) 3333-2222" required="" name="telefoneComercial" />
                    </div>
                    <div class="form-group qw10">
                            <label>Celular: 
                        </label>
                        <input type="text" placeholder="Ex: (14) 98888-2222" id="CELULAR" name="celular" />
                    </div>
                    <div class="form-group qw10">
                            <label>Email:</label>
                        <input type="text" placeholder="Ex: jurislei@email.com" name="email" />
                    </div>
                    <div class="form-group qw10">
                            <label>Site:</label>
                        <input type="text" placeholder="Ex: jurislei@email.com" name="site" />
                    </div>
                        
                </div>
                    <div class="form-group qw11">
                            <label>Observação:</label>
                        <textarea placeholder="Ex: Ligar Apenas depois das 18h" rows="4" name="observation"></textarea>
                    </div>
                    <center>Os Campos que contem (<span class="require">*</span>) São obrigatorios.</center>
                    <button class="btn_save"><img src="img/save_icon.png">Salvar</button>
                    <input type="reset" class="btn_limpa" value='Limpar'>
                </div>
<!--               Fim Endereço -->
         </form>
                </div>
<!--FIM DIV RIGHT-->
        
        </div>
        
		<div class="option_bottom">
			<button class="help" key="home"><img src="img/icon_home.png"> <span>Home</span></button>
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
</body>
</html>
<script src="js/script.js"></script>
<?php
    unset($_SESSION['sucessAction'],$_SESSION['errorAction']);
?>