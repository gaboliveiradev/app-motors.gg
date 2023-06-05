<?php
namespace App\Model;

use App\DAO\FabricanteDAO;

class FabricanteModel extends Model {
	public $id, $descricao, $data_cadastro, $id_quem_registrou, $ativo;

	public function salvar() 
	{
		$dao = new FabricanteDAO();
		return ($this->id == null) ? $dao->insert($this) : $dao->update($this);
	}

	public function getAllRows(int $ativo) 
	{
		$dao = new FabricanteDAO();
		return $dao->getAllRows((int) $ativo);
	}

	public function deletar(int $id) 
	{
		$dao = new FabricanteDAO();
		return $dao->deletar( (int) $id);
	}

	public function getByID(int $id) 
	{
		$dao = new FabricanteDAO();

		$obj = $dao->getById((int) $id);
		return ($obj) ? $obj : new FabricanteModel();
	}
}
