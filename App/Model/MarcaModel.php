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
}
