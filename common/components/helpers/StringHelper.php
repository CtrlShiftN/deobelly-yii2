<?php

namespace common\components\helpers;

use Yii;

class StringHelper
{
    /**
     * @param $string
     * @return array|false|string|string[]|null
     */
    public static function toSlug($string)
    {
        return str_replace(' ', '-', mb_strtolower($string));
    }
}