<?php

namespace application\controllers;

use application\core\Controller;

class OrderController extends Controller
{
    public function __construct($route) {
        parent::__construct($route);
        $this->view->layout = 'order';
    }

    public function makeOrderAction()
    {

        if (isset($_POST['TypicalOrder']) and  !(empty($_POST))){
            $check = $this->model->checkEmptyTypical();
            echo 'доставка груза';
            if ($check==="success"){
                $this->model->cleanData();
                $this->model->addToDBTypical();
            }

        }
        else if(isset($_POST['SimpleOrder']) and  !(empty($_POST))){
            $check = $this->model->checkEmptySimple();
            if ($check==="success"){
                $this->model->cleanData();
                $this->model->addToDBSimple();

            }

        }
        $this->view->render('Заказ');
    }
}