<?php

namespace app\models;

use yii\db\ActiveRecord;

class Country extends ActiveRecord // класс для работы с базой данных должен расширять ActiveRecord
{
    //public $status; // добавляем новый атрибут в форму

    /*public static function tableName()
    {
        return '{{%countries}}'; // вернуть нужное имя таблицы, если оно не совпадает с названием модели
                              // countries - реальное имя таблицы в базе данных
                              // при этом будет применено экранирование к названиям таблицы и ее столбцов
                              // % - префикс, который определяется в файле db.php в параметре tablePrefix
    }*/

    // правила валидации формы
    public function rules()
    {
        return [
            [['code', 'name', 'population', 'status'], 'required'],
            ['code', 'unique'],
            ['population', 'integer'],
            ['status', 'boolean'],
        ];
    }

    public function attributeLabels()
    {
        return [ // вернем массив соответствий атрибута значению его label
            'code' => 'Код страны',
            'name' => 'Страна',
            'population' => 'Население',
            'status' => 'Статус',
        ];
    }
}