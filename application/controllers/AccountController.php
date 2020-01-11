<?php

namespace application\controllers;

use application\core\Controller;

use application\models\Account;

class AccountController extends Controller
{

    /**
     *
     */
    public function loginAction()
    {
        if (!(isset($_COOKIE['authorize']))) {

            if (isset($_POST['submit'])) {
                if ($this->model->Check()) {
                    if ($id = $this->model->Validate()) {
                     //   print_r($id);
                        setcookie("authorize", $id['0']['id']);
                        echo $_COOKIE['authorize'];
                        //header('location: / ');


                    } else echo 'неправильный логин или пароль';
                } else
                    echo 'Данные введены неккоректно';
            }
        }
        else
            header("location: /");
        $this->view->render('Вход');
    }

    public function registerAction()
    {
        echo 'asd';
        if (isset($_POST['submit'])) {
            echo 'asd';
            if ($this->model->CheckRegister()) {
                $id = $this->model->CheckLogin();
                print_r( $id);
                if (!(isset($id[0] ))) {
                    echo md5('wda');
                    $this->model->CreateNewUser();

                }
                else echo 'такой логин уже используется';
            }
            else echo 'пароль и логин должны быть более 6 но меньше 15 символов';
        }
        $this->view->render('Вход');
    }

}