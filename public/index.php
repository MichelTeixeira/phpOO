<?php
require_once "autoload.php";

$stAction = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
$acao = '';

switch ($stAction){
    case 'novoProduto':
        $arAcao['nomeTitulo'] = 'Novo';
        $arAcao['nomeAcao'] = 'Cadastro';

        $rsCategoriaProduto = $container['ServiceCategoriaProduto']->listar();
    break;
    case 'alteraProduto':
        $arAcao['nomeTitulo'] = 'Altera';
        $arAcao['nomeAcao'] = 'Alteração';

        $rsCategoriaProduto = $container['ServiceCategoriaProduto']->listar();
        $container['produto']->setId($_REQUEST['id']);
        $rsProduto = $container['ServiceProduto']->listar();
        $produto = $rsProduto[0];
    break;
    case 'excluirProduto':
        $container['produto']->setId($_REQUEST['id']);
        $container['ServiceProduto']->delete();
        header("Location: index.php");
    break;
    default:
        $acao = 'list.';
        $rsProduto = $container['ServiceProduto']->listar();
    break;
}

require_once $acao."produto.php";