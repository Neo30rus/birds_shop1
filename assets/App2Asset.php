<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class App2Asset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'assets-page/css/font-awesome.min.css',
        'assets-page/css/pe-icon-7-stroke.css',
        'assets-page/css/swiper.min.css',
        'assets-page/css/fancybox.min.css',
        'assets-page/css/ion.rangeSlider.min.css',
        'assets-page/css/style.css',
    ];
    public $js = [
        'assets-page/js/modernizr.js',
        'assets-page/js/jquery-migrate.js',
        'assets-page/js/popper.min.js',
        'assets-page/js/bootstrap.min.js',
        'assets-page/js/swiper.min.js',
        'assets-page/js/fancybox.min.js',
        'assets-page/js/countdown.js',
        'assets-page/js/isotope.pkgd.min.js',
        'assets-page/js/ion.rangeSlider.min.js',
        'assets-page/js/custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
