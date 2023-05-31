<?php
namespace App\Controller;

use App\Model\CombustivelModel;

class CombustivelController extends Controller {
	
	public static function form() 
	{
		parent::isAuthenticated();
		parent::render("combustivel/cr_combustivel");
	}

	public static function salvar() 
	{
		$model = new CombustivelModel();

		$model->descricao = $_POST['combustivel'];
		$model->id_quem_registrou = $_SESSION["motorsgg_logged"][0]->id;
		parent::setResponseAsJSON($model->salvar());
	}
}
