<?php

namespace app\models;

use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public static function tableName()
    {
        // таблица в базе данных называется wfm_products  (wfm_ - префикс)
        return '{{%products}}';
    }

    public function getCategory() // связь таблицы wfm_products с таблицей wfm_categories
    {
        return $this->hasOne(Category::class, ['id' =>'category_id']); // связь "один к одному"
        // здесь один товар может принадлежать только к одной категории
    }
}