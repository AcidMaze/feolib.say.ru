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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/header.css',
        'css/text&table_styles.css',
        'css/datedropper.css',
        'css/event.css',
        '//fonts.googleapis.com/css2?family=Comfortaa:wght@400&display=swap',
        '//fonts.googleapis.com/css2?family=Comfortaa:wght@500&display=swap',
        '//fonts.googleapis.com/css2?family=Comfortaa:wght@700&display=swap',
        '//fonts.googleapis.com/css2?family=Comfortaa:wght@300&family=Exo+2:wght@500&display=swap',
        '//fonts.googleapis.com/css2?family=Comfortaa:wght@500&family=Exo+2:wght@500&display=swap',
        '//fonts.googleapis.com/css2?family=Manrope:wght@200&display=swap',
        '//cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css'
    ];
    public $js = [
        'js/header.js',
        'js/content.js',
        'js/datedropper.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
