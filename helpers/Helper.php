<?php
/**
 * Created by PhpStorm.
 * User: hobroker
 * Date: 7/23/16
 * Time: 6:04 PM
 */
namespace helpers;

use yii\bootstrap\Html;

class Helper
{
    public static function iconMD($text, $options = [])
    {
        $options = array_merge([
            'class' => 'material-icons'
        ], $options);
        return Html::tag('i', $text, $options);
    }
}