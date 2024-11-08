<?php

namespace app\components;

use yii\base\Action;

class HelloAction extends Action // описание действия вне контроллера
{

    public function run()
    {
        return 'Hello, world!';
    }

}