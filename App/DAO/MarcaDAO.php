<?php
namespace App\DAO;

use App\Model\MarcaModel;
use \PDO;
use PDOException;

class MarcaDAO extends DAO {

	public function __construct()
    {
        parent::__construct();      
    }

    public function insert(MarcaModel $model) 
    {
        $sql = "INSERT INTO Marca (descricao, id_quem_registrou) VALUES (?, ?);";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->descricao);
        $stmt->bindValue(2, $model->id_quem_registrou);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function update(MarcaModel $model) : bool
    {
        try {
            $sql = "UPDATE Marca SET descricao = ? WHERE id = ?;";

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $model->descricao);
            $stmt->bindValue(2, $model->id);
            $stmt->execute();

            $sql = "UPDATE Marca SET data_atualizado = current_timestamp() WHERE id = ?;";

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
        $sql = "SELECT m.id, m.descricao, DATE_FORMAT(m.data_cadastro,'%d/%m/%Y') as data_cadastro, 
        DATE_FORMAT(m.data_cadastro,'%Hh %im') as hora_cadastro, DATE_FORMAT(m.data_atualizado,'%d/%m/%Y') as data_atualizado, DATE_FORMAT(m.data_atualizado,'%Hh %im') as hora_atualizado, u.nome as operador FROM Marca m 
        JOIN usuario u ON (u.id = m.id_quem_registrou) WHERE m.ativo = ?;";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $ativo);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function deletar(int $id) : bool
    {
        try {
            $sql = "UPDATE marca SET ativo = 0 WHERE id = ?";

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();

            $sql = "UPDATE marca SET data_atualizado = current_timestamp() WHERE id = ?";

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
        $sql = "SELECT * FROM Marca WHERE id = ?";
            
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("App\Model\MarcaModel");
    }
}
