$('.btn_painel').click(function(){
	var key = $(this).attr('key');
	if(key == 'cadastro'){
		location.href="cadastro.php";
	}else if(key == 'clientes'){
		location.href="clientes_cad.php";
	}else if(key == 'voltar'){
		history.back(-1);
	}else if(key == 'pessoaFisica'){
		location.href="pessoafisica_cad.php";
	}else if(key == 'pessoaJuridica'){
		location.href="pessoajuridica_cad.php";
	}else if(key == 'funcionarios'){
		location.href="funcionario_cad.php";
	}else if(key == 'produtos'){
		location.href="product_cad.php";
	}else if(key == 'consultar'){
		location.href="consulta.php";
	}else if(key == 'clientes_consulta'){
		location.href="consultaCliente.php";
	}else if(key == 'funcionarios_consulta'){
		location.href="consultaFuncionario.php";
	}else if(key == 'relatorio'){
		location.href="relatorioVenda.php";
	}else if(key == 'produtos_consulta'){
		location.href="consultaProduct.php";
	}else if(key == 'gerarOS'){
		location.href="geraros.php";
	}

});
$('.help').click(function(){
	var key = $(this).attr('key');

	if(key == "home"){
		location.href="painel.php";
	}
	else if(key == "help"){
		location.href="docs.php";
	}
	
});

setTimeout(function(){
	$('.alert').fadeOut('slow').hidden;
},5000);
$('.close-dialog').click(function(){
	$('.alert').fadeOut('slow').hidden;
});
$('.addImg').click(function(){
	$('.imgAdd').fadeIn('slow').show;
});
$('.closeDialog').click(function(){
	$('.imgAdd').fadeOut('slow').hidden;
});
$('.upload_item').click(function(){
	var data = new FormData();
                data.append('fileimagem', $('#input-file')[0].files[0]);

                $.ajax({
                    url: 'function/uploadImg.php',
                    data: data,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function(data) 
                    {
                    	var local = data.replace('../','');
                       $('.productImg').attr('src',local);
                       $('.productImg').val(data);
                    }
                });

            });
$('.removeImg').click(function(){
		 $('.productImg').attr('src','img/no-image.png');
         $('.productImg').val('');
});