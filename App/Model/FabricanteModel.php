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
}
