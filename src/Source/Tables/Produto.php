<?php
namespace Tables;

use IFaces\IProduto;

class Produto implements IProduto
{
    private $id;
    private $idCategoria;
    private $nome;
    private $data;
    private $valor;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id= $id;
        return $this;
    }
    public function getIdCategoria()
    {
        return $this->idCategoria;
    }
    public function setIdCategoria($idCategoria)
    {
        $this->idCategoria= $idCategoria;
        return $this;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }
    public function getData()
    {
        return $this->data;
    }
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }
    public function getValor()
    {
        return $this->valor;
    }
    public function setValor($valor)
    {
        $this->valor = $valor;
        return $this;
    }
}