<?php

namespace app\controllers;

use yii\web\Controller;

class TestController extends Controller
{
    public $defaultAction = 'my-test'; // переопределение действия по умолчанию

    public function actions() // отдельные действия (находятся в app\components)
    {
        return [
            // объявляет "test" действие с помощью названия класса
            'test' => 'app\components\HelloAction',
        ];
    }

    public function actionIndex($name)
    {
        var_dump($name);
        return 'Hello World!';
    }

    public function actionMyTest()
    {
        return __METHOD__;
    }

}