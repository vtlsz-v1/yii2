<?php

namespace app\controllers;

//use yii\web\Controller;

use yii\web\View;

class TestController extends AppController
{
    //public $defaultAction = 'my-test'; // переопределение действия по умолчанию
    public $my_var; //свойство, которое будет доступно в шаблоне или виде
    // public $layout = 'test'; // переопределяем шаблон для TestController

    /*public function actions() // отдельные действия (находятся в app\components)
    {
        return [
            // объявляет "test" действие с помощью названия класса
            'test' => 'app\components\HelloAction',
        ];
    }*/

    public function actionIndex($name = 'Guest', $age = 18)
    {
        $this->layout = 'test'; // переопределяем шаблон только для действия actionIndex
        $this->my_var = 'My Variable'; // присваиваем значение свойству my_var
        //var_dump($name);
       /* return $this->renderFile('@app/views/test/index.php'); // @app - алиас, возвращающий путь
                                                                 // к корневой папке приложения
        return $this->renderAjax('index');
        return $this->renderPartial('index');*/

        // \Yii::$app - объект приложения
        // \Yii::$app->view->params['t1'] = 'T1 params'; // запись данных в вид (глобально)
        $this->view->params['t1'] = 'T1 params'; // тоже записывает данные в вид (доступ к виду из контроллера)
        $this->view->title = 'Главная страница'; // установка title через контроллер

        // установка метатегов через контроллер
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'мета-описание...'], 'description');

        // выводим дату (год) при привязке к событию EVENT_END_BODY (в конце страницы)
        \Yii::$app->view->on(View::EVENT_END_BODY, function () {
            echo "<p>&copy; Yii2 " . date("Y") . "</p>";
        });

        // передача данных в вид с помощью функции compact (name и age - имена переменных)
        return $this->render('index', compact('name', 'age'));

        /*return $this->render('index', [ // подключаем вид index
            'name' => $name, // передаем данные в вид
            'age' => $age
        ]);*/
    }

    public function actionMyTest()
    {
        return $this->render('my-test');
    }

}