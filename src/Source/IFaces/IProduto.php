<?php
namespace IFaces;

interface IProduto
{
    public function getId();
    public function setId($valor);
    
    public function getIdCategoria();
    public function setIdCategoria($valor);

    public function getNome();
    public function setNome($valor);

    public function getData();
    public function setData($valor);

    public function getValor();
    public function setValor($valor);
}