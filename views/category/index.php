<?php foreach ($categories as $category) : ?>
    <!--выводим наименование категории-->
    <h4><?=$category->title ?></h4>
<?php foreach ($category->products as $product) : ?>
        <!--выводим товары с ценами, распределенные по категориям-->
        <p><?=$product->title ?> | <?=$product->price ?></p>
    <?php endforeach; ?>
<hr>
<?php endforeach; ?>
