<?php

namespace app\controllers;

use app\models\Product;

class ProductController extends AppController // наименования товаров
{
    public function actionIndex() // просмотр всех наименований товаров
    {
        $this->view->title = 'Products';
        // with('category') - жадная загрузка (параметр в скобках - название связи)
        // жадная загрузка, в отличие от отложенной загрузки, позволяет многократно уменьшить число запросов к БД
        // ее целесообразно применять, когда запросов к БД очень много
        $products = Product::find()->with('category')->all();
        return $this->render('index', compact('products')); // передаем $products в вид index
    }
}