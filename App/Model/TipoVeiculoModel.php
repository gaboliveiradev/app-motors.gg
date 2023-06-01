<?php
namespace App\Model;

use App\DAO\TipoVeiculoDAO;

class TipoVeiculoModel extends Model {
	public $id, $descricao, $data_cadastro, $id_quem_registrou, $ativo;

	public function salvar() 
	{
		$dao = new TipoVeiculoDAO();
		return ($this->id == null) ? $dao->insert($this) : $dao->update($this);
	}
}
