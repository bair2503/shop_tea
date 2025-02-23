<?php
if(empty($_POST["send"])) {
?>
<form method="post" action="">
    <p>name:<input type="text" name="name"/></p>
    <p>email:<input type="text" name="email"/></p>
    <p>age:<input type="text" name="age" /></p>
    <p>sex:<input type="radio" name="sex" value="1" >male <input type="radio" name="sex" value="2" >famale</p>
    <p>education: <select name="edu"><option value="0">выбирете</option>
    <option value="1">не оконченное среднее</option>
        <option value="2">среднее</option>
            <option value="3">среднее специальное</option>
            <option value="4">высшее</option>
        </select></p>
    <p><input type="checkbox" name="subscribe">Подписаться на рассылку</p>
    <p>комментарии <br>
    <textarea name="comment"></textarea>
    </p>
    <p><input type="submit" name="send" value="отправить"> </p>
</form>
<?php
}
else {
$correct=true;

if (empty ($_POST["name"])) {
    echo "<p>Не введено имя</p>";
    $correct=false;
}

if (empty ($_POST["email"])) {
    echo "<p>Не введен email</p>";
    $correct=false;
}
else if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
    echo "<p>E-mail адрес указан верно.</p>";


if (!is_numeric($_POST["age"])) {
    echo "<p>Возраст должен быть числом</p>";
    $correct=false;
}
elseif ($_POST["age"]<5 || $_POST["age"]>120) {
    echo "<p>Возраст не корректен</p>";
    $correct=false;
}
if ($_POST["edu"]==0) {
    echo "<p>выбирете образование</p>";
    $correct=false;
}
else if($_POST["edu"]<0 || $_POST["edu"]>4){
    echo"<p>не корректоное значение поля образование</p>";
}


if (isset($_POST["sex"])) {
    if ($_POST['sex'] == "1")
        echo "<p>мужской</p>";
    elseif ($_POST['sex'] == "2")
        echo "<p>Женский</p>";
    else {
        echo "<p>не корректное значение поля пол</p>";
        $correct = false;
    }
}
else {
    echo "<p>Пожалуйста, выберите Ваш пол</p>";
    $correct = false;
}
if (empty ($_POST["comment"])) {
    echo "<p>оставьте комментрий</p>";
    $correct = false;
}

if (!$correct){


?>
    <form method="post" action="">
        <p>name:<input type="text" name="name" value="<?php echo htmlspecialchars($_POST["name"]);?>"/></p>
        <p>email:<input type="text" name="email" value="<?php echo htmlspecialchars($_POST["email"]);?>"/></p>
        <p>age:<input type="text" name="age" value="<?php echo htmlspecialchars($_POST["age"]);?>" /></p>
        <p>sex:<input type="radio" name="sex" value="1"<?php if ($_POST["sex"]==1) echo " checked"; ?> >male <input type="radio" name="sex" value="2"<?php if ($_POST["sex"]==2) echo " checked"; ?> >female</p>
        <p>education: <select name="edu"><option value="0" <?php if ($_POST["edu"]==0) echo " selected"; ?>>выбирете</option>
                <option value="1" <?php if ($_POST["edu"]==1) echo " selected"; ?>>не оконченное среднее</option>
                <option value="2" <?php if ($_POST["edu"]==2) echo " selected"; ?>>среднее</option>
                <option value="3" <?php if ($_POST["edu"]==3) echo " selected"; ?>>среднее специальное</option>
                <optionvalue="4" <?php if ($_POST["edu"]==4) echo " selected"; ?>>высшее</option>
            </select></p>

        <p><input type="checkbox" name="subscribe"<?php if ($_POST["subscribe"]) echo" checked"; ?>>Подписаться на рассылку</p>
        <p>комментарии <br>
            <textarea name="comment"><?php  echo $_POST["comment"]; ?></textarea>
        </p>
        <p><input type="submit" name="send" value="отправить"> </p>
    </form>
<?php
}
else {
    $f=fopen("data.txt", "w");
    fwrite($f, $_POST["name"]."\n");
    fwrite($f, $_POST["email"]."\n");
    fwrite($f, $_POST["age"]."\n");
    fwrite($f, $_POST["sex"]."\n");
    fwrite($f, $_POST["edu"]."\n");
    fwrite($f, $_POST["subscribe"]."\n");
    fwrite($f, $_POST["comment"]."\n");
    fclose($f);


    echo "<p>Данные сохранены. Отправлено администратору</p>>";
}
}
?>
</body>
</html>
