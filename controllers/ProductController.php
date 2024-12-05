<?php

namespace app\controllers;

use app\models\Product;

class ProductController extends AppController // наименования товаров
{
    public function actionIndex() // просмотр всех наименований товаров
    {
        $this->view->title = 'Products';
        $products = Product::find()->all();
        return $this->render('index', compact('products')); // передаем $products в вид index
    }
}