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
}
