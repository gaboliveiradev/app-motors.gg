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
		parent::isAuthenticated();
		$model = new TipoVeiculoModel();
		$model->descricao = $_POST["tipo_veiculo"];
		$model->id_quem_registrou = $_SESSION["motorsgg_logged"][0]->id;
		if(isset($_POST['id'])) $model->id = $_POST['id'];
		parent::setResponseAsJSON($model->salvar());
	}

	public static function getAllRows()
	{
		parent::isAuthenticated();
		$model = new TipoVeiculoModel();
		$ativo = (isset($_GET["ativo"])) ? $_GET["ativo"] : 1;
		parent::setResponseAsJSON($model->getAllRows((int) $ativo));
	}

	public static function deletar()
	{
		parent::isAuthenticated();
		$model = new TipoVeiculoModel();
		(isset($_GET['id'])) ? parent::setResponseAsJSON($model->deletar((int) $_GET['id'])) : parent::setResponseAsJSON(false);
	}

	public static function getById() 
	{
		parent::isAuthenticated();
		$model = new TipoVeiculoModel();
		(isset($_GET['id'])) ? parent::setResponseAsJSON($model->getById((int) $_GET['id'])) : parent::setResponseAsJSON(false);
	}
}
