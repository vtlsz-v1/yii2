<?php foreach ($products as $product) : ?>
    <!--выводим информацию о каждом товаре: цена, наименование, категория-->
    <p><?=$product->title ?> | <?=$product->price ?> | Category: <?=$product->category->title ?></p>
<?php endforeach; ?>