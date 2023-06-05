<?php
namespace App\Model;

use App\DAO\MarcaDAO;

class MarcaModel extends Model {
	public $id, $descricao, $data_cadastro, $id_quem_registrou, $ativo;

	public function salvar() 
	{
		$dao = new MarcaDAO();
		return ($this->id == null) ? $dao->insert($this) : $dao->update($this);
	}

	public function getAllRows() 
	{
		$dao = new MarcaDAO();
		return $dao->getAllRows();
	}

	public function deletar(int $id)
	{
		$dao = new MarcaDAO();
		return $dao->deletar((int) $id);
	}

	public function getByID(int $id) 
	{
		$dao = new MarcaDAO();

		$obj = $dao->getById((int) $id);
		return ($obj) ? $obj : new MarcaModel();
	}
}
