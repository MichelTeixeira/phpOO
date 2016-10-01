<?php
namespace IFaces;

interface ICategoriaProduto
{
    public function getId();
    public function setId($valor);

    public function getNome();
    public function setNome($valor);
}