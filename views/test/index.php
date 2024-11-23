<?php
use yii\widgets\ActiveForm; // подключаем виджет для создания формы
use yii\helpers\Html; // требуется для создания кнопки
?>
<div class = "col-md-12">
    <h2>Страница с формой</h2>

    <?php $form = ActiveForm::begin([ // открытие формы
            'id' => 'my-form', // переопределяем id формы
            //'enableClientValidation' => false, // отключение клиентской валидации
            'options' => [ // массив дополнительных настроек
                'class' => 'form-horizontal', // определяем класс bootstrap
            ],
            'fieldConfig' => [ // конфигурации формы
                    // шаблон для поля формы
                'template' => "{label} \n <div class='col-md-5'> {input} </div> \n <div class='col-md-5'> {hint} </div> \n 
                            <div class='col-md-5'> {error} </div>",
                'labelOptions' => ['class' => 'col-md-2 control-label'], // опции для label
            ]
    ]) ?>

    <!--метод field() используется для создания полей формы
        1-й параметр - модель формы
        2-й параметр - поле формы-->
    <?= $form->field($model, 'name')->textInput(['placeholder' => 'Введите имя']) ?>

    <?= $form->field($model, 'email')->hint('<span class="text-info">Укажите здесь Ваш email</span>')
        ->input('email', ['placeholder' => 'Введите Ваш email']) // подсказка внутри поля, email - тип поля ?>

    <?= $form->field($model, 'text', [
        // шаблон для поля формы
        'template' => "<!--{label} \n --> <div class='col-md-5'> {input} </div> \n <div class='col-md-5'> {hint} </div> \n 
                                          <div class='col-md-7'> {error} </div>", /*здесь название поля не отобразится*/
        'labelOptions' => ['class' => 'col-md-2 control-label'], // опции для label
    ])->textarea(['rows' => 7, 'placeholder' => 'Введите текст'])
    // текстовая область из 7 строк ?>
    <!--   ['rows' => 10] - массив опций метода   -->

    <!--кнопка-->
    <div class="form-group">
        <div class="d-grid gap-2 col-md-5 col-md-offset-2">
            <?= HTML::submitButton('Отправить', ['class' => 'btn btn-outline-dark my-3', 'type' => 'button']) ?>
        </div>
    </div>

    <?php ActiveForm::end() // закрытие формы ?>

</div>
