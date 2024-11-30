<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

?>
<div class = "col-md-12">
    <h2><?=$this->title ?></h2>

    <?php if(\Yii::$app->session->hasFlash('success')) : // если в сессию записано сообщение с ключом success ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?= Yii::$app->session->getFlash('success') // выводим сообщение на экран ?>
        </div>
    <?php endif; ?>

    <?php if(\Yii::$app->session->hasFlash('error')) : // если в сессию записано сообщение с ключом error ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?= Yii::$app->session->getFlash('success') // выводим сообщение на экран ?>
        </div>
    <?php endif; ?>

    <!--форма-->
    <?php $form = ActiveForm::begin([ // открытие формы
        'layout' => 'horizontal', // горизонтальная форма
        'options' => ['class' => 'signup-form form-register1',
        ],
        'id' => 'my-form', // переопределяем id формы

        'fieldConfig' => [ // конфигурации формы
            // шаблон для поля формы
            'template' => "{label} \n <div class='col-md-5'> {input} </div> \n <div class='col-md-5'> {hint} </div> \n 
                            <div class='col-md-5'> {error} </div>",
            'labelOptions' => ['class' => 'col-md-2 control-label'], // опции для label
        ]
    ]) ?>

    <!--поля формы-->
    <?=$form->field($country, 'code', ['enableAjaxValidation' => true]) // вкл. Ajax-валидацию (клиентскую) ?>
    <?=$form->field($country, 'name') ?>
    <?=$form->field($country, 'population') ?>
    <?=$form->field($country, 'status')->checkbox([ // здесь будет чекбокс
        'template' => "{label} \n <div class='col-md-5'> {input} </div> \n <div class='col-md-5'> {hint} </div> \n 
                      <div class='col-md-5'> {error} </div>",
        'labelOptions' => ['class' => 'col-md-2 control-label'],
        ], false) // для применения разметки к чекбоксу требуется параметр false  ?>

    <!--кнопка-->
    <div class="form-group">
        <div class="d-grid gap-2 col-md-5 offset-md-2">
            <?= HTML::submitButton('Отправить', ['class' => 'btn btn-outline-dark my-3', 'type' => 'button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
