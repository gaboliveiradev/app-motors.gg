<?php
namespace App\DAO;

use App\Model\VeiculoModel;
use \PDO;
use PDOException;

class VeiculoDAO extends DAO {

	public function __construct()
    {
        parent::__construct();      
    }

    public function insert(VeiculoModel $model) : bool
    {
        try {
            $sql = "INSERT INTO detalhes_veiculo (revisao, venda, aluguel, roubo_furto, particular, sinistrado, id_quem_registrou) VALUES (?, ?, ?, ?, ?, ?, ?)";

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $model->revisao);
            $stmt->bindValue(2, $model->venda);
            $stmt->bindValue(3, $model->aluguel);
            $stmt->bindValue(4, $model->roubo_furto);
            $stmt->bindValue(5, $model->particular);
            $stmt->bindValue(6, $model->sinistrado);
            $stmt->bindValue(7, $model->id_quem_registrou);
            $stmt->execute();
    
            $sql = "INSERT INTO Veiculo (modelo, ano, cor, num_chassi, placa, quilometragem, observacoes, id_quem_registrou, id_marca, id_fabricante, id_tipo, id_combustivel, id_detalhes)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, LAST_INSERT_ID())";
    
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $model->modelo);
            $stmt->bindValue(2, $model->ano);
            $stmt->bindValue(3, $model->cor);
            $stmt->bindValue(4, $model->num_chassi);
            $stmt->bindValue(5, $model->placa);
            $stmt->bindValue(6, $model->quilometragem);
            $stmt->bindValue(7, $model->observacoes);
            $stmt->bindValue(8, $model->id_quem_registrou);
            $stmt->bindValue(9, $model->id_marca);
            $stmt->bindValue(10, $model->id_fabricante);
            $stmt->bindValue(11, $model->id_tipo);
            $stmt->bindValue(12, $model->id_combustivel);
            $stmt->execute();

            return true;
        } catch(PDOException $err) {
            return false;
        }
    }

    public function update(VeiculoModel $model) 
    {

    }
}
