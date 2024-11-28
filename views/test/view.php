<div class="col-md-12">
    <h1>Работа с моделями</h1>
    <?php debug($countries) ?>
    <?php /*debug($model->getAttributes())*/ // получение атрибутов модели (имена столбцов таблицы) ?><!--

    <?php /*$form = \yii\widgets\ActiveForm::begin() */?>
        <?php /*=$form->field($model, 'code') */?>
        <?php /*=$form->field($model, 'name') */?>
        <?php /*=$form->field($model, 'population') */?>
        <?php /*=$form->field($model, 'status') // этого поля нет в таблице БД, но соответствующий атрибут
                                                  // можно добавить в форму через модель */?>
    --><?php /*\yii\widgets\ActiveForm::end() */?>

    <?php //debug($countries) ?>
    <table class="table">

        <!--выводим данные, полученные из таблицы country БД-->
        <?php foreach($countries as $country) : ?>
            <tr>
                <td><?php /*=$country->code */?></td>
                <td><?php /*=$country->name */?></td>
                <td><?php /*=$country->population */?></td>
                <td><?php /*=$country->status */?></td>

                <td><?=$country['code'] ?></td>
                <td><?=$country['name'] ?></td>
                <td><?=$country['population'] ?></td>
                <td><?=$country['status'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
