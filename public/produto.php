<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />
<title><?=$arAcao['nomeTitulo']?> Produto</title>

<script language='javascript' type='text/javascript'>
function moeda(objeto){
    v = objeto.value;
    v = v.replace(/\D/g,"");
    v = v.replace(/(\d{1})(\d{15})$/,"$1.$2");
    v = v.replace(/(\d{1})(\d{11})$/,"$1.$2");
    v = v.replace(/(\d{1})(\d{8})$/,"$1.$2");
    v = v.replace(/(\d{1})(\d{5})$/,"$1.$2");
    v = v.replace(/(\d{1})(\d{1,2})$/,"$1,$2");

    objeto.value = v;
}

function validaCampo(objeto){
    e = objeto.elements;

    erro = 'N';
    msg = '';
    
    opcional = 0;

    for(var i =0; i < e.length; i++){
        if( e[i].getAttribute("obrigatorio")=="s" && e[i].value==""){
            msg = "Preencha o campo "+e[i].getAttribute("descricao")+"!";
            erro='S';
        }

        if(erro=='S'){
            e[i].style.borderColor  = "#F00707";
            e[i].focus();
            break;
        }else{
            e[i].style.borderColor  = "";
        }
    }

    if(erro=='S'){
        alert(msg);

        return false;
    }else{
        return true;
    }
}
</script>

</head>

<body>

    <div>
        <a href='index.php'>Home</a>
        <a href='index.php?action=novoProduto'>Novo Produto</a>
    </div>

    <form id="form1" name="form1" method="post" action="service.action.php" onsubmit="return validaCampo(this);">

    <div align="center" style="width:100%">
        <div id="conteudo" align="center" style="border: solid #BEBEBE 1px; width: 75%; margin-top: 1.5%; margin-left: 12.5%; background-color: #F5F5F5; float: left">
            <div align="center" style="width:90%; margin-top: 5%; background-color: #6495ED; padding-bottom: 0.5%; padding-top: 0.5%">
                <strong style="font-size: large">
                    <?=$arAcao['nomeAcao']?> de Produto
                </strong>
            </div>
    
            <div align="left" style="width:90%; margin-top: 5%; margin-bottom: 3%">
                <div style="width:91%; margin-left: 10%" align="left">
                    <span style="width:10%; float: left">Categoria</span>
                    <select name="IdCategoria" id="IdCategoria" style="width:70.5%" obrigatorio="s" descricao="Categoria" >
                        <option value="">SELECIONE</option>
                        <?php
                        foreach($rsCategoriaProduto as $categoriaProduto){
                            $stSelected = '';
                            if(isset($produto) && $produto['id_categoria_produto'] == $categoriaProduto['id_categoria_planejamento'])
                                $stSelected = 'selected="selected"';
                            echo '<option '.$stSelected.' value="'.$categoriaProduto['id_categoria_planejamento'].'">'.$categoriaProduto['nome'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div style="width:91%; margin-left: 10%; margin-top: 3%" align="left">
                    <span style="width:10%; float: left">Nome</span>
                    <?php
                        $value = (isset($produto)) ? $produto['nome'] : '';
                        $stValue = 'value="'.$value.'"';
                    ?>
                    <input style="width:70%;" type="text" name="Nome" id="Nome" obrigatorio="s" descricao="Nome" <?=$stValue?> />
                </div>
                <div style="width:91%; margin-left: 10%; margin-top: 3%" align="left">
                    <span style="width:10%; float: left">Valor</span>
                    <?php
                        $value = (isset($produto)) ? $produto['valor'] : '';
                        $stValue = 'value="'.$value.'"';
                    ?>
                    <input style="width:70%;" type="text" name="Valor" id="Valor" obrigatorio="s" descricao="Valor" onkeyup="moeda(this);" <?=$stValue?> />
                </div>
    
                <div style="margin-left: 10%; margin-top: 3%" align="left">
                    <?php
                        $value = (isset($produto)) ? 'Alterar' : 'Cadastrar';
                        $stValue = 'value="'.$value.'"';
                    ?>
                    <input type="submit" <?=$stValue?> style="width: 10%" />
                    <input type="reset" value="Limpar" style="width: 10%" />
                </div>
            </div>
        </div>
    </div>

    <?php
        date_default_timezone_set('America/Sao_Paulo');
        $dataInicial = new DateTime('NOW');
        echo '<input type="hidden" name="Data" id="Data" value="'.$dataInicial->format('Y-m-d H:i:s').'"  />';
        if(isset($produto))
            echo '<input type="hidden" name="Id" id="Id" value="'.$produto['id_produto'].'" />';
        echo '<input type="hidden" name="Action" id="Action" value="'.$stAction.'" />';
        
    ?>

    </form>

</body>
</html>