<?php
    require("protege.php");

    date_default_timezone_set('Brazil/East');
?>
<html>
<head>
    <title>GO - Gestão de Oticas</title>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <link rel="stylesheet" type="text/css" href="css/consulta.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


</head>   
<body>
	<div class="appContent">
		<div class="container">
			<div class="logo"><img src="img/logo.png"></div>
		<div class="content" style="margin-top: 30px;">
				<h1>Consultar Produto</h1>
			</div>
		</div>
        <div class="painel" style="margin-top: 30px;">
            <div class="box-left" >
                <div class="left-box" style="width: 60%;">
                    <div class="form-group qw6">
                        <label>Produto:</label>
                        <input type="text" placeholder="Ex: Armação Social" id="nomeConsulta" name="nomeProduct"  tipo="product">
                    </div>
                    <div class="form-group qw4">
                        <label>Marca:</label>
                        <input type="text" value="" name="codProduct" placeholder="Ex: Colcci" id="marcaCod" tipo="product">
                    </div>
                    <div class="form-group qw10" style="width: calc(100% - 15px);">
                        <label>Modelo:</label>
                        <input type="text" value="" name="codProduct" placeholder="Ex: Armação Social" id="codUser" tipo="product">
                    </div>
                </div>
                <div class="right-box" >
                   <center><img src="img/no-image.png"></center> 
                </div>
                
            </div>

            <iframe src="includes/pesquisa.php?action=productConsult" id="consultaCliente"></iframe>
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

    var escolha = "product";

     $('#nomeConsulta').on('keyup',function(){
        var marca = $(this).val();
        var modelo= $('#marcaCod').val();
        var titulo= $('#codUser').val();
       $('#consultaCliente').attr('src','includes/pesquisa.php?action=productConsult&titulo='+marca+'&modelo='+modelo+'&marca='+titulo);
     });
     $('#marcaCod').on('keyup',function(){
        var marca = $('#nomeConsulta').val();
        var modelo= $(this).val();
        var titulo= $('#codUser').val();
        $('#consultaCliente').attr('src','includes/pesquisa.php?action=productConsult&titulo='+marca+'&modelo='+modelo+'&marca='+titulo);
     });
     $('#codUser').on('keyup',function(){
        var marca = $('#nomeConsulta').val();
        var modelo= $('#marcaCod').val();
        var titulo= $(this).val();
        $('#consultaCliente').attr('src','includes/pesquisa.php?action=productConsult&titulo='+marca+'&modelo='+modelo+'&marca='+titulo);
     });

</script>
<style type="text/css">
    .qw33{
        width: 15%;
        margin-right: 15px;
    }
    .left-box{
        float: left;
    }
    .right-box{
        float: left; width: 30%;
        position: absolute;
        right: 2.5%;
        border-radius: 25px;
        height: 180px;
        margin-top:-33px;
        background: white;
        border:5px solid #326698;
        box-shadow: 0px 0px 5px black;
    }
    .right-box img{
        height: 100%;
        max-width: 100%;    
    }
</style>
