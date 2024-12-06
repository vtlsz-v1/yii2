<?php

namespace app\components;

use yii\base\Widget;

class HelloWidget extends Widget // объявляем класс виджета
{ // виджеты можно многократно использовать в видах и шаблонах
    public $name;

    public function init() // в этом методе производится нормализация свойств виджета
    {
        parent::init(); // прежде всего необходимо вызвать родительский метод init()
        if($this->name === null) { // если свойство name не передано,
            $this->name = 'Гость'; // ему присваивается значение по умолчанию
        }

        ob_start(); // включаем буферизацию
    }

    public function run() // пишем код виджета, возвращающий результат его рендеринга
    {
        $content = ob_get_clean(); // получаем содержимое буфера и очищаем его
        //$content = strip_tags($content); //вырезаем теги из контента

        // в виджетах можно также рендерить виды
        return $this->render('hello', [ // параметры передаются в вид 'hello'
                        // папка с видами находится в components, как и сам виджет
            'name' => $this->name,
            'content' => $content,
            ]);
        //return "Привет, {$this->name}! {$content}"; // контент здесь отобразится после приветствия
    }
}