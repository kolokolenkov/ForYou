<?php
require "db.php";

?>
<?php
header('Content-Type: text/html; charset=utf-8'); ?>

<?php if( isset($_SESSION['logged_user'])) : ?>
	Авторизован! <br>
	Привет, <?php  echo $_SESSION['logged_user']->login; ?>!

<br>
<div class="table-responsive">
<table class="table table-striped">
<?php

foreach($result = R::getAll('SELECT * FROM Исполнители') as $row) {
    echo '<tr><th>'.' '.$row['ID Исполнителя'].'</th><th>'.$row['ФИО'].'</th><th>'.$row['Специализация'].'</th><th>'.$row['Номер телефона'].'</th><th>'.$row['Количество выполненных заказов'].'</th><th>'.$row['Рейтинг'].'<br>'; 
}


?>
</table>
</div>

<hr>
<a href="/logout.php">Выйти</a>

<?php else  : ?>
	Вы не авторизованы?<br>
	<a href="/login.php"> Авторизоваться</a><br>
   
<?php endif; ?>

