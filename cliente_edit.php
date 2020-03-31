<?php
    date_default_timezone_set('Brazil/East');
    session_start();
    require("conexao/conexao.php");
    require('function/class.php');
    $id = mysqli_real_escape_string($conn,$_GET['id']);
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
    <?php 
        if($_GET['tipo'] == "fisica"){
            $cons = new userConsult;
            $cons->tb = 'cad_pessoal';
            $cons->id = mysqli_real_escape_string($conn, $_GET['id']);
            $dados = $cons->check();
    ?>
	<div class="appContent">
		<div class="container">
			<div class="logo"><img src="img/logo.png"></div>
		<div class="content">
				<h1>Editar Clientes</h1>
				<h3>Pessoa Fisica</h3>
				
			</div>
		</div>
        <div class="painel">
            <form action="function/api.php?action=cadastroPessoal" method="POST">
<!--            INICIO DIV LEFT-->
            <div class="left">
<!--                Formulario  Dados Pessoais  -->
                <div class="box-left">
                    <div class="form-title">
                        <span>Dados Pessoais</span>
                    </div>
                    <div class="form-group qw6">
                        <label>Nome Completo: <span class="require">*</span>
                        </label>
                        <input type="text" value="<?=$dados['nome']?>" placeholder="Ex: Jurislei Ficticio de Moraes" name="nomeCliente" required="" disabled="" />
                    </div>
                    <div class="form-group qw4">
                            <label>Sexo: <span class="require">*</span>
                        </label>
                        <select required="required" disabled="" name="sexo">
                            <option value="Masculino" <?php if($dados['sexo'] == "Masculino"){ ?> selected <?php } ?> >Masculino</option>
                            <option value="Feminino" <?php if($dados['sexo'] == "Feminino"){ ?> selected <?php } ?> >Feminino</option>
                            <option value="Indefinido" <?php if($dados['sexo'] == "Indefinido"){ ?> selected <?php } ?> >Indefinido</option>
                        
                        </select>
                    </div>
                    <div class="form-group qw4">
                            <label>RG: <span class="require">*</span>
                        </label>
                        <input type="text" disabled="" value="<?=$dados['rg']?>" placeholder="Ex: 12.345.678-9" name="rg" id="RG" required="required" />
                    </div>
                    <div class="form-group qw4">
                            <label>CPF: <span class="require">*</span>
                        </label>
                        <input type="text" disabled="" value="<?=$dados['cpf']?>" placeholder="Ex: 123.456.789-00" name="cpf" id="CPF" required="required" maxlength="14" />
                    </div>
                    <div class="form-group qw4">
                            <label>Est. Civil:
                        </label>
                        <select name="estadoCivil" disabled="">
                            <option value="Solteiro(a)" <?php if($dados['estado_civil'] == "Solteiro(a)"){ ?> selected <?php } ?> >Solteiro(a)</option>
                            <option value="Casado(a)" <?php if($dados['estado_civil'] == "Casado(a)"){ ?> selected <?php } ?>>Casado(a)</option>
                            <option value="Viuvo(a)" <?php if($dados['estado_civil'] == "Viuvo(a)"){ ?> selected <?php } ?>>Viuvo(a)</option>
                        </select>
                    </div>
                    <div class="form-group qw4">
                            <label>Data de Nascimento: <span class="require">*</span>
                        </label>
                        <input type="text" disabled="" placeholder="Ex: 25/08/1984" value="<?=$dados['data_nascimento']?>" id="DATA" name="dataNascimento" maxlength="10" required="required"/>
                    </div>
                    <div class="form-group qw4">
                            <label>Nacionalidade:
                        </label>
                        <input type="text" disabled="" value="<?=$dados['nascionalidae']?>" placeholder="Ex: Brasileiro" name="nacionalidade" />
                    </div>
                    <div class="form-group qw3">
                            <label>Naturalidade: 
                        </label>
                        <input type="text" disabled="" value="<?=$dados['naturalidade']?>"placeholder="Ex: Ourinhos" name="naturalidade" />
                    </div>
                    <div class="form-group qw2">
                            <label>UF: 
                        </label>
                        <select name="ufNascimento" disabled="">
                            <option value="AC" <?php if($dados['uf'] == "AC"){ ?> selected <?php }?> >AC</option>
                            <option value="AL" <?php if($dados['uf'] == "AL"){ ?> selected <?php }?> >AL</option>
                            <option value="AP" <?php if($dados['uf'] == "AP"){ ?> selected <?php }?> >AP</option>
                            <option value="AM" <?php if($dados['uf'] == "AM"){ ?> selected <?php }?> >AM</option>
                            <option value="BA" <?php if($dados['uf'] == "BA"){ ?> selected <?php }?> >BA</option>
                            <option value="CE" <?php if($dados['uf'] == "CE"){ ?> selected <?php }?> >CE</option>
                            <option value="DF" <?php if($dados['uf'] == "DF"){ ?> selected <?php }?> >DF</option>
                            <option value="ES" <?php if($dados['uf'] == "ES"){ ?> selected <?php }?> >ES</option>
                            <option value="GO" <?php if($dados['uf'] == "GO"){ ?> selected <?php }?> >GO</option>
                            <option value="MA" <?php if($dados['uf'] == "MA"){ ?> selected <?php }?> >MA</option>
                            <option value="MT" <?php if($dados['uf'] == "MT"){ ?> selected <?php }?> >MT</option>
                            <option value="MS" <?php if($dados['uf'] == "MS"){ ?> selected <?php }?> >MS</option>
                            <option value="MG" <?php if($dados['uf'] == "MG"){ ?> selected <?php }?> >MG</option>
                            <option value="PA" <?php if($dados['uf'] == "PA"){ ?> selected <?php }?> >PA</option>
                            <option value="PB" <?php if($dados['uf'] == "PB"){ ?> selected <?php }?> >PB</option>
                            <option value="PR" <?php if($dados['uf'] == "PR"){ ?> selected <?php }?> >PR</option>
                            <option value="PE" <?php if($dados['uf'] == "PE"){ ?> selected <?php }?> >PE</option>
                            <option value="PI" <?php if($dados['uf'] == "PI"){ ?> selected <?php }?> >PI</option>
                            <option value="RR" <?php if($dados['uf'] == "RR"){ ?> selected <?php }?> >RR</option>
                            <option value="RO" <?php if($dados['uf'] == "RO"){ ?> selected <?php }?> >RO</option>
                            <option value="RJ" <?php if($dados['uf'] == "RJ"){ ?> selected <?php }?> >RJ</option>
                            <option value="RN" <?php if($dados['uf'] == "RN"){ ?> selected <?php }?> >RN</option>
                            <option value="RS" <?php if($dados['uf'] == "RS"){ ?> selected <?php }?> >RS</option>
                            <option value="SC" <?php if($dados['uf'] == "SC"){ ?> selected <?php }?> >SC</option>
                            <option value="SP" <?php if($dados['uf'] == "SP"){ ?> selected <?php }?> >SP</option>
                            <option value="SE" <?php if($dados['uf'] == "SE"){ ?> selected <?php }?> >SE</option>
                            <option value="TO" <?php if($dados['uf'] == "TO"){ ?> selected <?php }?> >TO</option>
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
                        <input type="text" disabled="" placeholder="Ex: Rua Ficticia de Exemplo" value="<?=$dados['endereco']?>" name="enderecoAtual" required="required"/>
                    </div>
                    <div class="form-group qw4">
                            <label>Numero: <span class="require">*</span>
                        </label>
                        <input type="text" disabled="" placeholder="Ex: 675" value="<?=$dados['numero']?>" required="required" name="numeroCasa" />
                    </div>
                    <div class="form-group qw4">
                            <label>Bairro: <span class="require">*</span>
                        </label>
                        <input type="text" disabled="" placeholder="Ex: Centro" value="<?=$dados['bairro']?>" required="required" name="bairroAtual" />
                    </div>
                    <div class="form-group qw4">
                            <label>Municipio: <span class="require">*</span>
                        </label>
                        <input type="text" disabled="" placeholder="Ex: Ficticio" value="<?=$dados['municipio']?>" required="" name="municipioAtual" />
                    </div>
                    <div class="form-group qw2">
                            <label>UF: <span class="require">*</span>
                        </label>
                        <select required="required" name="ufAtual" disabled="">
                            <option value="AC" <?php if($dados['uf_endereco'] == "AC"){ ?> selected <?php }?> >AC</option>
                            <option value="AL" <?php if($dados['uf_endereco'] == "AL"){ ?> selected <?php }?> >AL</option>
                            <option value="AP" <?php if($dados['uf_endereco'] == "AP"){ ?> selected <?php }?> >AP</option>
                            <option value="AM" <?php if($dados['uf_endereco'] == "AM"){ ?> selected <?php }?> >AM</option>
                            <option value="BA" <?php if($dados['uf_endereco'] == "BA"){ ?> selected <?php }?> >BA</option>
                            <option value="CE" <?php if($dados['uf_endereco'] == "CE"){ ?> selected <?php }?> >CE</option>
                            <option value="DF" <?php if($dados['uf_endereco'] == "DF"){ ?> selected <?php }?> >DF</option>
                            <option value="ES" <?php if($dados['uf_endereco'] == "ES"){ ?> selected <?php }?> >ES</option>
                            <option value="GO" <?php if($dados['uf_endereco'] == "GO"){ ?> selected <?php }?> >GO</option>
                            <option value="MA" <?php if($dados['uf_endereco'] == "MA"){ ?> selected <?php }?> >MA</option>
                            <option value="MT" <?php if($dados['uf_endereco'] == "MT"){ ?> selected <?php }?> >MT</option>
                            <option value="MS" <?php if($dados['uf_endereco'] == "MS"){ ?> selected <?php }?> >MS</option>
                            <option value="MG" <?php if($dados['uf_endereco'] == "MG"){ ?> selected <?php }?> >MG</option>
                            <option value="PA" <?php if($dados['uf_endereco'] == "PA"){ ?> selected <?php }?> >PA</option>
                            <option value="PB" <?php if($dados['uf_endereco'] == "PB"){ ?> selected <?php }?> >PB</option>
                            <option value="PR" <?php if($dados['uf_endereco'] == "PR"){ ?> selected <?php }?> >PR</option>
                            <option value="PE" <?php if($dados['uf_endereco'] == "PE"){ ?> selected <?php }?> >PE</option>
                            <option value="PI" <?php if($dados['uf_endereco'] == "PI"){ ?> selected <?php }?> >PI</option>
                            <option value="RR" <?php if($dados['uf_endereco'] == "RR"){ ?> selected <?php }?> >RR</option>
                            <option value="RO" <?php if($dados['uf_endereco'] == "RO"){ ?> selected <?php }?> >RO</option>
                            <option value="RJ" <?php if($dados['uf_endereco'] == "RJ"){ ?> selected <?php }?> >RJ</option>
                            <option value="RN" <?php if($dados['uf_endereco'] == "RN"){ ?> selected <?php }?> >RN</option>
                            <option value="RS" <?php if($dados['uf_endereco'] == "RS"){ ?> selected <?php }?> >RS</option>
                            <option value="SC" <?php if($dados['uf_endereco'] == "SC"){ ?> selected <?php }?> >SC</option>
                            <option value="SP" <?php if($dados['uf_endereco'] == "SP"){ ?> selected <?php }?> >SP</option>
                            <option value="SE" <?php if($dados['uf_endereco'] == "SE"){ ?> selected <?php }?> >SE</option>
                            <option value="TO" <?php if($dados['uf_endereco'] == "TO"){ ?> selected <?php }?> >TO</option>
                        </select>
                    </div>
                    <div class="form-group qw3">
                            <label>CEP: <span class="require">*</span>
                        </label>
                        <input type="text" placeholder="Ex: 00000-000" value="<?=$dados['cep']?>" disabled="" name="cepAtual" required="required"/>
                    </div>
                    
                    <div class="form-group qw6">
                            <label>Complemento: 
                        </label>
                        <input type="text" disabled="" placeholder="Ex: Apartamento 123" value="<?=$dados['complemento']?>" name="complemento" />
                    </div>
                    <div class="form-group qw4">
                            <label>Data de Cadastro: <span class="require">*</span>
                        </label>
                        <input type="text" value="<?=$dados['data_cadastro']?>" disabled="" required="" name="cadastroDate">
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
                        <label>Telefone: <span class="require">*</span>
                        </label>
                        <input type="text" placeholder="Ex: (14) 3333-2222" value="<?=$dados['telefone']?>" disabled="" required="" name="telefone" />
                    </div>
                    <div class="form-group qw10">
                            <label>Celular: 
                        </label>
                        <input type="text" placeholder="Ex: (14) 98888-2222" disabled="" value="<?=$dados['celular']?>" name="celular" id="CELULAR" />
                    </div>
                    <div class="form-group qw10">
                            <label>Email:</label>
                        <input type="text" placeholder="Ex: jurislei@email.com" disabled="" value="<?=$dados['email']?>" name="email" />
                    </div>
                        
                </div>
                    <div class="form-group qw11">
                            <label>Observação:</label>
                        <textarea placeholder="Ex: Ligar Apenas depois das 18h" rows="4" name="observation" disabled="" ><?=$dados['obsevacao']?></textarea>
                    </div>
                    <center>Os Campos que contem (<span class="require">*</span>) São obrigatorios.</center>
                    <button class="btn_save"><img src="img/save_icon.png">Salvar</button>
                    <a class="btn_save" key="editarFuncionario" style="background: #009ee3; cursor: pointer;"><img src="img/icon_edit.png">Editar</a>
                  <a class="btn_save" key="excluirFuncionario" style="background: #e30000; cursor: pointer;"><img src="img/excluir_icon.png">Excluir</a>  
                </div>
<!--               Fim Endereço -->
         </form>
                </div>
            <?php }else{ 

            $cons = new userConsult;
            $cons->tb = 'cad_juridica';
            $cons->id = mysqli_real_escape_string($conn, $_GET['id']);

                $dados = $cons->check();
                ?>
                <div class="appContent">
        <div class="container">
            <div class="logo"><img src="img/logo.png"></div>
        <div class="content">
                <h1>Editar Clientes</h1>
                <h3>Pessoa Juridica</h3>
                
            </div>
        </div>
        <div class="painel">
            <form action="function/api.php?action=editJuridica" method="POST">
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
                        <input type="text" disabled="" placeholder="Ex: Otica Real" name="razaoSocial" value="<?=$dados['razaoSocial']?>" required="required"/>
                    </div>
                    
                    <div class="form-group qw10">
                            <label>Nome Fantasia: <span class="require">*</span>
                        </label>
                        <input type="text" disabled="" value="<?=$dados['nomeFantasia']?>" placeholder="Ex: Nome Ficticio" name="nomeFantasia" required="required"/>
                    </div>
                    <div class="form-group qw4">
                            <label>CNPJ: <span class="require">*</span>
                        </label>
                        <input type="text" disabled="" placeholder="Ex: 12.345.678/9123-45" value="<?=$dados['cnpj']?>" id="CNPJ" name="cnpj" required="required"/>
                    </div>
                    <div class="form-group qw4">
                            <label>Inscr. Estadual: <span class="require">*</span>
                        </label>
                        <input type="text" disabled="" placeholder="Ex: 027.230.150.004" value="<?=$dados['inscEstadual']?>" id="INSCESTADUAL" name="inscrEstadual" required="required"/>
                    </div>
                    <div class="form-group qw4">
                            <label>Isento :
                        </label>
                        <select name="isento" disabled="">
                            <option <?php if($dados['isento'] == "0"){ ?> checked <?php } ?> value="0">Não</option>
                            <option <?php if($dados['isento'] == "1"){ ?> checked <?php } ?>  value="1">Sim</option>
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
                        <input type="text" disabled="" value="<?=$dados['endereco']?>" placeholder="Ex: Rua Ficticia de Exemplo" name="endereco" required="required"/>
                    </div>
                    <div class="form-group qw4">
                            <label>Numero: <span class="require">*</span>
                        </label>
                        <input type="text" disabled="" value="<?=$dados['numero']?>" placeholder="Ex: 675" required="required" name="numero"/>
                    </div>
                    <div class="form-group qw4">
                            <label>Bairro: <span class="require">*</span>
                        </label>
                        <input type="text" disabled="" placeholder="Ex: 12.345.678-9" required="required" name="bairro" value="<?=$dados['bairro']?>"/>
                    </div>
                    <div class="form-group qw4">
                            <label>Municipio: <span class="require">*</span>
                        </label>
                        <input type="text" disabled="" placeholder="Ex: 123.456.789-00" name="municipio" value="<?=$dados['municipio']?>"/>
                    </div>
                    <div class="form-group qw2">
                            <label>UF: <span class="require">*</span>
                        </label>
                        <select name="uf" required="required" disabled="">
                            <option value="AC" <?php if($dados['uf'] == "AC"){ ?> selected <?php }?> >AC</option>
                            <option value="AL" <?php if($dados['uf'] == "AL"){ ?> selected <?php }?> >AL</option>
                            <option value="AP" <?php if($dados['uf'] == "AP"){ ?> selected <?php }?> >AP</option>
                            <option value="AM" <?php if($dados['uf'] == "AM"){ ?> selected <?php }?> >AM</option>
                            <option value="BA" <?php if($dados['uf'] == "BA"){ ?> selected <?php }?> >BA</option>
                            <option value="CE" <?php if($dados['uf'] == "CE"){ ?> selected <?php }?> >CE</option>
                            <option value="DF" <?php if($dados['uf'] == "DF"){ ?> selected <?php }?> >DF</option>
                            <option value="ES" <?php if($dados['uf'] == "ES"){ ?> selected <?php }?> >ES</option>
                            <option value="GO" <?php if($dados['uf'] == "GO"){ ?> selected <?php }?> >GO</option>
                            <option value="MA" <?php if($dados['uf'] == "MA"){ ?> selected <?php }?> >MA</option>
                            <option value="MT" <?php if($dados['uf'] == "MT"){ ?> selected <?php }?> >MT</option>
                            <option value="MS" <?php if($dados['uf'] == "MS"){ ?> selected <?php }?> >MS</option>
                            <option value="MG" <?php if($dados['uf'] == "MG"){ ?> selected <?php }?> >MG</option>
                            <option value="PA" <?php if($dados['uf'] == "PA"){ ?> selected <?php }?> >PA</option>
                            <option value="PB" <?php if($dados['uf'] == "PB"){ ?> selected <?php }?> >PB</option>
                            <option value="PR" <?php if($dados['uf'] == "PR"){ ?> selected <?php }?> >PR</option>
                            <option value="PE" <?php if($dados['uf'] == "PE"){ ?> selected <?php }?> >PE</option>
                            <option value="PI" <?php if($dados['uf'] == "PI"){ ?> selected <?php }?> >PI</option>
                            <option value="RR" <?php if($dados['uf'] == "RR"){ ?> selected <?php }?> >RR</option>
                            <option value="RO" <?php if($dados['uf'] == "RO"){ ?> selected <?php }?> >RO</option>
                            <option value="RJ" <?php if($dados['uf'] == "RJ"){ ?> selected <?php }?> >RJ</option>
                            <option value="RN" <?php if($dados['uf'] == "RN"){ ?> selected <?php }?> >RN</option>
                            <option value="RS" <?php if($dados['uf'] == "RS"){ ?> selected <?php }?> >RS</option>
                            <option value="SC" <?php if($dados['uf'] == "SC"){ ?> selected <?php }?> >SC</option>
                            <option value="SP" <?php if($dados['uf'] == "SP"){ ?> selected <?php }?> >SP</option>
                            <option value="SE" <?php if($dados['uf'] == "SE"){ ?> selected <?php }?> >SE</option>
                            <option value="TO" <?php if($dados['uf'] == "TO"){ ?> selected <?php }?> >TO</option>
                        </select>
                    </div>
                    <div class="form-group qw3">
                            <label>CEP: <span class="require">*</span>
                        </label>
                        <input type="text" disabled="" value="<?=$dados['cep']?>" placeholder="Ex: 18887-000" name="cep" required="required"/>
                    </div>
                    
                    <div class="form-group qw6">
                            <label>Complemento: 
                        </label>
                        <input type="text" disabled="" value="<?=$dados['complemento']?>" placeholder="Ex: Apartamento 123" name="complemento" />
                    </div>
                    <div class="form-group qw4">
                            <label>Data de Cadastro: <span class="require">*</span>
                        </label>
                        <input type="text" disabled="" value="<?=$dados['dataCadastro']?>" required="" name="dataCadastro">
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
                        <input type="text" disabled="" value="<?=$dados['telefone']?>" placeholder="Ex: (14) 3333-2222" required="" name="telefoneComercial" />
                    </div>
                    <div class="form-group qw10">
                            <label>Celular: 
                        </label>
                        <input type="text" disabled="" value="<?=$dados['celular']?>" placeholder="Ex: (14) 98888-2222" id="CELULAR" name="celular" />
                    </div>
                    <div class="form-group qw10">
                            <label>Email:</label>
                        <input type="text" disabled="" value="<?=$dados['email']?>" placeholder="Ex: jurislei@email.com" name="email" />
                    </div>
                    <div class="form-group qw10">
                            <label>Site:</label>
                        <input type="text" disabled="" value="<?=$dados['site']?>" placeholder="Ex: jurislei@email.com" name="site" />
                    </div>
                        
                </div>
                    <div class="form-group qw11">
                            <label>Observação:</label>
                        <textarea placeholder="Ex: Ligar Apenas depois das 18h" rows="4" disabled="" value="<?=$dados['observation']?>" name="observation"></textarea>
                    </div>
                    <center>Os Campos que contem (<span class="require">*</span>) São obrigatorios.</center>
                    <button class="btn_save"><img src="img/save_icon.png">Salvar</button>
                    <a class="btn_save" key="editarFuncionario" style="background: #009ee3; cursor: pointer;"><img src="img/icon_edit.png">Editar</a>
                    <a class="btn_save" key="excluirFuncionario" style="background: #e30000; cursor: pointer;"><img src="img/excluir_icon.png">Excluir</a>  
                </div>
<!--               Fim Endereço -->
         </form>
                </div>
            <?php } ?>
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
         a.btn_save{
            height: auto;
            padding: 10px 20px;
        }
    </style>
</body>
</html>
<?php
    if($_GET['exl'] != NULL){
      if($_GET['tipo'] == 'fisica'){
            $save = mysql_query("DELETE FROM `cad_pessoal` WHERE id='$id'");
            ?><script>
                window.history.back(-3);
            </script><?php
      }   elseif($_GET['tipo'] == 'juridica'){
            $save = mysql_query("DELETE FROM `cad_juridica` WHERE id='$id'");
            ?><script>
                window.history.back(-3);
            </script><?php
      }  
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
     var r = confirm("Iremos excluir o Usuario <?=$dados['nome']?>?");
    
      if(r == true){
            location.href="?exl=<?=$id?>&tipo=fisica&id=<?=$id?>";
        }else{

        }
    }
});
</script>
<?php
    unset($_SESSION['sucessAction'],$_SESSION['errorAction']);
?>