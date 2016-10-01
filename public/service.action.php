<?php
require_once "autoload.php";

$action = isset($_POST['Action']) ? $_POST['Action'] : '';

switch ($action){
    case 'novoProduto':
        $obTable = $container['produto'];
        $obService = $container['ServiceProduto'];
        $acao = 'save';
    break;

    case 'alteraProduto':
        $obTable = $container['produto'];
        $obService = $container['ServiceProduto'];
        $acao = 'update';
    break;

    default:
        
    break;
}

if(isset($obTable) && isset($obService) && isset($acao)){
    foreach($_REQUEST AS $campo => $valor){
        if($campo!='Action'){
            $set = "set".$campo;

            $obTable->$set($valor);
        }
    }
    $obService->$acao($obTable);
}

header("Location: index.php");