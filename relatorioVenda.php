<?php
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
				<h1>Relatório de Vendas</h1>
			</div>
		</div>
        <div class="painel" style="margin-top: 30px;">
            <div class="box-left">
                
                <div class="form-group qw4">
                    <label>Buscar Por:</label>
                    <div class="radio" style="float: left; width: 100%; margin-top:10px;">
                        
                        <input type="radio" checked="" name="statusacc" value="1"><span>Nome do Funcionario</span>
                        <input type="radio" name="statusacc" value="0"><span>Geral</span>
                        
                    </div>
                </div>
                <div class="form-group qw3">
                    <label>Periodo:</label>
                    <input type="date" value="" name="codProduct">
                </div>
                <p>a</p>
                <div class="form-group qw3">
                    <label>Periodo:</label>
                    <input type="date" value="" name="codProduct">
                </div>
                
            </div>

            <iframe src="includes/pesquisa.php?action=relatorioVenda"></iframe>
        </div>


        
        
        
		<div class="option_bottom">
			<button class="help" key="home"><img src="img/icon_home.png"> <span>Home</span></button>
		</div>
        <ul class="info_op">
            <li><strong>Operador: </strong> <span>Geronimo Andrade</span></li>
            <li><strong>Codigo: </strong> <span>AD0001</span></li>
            <li><div class="status active" ></div> <span>Ativo</span></li>
        </ul>
	</div>
</body>
</html>
<script src="js/script.js"></script>
<style type="text/css">
   .radio input{
    width: 20px;
   }
   .box-left p{
    float:left;
    margin-top: 25px;
    margin-left: 10px;
    margin-right: 20px;
    font-size: 18px;
   }
   .box-left label{
    font-size: 18px;
   }
   .radio input{
    width: 35px;
    margin-right: 10px;
    float: left;
   }
   .radio span{
    float: left;
    margin-left: 0px;
    margin-right: 25px;
    margin-top: 10px;
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

</script>