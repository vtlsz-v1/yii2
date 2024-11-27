<?php

namespace app\controllers;

use app\models\EntryForm;
use yii\bootstrap5\ActiveForm;
use yii\web\Response;

// импорт пространства имен из модели формы

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
        /*if($model->load(\Yii::$app->request->post()) && $model->validate()) {*/
             /*if(\Yii::$app->request->isPjax) { // если данные отправлены плагином Pjax
                // записываем в сессию сообщение
                \Yii::$app->session->setFlash('success', 'Данные приняты через Pjax');
                $model = new EntryForm(); // очищаем форму
            } else {*/
                // записываем в сессию сообщение
                /*\Yii::$app->session->setFlash('success', 'Данные приняты стандартно');*/
               /* return $this->refresh(); // перезагружаем страницу*/
            /*}*/
        /*}*/

        // отправка данных с помощью AJAX
        $model->load(\Yii::$app->request->post()); // загружаем данные в модель
        if (\Yii::$app->request->isAjax) { // если данные пришли по AJAX
            \Yii::$app->response->format = Response::FORMAT_JSON; // выставляем формат ответа JSON
            if($model->validate()) { // если пройдена валидация
                return ['message' => 'OK']; // возвращаем сообщение об успехе
            } else {
                return ActiveForm::validate($model); // если валидация не пройдена, возвращаем данные об ошибке
            }
            //return ActiveForm::validate($model); // возвращаем результат валидации (массив ошибок, если она не пройдена)
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