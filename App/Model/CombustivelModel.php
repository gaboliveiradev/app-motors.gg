<?php
namespace App\Model;

use App\DAO\CombustivelDAO;

class CombustivelModel extends Model {
	public $id, $descricao, $data_cadastro, $id_quem_registrou, $ativo;

	public function salvar() 
	{
		$dao = new CombustivelDAO();
		return ($this->id == null) ? $dao->insert($this) : $dao->update($this);
	}
}
