<?php
namespace App\Controller;

use App\Model\FabricanteModel;

class FabricanteController extends Controller {

	public static function form() 
	{
		parent::isAuthenticated();
		parent::render("fabricante/cr_fabricante");
	}

	public static function salvar() 
	{
		$model = new FabricanteModel();

		$model->descricao = $_POST['fabricante'];
		$model->id_quem_registrou = $_SESSION["motorsgg_logged"][0]->id;
		parent::setResponseAsJSON($model->salvar());
	}

	public static function getAllRows() 
	{
		parent::isAuthenticated();
		$model = new FabricanteModel();
		parent::setResponseAsJSON($model->getAllRows());
	}

	public static function deletar() 
	{
		parent::isAuthenticated();
		$model = new FabricanteModel();
		(isset($_GET['id'])) ? parent::setResponseAsJSON($model->deletar( (int) $_GET['id'])) : parent::setResponseAsJSON(false);
	}
}
