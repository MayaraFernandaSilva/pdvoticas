    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<?php 
require('../conexao/conexao.php');
require("../function/class.php");
$action = $_GET['action'];


if($action == "cliente"){
$nome = mysqli_real_escape_string($conn, $_GET['nome']);
$codigo = mysqli_real_escape_string($conn, $_GET['codigo']);

$tipo = mysqli_real_escape_string($conn, $_GET['tipo']);
if($tipo == "fisica"){
    $classConsult = new userClient;
}
elseif($tipo == "juridica"){
    $classConsult = new userClientJur;
}
if($nome != NULL){
    $classConsult->nome = $nome;
}
if($codigo != NULL){
 $classConsult->codigo = $codigo;   
}

?>

<table>
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nome / Razão Social</th>
                <th>Sexo</th>
                <th>CPF / CNPJ</th>
                <th>Data de Nascimento</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Cidade</th>
                <th>UF</th>
            </tr>
        </thead>
        <tbody>
<?php 
$dbSelect = $classConsult->check();
    while($dados = mysql_fetch_array($dbSelect)){
?>
            <tr  class="editarCliente" key="<?=$dados['id']?>" tipo="<?=$tipo?>">
                <td><?=$dados['id']?></td>
                <td><?=$dados['nome']?><?=$dados['razaoSocial']?></td>
                <td><?=$dados['sexo']?></td>
                <td><?=$dados['cpf']?><?=$dados['cnpj']?></td>
                <td><?=$dados['data_nascimento']?></td>
                <td><?=$dados['telefone']?></td>
                <td><?=$dados['email']?></td>
                <td><?=$dados['municipio']?></td>
                <td><?php if($tipo== 'juridica'){ echo $dados['uf_endereco'] ;}?><?=$dados['uf']?></td>
            </tr>
<?php  } ?>
        </tbody>
        </table>

    <?php }elseif($action == "funcionario"){
        $nome = mysqli_real_escape_string($conn, $_GET['nome']);
        $codigo = mysqli_real_escape_string($conn, $_GET['codigo']);
        $classConsult = new userFuncionario;
        if($nome != NULL){
            $classConsult->nome = $nome;
        }
        if($codigo != NULL){
            $classConsult->codigo = $codigo;   
        }

        ?>
<table>
        <thead>
            <tr>
                <th>Codigo do Funcionario</th>
                <th>Nome Funcionario</th>
                <th>Tipo de Funcionario</th>
                <th>Cargo</th>
            </tr>
        </thead>
        <tbody>
<?php 
        $dbSelect = $classConsult->check();
        while($dados = mysql_fetch_array($dbSelect)){
?>
            <tr class="editarFuncionario" key="<?=$dados['id']?>">
                <td><?=$dados['codigo']?></td>
                <td><?=$dados['nome']?></td>
                <td><?php if($dados['nivel_acesso'] == 2){ echo "Administrador"; }elseif($dados['nivel_acesso'] == 1){echo "Funcionario Comum"; }?></td>
                <td><?=$dados['cargo']?></td>
            </tr>
           
        <?php } ?>
        </tbody>
        </table>

        <?
    }elseif($action == "relatorioVenda"){
        ?>
        <table>
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Vendedor</th>
                <th>Data - Venda</th>
                <th>Codigo de Venda</th>
                <th>Produto</th>
                <th>Modelo</th>
                <th>UN</th>
                <th>Quantidade</th>
                <th>Valor Un</th>
                <th>TOTAL</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>FC1278</td>
                <td>Roberval Salgado</td>
                <td>31/09/2018</td>
                <td>OS00003</td>
                <td>Ray-Ban Azul</td>
                <td>Armação Social</td>
                <td>UN</td>
                <td>14</td>
                <td>130,00</td>
                <td>1.820,00</td>

            </tr>
            <tr>
                <td>FC1278</td>
                <td>Roberval Salgado</td>
                <td>31/09/2018</td>
                <td>OS00003</td>
                <td>Ray-Ban Azul</td>
                <td>Armação Social</td>
                <td>UN</td>
                <td>14</td>
                <td>130,00</td>
                <td>1.820,00</td>

            </tr>
            <tr>
                <td>FC1278</td>
                <td>Roberval Salgado</td>
                <td>31/09/2018</td>
                <td>OS00003</td>
                <td>Ray-Ban Azul</td>
                <td>Armação Social</td>
                <td>UN</td>
                <td>14</td>
                <td>130,00</td>
                <td>1.820,00</td>

            </tr>
           
        
        </tbody>
        </table>
        <div class="dadosGerais">
                        <button class="print">
                <img src="../img/print_icon.png">
                <span>Imprimir</span>
            </button>
        </div>
        <style type="text/css">
        .print{
            width: 150px;
            float: right;
            outline: transparent;
            cursor: pointer;
            margin-left: 15px; 
            position: relative;
            height: 50px;
            background: rgba(255, 193, 7, 0.59);
            border: 1px solid #FFC107;
        }
        .print span{
            float: right;
            margin-right: 15px;
        }
        .print img{
            top: -13;
            left: 0;
            height: 70px;
            position: absolute;
        }
        .totalEstoque{
            height: 100%;
            float: left;
            height: 35px;
            line-height: 35px;
            margin-left: 15px;
        }
        .totalEstoque span{
            float: left;
            margin-left: 10px;
            width: calc(100px - 10px);
            padding: 0px 5px;
            border:1px solid black;
            text-align: right;
        }
        .totalEstoque label{
            float: left;
        }
        .infoGeral{
            float: left;
            width: 150px;
            height: 35px;
            text-align: center;
            color: white;
            font-weight: bold;
            line-height: 35px;
            background: #326698;
        }
        
        .dadosGerais{
            width: 80%;
            float: right;
            height: 35px;
            margin-top: 20px;
        }   
        @media screen and (max-width: 1050px){
         .dadosGerais{
            width: 100%;
            float: right;
            height: 35px;
            margin-top: 20px;
        }   
        }         
    </style>

        <?
    } elseif($action == "productConsult"){
        ?>
        <table>
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Produto</th>
                <th>Unidade</th>
                <th>Preço de venda</th>
                <th>Desconto (%)</th>
                <th>Icms (%)</th>
                <th>Cfop</th>
                <th>Situação tributaria</th>
                <th>Tipo</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $productCheck = new checkAllProduct;
         
            
            $titulo = $_GET['titulo'];
            $modelo1 = $_GET['modelo'];
            $marca   = $_GET['marca'];

            $productCheck->modelo= $modelo1;
            $productCheck->titulo=$titulo;
            $productCheck->marca= $marca;

               $dado = $productCheck->check();
              
            $valorQTD= 0;
            $estoque = 0;
            while($dados = mysql_fetch_array($dado)){
                $estoque = $estoque+$dados['qtd'];
                $valorQTD= $valorQTD+$dados['qtd']*$dados['valor'];
            ?>
            <tr class="editarProduto" key="<?=$dados['id']?>">
                <td><?=$dados['codigo']?></td>
                <td><?=$dados['titulo']?></td>
                <td><?=$dados['qtd']?></td>
                <td><?=$dados['valor']?></td>
                <td>-</td>
                <td><?=$dados['icms']?></td>
                <td><?=$dados['Cfop']?></td>
                <td><?=$dados['tributoStatus']?></td>
                <td><?=$dados['modelo']?></td>
            </tr>
           <?php
        }
           ?>
        
        </tbody>
        </table>
        <div class="dadosGerais">
            <div class="infoGeral">
                Dados Gerais:
            </div>
            <div class="totalEstoque">
                <label>Total em Estoque: </label>
                <span><?=$estoque?></span>
            </div>
            <div class="totalEstoque">
                <label>Valor em Estoque: </label>
                <span>R$ <?=number_format($valorQTD,2,',','.')?></span>
            </div>
            <button class="print">
                <img src="../img/print_icon.png">
                <span>Imprimir</span>
            </button>
        </div>
        <style type="text/css">
        .print{
            width: 150px;
            float: right;
            outline: transparent;
            cursor: pointer;
            margin-left: 15px; 
            position: relative;
            height: 50px;
            background: rgba(255, 193, 7, 0.59);
            border: 1px solid #FFC107;
        }
        .print span{
            float: right;
            margin-right: 15px;
        }
        .print img{
            top: -13;
            left: 0;
            height: 70px;
            position: absolute;
        }
        .totalEstoque{
            height: 100%;
            float: left;
            height: 35px;
            line-height: 35px;
            margin-left: 15px;
        }
        .totalEstoque span{
            float: left;
            margin-left: 10px;
            width: calc(100px - 10px);
            padding: 0px 5px;
            border:1px solid black;
            text-align: right;
        }
        .totalEstoque label{
            float: left;
        }
        .infoGeral{
            float: left;
            width: 150px;
            height: 35px;
            text-align: center;
            color: white;
            font-weight: bold;
            line-height: 35px;
            background: #326698;
        }
        
        .dadosGerais{
            width: 80%;
            float: right;
            height: 35px;
            margin-top: 20px;
        }   
        @media screen and (max-width: 1050px){
         .dadosGerais{
            width: 100%;
            float: right;
            height: 35px;
            margin-top: 20px;
        }   
        }         
    </style>
        <?
    } ?>
        <style type="text/css">
                  
table {
    float: left;
    width: 100%;
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    color: #53657f;
    max-height: 200px;
    overflow: hidden !important;
}
td, th {
    border: 1px solid #a2b5d3;
    text-align: left;
    padding: 8px;
}
td{

}
th{
    text-align: center;
}

tr:nth-child(even) {
    background-color: #b3c7e6;
}
tr{
    transition: all .5s;
}
tr:hover{
    cursor: pointer;
    background-color:#326698;
    color: white;
}

        </style>
<script type="text/javascript">
    $('.editarFuncionario').click(function(){
    var id = $(this).attr('key');
    window.parent.location.href="../funcionario_edit.php?id="+id;
});
$('.editarProduto').click(function(){
    var id = $(this).attr('key');
    window.parent.location.href="../product_edit.php?id="+id;
});
$('.editarCliente').click(function(){
    var id = $(this).attr('key');
    var tipo = $(this).attr('tipo');
    window.parent.location.href="../cliente_edit.php?tipo="+tipo+"&id="+id;
});
</script>