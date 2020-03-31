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
				<h1>Consultar Cliente</h1>
			</div>
		</div>
        <div class="painel" style="margin-top: 30px;">
           <p><i>Inserir o nome ou o codigo do cliente</i></p> 
            <div class="box-left">
                
                <div class="form-group qw6">
                    <label>Nome:</label>
                    <input type="text" placeholder="Ex: Jurisley" id="nomeConsulta" name="nomeProduct"  tipo="fisica">
                </div>
                <div class="form-group qw33">
                    <label>Codigo:</label>
                    <input type="text" value="" name="codProduct" id="codUser" tipo="fisica">
                </div>
                <div class="form-group qw33">
                    <label>Tipo:</label>
                    <select id="tipoPessoa">
                        <option value="fisica">Pessoa Fisica</option>                     
                        <option value="juridica">Pessoa Juridica</option>                      
                    </select>
                </div>
                
            </div>

            <iframe src="includes/pesquisa.php?action=cliente&tipo=fisica" id="consultaCliente"></iframe>
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
    var escolha = "fisica";
     $('#tipoPessoa').on('change',function(){
        escolha = $(this).val();
        $('#codUser').attr('tipo',escolha);
        $('#nomeProduct').attr('tipo',escolha);
        $('#consultaCliente').attr('src','includes/pesquisa.php?action=cliente&tipo='+escolha);
     });

$('#nomeConsulta').on('keyup',function(){
    var nome    = $(this).val();
    var codigo  = $('#codUser').val();
    var cod =""

    var tipo = escolha;
    if(codigo != ""){
        var cod = "&codigo="+codigo;
    }
    $('#consultaCliente').attr('src','includes/pesquisa.php?action=cliente&tipo='+tipo+'&nome='+nome+cod);
});
$('#codUser').on('keyup',function(){
    var nome    = $(this).val();
    var codigo  = $('#nomeConsulta').val();
    var cod ="";

    var tipo = escolha;
    if(codigo != ""){
        var cod = "&nome="+codigo;
    }

    $('#consultaCliente').attr('src','includes/pesquisa.php?action=cliente&tipo='+tipo+'&codigo='+nome+cod);
});
</script>
<style type="text/css">
    .qw33{
        width: 15%;
        margin-right: 15px;
    }
</style>