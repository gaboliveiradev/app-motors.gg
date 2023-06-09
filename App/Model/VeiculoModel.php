<?php
namespace App\Model;

use App\DAO\VeiculoDAO;

class VeiculoModel extends Model {
	public $id, $modelo, $ano, $cor, $num_chassi, $placa, $quilometragem, $observacoes, $data_cadastro, 
	$data_atualizado, $id_quem_registrou, $ativo, $id_marca, $id_fabricante, $id_tipo, $id_combustivel, $id_detalhes, $revisao, $venda, $aluguel, $roubo_furto, $particular, $sinistrado;

	public function salvar() 
	{
		$dao = new VeiculoDAO();
		return ($this->id == null) ? $dao->insert($this) : $dao->update($this);
	}

	public function getAllRows(int $ativo)
	{
		$dao = new VeiculoDAO();
		return $dao->getAllRows((int) $ativo);
	}

	public function deletar(int $id) 
	{
		$dao = new VeiculoDAO();
		return $dao->deletar((int) $id);
	}
}
