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
        $stmt = $this->db->prepare($query);
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