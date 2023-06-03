<?php
namespace App\Controller;

use App\Model\MarcaModel;

class MarcaController extends Controller {

	public static function form() 
	{
		parent::isAuthenticated();
		parent::render("marca/cr_marca");
	}

	public static function salvar() 
	{
		$model = new MarcaModel();

		$model->descricao = $_POST["marca"];
		$model->id_quem_registrou = $_SESSION["motorsgg_logged"][0]->id;
		parent::setResponseAsJSON($model->salvar());
	}

	public static function getAllRows()
	{
		parent::isAuthenticated();
		$model = new MarcaModel();
		parent::setResponseAsJSON($model->getAllRows());
	}

	public static function deletar() 
	{
		parent::isAuthenticated();
		$model = new MarcaModel();
		(isset($_GET['id'])) ? parent::setResponseAsJSON($model->deletar((int) $_GET['id'])) : parent::setResponseAsJSON(false);
	}
}
