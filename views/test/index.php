<h2>Hello world</h2>
<?= $this->render('inc') ?> <!--подключаем вид inc-->
<?= $this->render('//inc/test.html') ?> <!--подключаем в вид файл html-->
<p><?= 'Имя: ' . $name . '<br>' . 'Возраст: ' . $age ?></p>