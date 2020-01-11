<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Pagination;
use application\models\Admin;

class MainController extends Controller
{

    public function indexAction()
    {

        if (isset($_POST['submit']) and isset($_COOKIE['authorize'])) {
            unset($_COOKIE['authorize']);
            setcookie('authorize', null, -1);

            }
        $this->view->render('Главная страница');
    }
}