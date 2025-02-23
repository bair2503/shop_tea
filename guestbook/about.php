 <?php
    $title = "Отдых на Байкале";
    $header = "Обратная связь";
    require "ink/header.php";
    require "blocks/header.php" ?>
    <div class="container mt-5">
        <h3>Контактная форма</h3>
        <form action="mail.php" method="post">
            <input type="email" name="email" placeholder="Введите Email" class="form-control"><br>
            <textarea name="message" class="form-control" placeholder="Введите сообщение"></textarea><br>
            <button type="submit" name="send" class="btn btn-success">Отправить</button>
        </form>
    </div>
    <?php require "blocks/footer.php" ?>
