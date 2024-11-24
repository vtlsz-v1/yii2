<?php

namespace app\models;

use yii\base\Model;

class EntryForm extends Model
{
    // поля формы
    public $name;
    public $email;
    public $text;

    // правила валидации формы
    public function rules()
    {
        return [
            [['name', 'email', 'text'], 'required'], // обязательные к заполнению поля
            ['email', 'email'], // поле предназначено для ввода email
        ];
    }

    public function attributeLabels()
    {
        // переименовываем поля формы
        return [
            'name' => 'Имя: ',
            'email' => 'E-mail: ',
            'text' => 'Текст сообщения: ',
        ];
    }
    // аналогичный метод можно применить к hint
}