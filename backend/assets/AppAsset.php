<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/main.css',
        'css/site.css'
    ];
    public $js = [
        'js/main.js',
//        '//cdn.jsdelivr.net/npm/sweetalert2@10',
//        'https://code.jquery.com/ui/1.12.1/jquery-ui.js'
//        'js/html5sortable.min.js'
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
//        'yii\bootstrap4\BootstrapAsset',
//        'yii\bootstrap4\BootstrapPluginAsset'
    ];

//    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
}
