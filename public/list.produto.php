<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />
<title>Produtos</title>
</head>

<body>

    <div>
        <a href='index.php'>Home</a>
        <a href='index.php?action=novoProduto'>Novo Produto</a>
    </div>

    <div align="center" style="width:100%">
        <div id="conteudo" align="center" style="border: solid #BEBEBE 1px; width: 75%; margin-top: 1.5%; margin-left: 12.5%; background-color: #F5F5F5; float: left">
            <div align="center" style="width:90%; margin-top: 5%; background-color: #6495ED; padding-bottom: 0.5%; padding-top: 0.5%">
                <strong style="font-size: large">
                    Lista de Produtos
                </strong>
            </div>

            <div align="center" style="width:85%; margin-top: 5%; margin-bottom: 3%">
                <table width="100%" cellpadding="4">
                    <tr>
                        <th width="5%">ID</th>
                        <th width="21%">Categoria</th>
                        <th width="42%">Nome</th>
                        <th width="9%">Cadastro</th>
                        <th width="12%">Valor</th>
                        <th width="11%">Ação</th>
                    </tr>
                    <?php foreach($rsProduto as $produto): ?>
                    <tr>
                        <td align="center"><?=$produto['id_produto']?></td>
                        <td><?=$produto['categoria']?></td>
                        <td><?=$produto['nome']?></td>
                        <td align="center"><?=$produto['data']?></td>
                        <td align="right"><?=$produto['valor']?></td>
                        <td align="center">
                            <a href='index.php?action=alteraProduto&id=<?=$produto['id_produto']?>'>Alterar</a>
                            <a href='index.php?action=excluirProduto&id=<?=$produto['id_produto']?>'>Excluir</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

</body>
</html>