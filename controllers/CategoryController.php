<?php

namespace app\controllers;

use app\models\Category;

class CategoryController extends AppController // категории товаров
{
    public function actionIndex() // просмотр всех категорий товаров
    {
        $this->view->title = 'Categories';
        $categories = Category::find()->all();
        return $this->render('index', compact('categories')); // передаем в вид index список категорий
    }

    public function actionView($id = null) // работа с товарами одной категории (метод принимает ее id)
    {
        $category = Category::findOne($id);
        $this->view->title = "Category: {$category->title}"; // наименование категории товаров
        return $this->render('view', compact('category')); // передаем в вид view значение $category
    }
}