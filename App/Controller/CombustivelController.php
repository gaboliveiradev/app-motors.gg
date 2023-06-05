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
		parent::isAuthenticated();
		$model = new CombustivelModel();
		$model->descricao = $_POST['combustivel'];
		$model->id_quem_registrou = $_SESSION["motorsgg_logged"][0]->id;
		if(isset($_POST['id'])) $model->id = $_POST['id'];
		parent::setResponseAsJSON($model->salvar());
	}

	public static function getAllRows() 
	{
		parent::isAuthenticated();
		$model = new CombustivelModel();
		parent::setResponseAsJSON($model->getAllRows());
	}

	public static function deletar() 
	{
		parent::isAuthenticated();
		$model = new CombustivelModel();
		(isset($_GET['id'])) ? parent::setResponseAsJSON($model->deletar( (int) $_GET['id'])) : parent::setResponseAsJSON(false);
	}

	public static function getById()
	{
		parent::isAuthenticated();
		$model = new CombustivelModel();
		(isset($_GET['id'])) ? parent::setResponseAsJSON($model->getById( (int) $_GET['id'] )) : parent::setResponseAsJSON(false);
	}
}
