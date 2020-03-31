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
				<h1>Gerar Ordem de Serviço</h1>
			</div>
		</div>
        <div class="painel">
            <form action="function/api.php?action=gerarOS" method="POST">
            <div class="box-left">
                <div class="form-title" style="width: auto; padding-left: 10px;padding-right: 10px; padding-top: 10px;padding-bottom: 10px;">Dados Pessoais</div>
                
                <div class="form-group qw5">
                    <label>Cliente:<span class="require">*</span></label>
                    <input type="text" placeholder="Maria da Costa" name="nomeProduct">
                    <button class="search" key="user" type="button"><i class="fas fa-search"></i></button>
                </div>
                <div class="form-group qw5">
                    <label>Vendedor:<span class="require">*</span></label>
                    <input type="text" value="<?=$dadosUser['codigo']?>" disabled >
                    <input type="hidden" name="vendedor" value="<?=$dadosUser['codigo']?>">
                </div>
                <div class="form-group qw3">
                    <label>CPF:<span class="require">*</span></label>
                    <input type="text" name="cpf" value="" >                                             
                </div>
                <div class="form-group qw3">
                    <label>Sexo:<span class="require">*</span></label>
                    <select name="sexo" id="productName">
                        <option value="Feminino">Feminino</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Outro">Outro</option>
                         
                    </select>
                    
                </div>
                <div class="form-group qw33">
                    <?php
                    $cod = rand(00000,99999);
                    ?>
                    <label>Codigo OS:<span class="require">*</span></label>
                    <input type="text" value="OS<?=$cod?>" disabled>
                    <input type="hidden" value="OS<?=$cod?>" name="osCode">
                </div>
                <div class="form-group qw33">
                    <label>Data:<span class="require">*</span></label>
                    <input type="text" value="<?=date('Y-m-d')?>" name="dataOS">
                </div>

            </div>
            <div class="box-left">
                <div class="form-title" style="width: auto; padding-left: 10px;padding-right: 10px; padding-top: 10px;padding-bottom: 10px;">Produtos</div>
               <table class="trBox">
                  <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço Un</th>
                    <th>Total</th>
                    <th>Deletar</th>
                  </tr></div>
                  
                  
                </table>

            </div>
                <div class="addProduct_btn"><i class="fas fa-plus" ></i>Adicionar Produto</div>            
            <div class="box-left">
                <div class="form-title" style="width: auto; padding-left: 10px;padding-right: 10px; padding-top: 10px;padding-bottom: 10px;">Produtos</div>
               <table >
                  <tr>
                    <th>Situação</th>
                    <th>Prazo de Entrega</th>
                    <th>Total</th>
                    <th>Desconto %</th>
                    <th>Pagamento</th>
                  </tr></div>
                  <tr>
                    <td>
                       <div class="form-group-td">
                           <select name="situation">
                               <option>Em Aberto</option>
                               <option>Entregue</option>
                           </select>
                       </div>
                    </td>

                    <td>
                        <div class="form-group-td">
                            <input type="text" name="">
                        </div>
                    </td>
                    <td class="somaFeita">
                        0,00
                    </td>
                    <td>
                        <div class="form-group-td">
                            <input type="text" name="" value="0">
                        </div>
                    </td>
                    <td>
                        <select name="situation">
                               <option>A Vista</option>
                               <option>A Prazo</option>
                           </select>
                    </td>
                  </tr>
                  
                </table>

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
    <div class="imgAdd" style="display: none;">
        <div class="dialog">
            <button class="closeDialog"><span></span><span></span></button>
            <h1>Procurar Produto</h1>
            <div class="content3">
                <div class='input-wrapper'>
                    <label>Dados do Produto</label>
                    <input type="text" style="float:left; text-align:center;margin-left:5%; height:30px; border:0; outline:none; border-radius:25px;width: 90%;" class="searchProduct" placeholder="Titulo do produto">
                    <input type="text" style="float:left; text-align:center;margin-left:5%; height:30px; border:0; margin-top:5px; outline:none; border-radius:25px;width: 90%;" class="QTDProd" placeholder="Quantidade">
                    <div class="product" style="float: left; width: 90%; margin-left: 5%; margin-top:10px; ">
                        <div class="productLI" idProduct="" valor=""></div>
                    </div>
                </div>
            </div>
        </div>
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
$('.search').click(function(){
    alert('teste');
});
$('.addProduct_btn').click(function(){
    $('.imgAdd').fadeIn('hidden').show;
});
$('.searchProduct').on('keyup',function(){
    var titulo = $(this).val();
     $.ajax({
                    url: 'function/searchProduct.php',
                    data: {
                        'titulo':titulo,
                    },                    
                    type: 'POST',
                    success: function(data) 
                    {
                       
                        var json = JSON.parse(data);

                      
                         $('.productLI').attr('idProduct',json[0].id);
                         $('.productLI').attr('valor',json[0].unitPreco);
                         $('.productLI').html(json[0].titulo);
                            

                        
                    }
                });
});

</script>
<script type="text/javascript">
    $('.productLI').click(function(){
        var qtd   = $('.QTDProd').val();
        var valor = $(this).attr('valor');

        var total = qtd*valor.replace(',','.');
        total = number_format(total,2,',','.');

    $('.trBox tbody').append('<tr><td>'+$(this).html()+'</td><td>'+$('.QTDProd').val()+'</td><td>'+$(this).attr('valor')+'</td><td class="totalSoma">'+total+'</td><td><button class="trash"><img src="img/trash_icon.png"></button></td> </tr>');
});
    var soma ;
    setInterval(function(){
        var somado = $('.totalSoma').hasClass('somado');
        if(somado == false){
            var sa = $('.totalSoma').val();

             soma = soma+sa;
        
            $('.totalSoma').addClass('somado')
        }
        somados = number_format(soma,2,',','.');
        $('.somaFeita').html(somados);
    },500);
</script>
<style type="text/css">
    .search{
        position: absolute;
        right: 0;
        background: transparent;
        width: 30px;
        border:transparent;
        top: 0;
    }
    .form-group{
        position: relative;
    }
    .qw33{
        width: 24%;
        margin-left: 7px; 
    }
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    color:white;
}

.form-group-td input{
    width: 100%;
    height: 30px;
}
button.trash{
    background: transparent;
    border:none;
    width: 100%;
}
button.trash img{
    width: 25px;
}
body{
    overflow-y: scroll;
}
.info_op{
    position: fixed;
}
.option_bottom{
    position: fixed;
}
.painel{
    margin-bottom: 60px;
}
.addProduct_btn{
    float: left;
    background: #056406;
    color:white;
    padding: 5px 15px;
    font-family: arial;
    font-size: 15px;
    font-weight: bold;
    border:0px;
    line-height: 30px;
    cursor: pointer;
}
.addProduct_btn i{
    width: auto;
    float: inherit;
    margin-right: 10px;
}

</style>

