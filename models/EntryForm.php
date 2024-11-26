<?php

namespace app\models;

use yii\base\Model;

class EntryForm extends Model
{
    // поля формы
    public $name;
    public $email;
    public $text;
    public $topic;

    // правила валидации формы
    public function rules()
    {
        return [
            [['name', 'email', 'text'], 'required'], // обязательные к заполнению поля
            ['email', 'email'], // поле предназначено для ввода email
            ['topic', 'validateCountry', 'skipOnEmpty' => false],
            // 'skipOnEmpty' => false - валидатор будет применен и для пустых входных данных
            /*['topic', 'required', 'message' => 'Тема не заполнена'], // message - сообщение об ошибке
                                                                     //(в yii\widgets\ActiveForm)
            ['topic', 'safe'], // устанавливаем валидатор длм поля topic*/
        ];
    }

    // создание собственного валидатора
    public function validateCountry($attribute, $params) // первым параметром здесь будет атрибут (поле) topic из формы
    {
        // будет выполнена проверка, соответствуют ли введенные данные одному из значений массива
        if (!in_array($this->$attribute, ['USA', 'Indonesia'])) {
            $this->addError($attribute, 'Страна должна быть либо "USA" или "Indonesia".'); // сообщение об ошибке
        }
    }
    // По умолчанию встроенные валидаторы не применяются, если входные данные для них пусты.

    public function attributeLabels()
    {
        // переименовываем поля формы
        return [
            'name' => 'Имя: ',
            'email' => 'E-mail: ',
            'text' => 'Текст сообщения: ',
            'topic' => 'Тема: ',
        ];
    }
    // аналогичный метод можно применить к hint
}