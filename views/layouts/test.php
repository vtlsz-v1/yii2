<?php
use yii\helpers\Html;

$this->beginPage();

\app\assets\TestAsset::register($this); // регистрация комплекта ресурсов из папки assets
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="UTF-8">
    <?php $this->registerCsrfMetaTags(); ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <?= $content ?> <!--вставить контент-->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
