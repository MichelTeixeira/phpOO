<?php
namespace Services;

use IFaces\IService;
use IFaces\IConn;
use IFaces\IProduto;

class ServiceProduto implements IService
{
    private $db;
    private $produto;

    public function __construct(IConn $db, IProduto $produto)
    {
        $this->db = $db->connect();
        $this->produto = $produto;
    }
    public function listar()
    {
        $query = "SELECT produto.id_produto
                       , produto.id_categoria_produto
                       , categoria_produto.nome AS categoria
                       , produto.nome
                       , DATE_FORMAT(produto.data,'%d/%m/%Y') AS data
                       , format(produto.valor,2,'de_DE') AS valor
                    FROM produto
              INNER JOIN categoria_produto
                      ON produto.id_categoria_produto = categoria_produto.id_categoria_planejamento
                ";
        if($this->produto->getId())
            $query .= "WHERE produto.id_produto = :id";
        $query .= "
                ORDER BY categoria_produto.nome
                       , produto.nome
                       , produto.id_produto
                ";

        $stmt = $this->db->prepare($query);
        if($this->produto->getId())
            $stmt->bindValue(":id",$this->produto->getId());
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function save()
    {
        $query = " INSERT
                     INTO produto
                        ( id_categoria_produto
                        , nome
                        , data
                        , valor
                        )
                  VALUES
                       ( :idCategoria
                       , :nome
                       , :data
                       , :valor
                       );
                ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":idCategoria",$this->produto->getIdCategoria());
        $stmt->bindValue(":nome"       ,$this->produto->getNome());
        $stmt->bindValue(":data"       ,$this->produto->getData());
        $stmt->bindValue(":valor"      ,str_replace(",", ".", str_replace(".", "", $this->produto->getValor())));
        $stmt->execute();
    }
    public  function update()
    {
        $query = " UPDATE produto
                      SET id_categoria_produto = :idCategoria
                        , nome = :nome
                        , data = :data
                        , valor = :valor
                    WHERE id_produto = :id ;
                ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":idCategoria",$this->produto->getIdCategoria());
        $stmt->bindValue(":nome"       ,$this->produto->getNome());
        $stmt->bindValue(":data"       ,$this->produto->getData());
        $stmt->bindValue(":valor"      ,str_replace(",", ".", str_replace(".", "", $this->produto->getValor())));
        $stmt->bindValue(":id"         ,$this->produto->getId());
        $stmt->execute();
    }
    public  function delete()
    {
        $query = " DELETE
                     FROM produto
                    WHERE id_produto = :id
                        ;
                ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id",$this->produto->getId());
        $stmt->execute();
    }
}