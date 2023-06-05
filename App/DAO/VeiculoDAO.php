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

    public function getAllRows() 
    {
        $sql = "SELECT v.id, v.modelo, v.ano, v.cor, v.num_chassi, v.placa, v.quilometragem, v.observacoes, DATE_FORMAT(v.data_cadastro,'%d/%m/%Y') as data_cadastro, DATE_FORMAT(v.data_cadastro,'%Hh %im') as hora_cadastro,
        DATE_FORMAT(v.data_atualizado,'%d/%m/%Y') as data_atualizado, DATE_FORMAT(v.data_atualizado,'%Hh %im') as hora_atualizado, f.descricao, m.descricao, t.descricao, c.descricao, u.nome, d.revisao, d.venda, d.aluguel, 
        d.roubo_furto, d.particular, d.sinistrado
        FROM Veiculo v
        JOIN Fabricante f ON (f.id = v.id_fabricante)
        JOIN Marca m ON (m.id = v.id_marca)
        JOIN tipo_veiculo t ON (t.id = v.id_tipo)
        JOIN Combustivel c ON (c.id = v.id_combustivel)
        JOIN detalhes_veiculo d ON (d.id = v.id_detalhes)
        JOIN Usuario u ON (u.id = v.id_quem_registrou) WHERE v.ativo = 1;";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function deletar(int $id) : bool
    {
        try {
            $sql = "UPDATE veiculo SET ativo = 0 WHERE id = ?";

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();

            $sql = "UPDATE veiculo SET data_atualizado = current_timestamp() WHERE id = ?";

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
    
            return true;
        } catch (PDOException $err) {
            return false;
        }
    }
}
