<?php

namespace app\controllers;

use app\models\Country;
use app\models\EntryForm;
use yii\bootstrap5\ActiveForm;
use yii\web\NotFoundHttpException;
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

    public function actionView() // чтение данных из таблицы
    {
        $this->layout = 'test';
        $this->view->title = 'Работа с моделями';

        //$model = new Country(); // этот объект будет работать с базой данных

        //$countries = Country::find()->all(); // создание объекта запроса к таблице БД
                                             // метод all() позволяет получить все записи из таблицы

        // выбираем только записи с population < 100000000, кроме записе с code AU (Australia)
        // для защиты от SQL-инъекций здесь использована привязка параметров, реализованную в подоготовленных выражениях
        // вместо конкретного значения переменной population используется маркер :population
        // к этому маркеру привязывается переменная либо какое-то выражение - :population' => 100000000
        // маркер может называться как угодно
        /*$countries = Country::find()->where("population < :population AND code <> :code",
            [':code' => 'AU', ':population' => 100000000])->all(); // строковый формат*/

        /*$countries = Country::find()->where([
            'code' => ['DE', 'FR', 'GB'],
            'status' => 1,
        ])->all(); // формат массива*/

        //$countries = Country::find()->where(['like', 'name', 'ni'])->all(); // формат операторов
        // like - оператор
        // name - название поля таблицы
        // ni - значение подстроки, которая должна присутствовать в названии страны

        //$countries = Country::find()->orderBy('population DESC')->all(); // сортировка в обратном порядке
                                                                                 // по полю population

        //$countries = Country::find()->count(); // получаем общее количество записей в таблице
        //debug($countries, 1);

        //$countries = Country::find()->limit(1)->where(['code'  => 'CN'])->one(); // берем только одну строку из таблицы

        //$countries = Country::findAll(['DE', 'FR', 'GB']); // соответствует записи Country::find()->all();
        // но здесь нужно в скобках указывать параметры запроса

        //$countries = Country::findOne('BR'); // получаем одну запись из таблицы по первичному ключу

        $countries = Country::find()->asArray()->all();
        // метод asArray() запрашивает данные не в виде объектов, а в виде массивов, что требует меньше памяти

        // передаем объект $model в вид view
        //return $this->render('view', compact('model'));
        return $this->render('view', compact('countries'));
    }

    public function actionMyTest()
    {
        return $this->render('my-test');
    }

    public function actionCreate() // добавление новых данных в таблицу
    {
        $this->layout = 'test';
        $this->view->title = 'Create';

        $country = new Country(); // создаем экземпляр модели

        if(\Yii::$app->request->isAjax) { // если запрос приходит по AJAX
            $country->load(\Yii::$app->request->post()); // загружаем данные в модель из массива post
            \Yii::$app->response->format = Response::FORMAT_JSON; // настраиваем формат ответа JSON

            return ActiveForm::validate($country); // возвращаем результат валидации
        }

        if($country->load(\Yii::$app->request->post()) && $country->save()) { // если данные загружены в модель,
                                                                              //прошли валидацию и сохранены
            \Yii::$app->session->setFlash('success', 'OK'); // пишем в сессию 'OK'
            return $this->refresh(); // обновляем страницу
        } // else не потребуется, т.к. при появлении проблем появятся ошибки валидации

        // заполняем свойства модели данными, которые будут добавлены в соответствующие столбцы таблицы
        /*$country->code = 'UA';
        $country->name = 'Ukraine';
        $country->population = 41840000;
        $country->status = 1;

        if($country->save()) { // если данные успешно сохранены
            \Yii::$app->session->setFlash('success', 'OK'); // пишем в сессию 'OK'
        } else {
            \Yii::$app->session->setFlash('error', 'Ошибка!'); // пишем в сессию 'Ошибка!'
        }*/

        return $this->render('create', compact('country')); // передаем виду объект $country
    }

    public function actionUpdate() // обновление данных в таблице
    {
        $this->layout = 'test';
        $this->view->title = 'Update';

        $country = Country::findOne('FR'); // получение обновляемой строки в таблице по первичному ключу

        if(!$country) { // если $country равен NULL (т.е. объект записи не получен)
            throw new NotFoundHttpException('Такая страна не найдена'); // будет подключен вид ошибки 404
            // views/site/error - страница ошибки
        }

        if($country->load(\Yii::$app->request->post()) && $country->save()) { // если данные загружены в модель,
            //прошли валидацию и сохранены
            \Yii::$app->session->setFlash('success', 'OK'); // пишем в сессию 'OK'
            return $this->refresh(); // обновляем страницу
        }

        return $this->render('update', compact('country')); // передаем виду объект $country
    }

    public function actionDelete($code = '') // удаление данных из таблицы (здесь параметр - код страны)
    {
        $this->layout = 'test';
        $this->view->title = 'Delete';

        $country = Country::findOne($code); // получение удаляемой строки в таблице по первичному ключу

        if($country){ // если запись в таблице с таким ключом существует
            if(false !== $country->delete()) { // если нет ошибки удаления
                \Yii::$app->session->setFlash('success', 'OK'); // записываем в сессию 'OK'
            } else { // ошибка удаления
                \Yii::$app->session->setFlash('error', 'Error'); // записываем в сессию 'Error'
            }

        }

        return $this->render('delete', compact('country')); // передаем виду объект $country
    }

}