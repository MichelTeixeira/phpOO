<?php
namespace Services;

use IFaces\IService;
use Source\Conn;
use Tables\Produto;

class ServiceProduto implements IService
{
    private $db;
    private $produto;

    public function __construct(Conn $db, Produto $produto)
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
            $query .= "WHERE produto.id_produto = ".$this->produto->getId();
        $query .= "
                ORDER BY categoria_produto.nome
                       , produto.nome
                       , produto.id_produto
                ";

        $stmt = $this->db->prepare($query);
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
                       ( ".$this->produto->getIdCategoria()."
                       , '".$this->produto->getNome()."'
                       , '".$this->produto->getData()."'
                       , ".str_replace(",", ".", str_replace(".", "", $this->produto->getValor()))."
                       );
                ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }
    public  function update()
    {
        $query = " UPDATE produto
                      SET id_categoria_produto = ".$this->produto->getIdCategoria()."
                        , nome = '".$this->produto->getNome()."'
                        , data = '".$this->produto->getData()."'
                        , valor = ".str_replace(",", ".", str_replace(".", "", $this->produto->getValor()))."
                    WHERE id_produto = ".$this->produto->getId()."
                        ;
                ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }
    public  function delete()
    {
        $query = " DELETE
                     FROM produto
                    WHERE id_produto = ".$this->produto->getId()."
                        ;
                ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }
}