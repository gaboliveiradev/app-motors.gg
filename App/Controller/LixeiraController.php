<?php
namespace App\Controller;

class LixeiraController extends Controller {

    public static function view()
    {
        parent::isAuthenticated();
        parent::render("lixeira/lixeira");
    }
}