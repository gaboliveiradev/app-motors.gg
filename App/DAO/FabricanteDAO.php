<?php
namespace App\DAO;

use App\Model\FabricanteModel;
use \PDO;
use PDOException;

class FabricanteDAO extends DAO {

	public function __construct()
    {
        parent::__construct();      
    }

    public function insert(FabricanteModel $model) 
    {
        $sql = "INSERT INTO Fabricante (descricao, id_quem_registrou) VALUES (?, ?);";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->descricao);
        $stmt->bindValue(2, $model->id_quem_registrou);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function update(FabricanteModel $model) : bool
    {
        try {
            $sql = "UPDATE Fabricante SET descricao = ? WHERE id = ?;";

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $model->descricao);
            $stmt->bindValue(2, $model->id);
            $stmt->execute();

            $sql = "UPDATE Fabricante SET data_atualizado = current_timestamp() WHERE id = ?;";

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $model->id);
            $stmt->execute();
    
            return true;
        } catch (PDOException $err) {
            return false;
        }
    }

    public function getAllRows(int $ativo) 
    {
        $sql = "SELECT f.id, f.descricao, DATE_FORMAT(f.data_cadastro,'%d/%m/%Y') as data_cadastro, 
        DATE_FORMAT(f.data_cadastro,'%Hh %im') as hora_cadastro, DATE_FORMAT(f.data_atualizado,'%d/%m/%Y') as data_atualizado, DATE_FORMAT(f.data_atualizado,'%Hh %im') as hora_atualizado,
        u.nome as operador FROM Fabricante f JOIN usuario u ON (u.id = f.id_quem_registrou) WHERE f.ativo = ?;";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $ativo);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function deletar(int $id) : bool
    {
        try {
            $sql = "UPDATE fabricante SET ativo = 0 WHERE id = ?";

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
        $sql = "SELECT * FROM Fabricante WHERE id = ?";
            
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("App\Model\FabricanteModel");
    }
}
