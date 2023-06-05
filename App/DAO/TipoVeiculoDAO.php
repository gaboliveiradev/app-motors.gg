<?php
namespace App\DAO;

use App\Model\TipoVeiculoModel;
use \PDO;
use PDOException;

class TipoVeiculoDAO extends DAO {

	public function __construct()
    {
        parent::__construct();      
    }

    public function insert(TipoVeiculoModel $model) 
    {
        $sql = "INSERT INTO Tipo_Veiculo (descricao, id_quem_registrou) VALUES (?, ?);";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->descricao);
        $stmt->bindValue(2, $model->id_quem_registrou);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function update(TipoVeiculoModel $model) 
    {
        try {
            $sql = "UPDATE Tipo_Veiculo SET descricao = ? WHERE id = ?;";

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $model->descricao);
            $stmt->bindValue(2, $model->id);
            $stmt->execute();

            $sql = "UPDATE Tipo_Veiculo SET data_atualizado = current_timestamp() WHERE id = ?;";

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
        $sql = "SELECT t.id, t.descricao, DATE_FORMAT(t.data_cadastro,'%d/%m/%Y') as data_cadastro, 
        DATE_FORMAT(t.data_cadastro,'%Hh %im') as hora_cadastro, DATE_FORMAT(t.data_atualizado,'%d/%m/%Y') as data_atualizado, 
        DATE_FORMAT(t.data_atualizado,'%Hh %im') as hora_atualizado, u.nome as operador FROM tipo_veiculo t
        JOIN usuario u ON (u.id = t.id_quem_registrou) WHERE t.ativo = 1;";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function deletar(int $id) : bool
    {
        try {
            $sql = "UPDATE tipo_veiculo SET ativo = 0 WHERE id = ?";

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
        $sql = "SELECT * FROM Tipo_Veiculo WHERE id = ?";
            
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("App\Model\TipoVeiculoModel");
    }
}
