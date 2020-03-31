<?php
class checkUser{
        public $nome;
        public $cpf;
        
        function check(){
          $check = mysql_query("SELECT * FROM `register_login` WHERE nome='$this->nome' &&  cpf='$this->cpf'");
          $row = mysql_num_rows($check);
          return($row);  
        }
    }
class checkProduct{
	public $titulo;
	public $codigo;
	public $codigoBarra;

	function check(){
		$check = mysql_query("SELECT * FROM `product_register` WHERE codigo='$this->codigo' && codigoBarra='$this->codigoBarra'");
		$row   = mysql_num_rows($check);
		return($row);
	}
}
class checkAllProduct{
	public $titulo;
	public $marca;
	public $modelo;


	function check(){
		if($this->titulo == NULL && $this->marca == NULL && $this->modelo == NULL){
			$consult = mysql_query("SELECT * FROM `product_register` ORDER BY titulo ASC");
		}
		elseif($this->titulo != NULL && $this->marca == NULL && $this->modelo == NULL){
			$consult = mysql_query("SELECT * FROM `product_register` WHERE titulo LIKE '%$this->titulo%'");
		}elseif($this->titulo == NULL && $this->marca != NULL && $this->modelo == NULL){
			$consult = mysql_query("SELECT * FROM `product_register` WHERE marca LIKE'%$this->modelo%'");
		}elseif($this->titulo == NULL && $this->marca == NULL && $this->modelo != NULL){
			$consult = mysql_query("SELECT * FROM `product_register` WHERE modelo LIKE'%$this->marca%'");
		}elseif($this->titulo == NULL && $this->marca != NULL && $this->modelo == NULL){
			$consult = mysql_query("SELECT * FROM `product_register` WHERE modelo LIKE '%$this->marca%'");
		}elseif($this->titulo != NULL && $this->marca != NULL && $this->modelo != NULL){
			$consult = mysql_query("SELECT * FROM `product_register` WHERE titulo LIKE'%$this->titulo%' && marca LIKE'%$this->modelo%' &&  modelo LIKE '%$this->marca%'");
		}elseif($this->titulo == NULL && $this->marca != NULL && $this->modelo != NULL){
			$consult = mysql_query("SELECT * FROM `product_register` WHERE titulo LIKE'%$this->titulo%' && marca LIKE'%$this->modelo%' &&  modelo LIKE '%$this->marca%'");
		}elseif($this->titulo != NULL && $this->marca == NULL && $this->modelo != NULL){
			$consult = mysql_query("SELECT * FROM `product_register` WHERE titulo LIKE'%$this->titulo%' && marca LIKE'%$this->modelo%' &&  modelo LIKE '%$this->marca%'");
		}elseif($this->titulo != NULL && $this->marca != NULL && $this->modelo == NULL){
			$consult = mysql_query("SELECT * FROM `product_register` WHERE titulo LIKE'%$this->titulo%' && marca LIKE'%$this->modelo%' &&  modelo LIKE '%$this->marca%'");
		}
			
			return($consult);
		
	}
	
}
class numberRandom{
	public $max;

	function gerar(){
		$CaracteresAceitos = 'ABCDZYWZ0123456789';
		$maximo = strlen($CaracteresAceitos)-1;
		$senha= null;
		    for($i=0; $i < $this->max; $i++) {
	    	    $senha.= $CaracteresAceitos{mt_rand(0, $maximo)};
	    	}

		$codigoUser = $senha;
		$consult = mysql_query("SELECT * FROM `register_login` WHERE codigo='$codigoUser'");
		$row = mysql_num_rows($consult);
		if($row == 0){
			return($codigoUser);
		}else{
			header("Refresh:0");
		}
	}
}
class userClient{
	public $nome;
	public $codigo;

	function check(){
		if($this->nome == NULL && $this->codigo == NULL){
			$consult = mysql_query("SELECT * FROM `cad_pessoal` ORDER BY nome ASC");
		}
		elseif($this->nome != NULL && $this->codigo == NULL){
			$consult = mysql_query("SELECT * FROM `cad_pessoal` WHERE nome LIKE '%$this->nome%'");
		}elseif($this->nome == NULL && $this->codigo != NULL){
			$consult = mysql_query("SELECT * FROM `cad_pessoal` WHERE id='$this->codigo'");
		}elseif($this->nome != NULL && $this->codigo != NULL){
			$consult = mysql_query("SELECT * FROM `cad_pessoal` WHERE nome LIKE '%$this->nome%' && id = '$this->codigo'");
		}
			
			return($consult);
		
	}
	
}
class userClientJur{
	public $nome;
	public $codigo;

	function check(){
		if($this->nome == NULL && $this->codigo == NULL){
			$consult = mysql_query("SELECT * FROM `cad_juridica` ORDER BY razaoSocial ASC");
		}
		elseif($this->nome != NULL && $this->codigo == NULL){
			$consult = mysql_query("SELECT * FROM `cad_juridica` WHERE razaoSocial LIKE '%$this->nome%'");
		}elseif($this->nome == NULL && $this->codigo != NULL){
			$consult = mysql_query("SELECT * FROM `cad_juridica` WHERE id='$this->codigo'");
		}elseif($this->nome != NULL && $this->codigo != NULL){
			$consult = mysql_query("SELECT * FROM `cad_juridica` WHERE razaoSocial LIKE '%$this->nome%' && id = '$this->codigo'");
		}
			
			return($consult);
		
	}
	
}

class userFuncionario{
	public $nome;
	public $codigo;

	function check(){
		if($this->nome == NULL && $this->codigo == NULL){
			$consult = mysql_query("SELECT * FROM `register_login` ORDER BY nome ASC");
		}
		elseif($this->nome != NULL && $this->codigo == NULL){
			$consult = mysql_query("SELECT * FROM `register_login` WHERE nome LIKE '%$this->nome%'");
		}elseif($this->nome == NULL && $this->codigo != NULL){
			$consult = mysql_query("SELECT * FROM `register_login` WHERE codigo='$this->codigo'");
		}elseif($this->nome != NULL && $this->codigo != NULL){
			$consult = mysql_query("SELECT * FROM `register_login` WHERE nome LIKE '%$this->nome%' && codigo = '$this->codigo'");
		}
			
			return($consult);
	}
}
class userConsult{
	public $id;
	public $tb;
	function check(){
			$consult = mysql_query("SELECT * FROM `$this->tb` WHERE id='$this->id'");
			$fetch = mysql_fetch_array($consult);
			return($fetch);
	}
}
class productList{
	public $id;
	function check(){
		
		if($this->id == NULL){
			$consult = mysql_query("SELECT * FROM `product_register` order by titulo asc");
			return($consult);
		}
		elseif($this->id != NULL){
			$consult = mysql_query("SELECT * FROM `product_register` WHERE id='$this->id'");
			$fetch = mysql_fetch_array($consult);
			return($fetch);
		}
	
	}
}
?>
