<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class MaterialAsset extends AssetBundle
{
    public $sourcePath = __DIR__;

    public $css = [
        'dist/css/material.css',
        'dist/css/ripples.css',
        'dist/css/font-awesome.css',
        'dist/css/font-awesome.css',
    ];

    public $js = [
        'dist/js/material.js',
        'dist/js/ripples.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public $publishOptions = [
        'forceCopy' => true
    ];
}
