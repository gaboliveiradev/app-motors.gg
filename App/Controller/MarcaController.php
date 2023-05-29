<?php
namespace App\Controller;

class MarcaController extends Controller {

	public static function form() 
	{
		parent::isAuthenticated();
		parent::render("marca/cr_marca");
	}

	public static function salvar() 
	{

	}
}
