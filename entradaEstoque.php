<?php
    date_default_timezone_set('Brazil/East');

    require("conexao/conexao.php");
    require("function/class.php");
    require("protege.php");

    $estoque = new productList;
?>
<html>
<head>
    <title>GO - Gestão de Oticas</title>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <link rel="stylesheet" type="text/css" href="css/entradaestoque.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


</head>   
<body>
    
	<div class="appContent">
		<div class="container">
			<div class="logo"><img src="img/logo.png"></div>
		<div class="content">
				<h1>Entrada no Estoque</h1>
			</div>
		</div>
        <div class="painel">
            <form action="function/api.php?action=entradaEstoque" method="POST">
            <div class="box-left">
                <div class="form-title" style="width: auto; padding-left: 10px;padding-right: 10px; padding-top: 10px;padding-bottom: 10px;">Lançar Entrada de Produto</div>
                
                <div class="form-group qw5">
                    <label>Cod.Lançamento:<span class="require">*</span></label>
                    <input type="text" value="<?=rand('1111','9999').rand('1111','9999').rand('1111','9999').rand('1111','9999').rand('1111','9999').rand('1111','9999');?>" name="nomeProduct">
                </div>
                <div class="form-group qw5">
                    <label>Data Compra:<span class="require">*</span></label>
                    <input type="text" value="<?=$_POST['dateHj']?>" name="codProduct">
                </div>
                <div class="form-group qw5">
                    <label>Produto:<span class="require">*</span></label>
                    <select name="productName" id="productName">
                        <option style="display: none;">Escolha um produto</option>
                         <?php
                        $dado = $estoque->check();
                        while($dados = mysql_fetch_array($dado)){
                            ?>
                            <option value="<?=$dados['id']?>"><?=$dados['titulo']?></option>
                        <?php } ?>
                    </select>
                                           
                            

                </div>
                <div class="form-group qw3">
                    <label>Quantidade:<span class="require">*</span></label>
                    <input type="text" value="<?=$_POST['qtdProduct']?>" id="quantidade" name="qtdProduct">
                </div>
                <div class="form-group qw3">
                    <label>Preço Un.:<span class="require">*</span></label>
                    <input type="text" value="<?=$_POST['valorUnit']?>" id="valor" name="qtdProduct">
                </div>
                <input type="hidden" name="productId" class="productId">
               

            </div>
            <div class="painel" style="margin-bottom: 30px;">
            <div class="box-valor">
                <label>Total:</label>
                <div class="totalProduct">
                    <?php
                        $value = $_POST['qtdProduct']*$_POST['valorUnit'];
                        echo number_format($value,2,',','.');
                     ?>
                
                </div>
            </div>
            </div>

             <div class="form-group qw3 obs">
                    <label>Observaçao:<span class="require">*</span></label>
                    <textarea name="obs" id="obs"><?=$_POST['ObsProduct']?></textarea>
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
</body>
</html>
<script src="js/script.js"></script>
<style type="text/css">
   .radio input{
    width: 20px;
   }
</style>
<script type="text/javascript">
    function number_format (number, decimals, dec_point, thousands_sep) {
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}

    $('#quantidade').keyup(function(){
        var val     = $('#valor').val();
        var quant   = $('#quantidade').val();
        var valu    =   val.replace(',','.');
        var total   = valu*quant;
        
        $('.totalProduct').html(number_format(total,2,',','.'));
    });
     $('#valor').keyup(function(){
        var val     = $('#valor').val();
        var quant   = $('#quantidade').val();
        var valu    =   val.replace(',','.');
        var total   = valu*quant;
        
        $('.totalProduct').html(number_format(total,2,',','.'));
    });
$('#productName').on('change',function(){
    var id = $(this).val();
    $.ajax({
                    url: 'function/infoProduct.php',
                    data: {
                        'id':id,
                    
                    },                    
                    type: 'POST',
                    success: function(data) 
                    {
                        var json = JSON.parse(data);
                        $('#valor').val(json.valor);
                        $('#obs').val(json.obs);
                    }
                });
});
</script>