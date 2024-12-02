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
            <?= Yii::$app->session->getFlash('error') // выводим сообщение на экран ?>
        </div>
    <?php endif; ?>

</div>
