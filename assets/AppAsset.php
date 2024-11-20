<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
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
    // @webroot - возвращает физический путь к папке web
    // @web - возвращает url-адрес к папке web
    // это можно проверить с помощью метода getAlias
    // $basePath и $baseUrl устанавливаются, если корневая директория файлов ресурса доступна из web
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
    ];
    public $depends = [ // здесь находятся зависимости для стилей и скриптов
        'yii\web\YiiAsset', // YiiAsset подключает скрипты YiiJs, при этом подключается jquery
        'yii\bootstrap5\BootstrapAsset'
    ];
}
