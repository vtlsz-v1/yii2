<?php

namespace app\assets;

use yii\web\AssetBundle;

class TestAsset extends AssetBundle
{
    // $sourcePath - задает корневую директорию с файлами ресурса, если она не доступна из web
    // $basePath, $baseUrl - устанавливается в противном случае

    // public $sourcePath = '@app/components';

    public $basePath = '@webroot';
    public $baseUrl = '@web';

    // указываем местоположение файлов ресурсов
    public $css = [
        'css/styles.css',
    ];

    public $js = [
        //'https://code.jquery.com/jquery-3.7.1.js', // подключаем jquery
        'js/scripts.js',
    ];

    public $depends = [ // здесь находятся зависимости для стилей и скриптов
        'yii\web\YiiAsset', // YiiAsset подключает скрипты YiiJs, при этом подключается jquery
        //'yii\bootstrap5\BootstrapAsset',
        'yii\bootstrap5\BootstrapPluginAsset' // поддержка плагинов Bootstrap
    ];

}