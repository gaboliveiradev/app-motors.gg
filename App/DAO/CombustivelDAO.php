<?php
namespace App\DAO;

use App\Model\CombustivelModel;
use \PDO;

class CombustivelDAO extends DAO {

	public function __construct()
    {
        parent::__construct();      
    }

    public function insert(CombustivelModel $model) 
    {
        $sql = "INSERT INTO Combustivel (descricao, id_quem_registrou) VALUES (?, ?);";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->descricao);
        $stmt->bindValue(2, $model->id_quem_registrou);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function update() 
    {

    }

    public function getAllRows() 
    {
        $sql = "SELECT c.id, c.descricao, DATE_FORMAT(c.data_cadastro,'%d/%m/%Y') as data_cadastro, 
        DATE_FORMAT(c.data_cadastro,'%Hh %im') as hora_cadastro, c.data_atualizado, u.nome as operador FROM Combustivel c 
        JOIN usuario u ON (u.id = c.id_quem_registrou) WHERE c.ativo = 1;";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
}
