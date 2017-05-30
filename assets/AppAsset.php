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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/web/';
    public $css = [
            'css/animate.min.css',
            'css/jquery.onebyone.css',
            'css/layout.css',
            'css/responsive-slider.css',
            'css/bootstrap.min.css'
    ];
    public $js = [
        'js/jquery-1.7.2.min.js',
        'js/config.js',
        'js/jquery.bxslider.js',
        'js/jquery.onebyone.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
