<?php
$bd_misyte = @mysqli_connect('localhost' , 'root', 'root', 'bd_misyte') or die("Ошибка соединения с БД");
if(!$bd_misyte) die(mysqli_connect_error());
mysqli_set_charset($bd_misyte, "utf8") or die("Не установлена кодеровка");
