<!--выводим наименование категории-->
<h4><?=$category->title ?></h4>
<?php /*foreach ($category->products as $product) : */?>
<?php foreach ($products as $product) : ?>
    <!--выводим товары с ценами, относящиеся к данной категории-->
    <p><?=$product->title ?> | <?=$product->price ?></p>
<?php endforeach; ?>
