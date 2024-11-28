<div class="col-md-12">
    <h1>Работа с моделями</h1>
    <?php debug($model->getAttributes()) // получение атрибутов модели (имена столбцов таблицы) ?><!--

    <?php /*$form = \yii\widgets\ActiveForm::begin() */?>
        <?php /*=$form->field($model, 'code') */?>
        <?php /*=$form->field($model, 'name') */?>
        <?php /*=$form->field($model, 'population') */?>
        <?php /*=$form->field($model, 'status') // этого поля нет в таблице БД, но соответствующий атрибут
                                                  // можно добавить в форму через модель */?>
    --><?php /*\yii\widgets\ActiveForm::end() */?>
</div>
