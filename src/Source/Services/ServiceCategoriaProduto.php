<?php
namespace Services;

use IFaces\IService;
use Source\Conn;
use Tables\CategoriaProduto;

class ServiceCategoriaProduto implements IService
{
    private $db;
    private $categoriaProduto;

    public function __construct(Conn $db, CategoriaProduto $categoriaProduto)
    {
        $this->db = $db->connect();
        $this->categoriaProduto = $categoriaProduto;
    }
    public function listar()
    {
        $query = "SELECT *
                    FROM categoria_produto
                ";
        if($this->categoriaProduto->getId())
            $query .= "WHERE categoria_produto.	id_categoria_planejamento = :id";

        $stmt = $this->db->prepare($query);
        if($this->categoriaProduto->getId())
            $stmt->bindValue(":id",$this->categoriaProduto->getId());
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function save()
    {
    }
    public  function update()
    {
    }
    public  function delete()
    {
    }
}