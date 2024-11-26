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

        // если в модель из формы загружены данные и они прошли валидацию
        if($model->load(\Yii::$app->request->post()) && $model->validate()) {
            if(\Yii::$app->request->isPjax) { // если данные отправлены плагином Pjax
                // записываем в сессию сообщение
                \Yii::$app->session->setFlash('success', 'Данные приняты через Pjax');
                $model = new EntryForm(); // очищаем форму
            } else {
                // записываем в сессию сообщение
                \Yii::$app->session->setFlash('success', 'Данные приняты стандартно');
                return $this->refresh(); // перезагружаем страницу
            }

        }

        // передача объекта формы $model в вид index с помощью функции compact
        // если страница не загружена или валидация не пройдена
        return $this->render('index', compact('model'));
    }

    public function actionMyTest()
    {
        return $this->render('my-test');
    }

}