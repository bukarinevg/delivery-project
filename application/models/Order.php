<?php


namespace application\models;

use application\core\Model;
use application\lib\InputCheck;
use application\lib\Db;


class Order extends Model
{
    private $OrderData;

    public function checkEmptyTypical()
    {
        $arr = $_POST;
        if (isset($arr['FirstCity']) and isset($arr['SecondCity'])) {
            if (isset($arr['FirstAddress']) and isset($arr['SecondAddress'])) {
                if (isset($arr['Weight']) ) {
                    if (isset($arr['TimeType'])) {
                        if (($arr['FirstCity'] <> '') and ($arr['SecondCity'] <> '')) {
                            if (($arr['FirstAddress'] <> '') and ($arr['SecondAddress'] <> '')) {
                                    if ($arr['Weight'] <> '') {
                                        if (($arr['TimeType'] <> '')) {
                                            $this->OrderData = $arr;
                                            return "success";
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

        return 0;
    }

    public function checkEmptySimple()
    {
        $arr = $_POST;
        if (isset($arr['FirstCity']) and isset($arr['SecondCity'])) {
            if (isset($arr['FirstAddress']) and isset($arr['SecondAddress'])) {
                if (isset($arr['TimeType'])) {
                        if (($arr['FirstCity'] <> '') and ($arr['SecondCity'] <> '')) {
                            if (($arr['FirstAddress'] <> '') and ($arr['SecondAddress'] <> '')) {
                                if (($arr['TimeType'] <> '')) {
                                        $this->OrderData = $arr;
                                        return "success";
                                }

                            }
                        }
                }
            }
        }


        return 0;
    }

    public function addToDBTypical()
    {
        if ($this->OrderData['TimeType']==="supperquickly"){
            $params=['id'=>'',
                'FirstCity'=>$this->OrderData['FirstCity'], 'SecondCity'=>$this->OrderData['SecondCity'],
                'FirstAddress'=>$this->OrderData['FirstAddress'],'SecondAddress'=>$this->OrderData['SecondAddress'],
                'Weight'=>$this->OrderData['Weight'],'DeliveryType'=>$this->OrderData['TimeType']
            ];
            print_r($params);
            $query="INSERT INTO `supperquicklyorder` values  (:id,:FirstCity,:SecondCity,:FirstAddress,:SecondAddress,:Weight,:DeliveryType)  ";
            Db::query($query,$params);
        }
        if ($this->OrderData['TimeType']=="quickly"){
            $params=['id'=>'',
                'FirstCity'=>$this->OrderData['FirstCity'], 'SecondCity'=>$this->OrderData['SecondCity'],
                'FirstAddress'=>$this->OrderData['FirstAddress'],'SecondAddress'=>$this->OrderData['SecondAddress'],
                'Weight'=>$this->OrderData['Weight'],'DeliveryType'=>$this->OrderData['TimeType']
            ];
            print_r($params);
            $query="INSERT INTO `quicklyorder` values  (:id,:FirstCity,:SecondCity,:FirstAddress,:SecondAddress,:Weight,:DeliveryType)  ";
            Db::query($query,$params);

        }
        if ($this->OrderData['TimeType']=="simple"){
            $params=['id'=>'',
                'FirstCity'=>$this->OrderData['FirstCity'], 'SecondCity'=>$this->OrderData['SecondCity'],
                'FirstAddress'=>$this->OrderData['FirstAddress'],'SecondAddress'=>$this->OrderData['SecondAddress'],
                'Weight'=>$this->OrderData['Weight'],'DeliveryType'=>$this->OrderData['TimeType']
            ];
            print_r($params);
            $query="INSERT INTO `simpleorder` values  (:id,:FirstCity,:SecondCity,:FirstAddress,:SecondAddress,:Weight,:DeliveryType)  ";
            Db::query($query,$params);

        }

    }

    public function addToDBSimple()
    {
        if ($this->OrderData['TimeType']==="supperquickly"){
            $params=['id'=>'',
                'FirstCity'=>$this->OrderData['FirstCity'], 'SecondCity'=>$this->OrderData['SecondCity'],
                'FirstAddress'=>$this->OrderData['FirstAddress'],'SecondAddress'=>$this->OrderData['SecondAddress'],
                'Weight'=>0,'DeliveryType'=>$this->OrderData['TimeType']
            ];
            print_r($params);
            $query="INSERT INTO `supperquicklyorder` values  (:id,:FirstCity,:SecondCity,:FirstAddress,:SecondAddress,:Weight,:DeliveryType)  ";
            Db::query($query,$params);
        }
        if ($this->OrderData['TimeType']=="quickly"){
            $params=['id'=>'',
                'FirstCity'=>$this->OrderData['FirstCity'], 'SecondCity'=>$this->OrderData['SecondCity'],
                'FirstAddress'=>$this->OrderData['FirstAddress'],'SecondAddress'=>$this->OrderData['SecondAddress'],
                'Weight'=>0,'DeliveryType'=>$this->OrderData['TimeType']
            ];
            print_r($params);
            $query="INSERT INTO `quicklyorder` values  (:id,:FirstCity,:SecondCity,:FirstAddress,:SecondAddress,:Weight,:DeliveryType)  ";
            Db::query($query,$params);

        }
        if ($this->OrderData['TimeType']=="simple"){
            $params=['id'=>'',
                'FirstCity'=>$this->OrderData['FirstCity'], 'SecondCity'=>$this->OrderData['SecondCity'],
                'FirstAddress'=>$this->OrderData['FirstAddress'],'SecondAddress'=>$this->OrderData['SecondAddress'],
                'Weight'=>0,'DeliveryType'=>$this->OrderData['TimeType']
            ];
            print_r($params);
            $query="INSERT INTO `simpleorder` values  (:id,:FirstCity,:SecondCity,:FirstAddress,:SecondAddress,:Weight,:DeliveryType)  ";
            Db::query($query,$params);

        }

    }




    public function cleanData()
    {
        $this->OrderData=InputCheck::getCleanData($this->OrderData);

    }


}