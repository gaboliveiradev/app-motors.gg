<?php
namespace App\Controller;

class FabricanteController extends Controller {

	public static function form() 
	{
		parent::isAuthenticated();
		parent::render("fabricante/cr_fabricante");
	}
}
