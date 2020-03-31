<?php
    session_start();
    require('conexao/conexao.php');
    if($_POST){
        $nome     = mysqli_real_escape_string($conn, $_POST['nome']);
        $login    = mysqli_real_escape_string($conn, $_POST['login']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $sexo     = mysqli_real_escape_string($conn, $_POST['sexo']);
        $cpf      = mysqli_real_escape_string($conn, $_POST['cpf']);
        
        $pass = md5($password);

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

        $consult        = mysql_query("SELECT * FROM `register_login` WHERE login='$login'");
        $row            = mysql_num_rows($consult);
        if($row == 0){  
        $save =    mysql_query("INSERT INTO `register_login`( `nome`, `codigo`, `cpf`, `sexo`, `cargo`, `nivel_acesso`, `login`, `senha`, `status`) VALUES ('$nome','$cod','$cpf','$sexo','F.Comum','1','$login','$pass','0')") or die(mysql_error());
            if($save){
            $_SESSION['successLogin'] = "Cadastrado com sucesso, Aguarde a validação de algum Administrador.";
            ?><script type="text/javascript">window.history.back(-1)</script><?
            }
        }else{
            $_SESSION['errorLogin'] = "O login já esta em uso.";
            ?><script type="text/javascript">window.history.back(-1)</script><?
        }
        





    }

?>