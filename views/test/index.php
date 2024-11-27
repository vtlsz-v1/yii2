<?php
//use yii\widgets\ActiveForm; // подключаем виджет для создания формы
use yii\bootstrap5\ActiveForm; // подключаем виджет для создания формы
use yii\helpers\Html; // требуется для создания кнопки
use yii\widgets\Pjax; // требуется для перезагрузки только части страницы (области с формой)
?>
<div class = "col-md-12">
    <h2 class="my-3">Страница с формой</h2>

    <?php Pjax::begin() // начало перезагружаемой (обновляемой) области ?>
    <?php if(\Yii::$app->session->hasFlash('success')) : // если в сессию записано сообщение с ключом success ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?= Yii::$app->session->getFlash('success') // выводим сообщение на экран ?>
        </div>
    <?php endif; ?>

    <?php $form = ActiveForm::begin([ // открытие формы
            'layout' => 'horizontal', // горизонтальная форма
            'options' => ['class' => 'signup-form form-register1',
                            'data-pjax' => true, // требуется для использования Pjax
                         ],
            'id' => 'my-form', // переопределяем id формы
            //'enableClientValidation' => false, // отключение клиентской валидации
            /*'options' => [ // массив дополнительных настроек
                'class' => 'form-horizontal', // определяем класс bootstrap
            ],*/

            'fieldConfig' => [ // конфигурации формы
                    // шаблон для поля формы
                'template' => "{label} \n <div class='col-md-5'> {input} </div> \n <div class='col-md-5'> {hint} </div> \n 
                            <div class='col-md-5'> {error} </div>",
                'labelOptions' => ['class' => 'col-md-2 control-label'], // опции для label
            ]

        /*'fieldConfig' =>
            [ 'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                'horizontalCssClasses' => [ 'label' => 'col-sm-2', 'offset' => 'col-sm-offset-4',
                'wrapper' => 'col-sm-5', 'error' => '', 'hint' => '', ], ],*/
    ]) ?>

    <!--метод field() используется для создания полей формы
        1-й параметр - модель формы
        2-й параметр - поле формы-->
    <?= $form->field($model, 'name')->textInput(['placeholder' => 'Введите имя']) ?>

    <?= $form->field($model, 'email')->hint('<span class="text-info">Укажите здесь Ваш email</span>')
        ->input('email', ['placeholder' => 'Введите Ваш email']) // подсказка внутри поля, email - тип поля ?>

    <?= $form->field($model, 'topic', ['enableAjaxValidation' => true]) // вкл. AJAX-валидацию для данного поля
        ->input('text', ['placeholder' => 'Тема сообщения']) ?>

    <?= $form->field($model, 'text', [
        // шаблон для поля формы
        //'template' => "<!--{label} \n --> <div class='col-md-5'> {input} </div> \n <div class='col-md-5'> {hint} </div> \n
        //<div class='col-md-2'> {error} </div>", /*здесь название поля не отобразится*/
        //'labelOptions' => ['class' => 'col-md-2 control-label'], // опции для label
    ])->textarea(['rows' => 7, 'placeholder' => 'Введите текст'])
    // текстовая область из 7 строк ?>
    <!--   ['rows' => 10] - массив опций метода   -->

    <!--кнопка-->
    <div class="form-group">
        <div class="d-grid gap-2 col-md-5 offset-md-2">
            <?= HTML::submitButton('Отправить', ['class' => 'btn btn-outline-dark my-3', 'type' => 'button']) ?>
        </div>
    </div>

    <?php ActiveForm::end() // закрытие формы ?>
    <?php Pjax::end() // конец перезагружаемой области ?>

</div>

<?php
$js = <<<JS
var form = $('#my-form'); // идентификатор формы
form.on('beforeSubmit', function(){  // функция выполняется по событию beforeSubmit
    var data = form.serialize(); // берем данные из формы с помощью gquery-метода serialize()
    $.ajax({ // выполняем AJAX-запрос
        url: form.attr('action'), // url, куда будут отправлены данные, берем из атрибута формы action
        type: 'POST',
        data: data,
        success: function(res){
            console.log(res); // выводим ответ в консоль
            form[0].reset();  // и очищаем форму
        },
        error: function(){ // сообщение об ошибке
            alert('Error!');
        }
    });
    return false; // отменяет событие по умолчанию (отправку формы, которая будет отправлена по AJAX)
});
JS;

$this->registerJs($js); // регистрируем скрипт js

?>