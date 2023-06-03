<?php
namespace App\Controller;

use App\Model\TipoVeiculoModel;

class TipoVeiculoController extends Controller {

	public static function form() 
	{
		parent::isAuthenticated();
		parent::render("tipo veiculo/cr_tipo_veiculo");
	}

	public static function salvar() 
	{
		$model = new TipoVeiculoModel();

		$model->descricao = $_POST["tipo_veiculo"];
		$model->id_quem_registrou = $_SESSION["motorsgg_logged"][0]->id;
		parent::setResponseAsJSON($model->salvar());
	}

	public static function getAllRows()
	{
		parent::isAuthenticated();
		$model = new TipoVeiculoModel();
		parent::setResponseAsJSON($model->getAllRows());
	}
}
