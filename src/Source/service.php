<?php
$container['conn'] = function($c){
    return new \Source\Conn($c['dsn'],$c['user'],$c['pass']);
};

$container['produto'] = function(){
    return new \Tables\Produto;
};

$container['ServiceProduto'] = function($c){
    return new \Services\ServiceProduto($c['conn'],$c['produto']);
};

$container['categoriaProduto'] = function(){
    return new \Tables\CategoriaProduto;
};

$container['ServiceCategoriaProduto'] = function($c){
    return new \Services\ServiceCategoriaProduto($c['conn'],$c['categoriaProduto']);
};