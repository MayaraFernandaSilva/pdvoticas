<pre>
<?php
    session_start();
    require("../conexao/conexao.php");
    require("class.php");
        
    $action = $_GET['action'];

    
    if($action == "cadFuncionario"){
        $classCheckUser = new checkUser;

        $nome           = mysqli_real_escape_string($conn, $_POST['nomeUser']);
        $codUser        = mysqli_real_escape_string($conn, $_POST['codUser']);
        $cpf            = mysqli_real_escape_string($conn, $_POST['cpf']);
        $sexo           = mysqli_real_escape_string($conn, $_POST['sexo']);
        $cargo          = mysqli_real_escape_string($conn, $_POST['cargo']);
        $nivelUser      = mysqli_real_escape_string($conn, $_POST['nivelUser']);
        $login          = mysqli_real_escape_string($conn, $_POST['login']);
        $password       = mysqli_real_escape_string($conn, $_POST['password']);
        $passwordC      = mysqli_real_escape_string($conn, $_POST['passwordConfirm']);
        $statusAcc      = mysqli_real_escape_string($conn, $_POST['statusacc']);
        $obs            = mysqli_real_escape_string($conn, $_POST['obs']);
        
        if($nivelUser == '1'){
            $tipo = "Funcionario";
        }elseif($nivelUser == '2'){
            $tipo = "Administrador";
        }
        // Check User
        $classCheckUser->nome = $nome;
        $classCheckUser->cpf = $cpf;
        $md5Pass = md5($password);
        if($classCheckUser->check() == 0){
            $mysql = mysql_query("INSERT INTO `register_login`(`nome`, `codigo`, `cpf`, `sexo`, `cargo`, `nivel_acesso`, `login`, `senha`, `status`, `obs`) 
            VALUES 
            ('$nome','$codUser','$cpf','$sexo','$cargo','$nivelUser','$login','$password','$statusAcc','$obs')");
            if($mysql){
                $_SESSION['sucessAction'] = "Cadastro de ".$tipo." Feito com sucesso";
                ?><script>window.history.back(-1)</script><?php
            }
        }elseif($classCheckUser->check() == 1 ){
                $_SESSION['errorAction'] = "Cadastro de ".$tipo." Mal Sucedido. tente novamente.";
                ?><script>window.history.back(-1)</script><?php
            }
        
    }elseif($action == "productCad"){
        $checkProduct = new checkProduct;


        $productName        =    mysqli_real_escape_string($conn, $_POST['nomeProduct']);
        $codProduct         =     mysqli_real_escape_string($conn, $_POST['codProduct']);
        $codBarra           =       mysqli_real_escape_string($conn, $_POST['codBarra']);
        $qtdProduct         =     mysqli_real_escape_string($conn, $_POST['qtdProduct']);
        $valorUnit          =      mysqli_real_escape_string($conn, $_POST['valorUnit']);
        $statusacc          =      mysqli_real_escape_string($conn, $_POST['statusacc']);
        $statusProduct      =  mysqli_real_escape_string($conn, $_POST['statusProduct']);
        $nomeCadastrador    =mysqli_real_escape_string($conn, $_POST['nomeCadastrador']);
        $dateHj             =         mysqli_real_escape_string($conn, $_POST['dateHj']);
        $imgProduct         =     mysqli_real_escape_string($conn, $_POST['imgProduct']);
        $ObsProduct         =     mysqli_real_escape_string($conn, $_POST['ObsProduct']);
        $marcaProduct       =   mysqli_real_escape_string($conn, $_POST['marcaProduct']);
        $modeloProduct      =  mysqli_real_escape_string($conn, $_POST['modeloProduct']);
        $icms               =           mysqli_real_escape_string($conn, $_POST['icms']);
        $cfog               =           mysqli_real_escape_string($conn, $_POST['cfog']);
        $tributo            =        mysqli_real_escape_string($conn, $_POST['tributo']);

        $checkProduct->titulo      = $productName;
        $checkProduct->codigo      = $codProduct;
        $checkProduct->codigoBarra = $codBarra;
        
        if($checkProduct->check() == 0){
            $cad = mysql_query("INSERT INTO `product_register`(`titulo`, `codigo`, `codigoBarra`, `qtd`, `valor`, `contabil`, `status`, `autor`, `dateCad`, `img`, `obs`,`marca`,`modelo`,`icms`,`Cfop`,`tributoStatus`) VALUES ('$productName','$codProduct','$codBarra', '$qtdProduct', '$valorUnit', '$statusacc','$statusProduct','$nomeCadastrador','$dateHj','$imgProduct','$ObsProduct','$marcaProduct','$modeloProduct','$icms','$cfog','$tributo')") or die(mysql_error());
            if($cad){
                $_SESSION['sucessAction'] = "Cadastro de ".$productName." Feito com sucesso";
                ?><script>window.history.back(-1)</script><?php
            }else{
                 $_SESSION['errorAction'] = "Cadastro do produto ".$productName." Mal Sucedido. tente novamente.";
                ?><script>window.history.back(-1)</script><?php
            }
        }elseif($checkProduct->check() == 1){
            $_SESSION['errorAction'] = "Já existe um item com esse codigo Cadastrado.";
                ?><script>window.history.back(-1)</script><?php
        }


    }elseif($action == "cadastroPessoal"){

    $estadoCivil = mysqli_real_escape_string($conn, $_POST['estadoCivil']);
    $nomeCliente = mysqli_real_escape_string($conn, $_POST['nomeCliente']);
    $sexo = mysqli_real_escape_string($conn, $_POST['sexo']);
    $rg = mysqli_real_escape_string($conn, $_POST['rg']);
    $cpf = mysqli_real_escape_string($conn, $_POST['cpf']);
    $dataNascimento = mysqli_real_escape_string($conn, $_POST['dataNascimento']);
    $nacionalidade = mysqli_real_escape_string($conn, $_POST['nacionalidade']);
    $naturalidade = mysqli_real_escape_string($conn, $_POST['naturalidade']);
    $ufNascimento = mysqli_real_escape_string($conn, $_POST['ufNascimento']);
    $enderecoAtual = mysqli_real_escape_string($conn, $_POST['enderecoAtual']);
    $numeroCasa = mysqli_real_escape_string($conn, $_POST['numeroCasa']);
    $bairroAtual = mysqli_real_escape_string($conn, $_POST['bairroAtual']);
    $municipioAtual = mysqli_real_escape_string($conn, $_POST['municipioAtual']);
    $ufAtual = mysqli_real_escape_string($conn, $_POST['ufAtual']);
    $cepAtual= mysqli_real_escape_string($conn, $_POST['cepAtual']);
    $complemento = mysqli_real_escape_string($conn, $_POST['complemento']);
    $cadastroDate = mysqli_real_escape_string($conn, $_POST['cadastroDate']);
    $telefone = mysqli_real_escape_string($conn, $_POST['telefone']);
    $celular = mysqli_real_escape_string($conn, $_POST['celular']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $observation = mysqli_real_escape_string($conn, $_POST['observation']);

    $cadastro = mysql_query("INSERT INTO `cad_pessoal`(`nome`, `sexo`, `rg`, `cpf`, `estado_civil`, `data_nascimento`, `nascionalidade`, `naturalidade`, `uf`, `endereco`, `numero`, `bairro`, `municipio`, `uf_endereco`, `cep`, `complemento`, `data_cadastro`, `telefone`, `celular`, `email`, `obsevacao`) VALUES
     ('$nomeCliente','$sexo','$rg','$cpf','$estadoCivil','$dataNascimento','$nacionalidade','$naturalidade','$ufNascimento','$enderecoAtual','$numeroCasa','$bairroAtual','$municipioAtual','$ufAtual','$cepAtual','$complemento','$cadastroDate','$telefone','$celular','$email','$observation')") or die(mysql_error());

        if($cadastro){
            $_SESSION['sucessAction'] = "Cadastro de ".$nomeCliente." Feito com sucesso";
                ?><script>window.history.back(-1)</script><?php 
        }else{
            $_SESSION['errorAction'] = "Houve um erro interno ao tentar cadastrar, Por Favor tente novamente.";
                ?><script>window.history.back(-1)</script><?php
        }
    }elseif($action == "cadJuridica"){

    
    
  
        $razaoSocial            = mysqli_real_escape_string($conn, $_POST['razaoSocial']);
        $nomeFantasia           = mysqli_real_escape_string($conn, $_POST['nomeFantasia']);
        $cnpj                   = mysqli_real_escape_string($conn, $_POST['cnpj']);
        $inscrEstadual          = mysqli_real_escape_string($conn, $_POST['inscrEstadual']);
        $isento                 = mysqli_real_escape_string($conn, $_POST['isento']);
        $endereco               = mysqli_real_escape_string($conn, $_POST['endereco']);
        $numero                 = mysqli_real_escape_string($conn, $_POST['numero']);
        $bairro                 = mysqli_real_escape_string($conn, $_POST['bairro']);
        $municipio              = mysqli_real_escape_string($conn, $_POST['municipio']);
        $uf                     = mysqli_real_escape_string($conn, $_POST['uf']);
        $cep                    = mysqli_real_escape_string($conn, $_POST['cep']);
        $complemento            = mysqli_real_escape_string($conn, $_POST['complemento']);
        $dataCadastro           = mysqli_real_escape_string($conn, $_POST['dataCadastro']);
        $telefoneComercial      = mysqli_real_escape_string($conn, $_POST['telefoneComercial']);
        $celular                = mysqli_real_escape_string($conn, $_POST['celular']);
        $email                  = mysqli_real_escape_string($conn, $_POST['email']);
        $site                   = mysqli_real_escape_string($conn, $_POST['site']);
        $observation            = mysqli_real_escape_string($conn, $_POST['observation']);

        $cadastro = mysql_query("INSERT INTO `cad_juridica`(`razaoSocial`, `nomeFantasia`, `cnpj`, `inscEstadual`, `isento`, `endereco`, `numero`, `bairro`, `municipio`, `uf`, `cep`, `complemento`, `telefone`, `celular`, `email`, `site`, `observation`, `dataCadastro`) VALUES ('$razaoSocial','$nomeFantasia','$cnpj','$inscrEstadual','$isento','$endereco','$numero','$bairro','$municipio','$uf','$cep','$complemento','$telefoneComercial','$celular','$email','$site','$observation','$dataCadastro')") or die(mysql_error());
        if($cadastro){
            $_SESSION['sucessAction'] = "Cadastro de ".$nomeCliente." Feito com sucesso";
                ?><script>window.history.back(-1)</script><?php 
        }else{
            $_SESSION['errorAction'] = "Houve um erro interno ao tentar cadastrar, Por Favor tente novamente.";
                ?><script>window.history.back(-1)</script><?php
        }
    }elseif($action == "editFuncionario"){

        $nome           = mysqli_real_escape_string($conn, $_POST['nomeUser']);
        $codUser        = mysqli_real_escape_string($conn, $_POST['codUser']);
        $cpf            = mysqli_real_escape_string($conn, $_POST['cpf']);
        $sexo           = mysqli_real_escape_string($conn, $_POST['sexo']);
        $cargo          = mysqli_real_escape_string($conn, $_POST['cargo']);
        $nivelUser      = mysqli_real_escape_string($conn, $_POST['nivelUser']);
        $login          = mysqli_real_escape_string($conn, $_POST['login']);
        $password       = mysqli_real_escape_string($conn, $_POST['password']);
        $passwordC      = mysqli_real_escape_string($conn, $_POST['passwordConfirm']);
        $statusAcc      = mysqli_real_escape_string($conn, $_POST['statusacc']);
        $obs            = mysqli_real_escape_string($conn, $_POST['obs']);
        $idUser         = mysqli_real_escape_string($conn, $_POST['idUser']);
        if($nivelUser == '1'){
            $tipo = "Funcionario";
        }elseif($nivelUser == '2'){
            $tipo = "Administrador";
        }
        
            $mysql = mysql_query("UPDATE `register_login` SET `nome`='$nome',`codigo`='$codUser',`cpf`='$cpf',`sexo`='$sexo',`cargo`='$cargo',`nivel_acesso`='$nivelUser',`login`='$login',`status`='$statusAcc',`obs`='$obs' WHERE id='$idUser'");
            if($password != NULL){
                if($password == $passwordC){
                    $md5Pass = md5($password);
                    mysql_query("UPDATE `register_login` SET `senha`='$md5Pass' WHERE id='$idUser'");
                }
            }
            if($mysql){
                $_SESSION['sucessAction'] = "Alteração de ".$nome." Feita com sucesso";
                ?><script>window.history.back(-1)</script><?php
            }
        
    }elseif($action == "productEdit"){

        $productName        =    mysqli_real_escape_string($conn, $_POST['nomeProduct']);
        $codProduct         =     mysqli_real_escape_string($conn, $_POST['codProduct']);
        $codBarra           =       mysqli_real_escape_string($conn, $_POST['codBarra']);
        $qtdProduct         =     mysqli_real_escape_string($conn, $_POST['qtdProduct']);
        $valorUnit          =      mysqli_real_escape_string($conn, $_POST['valorUnit']);
        $statusacc          =      mysqli_real_escape_string($conn, $_POST['statusacc']);
        $statusProduct      =  mysqli_real_escape_string($conn, $_POST['statusProduct']);
        $nomeCadastrador    =mysqli_real_escape_string($conn, $_POST['nomeCadastrador']);
        $dateHj             =         mysqli_real_escape_string($conn, $_POST['dateHj']);
        $imgProduct         =     mysqli_real_escape_string($conn, $_POST['imgProduct']);
        $ObsProduct         =     mysqli_real_escape_string($conn, $_POST['ObsProduct']);
        $marcaProduct       =   mysqli_real_escape_string($conn, $_POST['marcaProduct']);
        $modeloProduct      =  mysqli_real_escape_string($conn, $_POST['modeloProduct']);
        $icms               =           mysqli_real_escape_string($conn, $_POST['icms']);
        $cfog               =           mysqli_real_escape_string($conn, $_POST['cfog']);
        $tributo            =        mysqli_real_escape_string($conn, $_POST['tributo']);
        $idProdu            =        mysqli_real_escape_string($conn, $_POST['tributo']);

        $cad = mysql_query("UPDATE `product_register` SET `titulo`='$productName',`codigo`='$codProduct',`codigoBarra`='$codBarra',`qtd`='$qtd',`valor`='$valorUnit',`contabil`='$statusacc',`img`='$imgProduct',`obs`='$ObsProduct',`marca`='$marcaProduct',`modelo`='$modeloProduct',`icms`='$icms',`Cfop`='$cfog',`tributoStatus`='$tributo' WHERE id='$idProdu' ");
        if($cad){
                $_SESSION['sucessAction'] = $productName." Editado com sucesso";
                ?><script>window.history.back(-1)</script><?php
            }else{
                 $_SESSION['errorAction'] = $productName." Mal Sucedido. tente novamente.";
                ?><script>window.history.back(-1)</script><?php
            }
    }

?>