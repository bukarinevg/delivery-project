<?php


namespace application\lib;


 class InputCheck
{
    public $clean;
    public $result;
    public $data;

    public function __construct($data)
    {
       /* $this->clean=new Clean($data);*/
        $this->data=$data;
    }

   static public function getCleanData($data)
    {
        $CopyData=$data;
        if (is_array($CopyData)){
            foreach ($CopyData as $key => &$value) {
                $value=InputCheck::clean($value);
            }
        }
        else
            $CopyData=InputCheck::clean($CopyData);

        return $CopyData;
    }


    public static function clean($value)
    {
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);

        return $value;
    }
}

