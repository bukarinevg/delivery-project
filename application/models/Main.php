<?php

namespace application\models;

use application\core\Model;
use application\lib\InputCheck;
use application\lib\Db;

class Main extends Model {

	public $error;
	protected $logindata;



	public function Check()
    {
        $logindata=$_POST;
        if (isset($logindata['login']) and isset($logindata['password'])){

            if ((strlen($logindata['login'])>6) and (15>strlen($logindata['login']))){

                if (strlen($logindata['password'])>6 and 15>strlen($logindata['password'])) {
                    $this->logindata=InputCheck::getCleanData($logindata);
                    return 1;
                }
            }
        }
        return 0;
    }

    public function Validate()
    {
        $params=['number'=>$this->logindata['login'],'password'=>$this->logindata['password']];
        $query="SELECT id FROM `users` where ((number=:number ) and (password=:password)) ";
        $result=Db::row($query,$params);
        return($result);
    }


}