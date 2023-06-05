<?php
namespace App\DAO;

use App\Model\CombustivelModel;
use \PDO;
use PDOException;

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

    public function update(CombustivelModel $model)  : bool
    {
        try {
            $sql = "UPDATE Combustivel SET descricao = ? WHERE id = ?;";

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $model->descricao);
            $stmt->bindValue(2, $model->id);
            $stmt->execute();

            $sql = "UPDATE Combustivel SET data_atualizado = current_timestamp() WHERE id = ?;";

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $model->id);
            $stmt->execute();
    
            return true;
        } catch (PDOException $err) {
            return false;
        }
    }

    public function getAllRows() 
    {
        $sql = "SELECT c.id, c.descricao, DATE_FORMAT(c.data_cadastro,'%d/%m/%Y') as data_cadastro, 
        DATE_FORMAT(c.data_cadastro,'%Hh %im') as hora_cadastro, DATE_FORMAT(c.data_atualizado,'%d/%m/%Y') as data_atualizado, DATE_FORMAT(c.data_atualizado,'%Hh %im') as hora_atualizado, u.nome as operador FROM Combustivel c 
        JOIN usuario u ON (u.id = c.id_quem_registrou) WHERE c.ativo = 1;";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function delete(int $id) : bool
    {
        try {
            $sql = "UPDATE combustivel SET ativo = 0 WHERE id = ?";

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
    
            return true;
        } catch (PDOException $err) {
            return false;
        }
    }

    public function getById(int $id) 
    {
        $sql = "SELECT * FROM Combustivel WHERE id = ?";
            
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("App\Model\CombustivelModel");
    }
}
