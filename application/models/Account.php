<?php

namespace application\models;

use application\core\Model;
use application\lib\Db;
use application\lib\InputCheck;

class Account extends Model
{

    public $error;
    public $RegisterData;
    public $CleanObject;
    public $logindata;

    public function setLoginData($data)
    {
        $this->RegisterData=$data;
    }

    public function cleanData()
    {
        $result=InputCheck::getCleanData();
        if ($result==='недопустимые входные данные')
            return false;
        else

            return true;

    }

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
    public function CheckRegister()
    {
        $logindata=$_POST;
        if (isset($logindata['login']) and isset($logindata['password'])){

            if ((strlen($logindata['login'])>6) and (15>strlen($logindata['login']))){

                if (strlen($logindata['password'])>6 and 15>strlen($logindata['password'])) {
                    $this->RegisterData=InputCheck::getCleanData($logindata);
                    return 1;
                }
            }
        }
        return 0;
    }
    public function CheckLogin()
    {
        $params=['number'=>$this->RegisterData['login']];
        $query="SELECT id FROM `users` where (number=:number ) ";
        $result=Db::row($query,$params);
        return($result);
    }

    public function CreateNewUser()
    {
        $password=md5($this->RegisterData['password']);
        $params=['id'=>'','number'=>$this->RegisterData['login'], 'password'=>$password,'date'=>date("d.m.y") ];
        print_r($params);
        $query="INSERT INTO `users` VALUES (:id,:number , :password,:date )";
        $result=Db::query($query,$params);
        return $result;

    }

    public function Validate()
    {
        $params=['number'=>$this->logindata['login'],'password'=>md5($this->logindata['password'])];
        $query="SELECT id FROM `users` where ((number=:number ) and (password=:password)) ";
        $result=Db::row($query,$params);
        return($result);
    }
/*
    public function CheckUniq()
    {
        $find=false;
        $arr=['login'=>$this->RegisterData['login'],'email'=>$this->RegisterData['email'] ];
        foreach ($arr as $key=>$value){
            $query="SELECT ".$key." FROM `users` WHERE ".$key." = :".$key." ";
            if ($rezult=($this->db->row($query, [$key=>$value]))){
                $find[]=$key;
            }

        }

        if (is_array($find)){

            return $find;
        }
        else
            return false;
    }

    public function addToUsers()
    {
        $QueryData=array_merge($this->RegisterData,['date'=>date("Y.m.d ")]);
        print_r($QueryData);
        $query="INSERT INTO users ( :login, :password, :email, :date)";
        $this->db->query($query, $QueryData);
    }*/

}