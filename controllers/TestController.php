<?php

namespace app\controllers;

use yii\web\Controller;

class TestController extends Controller
{
    //public $defaultAction = 'my-test'; // переопределение действия по умолчанию

    /*public function actions() // отдельные действия (находятся в app\components)
    {
        return [
            // объявляет "test" действие с помощью названия класса
            'test' => 'app\components\HelloAction',
        ];
    }*/

    public function actionIndex($name = 'Guest', $age = 18)
    {
        //var_dump($name);
       /* return $this->renderFile('@app/views/test/index.php'); // @app - алиас, возвращающий путь к корневой папке приложения
        return $this->renderAjax('index');
        return $this->renderPartial('index');*/

        // передача данных в вид с помощью функции compact (name и age - имена переменных)
        return $this->render('index', compact('name', 'age'));

        /*return $this->render('index', [ // подключаем вид index
            'name' => $name, // передаем данные в вид
            'age' => $age
        ]);*/
    }

    public function actionMyTest()
    {
        return __METHOD__;
    }

}