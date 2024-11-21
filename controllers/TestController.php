<?php

namespace app\controllers;

use app\models\EntryForm; // импорт пространства имен из модели формы

class TestController extends AppController
{
    public function actionIndex($name = 'Guest', $age = 18)
    {
        $this->layout = 'test'; // переопределяем шаблон только для действия actionIndex
        $this->view->params['t1'] = 'T1 params'; // тоже записывает данные в вид (доступ к виду из контроллера)
        $this->view->title = 'Главная страница'; // установка title через контроллер
        // установка метатегов через контроллер
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'мета-описание...'], 'description');

        $model = new EntryForm(); // создаем объект формы

        // передача объекта формы $model в вид index с помощью функции compact
        return $this->render('index', compact('model'));
    }

    public function actionMyTest()
    {
        return $this->render('my-test');
    }

}