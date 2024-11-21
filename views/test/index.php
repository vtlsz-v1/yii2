<?php
use yii\widgets\ActiveForm; // подключаем виджет для создания формы
use yii\helpers\Html; // требуется для создания кнопки
?>
<div class = "col-md-12">
    <h2>Страница с формой</h2>

    <?php $form = ActiveForm::begin() // открытие формы ?>

    <!--метод field() используется для создания полей формы
        1-й параметр - модель формы
        2-й параметр - поле формы-->
    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'text')->textarea(['rows' => 7]) // текстовая область из 7 строк ?>
    <!--   ['rows' => 10] - массив опций метода   -->

    <div class="form-group">
        <?= HTML::submitButton('Отправить', ['class' => 'btn btn-outline-dark my-3']) // кнопка ?>
    </div>

    <?php ActiveForm::end() // закрытие формы ?>

</div>
