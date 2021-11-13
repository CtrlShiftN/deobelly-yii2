<?php

namespace common\components\helpers;

use Yii;

class SystemArrayHelper
{
    /**
     * @param $array
     * @param $index
     * @return array
     */
    public static function removeElementAt($array, $index)
    {
        $tempArr = [];
        foreach ($array as $key => $value) {
            if(is_array($index)){
                if (!in_array($key,$index)){
                    $tempArr[$key] = $value;
                }
            } else {
                if ($key != $index){
                    $tempArr[$key] = $value;
                }
            }
        }
        return $tempArr;
    }
}