<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'language' => 'ru', // подключение русского языка
    //'layout' => 'test', // шаблон по умолчанию для всего сайта
    /*'controllerMap' => [ // карта контроллеров
        // объявляет "test" контроллер, используя название класса
        'test' => 'app\controllers\SiteController', // контроллеру test  будет соответствовать site

        // объявляет "article" контроллер, используя массив конфигурации
        'article' => [
            'class' => 'app\controllers\PostController',
            'enableCsrfValidation' => false,
        ],
    ],*/
    //'defaultRoute' => 'test', // контроллер по умолчанию (можно сразу с действием)
    //'defaultRoute' => 'site/about',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'erg_hrLFg0f5h7dc4ShLT3hhTjYhrtDNpSezL5N', // ключ валидации
            'baseUrl' => '', // базовый URL-адрес (избавляемся от папки web в адресной строке)
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,

        'urlManager' => [ // URL-менеджер
            'enablePrettyUrl' => true, // активация ЧПУ
            'showScriptName' => false, // откл. показ в адресной строке браузера index.php (т.е. название скрипта)
            'enableStrictParsing' => false, // вкл. строгий разбор URL
            'rules' => [ // массив правил настройки ЧПУ
                // чем более конкретное (специфичное) правило, тем выше оно должно быть в списке

                // адрес слева соответствует действию view контроллера category
                // именованный параметр id: - id категории
                //'category/view/<id:\d+>' => 'category/view', // здесь 'd' соответствует любая цифра
                'category/<id:\d+>' => 'category/view', // убираем 'view' из адресной строки браузера
                'category/<alias>' => 'category/view', // заменяем id на alias
            ],
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
