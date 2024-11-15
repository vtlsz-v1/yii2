<?php

namespace app\controllers;

use yii\web\Controller;

class AppController extends Controller
{
    public $my_var; // общее для всех контроллеров свойство

    public function __construct($id, $module, $config = [])
    {
        $this->my_var = 123;
        parent::__construct($id, $module, $config);
    }
}