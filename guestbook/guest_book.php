<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src = "js/main.js"></script>

<?php


require_once "connect.php";
require_once "func.php";



$itemsPerPage = 4;
if(empty($_GET['page']))
    $page = 0;
else
    $page = $_GET['page'];
$first = $page * $itemsPerPage;
$items = get_cout($bd_misyte, $first, $itemsPerPage);
$pages = intval($items / $itemsPerPage);
if($items % $itemsPerPage != 0)
    $pages++;



if(!empty($_POST['send'])){
    save_mess($bd_misyte);
    header("Location: {$_SERVER['PHP_SELF']}");
    echo "<p>Данные занесены в базу</p>";
}

else {


$messages = get_mess($bd_misyte, $first, $itemsPerPage);
//$messages = array_mess($messages);
//print_arr($messages);

$title = "Отдых на Байкале";
$header = "Обратная связь";
require "ink/header.php";
require "blocks/header.php" ?>
<div class="container mt-5">
    <h3>Гостевая книга</h3>


<style>
    .message{
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 20px;
    }

</style>
    <form action="guest_book.php" method="post">
        <input type="text" name="name" placeholder="Введите имя" class="form-control"><br>
        <input type="email" name="email" placeholder="Введите Email" class="form-control"><br>
        <textarea name="text" class="form-control" placeholder="Введите сообщение"></textarea><br>
        <button type="submit" name="send" value="sendet" class="btn btn-success">Отправить</button>
    </form>

    <hr>

    <?php if(!empty($messages)): ?>
        <?php foreach($messages as $message): ?>
            <div class="message">
                <p>Автор: <?=stripslashes($message['full_name'])?> | Email: <?=$message['email'] ?> </p>
                <div><?=nl2br(htmlspecialchars (stripslashes($message['text'])))?></div>
                <p>Дата: <?=$message['date']?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <hr>
    <nav>
        <ul class="pagination">
            <?php  if($page != 0)
                echo "<li><a href='guest_book.php'>В Начало</a></li>";
            else
                echo "<li class='active'>В начало</li>";
            for ($i=1; $i<=$pages;$i++){
                if($i == $page+1)
                    echo "<li class='active'>".($page +1)."</li>" ;
                else{
                    echo "<li><a href='guest_book.php";
                    if($i!=1)
                        echo "?page=".($i-1);
                    echo "'>$i</a></li>";
                }
            }

            if($page != $pages -1)
                echo "<li><a href='guest_book.php?page=".($pages-1)."'>В конец</a></li>";
            else
                echo "<li class='active'>В конец</li>";
            
            ?>
        </ul>
    </nav>

</div>
<?php
}

require "blocks/footer.php" ?>

