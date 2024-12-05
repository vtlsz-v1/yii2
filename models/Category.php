<?php

namespace app\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName()
    {
        // таблица в базе данных называется wfm_categories (wfm_ - префикс)
        return '{{%categories}}';
    }

    public function getProducts() { // связь таблицы wfm_categories с таблицей wfm_products
                                    // get - обязательный префикс
        return $this->hasMany(Product::class, ['category_id' =>'id']); // связь "один ко многим"
                                 // первый параметр - название класса, с которым связываем данную модель
                                 // второй параметр - поля, по которым производится связь
                                 // 'category_id' - поле из таблицы, с которой устанавливается связь
                                 // 'id' - поле из таблицы, относящейся к текущей модели, т.е. Category
    }
}