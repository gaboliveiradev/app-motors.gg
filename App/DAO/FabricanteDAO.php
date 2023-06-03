<?php
namespace App\DAO;

use App\Model\FabricanteModel;
use Exception;
use \PDO;

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

    public function update(FabricanteModel $model) 
    {

    }

    public function getAllRows() 
    {
        $sql = "SELECT f.id, f.descricao, DATE_FORMAT(f.data_cadastro,'%d/%m/%Y') as data_cadastro, 
        DATE_FORMAT(f.data_cadastro,'%Hh %im') as hora_cadastro, f.data_atualizado, u.nome as operador FROM Fabricante f 
        JOIN usuario u ON (u.id = f.id_quem_registrou) WHERE f.ativo = 1;";

        $stmt = $this->conexao->prepare($sql);
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
        } catch (Exception $err) {
            return false;
        }
    }
}
