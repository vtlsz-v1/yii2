<?php

namespace app\controllers;

use app\models\Category;
use yii\web\NotFoundHttpException;

class CategoryController extends AppController // категории товаров
{
    public function actionIndex() // просмотр всех категорий товаров
    {
        $this->view->title = 'Categories';
        $categories = Category::find()->all();
        return $this->render('index', compact('categories')); // передаем в вид index список категорий
    }

   //public function actionView($id = null) // работа с товарами одной категории (метод принимает ее id)
    public function actionView($alias = null) // метод принимает параметр $alias
    {
        //$category = Category::findOne($id);
        $category = Category::findOne(['alias' => $alias]); // извлекаем запись по полю alias
        //if(!$category) // такой если категории не существует
        if(!$category) {
            throw new NotFoundHttpException('Страница не найдена'); // генерируем исключение
        }

        $products = $category->getProducts(850)->all(); // получаем список товаров (с учетом параметра цены)
        $this->view->title = "Category: {$category->title}"; // наименование категории товаров

        // передаем в вид view значение $category и  $products
        return $this->render('view', compact('category', 'products'));
    }
}