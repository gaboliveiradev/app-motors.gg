<?php
namespace App\DAO;

use App\Model\FabricanteModel;
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
}
