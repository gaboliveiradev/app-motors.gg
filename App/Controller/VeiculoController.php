<?php
namespace App\Controller;

use App\Model\VeiculoModel;

class VeiculoController extends Controller {

	public static function form() 
	{
		parent::isAuthenticated();
		parent::render('veiculo/cr_veiculo');	
	}

	public static function salvar() 
	{
		parent::isAuthenticated();
		$model = new VeiculoModel();
		if(isset($_POST['id'])) $model->id = $_POST['id'];
		$model->modelo = $_POST['modelo'];
		$model->ano = $_POST['ano'];
		$model->cor = $_POST['cor'];
		$model->num_chassi = $_POST['chassi'];
		$model->placa = $_POST['placa'];
		$model->quilometragem = $_POST['quilometragem'];
		$model->observacoes = $_POST['observacao'];
		$model->id_combustivel = $_POST['idCombustivel'];
		$model->id_marca = $_POST['idMarca'];
		$model->id_fabricante = $_POST['idFabricante'];
		$model->id_tipo = $_POST['idTipoVeiculo'];
		$model->id_quem_registrou = $_SESSION["motorsgg_logged"][0]->id;
		$model->revisao = $_POST['revisao'];
		$model->venda = $_POST['venda'];
		$model->roubo_furto = $_POST['roubo_furto'];
		$model->aluguel = $_POST['aluguel'];
		$model->particular = $_POST['particular'];
		$model->sinistrado = $_POST['sinistrado'];
		parent::setResponseAsJSON($model->salvar());
	}

	public static function deletar() 
	{
		parent::isAuthenticated();
		$model = new VeiculoModel();
		(isset($_GET['id'])) ? parent::setResponseAsJSON($model->deletar((int) $_GET['id'])) : parent::setResponseAsJSON(false);
	}

	public static function getAllRows()
	{
		parent::isAuthenticated();
		$model = new VeiculoModel();
		parent::setResponseAsJSON($model->getAllRows());
	}
}
